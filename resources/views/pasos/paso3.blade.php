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