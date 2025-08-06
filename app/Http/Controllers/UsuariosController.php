<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;


class UsuariosController extends Controller
{
    //

    public function __construct()     {
        //$parametros = DB::table('parametros')->get();
        //$items = DB::table('menus')->orderBy('posicion','ASC')->get();
        //print_r( $items);
    }
    public function index(){

        $parametros = DB::table('parametros')->get();

        $categoriaTitulo = "Cuenta";
        return view("cuenta",compact('parametros',"categoriaTitulo"));
        //return 'home';


    }


    public function acceso( Request $request){
        //return "Cuenta-Acceso";
        $parametros = DB::table('parametros')->get();
        $categoriaTitulo = "Cuenta";

        $email = $request->input('emailAcc');
        $password = md5($request->input('passwordAcc'));

        $user = DB::select('select email, password, nombre, tipo from usuarios where email=? and password=?', [$email,$password]);

        if( count( $user) > 0) {
            \Session::put('email', $email);
            \Session::put('nombre', $user[0]->nombre);
            \Session::put('tipo', $user[0]->tipo);
            $nombre = $user[0]->nombre;

            if( strcmp(\Session::get('tipo'), 'admin' ) == 0) {
                return view('admin.index', compact('parametros', 'categoriaTitulo'));
            }


        } else {
            return view("cuenta",compact('parametros',"categoriaTitulo"));
        }

    }
    
    public function registro(){
        return "Cuenta-Registro";
    }

    public function olvidoPassword(){
        //echo "<br>Olvido Password";
        $parametros = DB::table('parametros')->get();
        $categoriaTitulo = "Cuenta";
        //return "Plvido Password";
        return view('usuarios/olvidoPassword',compact('parametros', 'categoriaTitulo'));
    }


    public function olvidoPasswordEnvioCorreo(Request $request){
        //echo "<br>Envio Correo a Usuario";
        $email  = $request->input("emailResetPass");
        $token = md5(uniqid(rand(), true));
        //echo "<br>token:" . $token;
        
        $user = new Usuario();
        $user = Usuario::where('email',$email)->first();
        $user->token = $token;
        $user->save();

        
        $status = $this->enviaCorreo($email, $token);
        $subject = "Contacto Reseteo de Password";
        $emailDestino =  $email;
        $body = "<!doctype html>";
                $body .= "<html>";
                $body .= "<body>";
                $body .= "<div align='center'><img src='http://deportesasis.cl/asis/storage/logo_asis_transp.png' width='200' height='180'></div>";
                $body .= "<div align='center'><h4>Bienvenido  a Asis SpA</h4></div>";
                $body .= "<div align='center'>A traves de este enlace puede resetear su password.<br><a href='http://deportesasis.cl/asis/usuarios/nuevaPassword?token=".$token."'>Enlace</a>";
                $body .= "<br><br>Atte.<br> Asis SpA.</div>";
                $body .= "</body>";
                $body .= "</html>";
                
        
        
        if( enviarEmail($subject, $emailDestino, "cssantam@gmail.com", $body ) ) {
             \Session::flash('flash-message-success','Se ha enviado correo para el reseteo de su password ... !!'); 
             $parametros = DB::table('parametros')->get();
             $items = DB::table('menus')
                          ->orderBy('subMenu')
                          ->get();
             return view('usuarios/olvidoPassword', compact('parametros','items'));
        } else {
             \Session::flash('flash-message-warning','Ocurrio un problema al intentar enviar correo ... !!'); 
             $parametros = DB::table('parametros')->get();
             $items = DB::table('menus')
                          ->orderBy('subMenu')
                          ->get();             
             return view('usuarios/olvidoPassword', compact('parametros','items'));
        }
        
    }


    public function nuevaPassword(Request $request){
       // echo "<br>reset Password";
        $token  = $request->input("token");
       // echo "<br>Token:".$token;

        $user = new Usuario();
        $user = Usuario::where('token',$token)->first();
        //dd( $user);
         \Session::forget('flash-message-success');
        if( !is_null( $user ) ) {
            //echo "<br>user:".$user->email;
            $parametros = DB::table('parametros')->get();
            $items = DB::table('menus')
                        ->orderBy('subMenu')
                        ->get();
            $email = $user->email;
            //echo "<br>email:".$email;

            return view('usuarios.nuevaPassword',compact('parametros','email','token','items'));
        } else {

            \Session::flash('flash-message-warning','Esta pagina ha expirado ... !!'); 
            $parametros = DB::table('parametros')->get();
            return view('usuarios.expirado',compact('parametros','items'));
        }
        


    }


    public function updateNuevaPassword(Request $request ){
        //echo "<br>UpdateNuevaPass";
        //echo "<br>NuevaPass:".$request->input("nuevaPassword");

        $token = $request->input("token");
        $email = $request->input("user");
        $nuevaPass = $request->input("nuevaPassword");
        $nuevaRePass = $request->input("nuevaRePassword");
        if( strcmp($nuevaPass, $nuevaRePass) != 0) {
            \Session::flash('flash-message-warning','Las password deben coincidir ... !!'); 
            $parametros = DB::table('parametros')->get();
            $items = DB::table('menus')
                         ->orderBy('subMenu')
                         ->get();
            //echo "<br>Aqui";
            return view('usuarios.nuevaPassword',compact('parametros','items','email','token'));
        } else {
            try {
                \DB::table('usuarios') 
                 ->where('token', $token) 
                 ->update( [ 'password' => md5($nuevaPass),
                             'token' => '',
                             'updated_at' => date('Y-m-d G:i:s')]);
            } catch( Exception $ex ) {
                \Session::flash('flash-message-warning','Ocurrio un problema al actualizar password ... favor reintentar ... !!'); 
                $parametros = DB::table('parametros')->get();
                $items = DB::table('menus')
                             ->orderBy('subMenu')
                             ->get();
                return view('usuarios.olvidoPassword',compact('parametros','items'));

            }

            \Session::flash('flash-message-success','Password cambiada en forma exitosa ... !!'); 
            $parametros = DB::table('parametros')->get();
            $items = DB::table('menus')
                         ->orderBy('subMenu')
                         ->get();
            return view('usuarios.index',compact('parametros','items'));

        }

    }

}
