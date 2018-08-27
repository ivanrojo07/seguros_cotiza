@extends('layouts.app')
@section('content')
    <!--CONTENIDO-->
        <!--PASOS-->
            <div class="row justify-content-center">
                <div class="col-10 col-sm-6 my-5 mx-0 p-0 bg-light rounded shadow-lg">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="paso1-tab" data-toggle="tab" href="#paso1" role="tab" aria-controls="paso1" aria-selected="true">Datos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="paso2-tab" data-toggle="tab" href="#paso2" role="tab" aria-controls="paso2" aria-selected="false">Cotización</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="paso3-tab" data-toggle="tab" href="#paso3" role="tab" aria-controls="paso3" aria-selected="false">Auto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="paso4-tab" data-toggle="tab" href="#paso4" role="tab" aria-controls="paso4" aria-selected="false">Pago</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">


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
                                                <div class="card-body p-0">
                                                    
                                                    <ul class="list-group d-block d-sm-none" style="overflow:scroll;resize: false; height:380px;">
                                                        <li class="seleccionador marca list-group-item" id="3_1">TOYOTA</li>
                                                        <li class="seleccionador marca list-group-item" id="3_2">BMW</li>
                                                        <li class="seleccionador marca list-group-item" id="3_3">FORD</li>
                                                        <li class="seleccionador marca list-group-item" id="3_4">marca 4</li>
                                                        <li class="seleccionador marca list-group-item" id="3_5">marca 5</li>
                                                        <li class="seleccionador marca list-group-item" id="3_6">marca 6</li>
                                                        <li class="seleccionador marca list-group-item" id="3_7">marca 7</li>
                                                        <li class="seleccionador marca list-group-item" id="3_8">marca 8</li>
                                                        <li class="seleccionador marca list-group-item" id="3_9">marca 9</li>
                                                        <li class="seleccionador marca list-group-item" id="3_10">marca 10</li>
                                                        <li class="seleccionador marca list-group-item" id="3_11">marca 11</li>
                                                        <li class="seleccionador marca list-group-item" id="3_12">marca 12</li>
                                                        <li class="seleccionador marca list-group-item" id="3_13">marca 13</li>
                                                        <li class="seleccionador marca list-group-item" id="3_14">marca 14</li>
                                                    </ul>
                                                    
                                                    <div class="row d-none d-sm-flex p-0">
                                                        <div id="3_1" class="col-4 seleccionador justify-content-center">
                                                            <img src="{{ asset('img/marca1.png') }}" alt="" id="3_1" class="rounded seleccionador">
                                                        </div>
                                                        <div id="3_2" class="col-4 seleccionador justify-content-center">
                                                            <img src="{{ asset('img/marca2.png') }}" alt="" id="3_2" class="rounded seleccionador">
                                                        </div>
                                                        <div id="3_3" class="col-4 seleccionador justify-content-center">
                                                            <img src="{{ asset('img/marca3.png') }}" alt="" id="3_3" class="rounded seleccionador">
                                                        </div>
                                                    </div>
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
                                                    <ul class="list-group list-group-flush">
                                                        <li id="4_1" class="list-group-item seleccionador">
                                                            <h6 id="4_1" class="card-subtitle mt-2 text-muted text-center">2019</h6>
                                                        </li>
                                                        <li id="4_2" class="list-group-item seleccionador">
                                                            <h6 id="4_2" class="card-subtitle mt-2 text-muted text-center">2018</h6>
                                                        </li>
                                                        <li id="4_3" class="list-group-item seleccionador">
                                                            <h6 id="4_3" class="card-subtitle mt-2 text-muted text-center">2017</h6>
                                                        </li>
                                                        <li id="4_4" class="list-group-item seleccionador">
                                                            <h6 id="4_4" class="card-subtitle mt-2 text-muted text-center">2016</h6>
                                                        </li>
                                                        <li id="4_5" class="list-group-item seleccionador">
                                                            <h6 id="4_5" class="card-subtitle mt-2 text-muted text-center">2015</h6>
                                                        </li>
                                                        <li id="4_6" class="list-group-item seleccionador">
                                                            <h6 id="4_6" class="card-subtitle mt-2 text-muted text-center">2014</h6>
                                                        </li>
                                                        <li id="4_7" class="list-group-item seleccionador">
                                                            <h6 id="4_7" class="card-subtitle mt-2 text-muted text-center">2013</h6>
                                                        </li>
                                                        <li id="4_8" class="list-group-item seleccionador">
                                                            <h6 id="4_8" class="card-subtitle mt-2 text-muted text-center">2012</h6>
                                                        </li>
                                                        <li id="4_9" class="list-group-item seleccionador">
                                                            <h6 id="4_9" class="card-subtitle mt-2 text-muted text-center">2011</h6>
                                                        </li>
                                                        <li id="4_10" class="list-group-item seleccionador">
                                                            <h6 id="4_10"class="card-subtitle mt-2 text-muted text-center">2010</h6>
                                                        </li>
                                                        <li id="4_11" class="list-group-item seleccionador">
                                                            <h6 id="4_11"class="card-subtitle mt-2 text-muted text-center">2009</h6>
                                                        </li>
                                                        <li id="4_12" class="list-group-item seleccionador">
                                                            <h6 id="4_12"class="card-subtitle mt-2 text-muted text-center">2008</h6>
                                                        </li>
                                                        <li id="4_13" class="list-group-item seleccionador">
                                                            <h6 id="4_13"class="card-subtitle mt-2 text-muted text-center">2007</h6>
                                                        </li>
                                                        <li id="4_14" class="list-group-item seleccionador">
                                                            <h6 id="4_14"class="card-subtitle mt-2 text-muted text-center">2006</h6>
                                                        </li>
                                                        <li id="4_15" class="list-group-item seleccionador">
                                                            <h6 id="4_15"class="card-subtitle mt-2 text-muted text-center">2005</h6>
                                                        </li>
                                                        <li id="4_16" class="list-group-item seleccionador">
                                                            <h6 id="4_16"class="card-subtitle mt-2 text-muted text-center">2004</h6>
                                                        </li>
                                                        <li id="4_17" class="list-group-item seleccionador">
                                                            <h6 id="4_17"class="card-subtitle mt-2 text-muted text-center">2003</h6>
                                                        </li>
                                                        <li id="4_18" class="list-group-item seleccionador">
                                                            <h6 id="4_18"class="card-subtitle mt-2 text-muted text-center">2002</h6>
                                                        </li>
                                                        <li id="4_19" class="list-group-item seleccionador">
                                                            <h6 id="4_19"class="card-subtitle mt-2 text-muted text-center">2001</h6>
                                                        </li>
                                                        <li id="4_20" class="list-group-item seleccionador">
                                                            <h6 id="4_20"class="card-subtitle mt-2 text-muted text-center">2000</h6>
                                                        </li>
                                                        <li id="4_21" class="list-group-item seleccionador">
                                                            <h6 id="4_21"class="card-subtitle mt-2 text-muted text-center">1999</h6>
                                                        </li>
                                                        <li id="4_22" class="list-group-item seleccionador">
                                                            <h6 id="4_22"class="card-subtitle mt-2 text-muted text-center">1998</h6>
                                                        </li>
                                                        <li id="4_23" class="list-group-item seleccionador">
                                                            <h6 id="4_23"class="card-subtitle mt-2 text-muted text-center">1997</h6>
                                                        </li>
                                                        <li id="4_24" class="list-group-item seleccionador">
                                                            <h6 id="4_24"class="card-subtitle mt-2 text-muted text-center">1996</h6>
                                                        </li>
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
                                                        <textarea class="form-control" id="_id_descripcion" rows="3"></textarea>
                                                    </div>
                                                    <button type="button" id="5_1" class="btn btn-primary seleccionador">Siguiente</button>
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
                                                            <button type="button" id="8_1" class="btn btn-primary seleccionador">Siguiente</button>
                                                        </div>
                                                        <div class="col-12 d-block d-sm-none">
                                                            <!--Botón celular -->
                                                            <button id="modalizador" type="button" class="btn btn-primary seleccionador">Siguiente</button>
                                                        </div>
                                                    </div>

                                                    <div id="modaldecel" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">

                                                            
                                                            <ul class="list-group">
                                                                <li class="list-group-item datos-modal" id="datosm_1">Uso:</li>
                                                                <li class="list-group-item datos-modal" id="datosm_2">Tipo:</li>
                                                                <li class="list-group-item datos-modal" id="datosm_3">Marca:</li>
                                                                <li class="list-group-item datos-modal" id="datosm_4">Modelo</li>
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
                        <!--PASO 2-->
                        <div class="tab-pane fade" id="paso2" role="tabpanel" aria-labelledby="paso2-tab">
                            <div class="row p-3 m-0">
                                <div class="col">

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-Amplia-tab" data-toggle="pill" href="#pills-Amplia" role="tab" aria-controls="pills-Amplia" aria-selected="true">Amplia</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-Limitada-tab" data-toggle="pill" href="#pills-Limitada" role="tab" aria-controls="pills-Limitada" aria-selected="false">Limitada</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-RC-tab" data-toggle="pill" href="#pills-RC" role="tab" aria-controls="pills-RC" aria-selected="false">RC</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">

                                        <div class="tab-pane fade show active" id="pills-Amplia" role="tabpanel" aria-labelledby="pills-Amplia-tab">
                                            <div class="row">
                                                <!--CELULAR-->
                                                <div class="col-12 d-block d-sm-none">
                                                    <div class="coti">


                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    

                                                    </div>
                                                </div>
                                                <!--ESCRITORIO-->
                                                <div class="col-12 d-none d-sm-block p-2">
                                                    <div class="row m-2 no-gutters">

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </div>

                                                <div id="modal2" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                    <div class="col-4 p-2">
                                                                        <img src="{{ asset('img/qua.png') }}" class="rounded" alt="...">
                                                                    </div>
                                                                    <div class="col ml-3 p-2">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Quálitas</h5>
                                                                        Descripcción de la aseguradoras
                                                                    </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row p-0">
                                                                    <div class="col-12 p-0">
                                                                        <div class="row m-1">
                                                                            <div class="col-6">
                                                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                    <a class="nav-link active" id="cobertura-1-tab" data-toggle="pill" href="#cobertura-1" role="tab" aria-controls="cobertura-1" aria-selected="true">Daños Materiales</a>
                                                                                    <a class="nav-link" id="cobertura-2-tab" data-toggle="pill" href="#cobertura-2" role="tab" aria-controls="cobertura-2" aria-selected="false">Robo Total</a>
                                                                                    <a class="nav-link" id="cobertura-3-tab" data-toggle="pill" href="#cobertura-3" role="tab" aria-controls="cobertura-3" aria-selected="false">Asistencia Médica</a>
                                                                                    <a class="nav-link" id="cobertura-4-tab" data-toggle="pill" href="#cobertura-4" role="tab" aria-controls="cobertura-4" aria-selected="false">Responsabilidad Civil</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 p-2">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="cobertura-1" role="tabpanel" aria-labelledby="cobertura-1-tab">Descripccion daños materiales</div>
                                                                                    <div class="tab-pane fade" id="cobertura-2" role="tabpanel" aria-labelledby="cobertura-2-tab">Descripcción robo total</div>
                                                                                    <div class="tab-pane fade" id="cobertura-3" role="tabpanel" aria-labelledby="cobertura-3-tab">Descripcción aistencia médica</div>
                                                                                    <div class="tab-pane fade" id="cobertura-4" role="tabpanel" aria-labelledby="cobertura-4-tab">Descripcción responsabilidad civil</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="button" id="9" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="pills-Limitada" role="tabpanel" aria-labelledby="pills-Limitada-tab">
                                            <div class="row">
                                                <!--CELULAR-->
                                                <div class="col-12 d-block d-sm-none">
                                                    <div class="coti">


                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <!--ESCRITORIO-->
                                                <div class="col-12 d-none d-sm-block p-2">
                                                    <div class="row m-2 no-gutters">

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </div>

                                                <div id="modal3" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                    <div class="col-4 p-2">
                                                                        <img src="{{ asset('img/test2.jpg') }}" class="rounded" alt="...">
                                                                    </div>
                                                                    <div class="col ml-3 p-2">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Nombre de Aseguradora</h5>
                                                                        Descripcción de la aseguradoras
                                                                    </div>
                                                                
                                                                
                                                                
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row p-0">
                                                                    <div class="col-12 p-0">
                                                                        <div class="row m-1">
                                                                            <div class="col-6">
                                                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                    <a class="nav-link active" id="cobertura-1-tab" data-toggle="pill" href="#cobertura-1" role="tab" aria-controls="cobertura-1" aria-selected="true">Daños Materiales</a>
                                                                                    <a class="nav-link" id="cobertura-2-tab" data-toggle="pill" href="#cobertura-2" role="tab" aria-controls="cobertura-2" aria-selected="false">Robo Total</a>
                                                                                    <a class="nav-link" id="cobertura-3-tab" data-toggle="pill" href="#cobertura-3" role="tab" aria-controls="cobertura-3" aria-selected="false">Asistencia Médica</a>
                                                                                    <a class="nav-link" id="cobertura-4-tab" data-toggle="pill" href="#cobertura-4" role="tab" aria-controls="cobertura-4" aria-selected="false">Responsabilidad Civil</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 p-2">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="cobertura-1" role="tabpanel" aria-labelledby="cobertura-1-tab">Descripccion daños materiales</div>
                                                                                    <div class="tab-pane fade" id="cobertura-2" role="tabpanel" aria-labelledby="cobertura-2-tab">Descripcción robo total</div>
                                                                                    <div class="tab-pane fade" id="cobertura-3" role="tabpanel" aria-labelledby="cobertura-3-tab">Descripcción aistencia médica</div>
                                                                                    <div class="tab-pane fade" id="cobertura-4" role="tabpanel" aria-labelledby="cobertura-4-tab">Descripcción responsabilidad civil</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="button" id="9" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="pills-RC" role="tabpanel" aria-labelledby="pills-RC-tab">  
                                            <div class="row">
                                                <!--CELULAR-->
                                                <div class="col-12 d-block d-sm-none">
                                                    <div class="coti">


                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/banorte.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/banorte.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/banorte.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/banorte.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/banorte.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="coti-item">
                                                            <div class="card" >
                                                            <img class="card-img-top" src="{{ asset('img/banorte.png') }}" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Anual:</h5>
                                                                <p>$1,000.00</p>
                                                                <h5 class="card-title">Semestral:</h5>
                                                                <p>$800.00</p>
                                                                <h5 class="card-title">Trimestral:</h5>
                                                                <p>$500.00</p>
                                                                <h5 class="card-title">Mensual:</h5>
                                                                <p>$200.00</p>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                    

                                                    </div>
                                                </div>
                                                <!--ESCRITORIO-->
                                                <div class="col-12 d-none d-sm-block p-2">
                                                    <div class="row m-2 no-gutters">

                                                        
                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="card" >
                                                                <img class="card-img-top" src="{{ asset('img/qua.png') }}" alt="Card image cap">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Anual:</h5>
                                                                    <p>$1,000.00</p>
                                                                    <h5 class="card-title">Semestral:</h5>
                                                                    <p>$800.00</p>
                                                                    <h5 class="card-title">Trimestral:</h5>
                                                                    <p>$500.00</p>
                                                                    <h5 class="card-title">Mensual:</h5>
                                                                    <p>$200.00</p>
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal4">Info</button>
                                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </div>

                                                <div id="modal4" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                    <div class="col-4 p-2">
                                                                        <img src="{{ asset('img/test2.jpg') }}" class="rounded" alt="...">
                                                                    </div>
                                                                    <div class="col ml-3 p-2">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Nombre de Aseguradora</h5>
                                                                        Descripcción de la aseguradoras
                                                                    </div>
                                                                
                                                                
                                                                
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row p-0">
                                                                    <div class="col-12 p-0">
                                                                        <div class="row m-1">
                                                                            <div class="col-6">
                                                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                    <a class="nav-link active" id="cobertura-1-tab" data-toggle="pill" href="#cobertura-1" role="tab" aria-controls="cobertura-1" aria-selected="true">Daños Materiales</a>
                                                                                    <a class="nav-link" id="cobertura-2-tab" data-toggle="pill" href="#cobertura-2" role="tab" aria-controls="cobertura-2" aria-selected="false">Robo Total</a>
                                                                                    <a class="nav-link" id="cobertura-3-tab" data-toggle="pill" href="#cobertura-3" role="tab" aria-controls="cobertura-3" aria-selected="false">Asistencia Médica</a>
                                                                                    <a class="nav-link" id="cobertura-4-tab" data-toggle="pill" href="#cobertura-4" role="tab" aria-controls="cobertura-4" aria-selected="false">Responsabilidad Civil</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 p-2">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="cobertura-1" role="tabpanel" aria-labelledby="cobertura-1-tab">Descripccion daños materiales</div>
                                                                                    <div class="tab-pane fade" id="cobertura-2" role="tabpanel" aria-labelledby="cobertura-2-tab">Descripcción robo total</div>
                                                                                    <div class="tab-pane fade" id="cobertura-3" role="tabpanel" aria-labelledby="cobertura-3-tab">Descripcción aistencia médica</div>
                                                                                    <div class="tab-pane fade" id="cobertura-4" role="tabpanel" aria-labelledby="cobertura-4-tab">Descripcción responsabilidad civil</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="button" id="9" class="btn btn-primary seleccionador">Seleccionar</button>
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
                        <!--PASO 3-->
                        <div class="tab-pane fade" id="paso3" role="tabpanel" aria-labelledby="paso3-tab">
                            <div class="row m-3">
                                <div class="col-12 m-2 p-2">

                                    <form id="miratiobox">
                                        <div class="row">
                                        
                                            <div class="col-12 mb-4">
                                                <small>¿El asegurado  y el contratante es la misma persona?</small><br>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="eslamisma" id="exampleRadios1" value="si" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                     Si
                                                    </label>
                                                </div>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="eslamisma" id="exampleRadios2" value="no">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                     No
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <small>¿El vehículo es legalizado, fronterizo o remarcado, o es para fines de carga, comercio o lucro?</small><br>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="pregunta1" id="pregunta1" value="si" >
                                                    <label class="form-check-label" for="pregunta1">
                                                     Si
                                                    </label>
                                                </div>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="pregunta1" id="pregunta1" value="no">
                                                    <label class="form-check-label" for="pregunta1">
                                                     No
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <small>¿El vehículo cuenta con factura emitida por alguna aseguradora deniminado salvamentos o tiene algún siniestro por reclamar?</small><br>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="pregunta2" id="pregunta2" value="si" >
                                                    <label class="form-check-label" for="pregunta2">
                                                     Si
                                                    </label>
                                                </div>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="pregunta2" id="pregunta2" value="no">
                                                    <label class="form-check-label" for="pregunta2">
                                                     No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Datos del vehículo</h6>
                                            </div>
                                            <div class="form-group col-12 col-sm-3">
                                                <label for="f-uso">Uso</label>
                                                <input type="text" class="form-control" id="f-uso" placeholder="Uso del auto">
                                            </div>
                                            <div class="form-group col-12 col-sm-3">
                                                <label for="f-tipo">Tipo</label>
                                                <input type="text" class="form-control" id="f-tipo" placeholder="Tipo de auto">
                                            </div>
                                            <div class="form-group col-12 col-sm-3">
                                                <label for="f-marca">Marca</label>
                                                <input type="text" class="form-control" id="f-marca" placeholder="Marca del auto">
                                            </div>
                                            <div class="form-group col-12 col-sm-3">
                                                <label for="f-modelo">Modelo</label>
                                                <input type="text" class="form-control" id="f-modelo" placeholder="Modelo...">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-no_motor">No. motor</label>
                                                <input type="text" class="form-control" id="f-no_motor" placeholder="Número de motor">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-no_serie">No. serie</label>
                                                <input type="text" class="form-control" id="f-no_serie" placeholder="Número de serie">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-placas">Placas</label>
                                                <input type="text" class="form-control" id="f-placas" placeholder="Número de serie">
                                            </div>
                                            <div class="col-12 mt-4">
                                                <h6>Datos del asegurado</h6>
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-nombre">Nombre</label>
                                                <input type="text" class="form-control" id="f-nombre" placeholder="Nombre">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-ap">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="f-ap" placeholder="Apellido Paterno">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-am">Apellido Materno</label>
                                                <input type="text" class="form-control" id="f-am" placeholder="Apellido Materno">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-sexo">Sexo</label>
                                                <select class="form-control" id="f-sexo">
                                                    <option>Hombre</option>
                                                    <option>Mujer</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-nacimiento">Fecha de nacimiento</label>
                                                <input type="date" id="f-nacimiento" onchange="cambiarEdad(this.value)" style="max-width: 160px;">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-rfc">RFC</label>
                                                <input type="text" class="form-control" id="f-rfc" placeholder="RFC">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-regimen">Régimen Fiscal</label>
                                                <input type="text" readonly class="form-control" id="f-regimen" placeholder="Régimen">
                                            </div>
                                            <div class="form-group col-12 col-sm-7">
                                                <label for="f-correo">Correo</label>
                                                <input type="text" class="form-control" id="f-correo" placeholder="ejemplo@ejemplo.com">
                                            </div>
                                            <div class="form-group col-12 col-sm-5">
                                                <label for="f-celular">Celular</label>
                                                <input type="text" class="form-control" id="f-celular" placeholder="55 12 34 56 78">
                                            </div>
                                            <div class="form-group col-12 col-sm-7">
                                                <label for="f-calle">Calle</label>
                                                <input type="text" class="form-control" id="f-calle" placeholder="dirección">
                                            </div>
                                            <div class="form-group col-12 col-sm-5">
                                                <label for="f-tel_fijo">Tel fijo</label>
                                                <input type="text" class="form-control" id="f-tel_fijo" placeholder="5555555555">
                                            </div>
                                            <div class="form-group col-12 col-sm-3">
                                                <label for="f-no_interior">No. int.</label>
                                                <input type="text" class="form-control" id="f-no_interior" placeholder="interior">
                                            </div>
                                            <div class="form-group col-12 col-sm-3">
                                                <label for="f-no_exterior">No. ext.</label>
                                                <input type="text" class="form-control" id="f-no_exterior" placeholder="exterior">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-cp">C.P.</label>
                                                <input type="text" class="form-control" id="f-cp" placeholder="cp">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-nacionalidad">Nacionalidad</label>
                                                <input type="text" class="form-control" id="f-nacionalidad" placeholder="nacionalidad">
                                            </div>
                                            <div class="form-group col-12 col-sm-4">
                                                <label for="f-ocupacion">Ocupación</label>
                                                <input type="text" class="form-control" id="f-ocupacion" placeholder="ocupacion">
                                            </div>

                                                
                                            <div id="segundaP" class="col-12" style="display: none;">
                                                <h6>Contratante</h6>
                                                <div class="row">
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-nombre-2">Nombre</label>
                                                        <input type="text" class="form-control" id="f-nombre-2" placeholder="Nombre">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-ap-2">Apellido Paterno</label>
                                                        <input type="text" class="form-control" id="f-ap-2" placeholder="Apellido Paterno">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-am-2">Apellido Materno</label>
                                                        <input type="text" class="form-control" id="f-am-2" placeholder="Apellido Materno">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-sexo-2">Sexo</label>
                                                        <select class="form-control" id="f-sexo-2">
                                                            <option>Hombre</option>
                                                            <option>Mujer</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-nacimiento-2">Fecha de nacimiento</label>
                                                        <input type="date" id="f-nacimiento-2" onchange="cambiarEdad(this.value)" style="max-width: 160px;">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-rfc-2">RFC</label>
                                                        <input type="text" class="form-control" id="f-rfc-2" placeholder="RFC">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-regimen-2">Régimen Fiscal</label>
                                                        <input type="text" readonly class="form-control" id="f-regimen-2" placeholder="Régimen">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-7">
                                                        <label for="f-correo-2">Correo</label>
                                                        <input type="text" class="form-control" id="f-correo-2" placeholder="ejemplo@ejemplo.com">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-5">
                                                        <label for="f-celular-2">Celular</label>
                                                        <input type="text" class="form-control" id="f-celular-2" placeholder="55 12 34 56 78">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-7">
                                                        <label for="f-direccion-2">Calle</label>
                                                        <input type="text" class="form-control" id="f-direccion-2" placeholder="dirección">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-5">
                                                        <label for="f-tel_fijo-2">Tel fijo</label>
                                                        <input type="text" class="form-control" id="f-tel_fijo-2" placeholder="5555555555">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-3">
                                                        <label for="f-no_interior-2">No. int.</label>
                                                        <input type="text" class="form-control" id="f-no_interior-2" placeholder="interior">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-3">
                                                        <label for="f-no_exterior-2">No. ext.</label>
                                                        <input type="text" class="form-control" id="f-no_exterior-2" placeholder="exterior">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-cp-2">C.P.</label>
                                                        <input type="text" class="form-control" id="f-cp-2" placeholder="cp">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-nacionalidad-2">Nacionalidad</label>
                                                        <input type="text" class="form-control" id="f-nacionalidad-2" placeholder="nacionalidad">
                                                    </div>
                                                    <div class="form-group col-12 col-sm-4">
                                                        <label for="f-ocupacion-2">Ocupación</label>
                                                        <input type="text" class="form-control" id="f-ocupacion-2" placeholder="ocupacion">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#confirmar" onclick="mostrarD()">
                                                    Siguiente
                                                </button>
                                                <div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Datos</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group">
                                                                <li class="list-group-item"><p class="h4">Auto</p></li>
                                                                <li id="c-uso" class="list-group-item">Uso</li>
                                                                <li id="c-tipo" class="list-group-item">Tipo</li>
                                                                <li id="c-marca" class="list-group-item">Marca</li>
                                                                <li id="c-modelo" class="list-group-item">Modelo</li>
                                                                <li id="c-motor" class="list-group-item">No. motor</li>
                                                                <li id="c-serie" class="list-group-item">No. serie</li>
                                                                <li id="c-placa" class="list-group-item">Placas</li>
                                                                <li id="c-asegurado" class="list-group-item"><p class="h4">Asegurado</p></li>
                                                                <li id="c-nombre" class="list-group-item">Nombre</li>
                                                                <li id="c-sexo" class="list-group-item">Sexo</li>
                                                                <li id="c-nacimiento" class="list-group-item">Nacimiento</li>
                                                                <li id="c-RCC" class="list-group-item">RFC</li>
                                                                <li id="c-regimen" class="list-group-item">Régimen Fiscal</li>
                                                                <li id="c-correo" class="list-group-item">Correo</li>
                                                                <li id="c-celular" class="list-group-item">Celular</li>
                                                                <li id="c-direccion" class="list-group-item">Dirección</li>
                                                                <li id="c-telefono" class="list-group-item">Teléfono</li>
                                                                <li id="c-cp" class="list-group-item">C.P.</li>
                                                                <li id="c-nacionalidad" class="list-group-item">Nacionalidad</li>
                                                                <li id="c-ocupacion" class="list-group-item">Ocupación</li>
                                                                <li class="list-group-item"><p class="h4">Contratante</p></li>
                                                                <li id="c-nombre2" class="list-group-item">Nombre</li>
                                                                <li id="c-sexo2" class="list-group-item">Sexo</li>
                                                                <li id="c-nacimiento2" class="list-group-item">Nacimiento</li>
                                                                <li id="c-RFC2" class="list-group-item">RFC</li>
                                                                <li id="c-regimen2" class="list-group-item">Régimen Fiscal</li>
                                                                <li id="c-correo2" class="list-group-item">Correo</li>
                                                                <li id="c-celular2" class="list-group-item">Celular</li>
                                                                <li id="c-direccion2" class="list-group-item">Dirección</li>
                                                                <li id="c-telofono2" class="list-group-item">Teléfono</li>
                                                                <li id="c-cp2" class="list-group-item">C.P.</li>
                                                                <li id="c-nacionalidad2"  class="list-group-item">Nacionalidad</li>
                                                                <li id="c-ocupacion2" class="list-group-item">Ocupación</li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button id="h" type="button" class="btn btn-primary seleccionador">Confirmar</button>
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
                        <!--PASO 4-->
                        <div class="tab-pane fade" id="paso4" role="tabpane4" aria-labelledby="paso4-tab">

                            <div class="row m-3">

                                <div class="col col-sm-6 offset-sm-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Forma de pago</label>
                                        </div>
                                        <select class="custom-select" id="metododepago">
                                            <option selected>elegir...</option>
                                            <option value="1">Efectivo</option>
                                            <option value="2">Tarjeta</option>
                                            <option value="3">Transferencia</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!--EFECTIVO-->
                            <div id="metodo1" class="row m-3 metodo" style="display: none;">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            Pago en efectivo
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 offset-3">
                                                    <div class="form-group">
                                                        <label for="banco">Banco:</label>
                                                        <input type="text" class="form-control" id="banco">
                                                    </div>
                                                </div>
                                                <div class="col-6 offset-3">
                                                    <div class="form-group">
                                                        <label for="referencia">Transferencia:</label>
                                                        <input type="text" class="form-control" id="referencia">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 offset-5">
                                                <a href="#" class="btn btn-primary">Contratar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--TARJETAS1-->
                            <div id="metodo2" class="row m-3 metodo" style="display: none;">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            Pago con tarjeta
                                            <i class="fa fa-credit-card" style="font-size:24px"></i>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 offset-3">
                                                    <div class="form-group">
                                                        <label for="banco">Banco:</label>
                                                        <input type="text" class="form-control" id="banco">
                                                    </div>
                                                </div>
                                                <div class="col-6 offset-3">
                                                    <div class="form-group">
                                                        <label for="referencia">Titular:</label>
                                                        <input type="text" class="form-control" id="referencia">
                                                    </div>
                                                </div>
                                                <div class="col-6 offset-3">
                                                    <div class="form-group">
                                                        <label for="referencia">No. tarjeta</label>
                                                        <input type="text" class="form-control" id="referencia">
                                                    </div>
                                                </div>
                                                <div class="col-2 offset-3">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Mes</label>
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                        <option>04</option>
                                                        <option>05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Año</label>
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>2022</option>
                                                        <option>2023</option>
                                                        <option>2024</option>
                                                        <option>2025</option>
                                                        <option>2026</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="referencia">CVC</label>
                                                        <input type="text" class="form-control" id="referencia">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 offset-5">
                                                <a href="#" class="btn btn-primary">Contratar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--TRANSFERENCIA-->
                            <div id="metodo3" class="row m-3 metodo" style="display: none;">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            Pago en efectivo
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 offset-3">
                                                    <div class="form-group">
                                                        <label for="cuenta">No. Cuenta:</label>
                                                        <input type="text" class="form-control" id="cuenta">
                                                    </div>
                                                </div>
                                                <div class="col-6 offset-3">
                                                    <div class="form-group">
                                                        <label for="referencia">No. Referencia:</label>
                                                        <input type="text" class="form-control" id="referencia">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 offset-5">
                                                <a href="#" class="btn btn-primary">Contratar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        <!--TRANSITIONS-->
        <script>
            //DAUTO
            var uso, tipo, marca, modelo;
            //PERSONA
            var cp, nombre, ap, am, celular, correo, sexo, nacimiento;

            function cambiarEdad(a){
                $('li.datos-modal#datosm_8').text("Nacimiento: "+$("#valorEdad").val());
            }

            /*$('#8_2').click(function(e){
                $('#modaldecel').modal('toggle');
                $('#v-pills-Tipo-Uso').click();
                console.log('Editar');
            });*/
            
            function mostrarD(){
                alert("1");
                $("#c-uso").text($("#c-uso").text()+" "+uso);
                $("#c-tipo").text($("#c-tipo").text()+" "+tipo);
                $("#c-marca").text($("#c-marca").text()+" "+marca);
                $("#c-modelo").text($("#c-modelo").text()+" "+modelo);
                $("#c-motor").text($("#c-motor").text()+" "+motor);
                $("#c-serie").text($("#c-serie").text()+" "+serie);
                $("#c-placas").text($("#c-placas").text()+" "+placas);
                $("#c-nombre").text($("#c-nombre").text()+" "+nombre+ " "+ap+" "+am);
                $("#c-sexo").text($("#c-sexo").text()+" "+sexo);
                $("#c-nacimiento").text($("#c-nacimiento").text()+" "+nacimiento);
                $("#c-rfc").text($("#c-rfc").text()+" "+rfc);
                $("#c-regimen").text($("#c-regimen").text()+" "+regimen);
                $("#c-correo").text($("#c-correo").text()+" "+correo);
                $("#c-uso").text($("#c-uso").text()+" "+uso);
            }

            $("#metododepago").on('change', function(){
                $(".metodo").hide();
                if(this.value == 1){
                    $('#metodo1').show();
                }else if(this.value == 2){
                    $('#metodo2').show();
                }else if(this.value ==3){
                    $('#metodo3').show();
                }
            });

            $('#modalizador').click(function(e){
                $('#modaldecel').modal('toggle');
            });

            $(".sig3").click(function(){
                $("#paso3-tab").removeClass("disabled");
                $("#paso3-tab").click();
            });

            $(".seleccionador").click(function(e) {
                var temp = e.target.id.slice(0,1);
                switch(temp){
                    case "1":
                        $(this).siblings().removeClass("active");
                        cambiarL("#v-pills-Uso-tab", "#v-pills-Tipo-tab", e);
                        break;
                    case "2":
                        $(this).siblings().removeClass("active");
                        cambiarL("#v-pills-Tipo-tab", "#v-pills-Marca-tab",e);
                        break;
                    case "3":
                       $(".marca").removeClass("active");
                        cambiarL("#v-pills-Marca-tab", "#v-pills-Modelo-tab", e);
                        //$("#"+e.target.id+".carta-marca").addClass("border border-primary");
                        break;
                    case "4":
                        $(this).siblings().removeClass("active");
                        cambiarL("#v-pills-Modelo-tab", "#v-pills-Descripcion-tab", e);
                        break;
                    case "5":
                        cambiarL("#v-pills-Descripcion-tab", "#v-pills-CP-tab", e);
                        break;
                    case "6":
                        cambiarL("#v-pills-CP-tab", "#v-pills-Nombre-tab", e);
                        break;
                    case "7":
                        $(this).siblings().removeClass("active");
                        cambiarL("#v-pills-Sexo-tab", "#v-pills-Edad-tab", e);
                        break;
                    case "8":
                        cambiarL("#v-pills-Edad-tab", "#paso2-tab", e);
                        alertmobile();
                        break;
                    case "9":
                        $('#modal2').modal('hide');
                        cambiarL("algo", "#paso3-tab",e);
                        actualizarD();
                        break;
                    case "e":
                        cambiarL("#v-pills-Nombre-tab", "#v-pills-Celular-tab", e);
                        break;
                    case "f":
                        cambiarL("#v-pills-Celular-tab", "#v-pills-Correo-tab", e);
                        break;
                    case "g":
                        cambiarL("#v-pills-Correo-tab", "#v-pills-Sexo-tab", e);
                        break;
                    case "h":
                        cambiarL("#paso3-tab", "#paso4-tab", e);
                        $('#confirmar').modal('hide');
                        break;
                    default: 
                        break;


                }
            });

            $('#miratiobox').change(function(){
                if($("input[name='eslamisma']:checked").val() == "si"){
                    $("#segundaP").hide();
                }else{
                    $("#segundaP").show();
                }
                
             });

             $("#f-rfc").focusout(function(){
                 var a = ""+this.value;
                 if(a.length == 12)
                    $("#f-regimen").val("Moral");

                if(a.length == 13)
                    $("#f-regimen").val("Física");
             });

             $("#f-rfc-2").focusout(function(){
                 var a = ""+this.value;
                 if(a.length == 12)
                    $("#f-regimen-2").val("Moral");

                if(a.length == 13)
                    $("#f-regimen-2").val("Física");
             });

            function actualizarD(){
                $("#f-uso").val(uso);
                $("#f-tipo").val(tipo);
                $("#f-marca").val(marca);
                $("#f-modelo").val(modelo.trim());
                $("#f-nombre").val(nombre);
                $("#f-ap").val(ap);
                $("#f-am").val(am);
                //$("#f-s").val();  SEXO
                $("#f-nacimiento").val(nacimiento);
                $("#f-correo").val(correo);
                $("#f-celular").val(celular);
                $("#f-cp").val(cp);
            }   

            function eso(){
                $('#modaldecel').modal('toggle');
            }
            function eso2(){
                $('#modaldecel').modal('toggle');
                $('#v-pills-Uso-tab').click();

            }

            function alertmobile(){
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                }
            }

            function cambiarL(from, to, e){
                if(from != "#v-pills-Descripcion-tab"){
                    switch(from){
                        case '#v-pills-Uso-tab':
                            $(from).text("Uso: "+$("#"+e.target.id).text());
                            $('li.datos-modal#datosm_1').text("Uso: "+$("#"+e.target.id).text());
                            uso = $("#"+e.target.id).text();
                            break;
                        case '#v-pills-Tipo-tab':
                            $(from).text("Tipo: "+$("#"+e.target.id).text());
                            $('li.datos-modal#datosm_2').text("Tipo: "+$("#"+e.target.id).text());
                            tipo = $("#"+e.target.id).text();
                            break;

                        case '#v-pills-Marca-tab':
                            $(from).text("Marca: "+$("#"+e.target.id).text());
                            $('li.datos-modal#datosm_3').text("Marca: "+$("#"+e.target.id).text());
                            marca = $("#"+e.target.id).text();

                            break;

                        case '#v-pills-Modelo-tab':
                            $(from).text("Modelo: "+$("#"+e.target.id).text());
                            $('li.datos-modal#datosm_4').text("Modelo: "+$("#"+e.target.id).text());
                            modelo = $("#"+e.target.id).text();
                            break;

                        case '#v-pills-CP-tab':
                            $(from).text("CP: "+$("#valorCP").val());
                            $('li.datos-modal#datosm_6').text("CP: "+$("#valorCP").val());
                            cp = $("#valorCP").val();
                            break;

                        case '#v-pills-Sexo-tab':
                            $(from).text("Sexo: "+$("#"+e.target.id).text());
                            $('li.datos-modal#datosm_7').text("Sexo: "+$("#"+e.target.id).text());
                            sexo = $("#"+e.target.id).text()
                            break;

                        case '#v-pills-Edad-tab':
                                //$('#modaldecel').modal('toggle');
                             $(from).text("Edad: "+$("#valorEdad").val());
                              $('li.datos-modal#datosm_8').text("Edad: "+$("#valorEdad").val());
                              nacimiento = $("#valorEdad").val();
                            break;
                        case '#v-pills-Nombre-tab':
                            $(from).text("Nombre: "+$("#valorNombre").val());
                            $('li.datos-modal#datosm_e').text("Nombre: "+$("#valorNombre").val());
                            nombre = $("#valorNombre").val();
                            ap = $("#valorApellidoP").val();
                            am = $("#valorApellidoM").val();
                            break;
                        case '#v-pills-Celular-tab':
                            $(from).text("Celular: "+$("#valorCelular").val());
                            $('li.datos-modal#datosm_f').text("Celular: "+$("#valorCelular").val());
                            celular = $("#valorCelular").val()
                            break;
                        case '#v-pills-Correo-tab':
                            $(from).text("Correo: "+$("#valorCorreo").val());
                            $('li.datos-modal#datosm_g').text("Correo: "+$("#valorCorreo").val());
                            correo = $("#valorCorreo").val();
                            break;
                    }
                }
                $(to).removeClass("disabled");
                $(to).click();
                $("#"+e.target.id).addClass("active");
            }
        </script>
@endsection