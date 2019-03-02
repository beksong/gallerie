<?php

namespace App\Providers;
use App\Permission;
use App\Category;
use App\Policies\BarangPolicy;
use App\Policies\CategoryPolicy;
use Illuminate\Support\Facades\Gate;
/*use Illuminate\Contracts\Auth\Access\Gate as GateContract;*/
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
       /* Category::class => CategoryPolicy::class*/
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage_user',function($user){
            return $user->can('manage_user');
        });

        Gate::define('show_category',function($user){
            return $user->can('show_category');
        });

        Gate::define('show_brand',function($user){
            return $user->can('show_brand');
        });

        Gate::define('show_suplier',function($user){
            return $user->can('show_brand');
        });

        Gate::define('show_barang',function($user){
            return $user->can('show_barang');
        });

        Gate::define('show_gudang',function($user){
            return $user->can('show_gudang');
        });

        Gate::define('show_gudang',function($user){
            return $user->can('show_gudang');
        });

        Gate::define('show_sjpembelian',function($user){
            return $user->can('show_sjpembelian');
        });

        Gate::define('show_sjpenjualan',function($user){
            return $user->can('show_sjpenjualan');
        });

        Gate::define('show_kasir',function($user){
            return $user->can('show_kasir');
        });

        Gate::define('show_kasirtoday',function($user){
            return $user->can('show_kasirtoday');
        });

        Gate::define('show_pembelian',function($user){
            return $user->can('show_pembelian');
        });

        Gate::define('show_pembeliansj',function($user){
            return $user->can('show_pembeliansj');
        });

        Gate::define('show_pembeliankredit',function($user){
            return $user->can('show_pembeliankredit');
        });

        Gate::define('show_pembeliancash',function($user){
            return $user->can('show_pembeliancash');
        });

        Gate::define('show_laporanpenjualan',function($user){
            return $user->can('show_laporanpenjualan');
        });

        Gate::define('show_semuapenjualan',function($user){
            return $user->can('show_semuapenjualan');
        });

        Gate::define('show_penjualantoday',function($user){
            return $user->can('show_penjualantoday');
        });

        Gate::define('show_stok',function($user){
            return $user->can('show_stok');
        });

        Gate::define('show_stokminimal',function($user){
            return $user->can('show_stokminimal');
        });

        Gate::define('show_penjualantimeframe',function($user){
            return $user->can('show_penjualantimeframe');
        });

        Gate::define('showtagihan',function($user){
            return $user->can('showtagihan');
        });

        Gate::define('showkredit',function($user){
            return $user->can('showkredit');
        });
    }
}
