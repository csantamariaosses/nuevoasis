@extends('layouts.app')
@section('content')

  <div class="container">
     <div class="row" style="margin-top: 20px;">
         <p class="h3">{{$categoriaTitulo}}</p>
     </div>
     <div class="row">
          @if( count( $productos) >0 )        
            @foreach($productos as $dato)
            <div class="col-sm-4">
                <div class="thumbnail">
                      <p class="cuadro-imagen centrado">                        
                        <img src="{{asset('storage').'/imagenes'}}/{{$dato->imagen}}" alt="..." width="200" class="zoom">
                        
                      </p>
                        <div class="caption centrado">
                            <h5>{{\Illuminate\Support\Str::limit($dato->nombre, 10, $end='...')}}</h3>                       
                            <p>
                                <form name="frm" action="" method="POST">
                                    {{csrf_field() }}  
                                  <input type="hidden" name="hdAccion" value="agregarAlCarrito">
                                  <input type="hidden" name="hdId" value="{{$dato->id}}">
                                  <input type="hidden" name="hdIdProducto" value="{{$dato->idProducto}}">
                                  <input type="hidden" name="hdNombre" value="{{$dato->nombre}}">
                                                                          
                                  <a href="#" class="btn btn-default" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$dato->id}}"><i class="fa fa-eye" aria-hidden="true"></i>  Ver...</a>

                                     
                                  <!--
                                  @if( $dato->stock == 1 )
                                    <a href="#" class="btn btn-default">Agregar al carrito</a>
                                  @else
                                    <a href="#" class="btn btn-default" disabled>Agregar al carrito</a>
                                  @endif                      
                                  -->
                                </form>
                                @if( strcmp(session()->get('tipo'),'admin' ) == 0 )
                                  <button type="button" class="btn btn-default" onClick="location.href='{{action('AdminController@adminProductosEditar',[$dato->id])}}'">Ir a Config...</button>
                                @endif
                          </p>
                        </div> <!-- caption -->
                </div> <!-- thum -->    
              </div>  <!-- col-sm-4 -->

              <!--- Aqui el modal -->
             <!-- Modal -->
              <div class="modal fade" id="exampleModal{{$dato->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{$dato->nombre}}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p class="cuadro-imagen text-center">                        
                        <img src="{{asset('storage').'/imagenes'}}/{{$dato->imagen}}" alt="..." width="400" class="zoom">
                      </p>
                      <hr>
                      <h5>{{$dato->nombre}}</h3>  
                      <!-- <h5>{{$dato->imagen}}</h3>   -->
                      <p>
                        <?php 
                          if( stripos( $dato->descripcion, '<br>') > 0) {
                              //echo "Contiene brs:<br>";
                              echo $dato->descripcion . "<br>";
                              /*
                              $tokens = strtok($dato->descripcion, "<br>");
                             while ($tokens !== false) {
                              echo $tokens . "-";
                              $tokens = strtok("<br>");
                             }  
                              */              
                          } 
                        ?>
                      </p> 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach 
          @else
            <br><h4>No Existen Productos En Su Busqueda</h4>        
          @endif

   </div>   <!-- row -->
</div>  <!-- container -->
@endsection