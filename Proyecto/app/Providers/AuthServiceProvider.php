<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Role' => 'App\Policies\RolePolicy',
        'App\Permission' => 'App\Policies\PermissionPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Speciality' => 'App\Policies\SpecialityPolicy',
        'App\Pet' => 'App\Policies\PetPolicy',
        'App\Insumo' => 'App\Policies\InsumoPolicy',
        'App\Medicamento' => 'App\Policies\MedicamentoPolicy',
        'App\Servicio' => 'App\Policies\ServicioPolicy',
        'App\TipoServicio' => 'App\Policies\TipoServicioPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
