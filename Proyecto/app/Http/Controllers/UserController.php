<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Http\Request;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('index', User::class);
        return view('theme.backoffice.pages.user.index', [
            'users' => auth()->user()->visible_users(),
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('theme.backoffice.pages.user.create',[
            'roles' => Role::all(),
        ]);
    }

    public function store(StoreRequest $request, User $user)
    {
        $user = $user->store($request);
        return redirect()->route('backoffice.user.show', $user);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('theme.backoffice.pages.user.show',[
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $view = (isset($_GET['view'])) ? $_GET['view'] : null ;        
        return view($user->edit_view($view),[
            'user' => $user,
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->my_update($request);
        $view = (isset($_GET['view'])) ? $_GET['view'] : null ;
        return redirect()->route($user->user_show(), $user);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        alert()->success('Usuario eliminado', 'Exito')->autoclose(2000);
        return redirect()->route('backoffice.user.index');
    }

    public function assign_role(User $user)
    {
        $this->authorize('assign_role', $user);
        return view('theme.backoffice.pages.user.assign_role',[
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    /*
     * Asignar los roles en la tabla pivote de la base de datos
     *
     */
    public function role_assignment(Request $request, User $user)
    {
        $this->authorize('assign_role', $user);
        $user->role_assignment($request);
        return redirect()->route('backoffice.user.show',$user);
    }

    /**
     * Mostrar formulario para asignar los permisos
     *
     */
    public function assign_permission(User $user)
    {
        $this->authorize('assign_permission', $user);
        return view('theme.backoffice.pages.user.assign_permission',[
            'user' => $user,
            'roles' => $user->roles
        ]);
    }

    /*
     * Asignar permisos en la tabla pivote de la base de datos
     *
     */
    public function permission_assignment(Request $request, User $user)
    {
        $this->authorize('assign_permission', $user);
        $user->permissions()->sync($request->permissions);
        alert()->success('Permisos asignados', 'Exito')->autoclose(2000);
        return redirect()->route('backoffice.user.show', $user);
    }

    /**
     * Mostrar el formulario para importar usuarios
     *
    */
    public function import()
    {
        $this->authorize('import', $user);
        return view('theme.backoffice.pages.user.import');
    }
    
    /**
     * Importar usuario desde una hoja de excel
     *
    */
    public function make_import(Request $request)
    {
        $this->authorize('import', $user);
        Excel::import(new UsersImport, $request->file('excel'));
        alert()->success('Usuarios importados', 'Exito')->autoclose(2000);
        return redirect()->route('backoffice.user.index');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('theme.frontoffice.pages.user.profile', [
            'user' => $user,
        ]);
    }

    public function edit_password()
    {
        $this->authorize('update_password', auth()->user());
        return view('theme.frontoffice.pages.user.edit_password');
    }

    public function change_password(ChangePasswordRequest $request)
    {
        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        alert()->success('Contraseña actualizada', 'Exito')->autoclose(2000);
        return redirect()->back();
    }
}
