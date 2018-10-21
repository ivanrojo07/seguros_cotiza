<template>
    <div class="container">
    	<div class="tab-pane">
    		<div class="row m-0 p-1 no-gutters">
    			<div class="col-sm-6 d-none d-sm-block p-2">
    				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-Uso-tab" @click="showPill('v-pills-Uso')"  data-toggle="pill" href="#v-pills-Uso" role="tab" aria-controls="v-pills-Uso" aria-selected="true">Uso: {{cliente.uso_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Marca-tab" data-toggle="pill" href="#v-pills-Marca" role="tab" aria-controls="v-pills-Marca" aria-selected="false">Marca: {{cliente.marca_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Modelo-tab" data-toggle="pill"  href="#v-pills-Modelo" role="tab" aria-controls="v-pills-Modelo" aria-selected="false">Modelo: {{cliente.modelo_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Descripcion-tab" data-toggle="pill" href="#v-pills-Descripcion"  role="tab" aria-controls="v-pills-Descripcion" aria-selected="false">Descripción:{{cliente.descripcion_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-CP-tab" data-toggle="pill"  href="#v-pills-CP" role="tab" aria-controls="v-pills-CP" aria-selected="false">CP: {{cliente.cp}}</a>
		              <a class="nav-link disabled" id="v-pills-Nombre-tab" data-toggle="pill" href="#v-pills-Nombre"  role="tab" aria-controls="v-pills-Nombre" aria-selected="false">Nombre: {{cliente.nombre}} {{cliente.appaterno}} {{cliente.apmaterno}}</a>
		              <a class="nav-link disabled" id="v-pills-Celular-tab" data-toggle="pill"  href="#v-pills-Celular" role="tab" aria-controls="v-pills-Celular" aria-selected="false">Celular: {{cliente.telefono}}</a>
		              <a class="nav-link disabled" id="v-pills-Correo-tab" data-toggle="pill" href="#v-pills-Correo"  role="tab" aria-controls="v-pills-Correo" aria-selected="false">Correo: {{cliente.email}}</a>
		              <a class="nav-link disabled" id="v-pills-Sexo-tab" data-toggle="pill"  href="#v-pills-Sexo" role="tab" aria-controls="v-pills-Sexo" aria-selected="false">Sexo: {{cliente.sexo}}</a>
		              <a class="nav-link disabled" id="v-pills-Nacimiento-tab" data-toggle="pill"  href="#v-pills-Nacimiento" role="tab" aria-controls="v-pills-Nacimiento" aria-selected="false">Nacimiento: {{cliente.f_nac}}</a>
		            </div>
    			</div>
    			<div class="col col-sm-6 p-2 my-auto">
    				<div class="tab-content" id="v-pills-tabContent">
    					<div class="tab-pane fade show active" id="v-pills-Uso" role="tabpanel" aria-albelledby="v-pills-Uso-tab">
    						<div class="row p-0 m-0">
    							<div class="col-12 p-0 m-0">
    								<div class="input-group">
    									<input class="form-control" type="text" v-model="cliente.cotizacion" placeholder="¿Ya tienes código de cotización?" aria-label="No. generado por el sistema">
    									<div class="input-group-append" v-if="cliente.cotizacion">
    										<button class="btn input-group-text" @click="searchCliente(cliente.cotizacion)">Ver</button>
    									</div>
    								</div>
    								<div class="col-12 p-0 my-4">
    									<div class="card">
    										<div class="card-header">
    											Tipo de Uso:
    										</div>
    										<div class="card-body">
    											<select v-model="cliente.uso_auto" size="3" class="list-group list-group-flush">
    												<option value="Servicio Particular" class="list-group-item text-center text-dark seleccionador">Servicio Particular</option>
                                    				<option value="Servicio Público" class="list-group-item text-center text-dark seleccionador">Servicio Público</option>
                                    				<option value="Servicio Público Federal" class="list-group-item text-center text-dark seleccionador">Servicio Público Federal</option>
    											</select>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
						 <!--MARCA-->
		                <div class="tab-pane fade" v-show="marca" id="v-pills-Marca" role="tabpanel" aria-albelledby="v-pills-Marca-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Marca
		                        </div>
		                        <div class="card-body">
		                            <select v-model="cliente.marca_auto" size="3" class="list-group list-group-flush">
										<option v-for="marca in marcas" :value="marca.cMarcaLarga" class="list-group-item text-center text-dark seleccionador">{{marca.cMarcaLarga}}</option>
									</select>
		                        </div>
		                    </div>
		                </div>
		                 <!--MODELO-->
		                <div class="tab-pane fade" v-show="modelo" id="v-pills-Modelo" role="tabpanel" aria-albelledby="v-pills-Modelo-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Modelo
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
		                  <!--Descripcion-->
		                <div class="tab-pane fade" v-show="descripcion" id="v-pills-Descripcion" role="tabpanel" aria-albelledby="v-pills-Descripcion-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Descripcion
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
		                <!--CP-->
		                <div class="tab-pane fade" v-show="cp" id="v-pills-CP" role="tabpanel" aria-albelledby="v-pills-CP-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            CP
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
		                <!--Nombre-->
		                <div class="tab-pane fade" v-show="nombre" id="v-pills-Nombre" role="tabpanel" aria-albelledby="v-pills-Nombre-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Nombre
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
		                <!--Celular-->
		                <div class="tab-pane fade" v-show="celular" id="v-pills-Celular" role="tabpanel" aria-albelledby="v-pills-Celular-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Celular
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
		                <!--Correo-->
		                <div class="tab-pane fade" v-show="correo" id="v-pills-Correo" role="tabpanel" aria-albelledby="v-pills-Correo-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Correo
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
		                <!--Sexo-->
		                <div class="tab-pane fade" v-show="sexo" id="v-pills-Sexo" role="tabpanel" aria-albelledby="v-pills-Sexo-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Sexo
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
						<!--Nacimiento-->
		                <div class="tab-pane fade" v-show="nac" id="v-pills-Nacimiento" role="tabpanel" aria-albelledby="v-pills-Nacimiento-tab">
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Nacimiento
		                        </div>
		                        <div class="card-body">
		                            <!-- TODO -->
		                        </div>
		                    </div>
		                </div>
    				</div>
    			</div>
    		</div>
    	</div>
	    <pre>
	    	@{{$data}}
	    </pre>
    </div>
</template>

<script>
    export default {
    	props:[
    		'cliente'
    	],
    	data(){
    		return{
    			// cliente: this.cliente
    			marcas: [],
    			descripciones:[],
    			pills:['v-pills-Uso','v-pills-Marca','v-pills-Modelo','v-pills-Descripcion','v-pills-CP','v-pills-Nombre','v-pills-Celular','v-pills-Correo','v-pills-Sexo','v-pills-Nacimiento'],
    			uso: true,
    			marca: false,
    			modelo: false,
    			descripcion:false,
    			cp:false,
    			nombre:false,
    			celular:false,
    			correo:false,
    			sexo:false,
    			nac: false,

    		}
    	},
    	watch:{
    		'cliente.uso_auto': function(newValue,oldValue){
    			if (newValue != "") {
    				this.marca = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Marca-tab').removeClass('disabled');
    				// $('#v-pills-Marca-tab').addClass('disabled');
    				$('#v-pills-Marca-tab').click();
    			}
    		},
    		'cliente.marca_auto': function(newValue,oldValue){
    			if (newValue != "") {
    				this.modelo = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Modelo-tab').removeClass('disabled');
    				// $('#v-pills-Modelo-tab').addClass('disabled');
    				$('#v-pills-Modelo-tab').click();
    			}
    		}
    	},
    	created(){
    		this.getMarcas();
    	},
    	methods:{
    		searchCliente(cotizacion){
    			console.log(cotizacion);
    			// TODO

    		},
    		getMarcas(){
    			let url = './api/marcas';
    			axios.get(url).then(res=>{
    				console.log("res",res);
    				this.marcas = res.data.marcas;
    			}).catch(error=>{
    				console.log('error',error);
    			})
    		},
    		showPill(etiqueta){
    			console.log(`#${etiqueta}`);
    			this.pills.forEach(function(pill){
    				if(pill == etiqueta){
    					$(`#${pill}`).addClass('show active');
    				}
    				else{
    					$(`#${pill}`).removeClass('show active');	
    				}
    			});
    		},
    		getDescripciones(modelo,marca){
    			let url = `./api/modelos/${marca}/${modelo}`;
    			axios.get(url).then(res=>{
    				console.log('getDescripciones res',res);
    			}).catch(err=>{
    				console.log('getDescripciones err',err);
    			})
    		}
    	},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>