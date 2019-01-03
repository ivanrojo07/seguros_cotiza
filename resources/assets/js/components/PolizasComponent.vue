<template>
	<div>

		<!-- Modal QUALITAS -->
		<div id="modal-Info-Qualitas" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="qualitasModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                            <div class="col-4 p-2">
                                <img src="img/qua.png" class="rounded" alt="...">
                            </div>
                            <div class="col ml-3 p-2">
                                <h5 class="modal-title" id="exampleModalLabel">Quálitas</h5>
                            </div>
                    </div>
                    <div class="modal-body">
                        <div v-if="cotizacion" class="row p-0">
                            <div class="col-12 p-0">
                                <div class="row m-1">
                                    <div class="col-6">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a v-for="(cobertura, index) in cotizacion.Coberturas" class="nav-link" :id="'cobertura-'+index+'-tab'" data-toggle="pill" :href="'#cobertura-'+index" role="tab" aria-controls="cobertura-1" aria-selected="true">{{cobertura.tipo}}</a>
                                        </div>
                                    </div>
                                    <div class="col-6 p-2">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div v-for="(cobertura, index) in cotizacion.Coberturas" class="tab-pane fade" :id="'cobertura-'+index" role="tabpanel" aria-labelledby="cobertura-1-tab">
												<h4>			
                                            		Descripción {{cobertura.tipo}}
												</h4>
												<h5>Suma asegurada:</h5>
												<p>${{cobertura.SumaAsegurada | int}}MXN</p>
												<h5>Deducible:</h5>
												<p>{{ cobertura.Deducible | int }}%</p>
												<h5>Prima:</h5>
												<p>${{cobertura.Prima | int}}MXN</p>
                                        	</div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                   <!--  <button type="button" id="9" class="btn btn-primary seleccionador">Seleccionar</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ANA -->
        <div id="modal-Info-ANA" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="ANAModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                            <div class="col-4 p-2">
                                <img :src="anaImage" class="rounded" alt="Ana Seguros">
                            </div>
                            <div class="col ml-3 p-2">
                                <h5 class="modal-title" id="exampleModalLabel">ANA Seguros</h5>
                            </div>
                    </div>
                    <div class="modal-body">
                        <div v-if="cotizacion" class="row p-0">
                            <div class="col-12 p-0">
                                <div class="row m-1">
                                    <div class="col-6">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a v-for="(cobertura, index) in cotizacion.coberturas" class="nav-link" :id="'cobertura-'+index+'-tab'" data-toggle="pill" :href="'#cobertura-'+index" role="tab" aria-controls="cobertura-1" aria-selected="true">{{cobertura.desc}}</a>
                                        </div>
                                    </div>
                                    <div class="col-6 p-2">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div v-for="(cobertura, index) in cotizacion.coberturas" class="tab-pane fade" :id="'cobertura-'+index" role="tabpanel" aria-labelledby="cobertura-1-tab">
                                                <h4>            
                                                    Descripción {{cobertura.desc}}
                                                </h4>
                                                <h5 v-if="cobertura.sa">Suma asegurada:</h5>
                                                <p v-if="cobertura.sa">{{cobertura.sa}}</p>
                                                <h5 v-if="cobertura.ded">Deducible:</h5>
                                                <p v-if="cobertura.ded">{{ cobertura.ded }}</p>
                                                <h5 v-if="cobertura.pma">Prima:</h5>
                                                <p v-if="cobertura.pma">{{cobertura.pma}}</p>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                   <!--  <button type="button" id="9" class="btn btn-primary seleccionador">Seleccionar</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal GS -->
        <div id="modal-Info-GS" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="qualitasModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-4 p-2">
                            <img src="img/GENERAL-DE-SEGUROS-LOGO.png" style="width: 100%!important; height: 25%!important;" class="rounded" alt="...">
                        </div>
                        <div class="col ml-3 p-2">
                            <h5 class="modal-title" v-if="cotizacion" id="exampleModalLabel"> General de Seguros: {{cotizacion.nombre}}</h5>

                        </div>
                    </div>
                    <div class="modal-body">
                        <div v-if="cotizacion" class="row p-0">
                            <div class="col-12 p-0">
                                <div class="row m-1">
                                    <div class="col-6">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a v-for="(cobertura, index) in cotizacion.coberturas" class="nav-link" :id="'cobertura-'+index+'-tab'" data-toggle="pill" :href="'#cobertura-'+index" role="tab" aria-controls="cobertura-1" aria-selected="true">{{cobertura.descripcion}}</a>
                                        </div>
                                    </div>
                                    <div class="col-6 p-2">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div v-for="(cobertura, index) in cotizacion.coberturas" class="tab-pane fade" :id="'cobertura-'+index" role="tabpanel" aria-labelledby="cobertura-1-tab">
                                                <h4>            
                                                    Descripción {{cobertura.descripcion}}
                                                </h4>
                                                <h5>Monto:</h5>
                                                <p>{{cobertura.monto}}</p>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" id="9" class="btn btn-primary seleccionador">Seleccionar</button> -->
                    </div>
                </div>
            </div>
        </div>

		<!-- polizas {{cliente}} -->
		<div class="row p-3 m-0">
			<div class="col">
				<h3>{{cliente.nombre }} {{cliente.appaterno}} {{cliente.apmaterno}} </h3>
                <div class="alert alert-info" role="alert">
                    <h5 class="alert-heading">
                        {{cliente.marca_auto.nombre}} {{cliente.modelo_auto}} {{cliente.descripcion_auto.descripcion}}
                    </h5>
                </div>
                <!-- LOADER -->
                <div class="row justify-content-center">
                    <div class="loader" v-if="loader"></div>
                </div>
                <!-- FIN LOADER -->
				<ul class="nav nav-pills mb-3" v-if="!loader" id="pills-tab" role="tablist">
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
	            <div class="tab-content" v-if="!loader" id="pills-tabContent">
	            	<!-- AMPLIA -->
	            	<div class="tab-pane fade show active" id="pills-Amplia" role="tabpanel" aria-labelledby="pills-Amplia-tab">
	            		<div class="row">
                            <!--CELULAR-->
                            <div class="col-12 d-block d-sm-none">
                                <div class="coti">
                                   <!--  <div class="coti-item" v-for="cotizacion in cotizacionesQualitas">
                                        <div class="card" v-if="!cotizacion.response.amplia.error">
                                            <img class="card-img-top" :src="cotizacion.imagen" alt="Card image cap">
                                            <div class="card-body">
                                                <h6 class="card-title">Prima Neta:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.PrimaNeta |int}}MXN</p>
                                                <h6 class="card-title">Gastos de expedición de poliza:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.Derecho | int}}MXN</p>
                                                <h6 class="card-title">Impuestos:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.Impuesto | int}}MXN</p>
                                                <h6 class="card-title">Recargo:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.Recargo|int}}MXN</p>
                                                <h4 class="card-title">Prima Total:</h4>
                                                <p>${{cotizacion.response.amplia.Primas.PrimaTotal|int}}MXN</p>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info" @click="infoCotizacion(cotizacion.response.amplia)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coti-item" v-for="cotizacionGS in cotizacionesGS.cotizacion.paquetes">
                                        <div class="card" v-if="cotizacionGS.nombre == 'CONFORT AMPLIA'">
                                        <img class="card-img-top" :src="cotizacionesGS.img" alt="Card image cap">
                                        <div class="card-body">
                                            <div class="row" v-for="pago in cotizacionGS.formasPagoDTO">
                                                <h6 class="col-6 card-title">{{pago.nombre}}:</h6>
                                                <p class="col-6">${{pago.primaTotal | int}}</p>
                                                <p class="col-6 card-title">PAGO INICIAL:</p>
                                                <p class="col-6">${{pago.reciboini | int}}</p>
                                                <p class="col-6 card-title" v-if="pago.nombre === 'SEMESTRAL'">SEMESTRES:</p>
                                                <p class="col-6 card-title" v-else-if="pago.nombre === 'TRIMESTRAL'">TRIMESTRES:</p>
                                                <p class="col-6 card-title" v-else-if="pago.nombre === 'MENSUAL'">MENSUALIDAD:</p>
                                                <p class="col-6" v-if="pago.nombre != 'CONTADO'">
                                                    ${{pago.recibosub | int}}
                                                </p>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-GS" @click="infoCotizacion(cotizacionGS)">Información</button>
                                                </div>
                                                <div class="col-4">
                                                    <button type="button" id="9_1" class="btn btn-primary seleccionador">Elegir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> -->
                                </div>
                            </div>
	            			<!--ESCRITORIO-->
                            <div class="col-12 d-none d-sm-block p-2">
                                <div class="row m-2 no-gutters">
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-for="cotizacion in cotizacionesQualitas">
                                        <div class="card" v-if="!cotizacion.response.amplia.error">
                                            <img class="card-img-top" :src="cotizacion.imagen" alt="Card image cap">
                                            <div class="card-body">
                                                <h6 class="card-title">Prima Neta:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.PrimaNeta |int}}MXN</p>
                                                <h6 class="card-title">Gastos de expedición de poliza:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.Derecho | int}}MXN</p>
                                                <h6 class="card-title">Impuestos:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.Impuesto | int}}MXN</p>
                                                <h6 class="card-title">Recargo:</h6>
                                                <p>${{cotizacion.response.amplia.Primas.Recargo|int}}MXN</p>
                                                <h4 class="card-title">Prima Total:</h4>
                                                <p>${{cotizacion.response.amplia.Primas.PrimaTotal|int}}MXN</p>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-Qualitas" @click="infoCotizacion(cotizacion.response.amplia)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirqua(cotizacion.response.amplia, 1)">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6"  v-if="cotizacionesGS">
                                        <div v-for="cotizacionGS in cotizacionesGS.cotizacion.paquetes" v-if="cotizacionGS.nombre == 'CONFORT AMPLIA'">
                                            <div class="card" v-if="cotizacionGS.nombre == 'CONFORT AMPLIA'">
                                                <img class="card-img-top" :src="cotizacionesGS.img" alt="Card image cap">
                                                <div class="card-body">
                                                    <div class="row" v-for="pago in cotizacionGS.formasPagoDTO">
                                                        <p class="col-6"><strong>{{pago.nombre}}:</strong></p>
                                                        <p class="col-6">${{pago.primaTotal | int}}</p>
                                                        <p class="col-6">PAGO INICIAL:</p>
                                                        <p class="col-6">${{pago.reciboini | int}}</p>
                                                        <p class="col-6" v-if="pago.nombre === 'SEMESTRAL'">SEMESTRES:</p>
                                                        <p class="col-6" v-else-if="pago.nombre === 'TRIMESTRAL'">TRIMESTRES:</p>
                                                        <p class="col-6" v-else-if="pago.nombre === 'MENSUAL'">MENSUALIDAD:</p>
                                                        <p class="col-6" v-if="pago.nombre != 'CONTADO'">
                                                            ${{pago.recibosub | int}}
                                                        </p>
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-4">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-GS" @click="infoCotizacion(cotizacionGS)">Información</button>
                                                        </div>
                                                        <div class="col-4">
                                                            <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirgs(cotizacionesGS.cotizacion.id,cotizacionGS)">Elegir</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-if="cotizacionesANA">
                                        <div v-if="cotizacionesANA.AMPLIA">
                                            <div class="card">
                                                <img class="card-img-top" :src="anaImage" alt="Ana Seguros">
                                                <div class="card-body">
                                                    <div class="row" v-for="pago in cotizacionesANA.AMPLIA">
                                                        <p class="col-6" v-if="pago.CONTADO"><strong>CONTADO:</strong></p>
                                                        <p class="col-6" v-if="pago.CONTADO">${{pago.CONTADO.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.CONTADO">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.CONTADO">${{pago.CONTADO.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL"><strong>SEMESTRAL:</strong></p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.recibos[0].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">SEMESTRE:</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.recibos[1].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL"><strong>TRIMESTRAL:</strong></p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.recibos[0].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">TRIMESTRES:</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.recibos[1].primatotal | int}}</p>
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-4">
                                                            <!-- TODO -->
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-ANA" @click="infoAna(cotizacionesANA.AMPLIA)">Información</button>
                                                        </div>
                                                        <div class="col-4">
                                                            <!-- TODO -->
                                                            <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirANA('AMPLIA',cotizacionesANA.AMPLIA)">Elegir</button>
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
                    <!-- LIMITADA -->
	            	<div class="tab-pane fade" id="pills-Limitada" role="tabpanel" aria-labelledby="pills-Limitada-tab">
                        <div class="row">
                             <!--CELULAR-->
                           <!--  <div class="col-12 d-block d-sm-none">
                                <div class="coti">
                                    <div class="coti-item" v-for="cotizacion in cotizacionesQualitas">
                                        <div class="card" v-if="!cotizacion.response.limitada.error">
                                            <img class="card-img-top" :src="cotizacion.imagen" alt="Card image cap">
                                            <div class="card-body">
                                                <h6 class="card-title">Prima Neta:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.PrimaNeta |int}}MXN</p>
                                                <h6 class="card-title">Gastos de expedición de poliza:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.Derecho | int}}MXN</p>
                                                <h6 class="card-title">Impuestos:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.Impuesto | int}}MXN</p>
                                                <h6 class="card-title">Recargo:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.Recargo|int}}MXN</p>
                                                <h4 class="card-title">Prima Total:</h4>
                                                <p>${{cotizacion.response.limitada.Primas.PrimaTotal|int}}MXN</p>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info" @click="infoCotizacion(cotizacion.response.limitada)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coti-item" v-for="cotizacionGS in cotizacionesGS.cotizacion.paquetes" v-if="cotizacionesGS">
                                        <div class="card" v-if="cotizacionGS.nombre == 'CONFORT LIMITADA'">
                                            <img class="card-img-top" :src="cotizacionesGS.img" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row" v-for="pago in cotizacionGS.formasPagoDTO">
                                                    <h6 class="col-6 card-title">{{pago.nombre}}:</h6>
                                                    <p class="col-6">${{pago.primaTotal | int}}</p>
                                                    <p class="col-6 card-title">PAGO INICIAL:</p>
                                                    <p class="col-6">${{pago.reciboini | int}}</p>
                                                    <p class="col-6 card-title" v-if="pago.nombre === 'SEMESTRAL'">SEMESTRES:</p>
                                                    <p class="col-6 card-title" v-else-if="pago.nombre === 'TRIMESTRAL'">TRIMESTRES:</p>
                                                    <p class="col-6 card-title" v-else-if="pago.nombre === 'MENSUAL'">MENSUALIDAD:</p>
                                                    <p class="col-6" v-if="pago.nombre != 'CONTADO'">
                                                        ${{pago.recibosub | int}}
                                                    </p>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-GS" @click="infoCotizacion(cotizacionGS)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--ESCRITORIO-->
                            <div class="col-12 d-none d-sm-block p-2">
                                <div class="row m-2 no-gutters">
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-for="cotizacion in cotizacionesQualitas">
                                        <div class="card" v-if="!cotizacion.response.limitada.error">
                                            <img class="card-img-top" :src="cotizacion.imagen" alt="Card image cap">
                                            <div class="card-body">
                                                <h6 class="card-title">Prima Neta:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.PrimaNeta |int}}MXN</p>
                                                <h6 class="card-title">Gastos de expedición de poliza:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.Derecho | int}}MXN</p>
                                                <h6 class="card-title">Impuestos:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.Impuesto | int}}MXN</p>
                                                <h6 class="card-title">Recargo:</h6>
                                                <p>${{cotizacion.response.limitada.Primas.Recargo|int}}MXN</p>
                                                <h4 class="card-title">Prima Total:</h4>
                                                <p>${{cotizacion.response.limitada.Primas.PrimaTotal|int}}MXN</p>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-Qualitas" @click="infoCotizacion(cotizacion.response.limitada)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirqua(cotizacion.response.amplia, 3)">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-if="cotizacionesGS">
                                        <div v-for="cotizacionGS in cotizacionesGS.cotizacion.paquetes" v-if="cotizacionGS.nombre == 'CONFORT LIMITADA'">
                                            <div class="card" v-if="cotizacionGS.nombre == 'CONFORT LIMITADA'">
                                                <img class="card-img-top" :src="cotizacionesGS.img" alt="Card image cap">
                                                <div class="card-body">
                                                    <div class="row" v-for="pago in cotizacionGS.formasPagoDTO">
                                                        <h6 class="col-6 card-title">{{pago.nombre}}:</h6>
                                                        <p class="col-6">${{pago.primaTotal | int}}</p>
                                                        <p class="col-6 card-title">PAGO INICIAL:</p>
                                                        <p class="col-6">${{pago.reciboini | int}}</p>
                                                        <p class="col-6 card-title" v-if="pago.nombre === 'SEMESTRAL'">SEMESTRES:</p>
                                                        <p class="col-6 card-title" v-else-if="pago.nombre === 'TRIMESTRAL'">TRIMESTRES:</p>
                                                        <p class="col-6 card-title" v-else-if="pago.nombre === 'MENSUAL'">MENSUALIDAD:</p>
                                                        <p class="col-6" v-if="pago.nombre != 'CONTADO'">
                                                            ${{pago.recibosub | int}}
                                                        </p>
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-4">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-GS" @click="infoCotizacion(cotizacionGS)">Información</button>
                                                        </div>
                                                        <div class="col-4">
                                                            <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirgs(cotizacionesGS.cotizacion.id,cotizacionGS)">Elegir</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-if="cotizacionesANA">
                                        <div v-if="cotizacionesANA.LIMITADA">
                                            <div class="card">
                                                <img class="card-img-top" :src="anaImage" alt="Ana Seguros">
                                                <div class="card-body">
                                                    <div class="row" v-for="pago in cotizacionesANA.LIMITADA">
                                                        <p class="col-6" v-if="pago.CONTADO"><strong>CONTADO:</strong></p>
                                                        <p class="col-6" v-if="pago.CONTADO">${{pago.CONTADO.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.CONTADO">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.CONTADO">${{pago.CONTADO.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL"><strong>SEMESTRAL:</strong></p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.recibos[0].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">SEMESTRE:</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.recibos[1].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL"><strong>TRIMESTRAL:</strong></p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.recibos[0].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">TRIMESTRES:</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.recibos[1].primatotal | int}}</p>
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-4">
                                                            <!-- TODO -->
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-ANA" @click="infoAna(cotizacionesANA.LIMITADA)">Información</button>
                                                        </div>
                                                        <div class="col-4">
                                                            <!-- TODO -->
                                                            <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirANA('LIMITADA',cotizacionesANA.LIMITADA)">Elegir</button>
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

	            	<div class="tab-pane fade" id="pills-RC" role="tabpanel" aria-labelledby="pills-RC-tab">
                        <div class="row">
                            <!--CELULAR-->
                            <!-- <div class="col-12 d-block d-sm-none">
                                <div class="coti">
                                    <div class="coti-item" v-for="cotizacion in cotizacionesQualitas">
                                        <div class="card" v-if="!cotizacion.response.rc.error">
                                            <img class="card-img-top" :src="cotizacion.imagen" alt="Card image cap">
                                            <div class="card-body" >
                                                <h6 class="card-title">Prima Neta:</h6>
                                                <p>${{cotizacion.response.rc.Primas.PrimaNeta |int}}MXN</p>
                                                <h6 class="card-title">Gastos de expedición de poliza:</h6>
                                                <p>${{cotizacion.response.rc.Primas.Derecho | int}}MXN</p>
                                                <h6 class="card-title">Impuestos:</h6>
                                                <p>${{cotizacion.response.rc.Primas.Impuesto | int}}MXN</p>
                                                <h6 class="card-title">Recargo:</h6>
                                                <p>${{cotizacion.response.rc.Primas.Recargo|int}}MXN</p>
                                                <h4 class="card-title">Prima Total:</h4>
                                                <p>${{cotizacion.response.rc.Primas.PrimaTotal|int}}MXN</p>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info" @click="infoCotizacion(cotizacion.response.rc)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coti-item" v-for="cotizacionGS in cotizacionesGS.cotizacion.paquetes">
                                        <div class="card" v-if="cotizacionGS.nombre == 'CONFORT BASICA'">
                                            <img class="card-img-top" :src="cotizacionesGS.img" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row" v-for="pago in cotizacionGS.formasPagoDTO">
                                                    <h6 class="col-6 card-title">{{pago.nombre}}:</h6>
                                                    <p class="col-6">${{pago.primaTotal | int}}</p>
                                                    <p class="col-6 card-title">PAGO INICIAL:</p>
                                                    <p class="col-6">${{pago.reciboini | int}}</p>
                                                    <p class="col-6 card-title" v-if="pago.nombre === 'SEMESTRAL'">SEMESTRES:</p>
                                                    <p class="col-6 card-title" v-else-if="pago.nombre === 'TRIMESTRAL'">TRIMESTRES:</p>
                                                    <p class="col-6 card-title" v-else-if="pago.nombre === 'MENSUAL'">MENSUALIDAD:</p>
                                                    <p class="col-6" v-if="pago.nombre != 'CONTADO'">
                                                        ${{pago.recibosub | int}}
                                                    </p>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-GS" @click="infoCotizacion(cotizacionGS)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--ESCRITORIO-->
                            <div class="col-12 d-none d-sm-block p-2">
                                <div class="row m-2 no-gutters">
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-for="cotizacion in cotizacionesQualitas">
                                        <div class="card" v-if="!cotizacion.response.rc.error">
                                            <img class="card-img-top" :src="cotizacion.imagen" alt="Card image cap">
                                            <div class="card-body" >
                                                <h6 class="card-title">Prima Neta:</h6>
                                                <p>${{cotizacion.response.rc.Primas.PrimaNeta |int}}MXN</p>
                                                <h6 class="card-title">Gastos de expedición de poliza:</h6>
                                                <p>${{cotizacion.response.rc.Primas.Derecho | int}}MXN</p>
                                                <h6 class="card-title">Impuestos:</h6>
                                                <p>${{cotizacion.response.rc.Primas.Impuesto | int}}MXN</p>
                                                <h6 class="card-title">Recargo:</h6>
                                                <p>${{cotizacion.response.rc.Primas.Recargo|int}}MXN</p>
                                                <h4 class="card-title">Prima Total:</h4>
                                                <p>${{cotizacion.response.rc.Primas.PrimaTotal|int}}MXN</p>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-Qualitas" @click="infoCotizacion(cotizacion.response.rc)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirqua(cotizacion.response.amplia, 4)">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-if="cotizacionesGS">
                                    <div v-for="cotizacionGS in cotizacionesGS.cotizacion.paquetes" v-if="cotizacionGS.nombre == 'CONFORT BASICA'">
                                        <div class="card" v-if="cotizacionGS.nombre == 'CONFORT BASICA'">
                                            <img class="card-img-top" :src="cotizacionesGS.img" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row" v-for="pago in cotizacionGS.formasPagoDTO">
                                                    <h6 class="col-6 card-title">{{pago.nombre}}:</h6>
                                                    <p class="col-6">${{pago.primaTotal | int}}</p>
                                                    <p class="col-6 card-title">PAGO INICIAL:</p>
                                                    <p class="col-6">${{pago.reciboini | int}}</p>
                                                    <p class="col-6 card-title" v-if="pago.nombre === 'SEMESTRAL'">SEMESTRES:</p>
                                                    <p class="col-6 card-title" v-else-if="pago.nombre === 'TRIMESTRAL'">TRIMESTRES:</p>
                                                    <p class="col-6 card-title" v-else-if="pago.nombre === 'MENSUAL'">MENSUALIDAD:</p>
                                                    <p class="col-6" v-if="pago.nombre != 'CONTADO'">
                                                        ${{pago.recibosub | int}}
                                                    </p>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-GS" @click="infoCotizacion(cotizacionGS)">Información</button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirgs(cotizacionesGS.cotizacion.id,cotizacionGS)">Elegir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col col-sm-12 col-md-12 col-lg-6 col-xl-6" v-if="cotizacionesANA">
                                        <div v-if="cotizacionesANA.RC">
                                            <div class="card">
                                                <img class="card-img-top" :src="anaImage" alt="Ana Seguros">
                                                <div class="card-body">
                                                    <div class="row" v-for="pago in cotizacionesANA.RC">
                                                        <p class="col-6" v-if="pago.CONTADO"><strong>CONTADO:</strong></p>
                                                        <p class="col-6" v-if="pago.CONTADO">${{pago.CONTADO.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.CONTADO">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.CONTADO">${{pago.CONTADO.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL"><strong>SEMESTRAL:</strong></p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.recibos[0].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">SEMESTRE:</p>
                                                        <p class="col-6" v-if="pago.SEMESTRAL">${{pago.SEMESTRAL.recibos[1].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL"><strong>TRIMESTRAL:</strong></p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.prima.primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">PAGO INICIAL:</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.recibos[0].primatotal | int}}</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">TRIMESTRES:</p>
                                                        <p class="col-6" v-if="pago.TRIMESTRAL">${{pago.TRIMESTRAL.recibos[1].primatotal | int}}</p>
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-4">
                                                            <!-- TODO -->
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-Info-ANA" @click="infoAna(cotizacionesANA.RC)">Información</button>
                                                        </div>
                                                        <div class="col-4">
                                                            <!-- TODO -->
                                                            <button type="button" id="9_1" class="btn btn-primary seleccionador" @click="emitirANA('RC',cotizacionesANA.RC)">Elegir</button>
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
			</div>
        </div>
       <!--  <pre>
            {{$data}}
        </pre> -->
	</div>
</template>
<script>
	export default{
		props:[
    		'cliente',
    		'getcotizacion',
            'alert',
            'gs'
    	],
    	data(){
    		return{
                loader: true,
    			cotizacion:null,
    			cotizacionesQualitas:[],
                cotizacionesGS:[],
                cotizacionesANA:[],
    			error:null,
                setCotizacion: null,
                anaImage:null,
                gsImage:null,
                quaImage:null,
    		}
    	},
    	watch:{
    		'getcotizacion.value': function (newVal,oldVal) {
    			// body...
                this.getCoberturasGS(this.cliente.cotizacion);
    			this.getCoberturas(this.cliente.cotizacion);
                this.getCoberturasAna(this.cliente.cotizacion);
    		}
    	},
    	methods:{
            getCoberturasAna(cotizacion){
                let url = './api/cotizacionANA';
                let params = {cotizacion:cotizacion};
                axios.post(url,params).then(res=>{
                    if(res.data.ANASeguros){
                        this.cotizacionesANA=res.data.ANASeguros;
                        console.log(this.cotizacionesANA);
                    }
                }).catch(err=>{
                    console.log('coberturas ana error',err);
                })
            },
    		getCoberturas(cotizacion){
    			let url = './api/getCoberturasQ';
    			let params = {cotizacion:cotizacion};
    			axios.post(url,params).then(res=>{
    				console.log('coberturas res',res);
    				this.error = res.data.error;
					// console.log(this.error.length);
                    console.log(res.data);
    				if(!this.error){
    					this.cotizacionesQualitas.push({'imagen':'./img/qua.png','response':res.data});
                        // this.loader = false;
    				}
    			}).catch(err=>{
    				console.log('coberturas err', err)
    			});
    		},
            getCoberturasGS(cotizacion){
                let url = "./api/getCotizacionGS";
                let params = {cotizacion:cotizacion};
                axios.post(url,params).then(res=>{
                    console.log("general res",res.data)
                    this.loader = false;
                    this.cotizacionesGS = {"img": './img/GENERAL-DE-SEGUROS-LOGO.png','cotizacion':res.data.cotizacion};
                }).catch(error=>{
                    this.loader = false;
                    this.cotizacionesGS = null;
                    console.log('general err',error);
                })

            },
            infoAna(cotiza){
                // console.log(cotiza[0].CONTADO);
                this.cotizacion=cotiza[0].CONTADO;
                console.log(this.setCotizacion);
            },
            emitirANA(key,cotiza){
                this.setCotizacion={nombre:"ANASeguros",cotizacion:{tipo:key,info:cotiza}};
                this.$emit("emitirana" , this.setCotizacion);
                $("#paso3-tab").removeClass("disabled");
                $("#paso3-tab").click();

            },
    		infoCotizacion(cotiza){
                console.log(cotiza);
    			this.cotizacion = cotiza;
    		},
            seleccionarCotizacion(cotizacion){
                $("#paso3-tab").removeClass("disabled");
                $("#paso3-tab").click();
                console.log(cotizacion);
            },
            emitirgs(cotizacion_id,paquete){
                console.log(this.cotizacionesGS.cotizacion.id,paquete);

                this.setCotizacion = {nombre: "GS",id: cotizacion_id,paquete:paquete};
                this.$emit("emitirgs", this.setCotizacion);
                // console.log(this.gs);
                $("#paso3-tab").removeClass("disabled");
                $("#paso3-tab").click();
            },
            emitirqua(cotizacion,paquete){
                cotizacion.paquetequa = paquete;
                console.log(cotizacion);
                this.setCotizacion = cotizacion;
                this.$emit("emitirqua", this.setCotizacion);
                // console.log(this.gs);
                $("#paso3-tab").removeClass("disabled");
                $("#paso3-tab").click();
            }
    	},
    	filters:{
    		'int': function (value) {
			    if (!value) return ''
			    let val = (value/1).toFixed(2).replace(',', '.')
        		return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			  }
    	},
    	created(){
    	},
    	mounted(){
            this.anaImage="./img/ana1.png";
            this.gsImage = "./img/GENERAL-DE-SEGUROS-LOGO.png";
            this.quaImage = "./img/qua.png";
    	}
	}
</script>