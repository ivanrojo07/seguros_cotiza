<template>
	<div>
		<div class="row m-3">
			<div class="col-12 m-2 p-2">
				<!-- <form> -->
				<form v-if="gs.formulario === 'GS'" @submit="sendGS" method="POST" action="./sendGS">
					<input type="hidden" name="_token" :value="csrf" />
					<div class="row">
						<div class="col-6">
							<img :src="gsImage" class="col">
						</div>
						<div class="col-6">
							<h5 class="mt-3 ml-3">General de Seguros</h5>
						</div>
					</div>
					<div class="row">
						<input type="hidden" name="cotizacion_id" v-model="generalseguro.cotizacion.id_cotizacion">
						<div class="col-12 mt-3">
							<h6>Datos del asegurado:</h6>
						</div>
						<div class="form-group col-12">
							<label class="control-label">Tipo de persona:</label>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona" id="radioF" v-model="generalseguro.cliente.tipo_persona" value="F" checked>
	                            <label class="form-check-label" for="radioF">
	                             Fisica
	                            </label>
	                        </div>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona" id="radioM" v-model="generalseguro.cliente.tipo_persona" value="M">
	                            <label class="form-check-label" for="radioM">
	                             Moral
	                            </label>
	                        </div>
						</div>
					</div>
					<div class="row" v-if="generalseguro.cliente.tipo_persona == 'F'">
						<div class="form-group col-4">
							<label class="control-label">
								Nombre(s)
							</label>
							<input class="form-control" type="text" name="nombre" v-model="generalseguro.cliente.nombre" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Paterno
							</label>
							<input type="text" name="apepat" class="form-control" v-model="generalseguro.cliente.apepat" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Materno
							</label>
							<input type="text" name="apepat" class="form-control" v-model="generalseguro.cliente.apemat">
						</div>
					</div>
					<div class="row" v-if="generalseguro.cliente.tipo_persona == 'M'">
						<div class="form-group col-12">
							<label class="control-label">
								Razón Social
							</label>
							<input type="text" name="apepat" class="form-control" v-model="generalseguro.cliente.razsoc" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label class="control-label">
								RFC
							</label>
							<input type="text" name="rfc" class="form-control" v-model="generalseguro.cliente.rfc" required>
						</div>
						<div class="form-group col-4">
							<label for="elector" class="control-label">Clave de credencial de Elector</label>
							<input type="text" name="elector" class="form-control" v-model="generalseguro.cliente.elector">
						</div>
						<div class="form-group col-4">
							<label for="curp" class="control-label">CURP</label>
							<input type="text" name="curp" class="form-control" v-model="generalseguro.cliente.curp">
						</div>
						<div class="form-group col-4" v-if="generalseguro.cliente.tipo_persona == 'F'">
							<label for="sexo" class="control-label">Sexo</label>
							<select name="sexo" class="form-control" v-model="generalseguro.cliente.sexo" required>
								<option value="">Seleccione su sexo</option>
								<option value="1">Masculino</option>
								<option value="2">Femenino</option>
							</select>
						</div>
						<div class="form-group col-4" v-if="generalseguro.cliente.tipo_persona == 'F'">
							<label class="control-label" for="edoCivil">Estado Civil</label>
							<select name="edoCivil" class="form-control" v-model="generalseguro.cliente.edoCivil" required="">
								<option value="">Seleccione su estado civil</option>
								<option v-for="edocivil in estadosCiviles" :value="edocivil.id">{{edocivil.descripcion}}</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label class="control-label" for="calle">Calle</label>
							<input type="text" name="calle" class="form-control" v-model="generalseguro.cliente.calle" required>
						</div>
						<div class="form-group col-4">
							<label for="num" class="control-label">Número exterior</label>
							<input type="text" name="num" class="form-control" v-model="generalseguro.cliente.num" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label" for="cp">Código Postal</label>
							<input type="text" name="cp" class="form-control" v-model="generalseguro.cliente.cp" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label" for="colonia">Colonia</label>
							<input type="text" name="colonia" class="form-control" v-model="generalseguro.cliente.colonia" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label" for="municip">Delegación o Municipio</label>
							<input type="text" name="municip" class="form-control" v-model="generalseguro.cliente.municip" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label" for="poblaci">Delegación o Población</label>
							<input type="text" name="poblaci" class="form-control" v-model="generalseguro.cliente.poblaci" required>
						</div>
						<div class="form-group col-4">
							<label for="fnac" class="control-label" v-text="generalseguro.cliente.tipo_persona == 'F' ? 'Fecha de nacimiento' : 'Fecha de constitución'"></label>
							<input type="date" name="fnac" class="form-control" v-model="generalseguro.cliente.fnac" required>
						</div>
						<div class="form-group col-4">
							<label for="nacionalidad" class="control-label">Nacionalidad</label>
							<select name="nacionalidad" id="nacionalidad" class="form-control" v-model="generalseguro.cliente.nacionalidad" required>
								<option value="">Seleccione su nacionalidad</option>
								<option value="1">Mexicana</option>
								<option value="2">Extranjera</option>
							</select>
						</div>
						<div class="form-group col-12" v-if="generalseguro.cliente.nacionalidad == 2">
							<label for="domicilio_original" class="control-label">Domicilio original (extranjeros)</label>
							<input type="text" name="domicilio_original" class="form-control" v-model="generalseguro.cliente.domicilio_original" required>
						</div>
						<div class="form-group col-4"  v-if="generalseguro.cliente.tipo_persona == 'F'">
							<label for="ocupacion" class="control-label">Ocupación</label>
							<select name="ocupacion" id="ocupacion" class="form-control" v-model="generalseguro.cliente.ocupacion" required>
								<option value="">Seleccione su ocupacion</option>
								<option v-for="ocupacion in ocupaciones" :value="ocupacion.cveTit">{{ocupacion.desTit}}</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label for="giro" class="control-label">Actividad o Giro</label>
							<select name="giro" id="giro" class="form-control" v-model="generalseguro.cliente.giro" required>
								<option value="">Seleccione el giro o actividad</option>
								<option v-for="giro in giros" :value="giro.id.cveGir">{{giro.id.descGir}}</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label for="telefono1" class="control-label">Telefono</label>
							<input type="tel" name="telefono1" id="telefono" class="form-control" v-model="generalseguro.cliente.telefono1" required>
						</div>
						<div class="form-group col-4">
							<label for="telefono2" class="control-label">Telefono</label>
							<input type="tel" name="telefono2" id="telefono" class="form-control" v-model="generalseguro.cliente.telefono2">
						</div>
						<div class="form-group col-4">
							<label for="telefono3" class="control-label">Telefono</label>
							<input type="tel" name="telefono3" id="telefono" class="form-control" v-model="generalseguro.cliente.telefono3">
						</div>
						<div class="form-group col-4">
							<label for="email" class="control-label">Correo electronico</label>
							<input type="email" name="email" class="form-control" v-model="generalseguro.cliente.email" required>
						</div>
						<div class="form-group col-4">
							<label for="web" class="control-label">Pagina web</label>
							<input type="url" name="web" class="form-control" v-model="generalseguro.cliente.web">
						</div>
						<div class="form-group col-4">
							<label for="contacto" class="control-label">Forma en que se entero de la pagina</label>
							<select name="contacto" id="contacto" class="form-control" v-model="generalseguro.cliente.contacto" required>
								<option value="">Seleccione el medío por el que se entero</option>
								<option v-for="contacto in tipocontactos" :value="contacto.id.cveCco">{{contacto.id.desCco}}</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label for="ingresos" class="control-label">Fuente de ingresos</label>
							<input type="text" name="ingresos" class="form-control" v-model="generalseguro.cliente.ingresos" required>
						</div>
						<div class="form-group col-4" v-if="generalseguro.cliente.tipo_persona == 'M'">
							<label for="administrador" class="control-label">Tipo de administrador de la empresa</label>
							<select name="administrador" id="administrador" class="form-control" v-model="generalseguro.cliente.administrador" required>
								<option value="">Seleccione el tipo de administrador</option>
								<option value="u">Administrador único</option>
								<option value="c">Consejo</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label for="cargo_pub" class="control-label">¿Ocupo algun cargo público?</label>
							<div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="cargo_pub" id="radioSCargo" v-model="generalseguro.cliente.cargo_pub" value="S">
	                            <label class="form-check-label" for="radioSCargo">
	                             Si
	                            </label>
	                        </div>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="cargo_pub" id="radioNCargo" v-model="generalseguro.cliente.cargo_pub" value="N" checked>
	                            <label class="form-check-label" for="radioNCargo">
	                             No
	                            </label>
	                        </div>
						</div>
						<div class="form-group col-4" v-if="generalseguro.cliente.cargo_pub == 'S'">
							<label for="nombre_cargo" class="control-label">Nombre del cargo público ejercido</label>
							<input type="text" name="nombre_cargo" class="form-control" v-model="generalseguro.cliente.nombre_cargo" required>
						</div>
						<div class="form-group col-4" v-if="generalseguro.cliente.cargo_pub == 'S'">
							<label for="periodo_cargo" class="control-label">Periodo en donde ejercio el cargo</label>
							<input type="text" name="periodo_cargo" class="form-control" v-model="generalseguro.cliente.periodo_cargo" required>
						</div>
						<div class="form-group col-4">
							<label for="apoderado" class="control-label">¿Tiene apoderado legal?</label>
							<div class="form-check col">
	                            <input class="form-check-input" type="radio" name="apoderado" id="radioAS" v-model="generalseguro.cliente.apoderado" value="S">
	                            <label class="form-check-label" for="radioAS">
	                            	Si
	                            </label>
	                        </div>
	                        <div class="form-check col">
	                            <input class="form-check-input" type="radio" name="apoderado" id="radioAN" v-model="generalseguro.cliente.apoderado" value="N" checked>
	                            <label class="form-check-label" for="radioAN">
	                            	No
	                            </label>
	                        </div>
						</div>
						<div class="form-group col-4">
							<label for="pasaporte" class="control-label">Número de pasaporte</label>
							<input type="number" name="pasaporte" class="form-control" min="0" v-model="generalseguro.cliente.pasaporte">
						</div>
					</div>
					<div class="row">
						<div class="col-12 mt-3">
							<h6>Datos del automovil:</h6>
						</div>
						<div class="form-group col-4">
							<label for="num_motor" class="control-label">Número de motor</label>
							<input type="text" name="num_motor" class="form-control" v-model="generalseguro.auto.num_motor" required>
						</div>
						<div class="form-group col-4">
							<label for="num_placas" class="control-label">Placas</label>
							<input type="text" name="num_placas" class="form-control" v-model="generalseguro.auto.num_placas" required>
						</div>
						<div class="form-group col-4">
							<label for="num_serie" class="control-label">Número de serie</label>
							<input type="text" name="num_serie" class="form-control" v-model="generalseguro.auto.num_serie" required>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mt-3">
							<h6>Seguro a contratar: {{gs.paquete.nombre}}</h6>
						</div>
						<input type="hidden" name="idpaquete" v-model="generalseguro.cotizacion.idpaquete">
						<div class="form-group col-4">
							<label for="id_pago" class="control-label">Forma de pago</label>
							<select name="id_pago" id="id_pago" class="form-control" v-model="generalseguro.cotizacion.id_pago" required @change="formaPago()">
								<option value="">Seleccione su forma de pago</option>
								<option v-for="pago in gs.paquete.formasPagoDTO" :value="pago.idFormaPago">{{pago.nombre}}</option>
							</select>
						</div>
						<div class="col-8" v-if="JSON.stringify(detallePago)!='{}'">
							<h6>PAGO {{detallePago.nombre}}</h6>
							<p class="control-label">Total de pagos: {{detallePago.divisor}}</p>
							<p class="control-label">Pago Inicial: ${{detallePago.reciboini | int}}</p>
							<p class="control-label" v-if="detallePago.nombre === 'SEMESTRAL'">Semestre: ${{detallePago.recibosub | int}}</p>
                            <p class="control-label" v-else-if="detallePago.nombre === 'TRIMESTRAL'">Trimeste: ${{detallePago.recibosub | int}}</p>
                            <p class="control-label" v-else-if="detallePago.nombre === 'MENSUAL'">Mensualidad: ${{detallePago.recibosub | int}}</p>
                            <p class="control-label">Prima total: ${{detallePago.primaTotal | int}}</p>
						</div>
					</div>
					<div class="row">
						<div class="col d-flex justify-content-center">
							<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
						</div>
					</div>
				</form>
				<form v-if="gs.formulario === 'ql'">
					<label>formulario Qualitas</label>
				</form>
			</div>
		</div>
		<!-- <pre>
			${{data}}
		</pre> -->
	</div>
</template>
<script>
	export default{
		props:[
			'cliente',
			'alert',
			'gs'
		],
		data(){
			return{
				gsImage:null,
				csrf: null,
				generalseguro:{
					cliente:{
						tipo_persona:"F",
						nombre:"",
						apepat:"",
						apemat:"",
						razsoc:"",
						rfc:"",
						elector:"",
						curp:"",
						sexo:"",
						edoCivil:"",
						calle:"",
						num:"",
						cp:"",
						colonia:"",
						municip:"",
						poblaci:"",
						fnac:"",
						nacionalidad:"",
						ocupacion:"",
						giro:"",
						telefono1:"",
						telefono2:"",
						telefono3:"",
						email:"",
						web:"",
						contacto:"",
						ingresos:"",
						administrador:"",
						cargo_pub:"N",
						nombre_cargo:"",
						periodo_cargo:"",
						apoderado:"N",
						domicilio_original:"",
						pasaporte:"",
					},
					auto:{
						num_motor:"",
						num_placas:"",
						num_serie:"",
					},
					cotizacion:{
						id_cotizacion:null,
						id_pago:"",
						idpaquete:""
					},
				},
				estadosCiviles:[],
				ocupaciones:[],
				giros:[],
				tipocontactos:[],
				detallePago:{},

			}
		},
		watch:{
			"gs.id":function (new_value,old_value) {
				// body...
				console.log(new_value);
				this.generalseguro.cotizacion.id_cotizacion = new_value;
			},
			'gs.paquete.id':function(new_value,old_value){
				console.log(new_value);
				this.generalseguro.cotizacion.idpaquete = new_value;
			}
		},
		created(){
			
		},
		methods:{
			'sendGS':function(){
				console.log('enviado');
			},
			'formaPago':function(){
				if (this.generalseguro.cotizacion.id_pago == "" ) {
					this.detallePago = {};
					console.log(this.detallePago);
				} else {
					var result = this.gs.paquete.formasPagoDTO.find(obj=>{
						// console.log(obj);
						if (obj.idFormaPago === this.generalseguro.cotizacion.id_pago) {
							return obj;
						}
						// var obj.id === this.generalseguro.cotizacion.id_pago;
					});
					this.detallePago = result;
					
				}
				console.log(this.detallePago);
			},
			'getEdoCivil':function(){
				let url="./api/getEstadoCivil";
				axios.get(url).then(res=>{
					console.log(res);
					if(res.data.estadosCivil){
						this.estadosCiviles = res.data.estadosCivil.sort();
					}
				}).catch(err=>{
					console.log(err);
				})
			},
			'getOcupaciones':function(){
				let url="./api/getTitulos";
				axios.get(url).then(res=>{
					console.log(res);
					if(res.data.titulos){
						this.ocupaciones = res.data.titulos.sort();
					}
				}).catch(err=>{
					console.log(err);
				})
			},
			'getGiros':function(){
				let url = "./api/getGiros";
				axios.get(url).then(res=>{
					console.log(res);
					if(res.data.giros){
						this.giros = res.data.giros.sort();
					}
				}).catch(err=>{
					console.log(err);
				});
			},
			'getContactos':function(){
				let url="./api/getContactos";
				axios.get(url).then(res=>{
					console.log(res.data);
					if(res.data.tiposContacto){
						this.tipocontactos = res.data.tiposContacto.sort();
					}
				}).catch(err=>{
					console.log(err);
				})
			}
		},
		filters:{
    		'int': function (value) {
			    if (!value) return ''
			    let val = (value/1).toFixed(2).replace(',', '.')
        		return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			  }
    	},
		mounted(){
			this.getEdoCivil();
			this.getOcupaciones();
			this.getGiros();
			this.getContactos();
			this.gsImage = "./img/GENERAL-DE-SEGUROS-LOGO.png";
			this.csrf = document.head.querySelector('meta[name="csrf-token"]').content;
		}
	}
</script>