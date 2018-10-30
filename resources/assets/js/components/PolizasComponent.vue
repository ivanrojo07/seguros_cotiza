<template>
	<div>

		<!-- Modal -->

		<div id="modal-Info" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" id="9" class="btn btn-primary seleccionador">Seleccionar</button>
                    </div>
                </div>
            </div>
        </div>

		<!-- polizas {{cliente}} -->
		<div class="row p-3 m-0">
			<div class="col">
				<h3>{{cliente.nombre }} {{cliente.appaterno}} {{cliente.apmaterno}} <span class="badge badge-info">{{cliente.marca_auto}} {{cliente.descripcion_auto.cTipo}} {{cliente.descripcion_auto.cVersion}}</span> </h3>
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
	            			<div class="coti-item" v-for="cotizacion in cotizaciones">
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
	            		</div>
	            	</div>

	            	<div class="tab-pane fade" id="pills-Limitada" role="tabpanel" aria-labelledby="pills-Limitada-tab">
                        <div class="row">
                            <div class="coti-item" v-for="cotizacion in cotizaciones">
                                <div class="card"  v-if="!cotizacion.response.limitada.error">
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
                        </div>  
                    </div>

	            	<div class="tab-pane fade" id="pills-RC" role="tabpanel" aria-labelledby="pills-RC-tab">
                  <div class="row">
                            <div class="coti-item" v-for="cotizacion in cotizaciones">
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
                        </div>      
                    </div>

	            </div>
			</div>
		</div>
	</div>
</template>
<script>
	export default{
		props:[
    		'cliente',
    		'getcotizacion',
            'alert',
    	],
    	data(){
    		return{
    			cotizacion:null,
    			cotizaciones:[],
    			error:null,
    		}
    	},
    	watch:{
    		'getcotizacion.value': function (newVal,oldVal) {
    			// body...
    			this.getCoberturas(this.cliente.cotizacion);
    		}
    	},
    	methods:{
    		getCoberturas(cotizacion){
    			let url = './api/getCoberturasQ';
    			let params = {cotizacion:cotizacion};
    			axios.post(url,params).then(res=>{
    				console.log('coberturas res',res);
    				this.error = res.data.error;
					// console.log(this.error.length);
    				if(!this.error){
    					this.cotizaciones.push({'imagen':'./img/qua.png','response':res.data});
    				}
    			}).catch(err=>{
    				console.log('coberturas err', err)
    			});
    		},
    		infoCotizacion(cotiza){
    			this.cotizacion = cotiza;
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
    		console.log('Polizas Component mounted.');
    	}
	}
</script>