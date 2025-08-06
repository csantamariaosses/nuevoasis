<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductosController extends Controller
{
     public function showCategoria($categoria) {
        //return "Show Categoria:".$categoria;

    	$productos = DB::table('productos')
                         ->where('subMenu', '=', $categoria)
                         ->orWhere('descripcion', 'LIKE' , '%'.$categoria.'%' )
                         ->where('visible','=',1)
                         
                         ->select( 'id','idProducto','nombre','imagen', 'descripcion','stock' )
                         ->get();

        $parametros = DB::table('parametros')->get();
        /*
        $items = DB::table('menus')
                     ->orderBy('subMenu')
                     ->get();
        $ITEM = explode("-",$item);
        */

        $categoriaTitulo = Str::replace('-', ' ', $categoria);
        $categoriaTitulo = Str::ucfirst( $categoriaTitulo);


        return view("home",compact('parametros', 'productos','categoriaTitulo'));


    }


    public function buscar(Request $request){
        $strBuscar = $request->Input("txtBuscar");
        //echo "<br>Busca:". $strBuscar;
        $productos = DB::table('productos')
                         ->where('nombre', 'like', '%'.$strBuscar.'%')
                         ->orWhere('idProducto', 'like', '%'.$strBuscar.'%')
                         ->get();
        //print_r($productos);
        $parametros = DB::table('parametros')->get();
        $categoriaTitulo = $strBuscar;
        $ITEM = array();
        return view("home",compact('parametros','productos','ITEM', 'categoriaTitulo'));

    }
}
