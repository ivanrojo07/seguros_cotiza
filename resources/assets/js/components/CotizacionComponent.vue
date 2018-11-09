<template>
    <div>
    	
  		<!-- Crear cotización -->
    	<div class="tab-pane">
    		<div class="row m-0 p-1 no-gutters">
    			<div class="col-sm-6 d-none d-sm-block p-2">
    				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-Uso-tab"  data-toggle="pill" href="#v-pills-Uso" role="tab" aria-controls="v-pills-Uso" aria-selected="true">Uso: {{cliente.uso_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Marca-tab" data-toggle="pill" href="#v-pills-Marca" role="tab" aria-controls="v-pills-Marca" aria-selected="false">Marca: {{cliente.marca_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Modelo-tab" data-toggle="pill"  href="#v-pills-Modelo" role="tab" aria-controls="v-pills-Modelo" aria-selected="false">Modelo: {{cliente.modelo_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Descripcion-tab" data-toggle="pill" href="#v-pills-Descripcion"  role="tab" aria-controls="v-pills-Descripcion" aria-selected="false">Descripción:  {{cliente.descripcion_auto.cTipo}} {{cliente.descripcion_auto.cVersion}}</a>
		              <a class="nav-link disabled" id="v-pills-CP-tab" data-toggle="pill"  href="#v-pills-CP" role="tab" aria-controls="v-pills-CP" aria-selected="false">CP: {{cliente.cp}}</a>
		              <a class="nav-link disabled" id="v-pills-Nombre-tab" data-toggle="pill" href="#v-pills-Nombre"  role="tab" aria-controls="v-pills-Nombre" aria-selected="false">Nombre: {{cliente.nombre}} {{cliente.appaterno}} {{cliente.apmaterno}}</a>
		              <a class="nav-link disabled" id="v-pills-Celular-tab" data-toggle="pill"  href="#v-pills-Celular" role="tab" aria-controls="v-pills-Celular" aria-selected="false">Celular: {{cliente.telefono}}</a>
		              <a class="nav-link disabled" id="v-pills-Correo-tab" data-toggle="pill" href="#v-pills-Correo"  role="tab" aria-controls="v-pills-Correo" aria-selected="false">Correo: {{cliente.email}}</a>
		              <a class="nav-link disabled" id="v-pills-Sexo-tab" data-toggle="pill"  href="#v-pills-Sexo" role="tab" aria-controls="v-pills-Sexo" aria-selected="false">Sexo: {{cliente.sexo}}</a>
		              <a class="nav-link disabled" id="v-pills-Nacimiento-tab" data-toggle="pill"  href="#v-pills-Nacimiento" role="tab" aria-controls="v-pills-Nacimiento" aria-selected="false">Nacimiento: {{cliente.f_nac}}</a>
		            </div>
    			</div>
    			<div class="col col-sm-6 p-2 my-auto" v-show="!searchOption">
    				<div class="tab-content" id="v-pills-tabContent">
    					 <!--USO-->
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
    											<select v-model="cliente.uso_auto" size="3" class="list-group list-group-flush col mr-0 ml-0"  style="overflow-y: hidden;">
    												<option value="Servicio Particular" class="list-group-item text-center text-dark seleccionador">Servicio Particular</option>
                                    				<option value="Servicio Público" class="list-group-item text-center text-dark seleccionador">Servicio Público</option>
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
		                            <select v-model="cliente.marca_auto" size="3" class="list-group list-group-flush col">
										<option v-for="marca in marcas" :value="marca.cMarcaLarga" class="list-group-item text-center text-dark seleccionador">{{marca.cMarcaLarga}}</option>
									</select>
									<div class="row">
										<div class="col-12 mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Uso-tab').click();">Atras</button>
										</div>
									</div>
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
		                            <select class="list-group list-group-flush col" v-model="cliente.modelo_auto" size="3">
		                            	<option v-for="anio in anios" :value="anio" class="list-group-item text-center text-dark seleccionador">{{anio}}</option>
		                            </select>
		                            <div class="row">
										<div class="col-12 mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Marca-tab').click();">Atras</button>
										</div>
									</div>
		                        </div>
		                    </div>
		                </div>
		                  <!--Descripcion-->
		                <div class="tab-pane fade" v-show="descripcion" id="v-pills-Descripcion" role="tabpanel" aria-albelledby="v-pills-Descripcion-tab" >
		                    <div class="card p-0">
		                        <div class="card-header">
		                            Descripcion
		                        </div>
		                        <div class="card-body">
		                        	<div v-show="loader" class="loader"></div>
		                        	<div v-show="!loader && this.descripciones.length == 0">
		                        		<label>No se encontraron resultados</label>
		                        	</div>
		                            <select v-show="!loader && this.descripciones.length != 0" class="list-group list-group-flush col" v-model="cliente.descripcion_auto" size="3">
		                            	<option v-for="descripcion in descripciones" :value="descripcion" class="list-group-item text-center text-dark seleccionador" style="white-space: normal;">Tipo: {{descripcion.cTipo}} Version: {{descripcion.cVersion}} Transmision: {{ descripcion.cTransmision == "A" ? 'Automatica' : 'Estandar'}}</option>
		                            </select>
		                            <div class="row">
										<div class="col-12 mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Modelo-tab').click();">Atras</button>
										</div>
									</div>
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
	                             	<div class="form-group">
		                                <input type="number" class="form-control" v-model="cliente.cp" placeholder="CP: 000000" id="valorCP">
		                                <div class="alert alert-danger" v-show="alert_cp">
  											<strong>{{alert_cp}}</strong>
										</div>
		                            </div>
		                            <div class="row">
										<div class="col mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Descripcion-tab').click();">Atras</button>
										</div>
										<div class="col mt-3 d-flex justify-content-end">
                        					<button type="button" class="btn btn-primary seleccionador" @click="nextPill('cp')">Siguiente</button>
											
										</div>
									</div>
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
		                            <div class="form-row">
		                                <div class="col-12 my-1">
		                                    <input type="text" v-model="cliente.nombre" id="valorNombre" class="form-control" placeholder="Nombre">
		                                </div>
		                                <div class="col-12 my-1">
		                                    <input type="text" v-model="cliente.appaterno" id="valorApellidoP" class="form-control" placeholder="Apellido P.">
		                                </div>
		                                <div class="col-12 my-1">
		                                    <input type="text" v-model="cliente.apmaterno" id="valorApellidoM" class="form-control" placeholder="Apellido M.">
		                                </div>
		                            </div>
		                            <div class="row">
										<div class="col mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-CP-tab').click();">Atras</button>
										</div>
										<div class="col mt-3 d-flex justify-content-end">
                        					<button type="button" id="e_1" @click="nextPill('nombre')" class="btn btn-primary seleccionador">Siguiente</button>
										</div>
									</div>
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
		                        	<div class="form-group">
		                                <input type="number" v-model="cliente.telefono" class="form-control" id="valorCelular" placeholder="55 53 33 11 22">
		                            </div>
		                            <div class="row">
										<div class="col mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Nombre-tab').click();">Atras</button>
										</div>
										<div class="col mt-3 d-flex justify-content-end">
                        					<button type="button" id="f_1"  @click="nextPill('telefono')" class="btn btn-primary seleccionador">Siguiente</button>
										</div>
									</div>
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
		                             <div class="form-group">
		                                <input type="email" v-model="cliente.email" class="form-control" id="valorCorreo" placeholder="ejemplo@ejemplo.com">
		                            </div>
		                            <div class="row">
										<div class="col mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Celular-tab').click();">Atras</button>
										</div>
										<div class="col mt-3 d-flex justify-content-end">
                        					<button type="button" id="g_1" @click="nextPill('correo')" class="btn btn-primary seleccionador">Siguiente</button>
										</div>
									</div>
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
		                            <select v-model="cliente.sexo" size="3" class="list-group list-group-flush col"  style="overflow-y: hidden;">
										<option value="Hombre" class="list-group-item text-center text-dark seleccionador">Hombre</option>
                        				<option value="Mujer" class="list-group-item text-center text-dark seleccionador">Mujer</option>
                        				<option value="Otro" class="list-group-item text-center text-dark seleccionador">Otro</option>
									</select>
									<div class="row">
										<div class="col-12 mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Correo-tab').click();">Atras</button>
										</div>
									</div>
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
		                            <div class="form-group">
		                                <input type="date" v-model="cliente.f_nac" id="valorEdad" onchange="cambiarEdad(this.value)" class="form-control col">
		                            </div>

		                            <div class="row">
										<div class="col mt-3 d-block d-sm-none">
											<button class="btn btn-primary" type="button" onclick="$('#v-pills-Sexo-tab').click();">Atras</button>
										</div>
										<div class="col mt-3 d-flex justify-content-end">
		                                    <button type="button" id="8_1" @click="sendCotizacion(cliente)" class="btn btn-primary seleccionador">Siguiente</button>
		                                </div>
									</div>
		                        </div>
		                    </div>
		                </div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- Fin de crear cotización -->
	    <!-- <pre>
	    	@{{$data}}
	    </pre> -->
    </div>
</template>

<script>
function Cliente({cotizacion,uso_auto,marca_auto,modelo_auto,descripcion_auto,cp,nombre,appaterno,apmaterno,telefono,email,sexo,f_nac}){
	this.cotizacion = cotizacion;
	this.uso_auto = uso_auto;
	this.marca_auto=marca_auto;
	this.modelo_auto=modelo_auto;
	this.descripcion_auto= { cVersion : descripcion_auto};
	this.cp = cp;
	this.nombre= nombre;
	this.appaterno = appaterno;
	this.apmaterno = apmaterno;
	this.telefono = telefono;
	this.email = email;
	this.sexo = sexo;
	this.f_nac = f_nac;

}
    export default {
    	props:[
    		'cliente',
    		'getcotizacion',
    		'alert'
    	],
    	data(){
    		return{
    			// cliente: this.cliente,
    			descripciones:[],
    			anios:[],
    			marcas: [],
    			pills:['v-pills-Uso','v-pills-Marca','v-pills-Modelo','v-pills-Descripcion','v-pills-CP','v-pills-Nombre','v-pills-Celular','v-pills-Correo','v-pills-Sexo','v-pills-Nacimiento'],
    			alert_cp:"",
    			uso: true,
    			marca: false,
    			modelo: false,
    			loader:true,
    			descripcion:false,
    			cp:false,
    			nombre:false,
    			celular:false,
    			correo:false,
    			sexo:false,
    			nac: false,
    			searchOption:false,

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
    				if(this.searchOption == false){
    					this.cliente.descripcion_auto="";
    				}
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Modelo-tab').removeClass('disabled');
    				// $('#v-pills-Modelo-tab').addClass('disabled');
    				$('#v-pills-Modelo-tab').click();
    			}
    		},
    		'cliente.modelo_auto':function(newV,oldV){
    			if (newV != "") {
    				this.descripcion = true;
    				// this.showPill('v-pills-Marca');
    				if(this.searchOption == false){
    					this.cliente.descripcion_auto="";
    				}
    				$('#v-pills-Descripcion-tab').removeClass('disabled');
    				// $('#v-pills-Descripcion-tab').addClass('disabled');
    				this.getDescripciones(this.cliente.uso_auto,this.cliente.marca_auto,this.cliente.modelo_auto);
    				$('#v-pills-Descripcion-tab').click();
    			}
    		},
    		'cliente.descripcion_auto':function(newV,oldV){
    			if (newV != "") {
    				this.cp = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-CP-tab').removeClass('disabled');
    				// $('#v-pills-CP-tab').addClass('disabled');
    				$('#v-pills-CP-tab').click();
    			}
    		},
    		'cliente.sexo':function(newV,oldV){
    			if (newV != "") {
    				this.nac = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Nacimiento-tab').removeClass('disabled');
    				// $('#v-pills-Nacimiento-tab').addClass('disabled');
    				$('#v-pills-Nacimiento-tab').click();
    			}
    		},
    	},
    	created(){
    		this.getMarcas();
    		this.getModelos();
    	},
    	methods:{
    		searchCliente(cotizacion){
    			console.log(cotizacion);
    			// TODO
    			let url = './api/searchCliente';
    			let params = {cotizacion:cotizacion};
    			this.alert.message = '';
				this.alert.class = '';
    			axios.post(url,params).then(res=>{
    				console.log("res cot",res);
    				if(res.data.cotizacion){
    					this.searchOption = true;
    					// this.cliente = new Cliente(res.data.cotizacion);
    					this.cliente.cotizacion =res.data.cotizacion.cotizacion;
						this.cliente.uso_auto =res.data.cotizacion.uso_auto;
						this.cliente.marca_auto=res.data.cotizacion.marca_auto;
						this.cliente.modelo_auto=res.data.cotizacion.modelo_auto;
						this.cliente.descripcion_auto={ cTipo: res.data.cotizacion.tipo_auto, cVersion : res.data.cotizacion.descripcion_auto};
						this.cliente.cp =res.data.cotizacion.cp;
						this.cliente.nombre=res.data.cotizacion.nombre;
						this.cliente.appaterno =res.data.cotizacion.appaterno;
						this.cliente.apmaterno =res.data.cotizacion.apmaterno;
						this.cliente.telefono =res.data.cotizacion.telefono;
						this.cliente.email =res.data.cotizacion.email;
						this.cliente.sexo =res.data.cotizacion.sexo;
						this.cliente.f_nac =res.data.cotizacion.f_nac;
					 	$("#paso2-tab").removeClass("disabled");
        				$("#paso2-tab").click();
        				this.getcotizacion.value = !this.getcotizacion.value;
    				}
    				
    			}).catch(err=>{
    				if(err.response.data.error){
    					this.alert.message = err.response.data.error;
    					this.alert.class = "alert alert-danger alert-dismissible fade show"
    					$('#alert').alert('show')
    				}
    			});


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
    		// showPill(etiqueta){
    		// 	console.log(`#${etiqueta}`);
    		// 	this.pills.forEach(function(pill){
    		// 		if(pill == etiqueta){
    		// 			$(`#${pill}`).addClass('show active');
    		// 		}
    		// 		else{
    		// 			$(`#${pill}`).removeClass('show active');	
    		// 		}
    		// 	});
    		// },
    		nextPill(input){
    			if (input == "cp" && this.cliente.cp != "") {
    				// console.log('si')
    				// window.axios.defaults.headers.common['X-CSRF-TOKEN'] = "";
    						// token.content
	    			let url = `./api/cp/${this.cliente.cp}`;
    				axios.get(url).then(
    					res=>{
    						if(res.data.response){
    							this.alert_cp = 
    							this.nombre = true;
    							this.alert_cp = "";
    							console.log('si entra');
			    				// this.showPill('v-pills-Marca');
			    				this.cliente.cestado = res.data.response[0].cestado;

			    				$('#v-pills-Nombre-tab').removeClass('disabled');
			    				// $('#v-pills-Nombre-tab').addClass('disabled');
			    				$('#v-pills-Nombre-tab').click();
    						}
    						console.log(res);
    					}).catch(
    					err=>{
    						if(err.response.data.error){
    							this.nombre = false;
    							$('#v-pills-Nombre-tab').addClass('disabled');
    							this.alert_cp = err.response.data.error;
    						}
    					})
    				
    			}
    			if (input == "nombre" && this.cliente.nombre != "" && this.cliente.appaterno != "") {
    				// console.log('si')
    				this.celular = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Celular-tab').removeClass('disabled');
    				// $('#v-pills-Celular-tab').addClass('disabled');
    				$('#v-pills-Celular-tab').click();
    			}
    			if (input == "telefono" && this.cliente.telefono != "") {
    				// console.log('si')
    				this.correo = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Correo-tab').removeClass('disabled');
    				// $('#v-pills-Correo-tab').addClass('disabled');
    				$('#v-pills-Correo-tab').click();
    			}
    			if (input == "correo" && this.cliente.telefono != "") {
    				// console.log('si')
    				this.sexo = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Sexo-tab').removeClass('disabled');
    				// $('#v-pills-Sexo-tab').addClass('disabled');
    				$('#v-pills-Sexo-tab').click();
    			}
    			if (input == "sexo" && this.cliente.telefono != "") {
    				// console.log('si')
    				this.nac = true;
    				// this.showPill('v-pills-Marca');
    				$('#v-pills-Nacimiento-tab').removeClass('disabled');
    				// $('#v-pills-Nacimiento-tab').addClass('disabled');
    				$('#v-pills-Nacimiento-tab').click();
    			}
    		},
    		getDescripciones(uso, marca,modelo){
    			this.loader = true;
            	$('#descripcion').append('<div class="loader"></div>');
    			let url = `./api/modelos/${uso}/${marca}/${modelo}`;
    			axios.get(url).then(res=>{
    				this.loader = false;
    				console.log('getDescripciones res',res);
    				this.descripciones = res.data.descripciones
    			}).catch(err=>{

    				console.log('getDescripciones err',err);
    			})
    		},
    		getModelos(){
    			var currentYear = new Date().getFullYear()+1;
    			var startYear = 1999;
            	startYear = startYear || 1980;
            	while ( startYear <= currentYear ) {
                    this.anios.push(startYear++);
            	} 

            	this.anios = this.anios.reverse();
    		},
    		sendCotizacion(cliente){
    			let params = cliente;
    			let url = "./api/cotizacion";
    			this.alert.message = '';
				this.alert.class = '';
    			axios.post(url,cliente).then(res=>{
    				console.log('res',res);
    				this.cliente.cotizacion = res.data.cotizacion.cotizacion;
    				this.getcotizacion.value = !this.getcotizacion.value;
    				this.alert.message = `${this.cliente.nombre} ${this.cliente.appaterno} ${this.cliente.apmaterno} su cotización se guardo con el folio ${this.cliente.cotizacion}`;
    				this.alert.class = "alert alert-success alert-dismissible fade show";
    				// $('#cotizar').modal('show');
    			}).catch(err=>{
    				console.log('err',err);
    			})
    		}
    	},
        mounted() {
            console.log('Component mounted.');
            let uri = window.location.href.split('?');
            if (uri.length == 2)
		    {
		      let vars = uri[1].split('&');
		      let getVars = {};
		      let tmp = '';
		      vars.forEach(function(v){
		        tmp = v.split('=');
		        if(tmp.length == 2)
		        getVars[tmp[0]] = tmp[1];
		      });
		      if(getVars.cotizacion){
		      	this.cliente.cotizacion = getVars.cotizacion
		      	this.searchCliente(this.cliente.cotizacion);
		      }
		      console.log(getVars);
		      // do 
		    }
            // console.log(uri[1]);
        }
    }
</script>