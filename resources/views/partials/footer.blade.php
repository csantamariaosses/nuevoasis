<hr>
<!--   FOOTER TOP -->
<div class="footer">
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center my-2">
            <h4>Deportes Asis</h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-left">
            <br>
            <p><a href="#"><img src="{{asset('storage').'/imagenes/logo_asis_blanco.png'}}" alt="logo-asis" width="100" style="border-radius:10%"/></a> </p>
            <br>
            <p><a href="https://www.facebook.com/profile.php?id=100034189782538" target="_blank"><i class="fa fa-facebook-square fa-2x ico-face-footer" style="color: white;" aria-hidden="true"></i></a>
               <a href="#"><i class="fa fa-instagram fa-2x" style="color: white;"></i></a>
            </p>
        </div>
        <div class="col-sm-3 text-left">
            <p>Categorías</p>
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('showCategoria', ['categoria' => 'Artes Marciales']) }}">Artes marciales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('showCategoria', ['categoria' => 'Basquetbol']) }}">Básquetbol</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('showCategoria', ['categoria' => 'Futbol']) }}">Fútbol</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('showCategoria', ['categoria' => 'yoga-y-pilates']) }}">Yoga</a>
            </li>  
            </ul>
        </div>
        <div class="col-sm-3 text-left">
            <p>Informaci&oacute;n de Contacto</p>
            <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; {{ $parametros[0]->direccion}}<br>
            <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;{{$parametros[0]->fonoContacto}}<br>
            <i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;&nbsp;{{$parametros[0]->fonoWhasap}}<br>
            <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp; {{$parametros[0]->email}}<br>
            <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;{{$parametros[0]->direccionWeb}}
            

        </div>
    </div>
    <br>
    <br><br>
</div>
</div>
