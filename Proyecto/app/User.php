<?php

namespace App;

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
        if($this->has_role(config('app.admin_role'))) $users = self::all();
        if($this->has_role(config('app.assistant_role'))){
            $users = self::whereHas('roles', function($q){
                $q->whereIn('slug', [
                    config('app.doctor_role'),
                    config('app.client_role')
                ]);
            })->get();
        }
        if($this->has_role(config('app.doctor_role'))){
            $users = self::whereHas('roles', function($q){
                $q->whereIn('slug', [
                    config('app.client_role')
                ]);
            })->get();
        }
        return $users;
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

    //Vistas
    public function edit_view($view = null)
    {
        $auth = auth()->user();

        if (!is_null($view) && $view == 'frontoffice') {
            return 'theme.frontoffice.pages.user.edit';
        } else if($auth->has_role(config('app.admin_role'))){
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
        } else if($auth->has_role(config('app.admin_role'))){
            return 'backoffice.user.show';
        } else {
            return 'frontoffice.user.profile';
        }
    }

}
