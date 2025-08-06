@extends('layouts.app')

@section('title', 'Deportes Asis')

@section('header')
    <p>Este es el header</p>
@endsection

@section('content')
  <div class="container">
    <div class="row">
          <p class="h3">Recupera Contraseña...</p>
    </div>
    <div class="row">
         <div class="col-sm-12">
          @if(session()->has('flash-message-success')) 
             <div class="alert alert-success">
               {{ session()->get('flash-message-success') }} 
             </div>
          @endif 
          @if(session()->has('flash-message-warning')) 
             <div class="alert alert-warning">
               {{ session()->get('flash-message-warning') }} 
             </div>
          @endif 
         </div>
    </div> 
    <hr> 
    <div class="row">
          <div class="row">
            <div class="col-sm-6">
                <div class="well well-sm">

                 <form name="frmAcceso" id="frmAcceso" action="{{route('olvidoPasswordEnvioCorreo')}}" method="POST">
                  {{ csrf_field() }}
                     <input type="hidden" name="accion" id="accion" value="recuperarPasswordPreparaToken">
                     <div class="form-group"> <!-- Correo Usuario -->
                       <label for="emaiResetPass"control-label">Correo electronico</label>
                       <input type="text" class="form-control" id="emailResetPass" name="emailResetPass" placeholder="Correo electronico" required>
                     </div>    
                     <div class="form-group"> <!-- Submit Button -->
                         <button type="submit" class="btn btn-primary" disabled>Enviar</button>
                    </div>   
                 </form>
                 </div>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
  </div> 
@endsection