<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Config;
use DB;

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
      
        View::composer('*', function ($view) {
            $cate_product = Category::where([
                ['check_cate','=','product'],
                ['active','=',1]
                ])->get();
            $cate_post = Category::where([
                ['check_cate','=','post'],
                ['active','=',1]
                ])->get();
            $list_menu = DB::table('menu')->get();
            $gioi_thieu = Category::find_menu(2);
            $chia_se_khach_hang = Category::find_menu(3);
            $hop_tac_kinh_doanh = Category::find_menu(4);
            $thu_vien_suc_khoe = Category::find_menu(5);
            $tin_tuc = Category::find_menu(6);
            $key = Config::all();
            $config = [];
            foreach ($key as $key => $value) {
                $config[$value->keys]['key'] =$value->keys;
                $config[$value->keys]['value'] =$value->value;
            }
            $view->with('cate_product', $cate_product)
                 ->with('cate_post', $cate_post)
                 ->with('config',$config)
                 ->with('menu',$list_menu)
                 ->with('gioi_thieu',$gioi_thieu)
                 ->with('chia_se_khach_hang',$chia_se_khach_hang)
                 ->with('hop_tac_kinh_doanh',$hop_tac_kinh_doanh)
                 ->with('thu_vien_suc_khoe',$thu_vien_suc_khoe)
                 ->with('tin_tuc',$tin_tuc);
        });
    }
}
