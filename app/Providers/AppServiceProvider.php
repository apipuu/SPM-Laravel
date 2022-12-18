<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(){
            $id_user = Auth::user()->id;
            $id_model = DB::table('model_has_roles')->where('model_id', $id_user)->value('role_id');
            //dd($id_model);
            if($id_model == 1) return true;
            return false;
        });

        Gate::define('pengunjung', function(){
            $id_user = Auth::user()->id;
            $id_model = DB::table('model_has_roles')->where('model_id', $id_user)->value('role_id');
            //dd($id_model);
            if($id_model == 2) return true;
            return false;
        });
    }
}
