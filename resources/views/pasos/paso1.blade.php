<!--PASO 1-->
<div class="tab-pane fade show active" id="paso1" role="tabpanel" aria-labelledby="paso1-tab">
    <div class="row m-0 p-1 no-gutters">
        <!--DATOS-->
        <div class="col-sm-6 d-none d-sm-block p-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-Uso-tab" data-toggle="pill" href="#v-pills-Uso" role="tab" aria-controls="v-pills-Uso" aria-selected="true">Uso</a>
              <a class="nav-link disabled" id="v-pills-Tipo-tab" data-toggle="pill" href="#v-pills-Tipo" role="tab" aria-controls="v-pills-Tipo" aria-selected="false">Tipo</a>
              <a class="nav-link disabled" id="v-pills-Marca-tab" data-toggle="pill" href="#v-pills-Marca" role="tab" aria-controls="v-pills-Marca" aria-selected="false">Marca</a>
              <a class="nav-link disabled" id="v-pills-Modelo-tab" data-toggle="pill" href="#v-pills-Modelo" role="tab" aria-controls="v-pills-Modelo" aria-selected="false">Modelo</a>
              <a class="nav-link disabled" id="v-pills-Descripcion-tab" data-toggle="pill" href="#v-pills-Descripcion" role="tab" aria-controls="v-pills-Descripcion" aria-selected="false">Descripción</a>
              <a class="nav-link disabled" id="v-pills-CP-tab" data-toggle="pill" href="#v-pills-CP" role="tab" aria-controls="v-pills-CP" aria-selected="false">CP</a>
              <a class="nav-link disabled" id="v-pills-Nombre-tab" data-toggle="pill" href="#v-pills-Nombre" role="tab" aria-controls="v-pills-Nombre" aria-selected="false">Nombre</a>
              <a class="nav-link disabled" id="v-pills-Celular-tab" data-toggle="pill" href="#v-pills-Celular" role="tab" aria-controls="v-pills-Celular" aria-selected="false">Celular</a>
              <a class="nav-link disabled" id="v-pills-Correo-tab" data-toggle="pill" href="#v-pills-Correo" role="tab" aria-controls="v-pills-Correo" aria-selected="false">Correo</a>
              <a class="nav-link disabled" id="v-pills-Sexo-tab" data-toggle="pill" href="#v-pills-Sexo" role="tab" aria-controls="v-pills-Sexo" aria-selected="false">Sexo</a>
              <a class="nav-link disabled" id="v-pills-Edad-tab" data-toggle="pill" href="#v-pills-Edad" role="tab" aria-controls="v-pills-Edad" aria-selected="false">Nacimiento</a>
            </div>
        </div>
        <!--VACIADO DE INFORMACIÓN-->
        <div class="col col-sm-6 p-2 my-auto">
            <div class="tab-content" id="v-pills-tabContent">

                <!--USO-->
                <div class="tab-pane fade show active" id="v-pills-Uso" role="tabpanel" aria-labelledby="v-pills-Uso-tab">
                <div class="row p-0 m-0">
                    <div class="col-12 p-0 m-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="¿Ya tienes número de cotización?" aria-label="No. generado por el sistema" >
                            <div class="input-group-append">
                                <span class="input-group-text">Ver</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 my-4">
                        <div class="card">
                            <div class="card-header">
                                Tipo de Uso
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li id="1_1" class="list-group-item text-center text-dark seleccionador">Particular</li>
                                    <li id="1_2" class="list-group-item text-center text-dark seleccionador">Servicio Público</li>
                                    <li id="1_3" class="list-group-item text-center text-dark seleccionador">Uber</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                    
                </div>

                <!--TIPO-->
                <div class="tab-pane fade" id="v-pills-Tipo" role="tabpanel" aria-labelledby="v-pills-Tipo-tab">
                    <div class="card">
                        <div class="card-header">
                            Tipo de Vehículo
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li id="2_1" class="list-group-item text-center seleccionador">Automóvil</li>
                                <li id="2_2" class="list-group-item text-center seleccionador">Pick Up</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--MARCA-->
                <div class="tab-pane fade" id="v-pills-Marca" role="tabpanel" aria-labelledby="v-pills-Marca-tab">
                    <div class="card p-0">
                        <div class="card-header">
                            Marca
                        </div>
                        <div class="card-body">
                            {{-- <div class="row"> --}}
                                <ul class="list-group list-group-flush" id="marcasul" style="overflow:auto;resize: false; height:380px;">
                                    <div class="loader"></div>
                                </ul>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

                <!--MODELO-->
                <div class="tab-pane fade" id="v-pills-Modelo" role="tabpanel" aria-labelledby="v-pills-Modelo-tab">
                    <div class="card" style="overflow:scroll;resize: false; height:420px;">
                        <div class="card-header">
                            Modelo
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush" style="overflow:auto;resize: false; height:380px;">
                                @for ($i = date('Y')+1; $i >= 1990; $i--)
                                <li id="4_{{$i-1990}}" class="list-group-item text-center modelo seleccionador">{{$i}}</li>
                                @endfor
                            </ul>
                        </div>
                    </div>  
                </div>

                <!--TIPO DE USO-->
                <div class="tab-pane fade" id="v-pills-Descripcion" role="tabpanel" aria-labelledby="v-pills-Descripcion-tab">
                    <div class="card text-center">
                        <div class="card-header">
                            Descripción
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            	<ul class="list-group list-group-flush" id="descripcion" style="overflow:auto;resize: false; height:380px;">
                                    <div class="loader"></div>
                            	</ul>
                                {{-- <textarea class="form-control" id="_id_descripcion" rows="3"></textarea> --}}
                            </div>
                            {{-- <button type="button" id="5_1" class="btn btn-primary seleccionador">Siguiente</button> --}}
                        </div>
                    </div>  
                </div>

                <!--CÓDIGO POSTAL-->
                <div class="tab-pane fade" id="v-pills-CP" role="tabpanel" aria-labelledby="v-pills-CP-tab">
                    <div class="card text-center">
                        <div class="card-header">
                            Código Postal
                        </div>
                        <div class="card-body p-3">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="CP: 000000" id="valorCP">
                            </div>
                            <button type="button" id="6_1" class="btn btn-primary seleccionador">Siguiente</button>
                        </div>
                    </div>
                </div>

                <!--NOMBRE-->
                <div class="tab-pane fade" id="v-pills-Nombre" role="tabpanel" aria-labelledby="v-pills-Nombre-tab">
                    <div class="card text-center">
                        <div class="card-header">
                            Nombre Completo
                        </div>
                        <div class="card-body p-3">
                            <div class="form-row">
                                <div class="col-12 my-1">
                                    <input type="text" id="valorNombre" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-12 my-1">
                                    <input type="text" id="valorApellidoP" class="form-control" placeholder="Apellido P.">
                                </div>
                                <div class="col-12 my-1">
                                    <input type="text" id="valorApellidoM" class="form-control" placeholder="Apellido M.">
                                </div>
                            </div>
                            <button type="button" id="e_1" class="btn btn-primary seleccionador">Siguiente</button>
                        </div>
                    </div>
                </div>

                <!--CELULAR-->
                <div class="tab-pane fade" id="v-pills-Celular" role="tabpanel" aria-labelledby="v-pills-Celular-tab">
                    <div class="card text-center">
                        <div class="card-header">
                            Celular
                        </div>
                        <div class="card-body p-3">
                            <div class="form-group">
                                <input type="number" class="form-control" id="valorCelular" placeholder="55 53 33 11 22">
                            </div>
                            <button type="button" id="f_1" class="btn btn-primary seleccionador">Siguiente</button>
                        </div>
                    </div>
                </div>

                <!--CORREO-->
                <div class="tab-pane fade" id="v-pills-Correo" role="tabpanel" aria-labelledby="v-pills-Correo-tab">
                    <div class="card text-center">
                        <div class="card-header">
                            Correo
                        </div>
                        <div class="card-body p-3">
                            <div class="form-group">
                                <input type="email" class="form-control" id="valorCorreo" placeholder="ejemplo@ejemplo.com">
                            </div>
                            <button type="button" id="g_1" class="btn btn-primary seleccionador">Siguiente</button>
                        </div>
                    </div>
                </div>

                <!--SEXO-->
                <div class="tab-pane fade" id="v-pills-Sexo" role="tabpanel" aria-labelledby="v-pills-Sexo-tab">
                    <div class="card">
                        <div class="card-header">
                            Sexo
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li id="7_1" class="list-group-item seleccionador">Hombre</li>
                                <li id="7_2" class="list-group-item seleccionador">Mujer</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--EDAD-->
                <div class="tab-pane fade" id="v-pills-Edad" role="tabpanel" aria-labelledby="v-pills-Edad-tab">
                    <div class="card text-center">
                        <div class="card-header">
                            Nacimiento
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="date" id="valorEdad" onchange="cambiarEdad(this.value)" style="max-width: 160px;">
                            </div>
                            <div class="row">
                                <div class="col-12 d-none d-sm-block">
                                    <!--Botón escritorio-->
                                    <button type="button" id="8_1" onclick="sendCotizacion()" class="btn btn-primary seleccionador">Siguiente</button>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <!--Botón celular -->
                                    <button id="modalizador" type="button" id="8_1" onclick="sendCotizacion()" class="btn btn-primary seleccionador">Siguiente</button>
                                </div>
                            </div>

                            <div id="modaldecel" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    
                                    <ul class="list-group">
                                        <li class="list-group-item datos-modal" id="datosm_1">Uso:</li>
                                        <li class="list-group-item datos-modal" id="datosm_2">Tipo:</li>
                                        <li class="list-group-item datos-modal" id="datosm_3">Marca:</li>
                                        <li class="list-group-item datos-modal" id="datosm_4">Modelo:</li>
                                        <li class="list-group-item datos-modal" id="datosm_5">Descripción:</li>
                                        <li class="list-group-item datos-modal" id="datosm_6">C.P:</li>
                                        <li class="list-group-item datos-modal" id="datosm_e">Nombre:</li>
                                        <li class="list-group-item datos-modal" id="datosm_f">Celular:</li>
                                        <li class="list-group-item datos-modal" id="datosm_g">Correo:</li>
                                        <li class="list-group-item datos-modal" id="datosm_7">Sexo:</li>
                                        <li class="list-group-item datos-modal" id="datosm_8">Nacimiento:</li>
                                    </ul>

                                    
                                    
                                    <div class="modal-footer">
                                    
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" onclick="eso2()">Editar</button>
                                        <button id="8_1" type="button" class="btn btn-primary seleccionador" onclick="eso()">Confirmar</button>
                                            
                                    </div>

                                </div>
                              </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
{{-- @section('scripts')
    <script type="text/javascript">
        console.log('hola mundo');
    </script>
@endsection --}}