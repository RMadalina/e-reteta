<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // @role('roleName')
        Blade::directive('role', function (... $roles) {
            $rolesString = implode( ',', $roles);
            return "<?php if(auth()->check() && auth()->user()->hasRole({$rolesString})) : ?>";
        });

        // @endrole
        Blade::directive('endrole', function (... $roles) {
            return "<?php endif; ?>";
        });
    }
}
