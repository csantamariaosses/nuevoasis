<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //

    public function __construct()     {
        //$parametros = DB::table('parametros')->get();
        //$items = DB::table('menus')->orderBy('posicion','ASC')->get();
        //print_r( $items);
    }
    public function index(){

        $parametros = DB::table('parametros')->get();
        /*$items = DB::table('menus')
                ->orderBy('subMenu')
                ->get();
                */
        //print_r( $items);
        $productos = DB::table('productos')->where('subMenu','Balones')->get();
        //dd( $productos);

        $categoriaTitulo = "";
        return view("home",compact('parametros', 'productos', "categoriaTitulo"));
        //return 'home';


    }
    
}
