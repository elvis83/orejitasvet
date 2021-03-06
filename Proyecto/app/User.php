<?php

namespace App;

use App\Role;
use App\ClinicNote;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dob', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['dob'];

    //Relaciones

    public function permissions()
    {
        return $this->belongsToMany('App\Permission')->withTimestamps();
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function specialities()
    {
        return $this->belongsToMany('App\Speciality')->withTimestamps();
    }

    public function pets()
    {
        return $this->hasMany('App\Pet');
    }

    public function turnos()
    {
        return $this->hasMany('App\TurnoMedico');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function clinic_datas()
    {
        return $this->hasMany('App\ClinicData');
    }

    public function clinic_notes()
    {
        return $this->hasMany('App\ClinicNote');
    }

    public function doctor_schedules()
    {
        return $this->hasMany('App\DoctorSchedule');
    }

    public function disable_dates()
    {
        return $this->hasMany('App\DisableDate');
    }

    public function disable_times()
    {
        return $this->hasMany('App\DisableTime');
    }

//Almacenamiento

    public function store($request)
    {
        $user = self::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $roles = [$request->role];
        $user->role_assignment(null, $roles);
        alert()->success('Registro almacenado', 'Exito')->autoclose(2000);
        return $user;
    }

    public function my_update($request)
    {
        self::update($request->all());
        alert()->success('Registro actualizado', 'Exito')->autoclose(2000);
    }

    public function role_assignment($request, array $roles = null)
    {
        $roles = (is_null($roles)) ? $request->roles : $roles;
        $this->permission_mass_assignment($roles);       
        $this->roles()->sync($roles);
        $this->verify_permission_integrity($roles);
        alert()->success('Registro almacenado', 'Exito')->autoclose(2000);
    }

    //Validacion

    public function is_admin()
    {
        $admin = config('app.admin_role');
        if($this->has_role($admin)) {
            return true;
        } else {
            return false;
        }
    }

    public function has_role($id)
    {
        foreach ($this->roles as $role) {
            if ($role->id == $id || $role->slug == $id) return true;
        }
        return false;
    }

    public function has_any_role(array $roles)
    {
        foreach ($roles as $role) {
            if($this->has_role($role)) return true;
        }
        return false;
    }

    public function has_permission($id){
    {
        foreach ($this->permissions as $permission)
            if ($permission->id == $id || $permission->slug == $id) return true;
        }
        return false;
    }

    public function has_speciality($id)
    {
        foreach ($this->specialities as $speciality) {
            if($speciality->id == $id) return true;
        }
        return false;
    } 
    
    //Recuperacion de Informacion

    public function age()
    {
        if(!is_null($this->dob)){
            $age = $this->dob->age;
            $years = ($age == 1) ? 'año' : 'años';
            $msj = $age . ' ' . $years;
        } else {
            $msj = 'Indefinido';
        }
        return $msj;
    }

    public function visible_users()
    {
        if($this->has_role(config('app.admin_role')))
        {
            $users = self::all();
        }elseif($this->has_role(config('app.assistant_role'))){
            $users = self::whereHas('roles', function($q){
                $q->whereIn('slug', [
                    config('app.doctor_role'),
                    config('app.client_role')
                ]);
            })->get();
        }elseif($this->has_role(config('app.doctor_role'))){
            $users = self::whereHas('roles', function($q){
                $q->whereIn('slug', [
                    config('app.client_role'),
                ]);
            })->get();
        }
        return $users;
    }

    public function visible_roles()
    {
        if($this->has_role(config('app.admin_role'))) $roles = Role::all();
        if($this->has_any_role([config('app.assistant_role'), config('app.doctor_role')])){
            $roles = Role::where('slug', config('app.client_role'))->get();
                     /*->orWhere('slug', config('app.doctor_role'))
                     ->get();*/
        }
        return $roles;
    }

    public function list_roles()
    {
        $roles = $this->roles->pluck('name')->toArray();
        $string = implode(', ', $roles);
        return $string;
    }

    public function list_specialities()
    {
        $specialities = $this->specialities->pluck('name')->toArray();
        $string = implode(', ', $specialities);
        return $string;
    }

    public function clinic_data_array()
    {
        $datas = $this->clinic_datas->pluck('value','key')->toArray();
        return $datas;
    }

    public function clinic_data($key, $array = null, $default = null)
    {   
        $array = (!is_null($array)) ? $array : $this->clinic_data_array();
        if(array_key_exists($key, $array)){
            $value = $array[$key];
        }else{
            $value = $default;
        } 
        return $value;
    }

    //Otras Operaciones
    public function verify_permission_integrity(array $roles)
    {
        $permissions = $this->permissions;
        foreach ($permissions as $permission) {
            if(!in_array($permission->role->id, $roles)){
                $this->permissions()->detach($permission->id);
            }            
        }
    }

    public function permission_mass_assignment(array $roles)
    {
        foreach ($roles as $role) {
            if(!$this->has_role($role)) {
                $role_obj = \App\Role::findOrFail($role);
                $permissions = $role_obj->permissions;
                $this->permissions()->syncWithoutDetaching($permissions);
            }
        }
    }

    public function manual_disabled_dates()
    {
        $disable_date = $this->disable_dates()->where('key', 'manual')->first();
        if(!is_null($disable_date)){
            return $disable_date->value;
        }else{
            return null;
        }   
    }

    public function process_disabled_dates($dates)
    {
        //Convertimos en un arreglo las fechas
        $dates = explode(',', $dates);

        //Declaramos la variable new_dates para almacenar las fechas procesadas.
        $str_dates = '';
        // Para el plugin de pickadate es necesario reducir una unidad cada mes para que corresponda con la selección del usuario

        foreach ($dates as $key => $date) {

            $date = trim($date);
            $date_elements = explode('/', $date);
            
            $year = $date_elements[0];
            $month = $date_elements[1];
            $day = $date_elements[2];
            
            $new_date = $year . ',' . ($month - 1) . ',' . $day;
            $str_dates .= $new_date . '-';
        }
        //Eliminamos el último caracter de la cadena
        $str_dates = substr($str_dates, 0, -1);
        
        return $str_dates;
    }

    //Vistas
    public function edit_view($view = null)
    {
        $auth = auth()->user();

        if (!is_null($view) && $view == 'frontoffice') {
            return 'theme.frontoffice.pages.user.edit';
        } else if($auth->has_any_role([config('app.admin_role'),  config('app.assistant_role')])){
            return 'theme.backoffice.pages.user.edit';
        } else {
            return 'theme.frontoffice.pages.user.edit';
        }
    }

    public function user_show($view = null)
    {
        $auth = auth()->user();

        if (!is_null($view) && $view == 'frontoffice') {
            return 'frontoffice.user.profile';
        } else if($auth->has_any_role([config('app.admin_role'),  config('app.assistant_role')])){
            return 'backoffice.user.show';
        } else {
            return 'frontoffice.user.profile';
        }
    }

    public function days_off()
    {
        $days_off = $this->disable_dates()->where('key', 'days_off')->first();
        if(!is_null($days_off)){
            return $days_off->value;
        }else{
            return null;
        } 
    }
}
