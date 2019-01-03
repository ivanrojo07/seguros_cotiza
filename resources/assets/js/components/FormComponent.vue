<template>
	<div>
		<div class="row m-3">
			<div class="col-12 m-2 p-2">
				<!-- <form> -->
					<!-- <h6>{{cotizacion}}</h6> -->
				<form v-if="cotizacion.nombre === 'GS'" @submit="sendGS" method="POST" action="./sendGS">
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
							<h6>Seguro a contratar: {{cotizacion.paquete.nombre}}</h6>
						</div>
						<input type="hidden" name="idpaquete" v-model="generalseguro.cotizacion.idpaquete">
						<div class="form-group col-4">
							<label for="id_pago" class="control-label">Forma de pago</label>
							<select name="id_pago" id="id_pago" class="form-control" v-model="generalseguro.cotizacion.id_pago" required @change="formaPago()">
								<option value="">Seleccione su forma de pago</option>
								<option v-for="pago in cotizacion.paquete.formasPagoDTO" :value="pago.idFormaPago">{{pago.nombre}}</option>
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
				<form v-if="cotizacion.Nombre === 'Qualitas'" @submit="sendQua" method="POST" action="./sendQua">
					<input type="hidden" name="_token" :value="csrf" />
					<input type="hidden" name="cotizacion" :value="qualitas.cotizacion">
					<input type="hidden" name="paquete_id" :value="qualitas.vehiculo.paquete">
					<input type="hidden" name="poblacion" :value="qualitas.cliente.poblacion">
					<input type="hidden" name="municipio" :value="qualitas.cliente.municipio">
					<input type="hidden" name="estado" :Value="qualitas.cliente.estado">
					<input type="hidden" name="ciudad" :Value="qualitas.cliente.ciudad">
					<input type="hidden" name="cod_estado" :Value="qualitas.cliente.cod_estado">
					<input type="hidden" name="cod_municipio" :Value="qualitas.cliente.cod_municipio">
					<div v-if="qualitas.cliente.contratante == '1'">
						<input type="hidden" name="nombre_cont" v-model="qualitas.cliente.nombre_cont">
						<input type="hidden" name="apepat_cont" v-model="qualitas.cliente.appaterno_cont">
						<input type="hidden" name="apemat_cont" v-model="qualitas.cliente.apmaterno_cont">
						<input type="hidden" name="curp_cont" v-model="qualitas.cliente.curp_cont">
						<input type="hidden" name="rfc_cont" v-model="qualitas.cliente.rfc_cont">
						<input type="hidden" name="tipo_persona_cont" v-model="qualitas.cliente.tipo_persona_cont">
					</div>
					<div class="row">
						<div class="col-6">
							<img :src="quaImage" class="col">
						</div>
						<div class="col-6">
							<h5 class="mt-3 ml-3">Qualitas</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mt-3">
							<h6>Datos del asegurado:</h6>
						</div>
						<div class="form-group col-6">
							<label class="control-label">Tipo de persona:</label>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona" id="radioF" v-model="qualitas.cliente.tipo_persona" value="1" checked>
	                            <label class="form-check-label" for="radioF">
	                             Fisica
	                            </label>
	                        </div>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona" id="radioM" v-model="qualitas.cliente.tipo_persona" value="2">
	                            <label class="form-check-label" for="radioM">
	                             Moral
	                            </label>
	                        </div>
						</div>
						<div class="form-group col-6">
							<label class="control-label">El asegurado y el contratante son la misma persona:</label>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" id="radioCS" v-model="qualitas.cliente.contratante" value="1" checked>
	                            <label class="form-check-label" for="radioCS">
	                             Si
	                            </label>
	                        </div>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" id="radioCN" v-model="qualitas.cliente.contratante" value="0">
	                            <label class="form-check-label" for="radioCN">
	                             No
	                            </label>
	                        </div>
						</div>
					</div>
					<div class="row" v-if="qualitas.cliente.tipo_persona == '1'">
						<div class="form-group col-4">
							<label class="control-label">
								Nombre(s)
							</label>
							<input class="form-control" type="text" name="nombre" v-model="qualitas.cliente.nombre" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Paterno
							</label>
							<input type="text" name="apepat" class="form-control" v-model="qualitas.cliente.appaterno" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Materno
							</label>
							<input type="text" name="apemat" class="form-control" v-model="qualitas.cliente.apmaterno">
						</div>
					</div>
					<div class="row" v-if="qualitas.cliente.tipo_persona == '2'">
						<div class="form-group col-12">
							<label class="control-label">
								Razón Social
							</label>
							<input type="text" name="razsoc" class="form-control" v-model="qualitas.cliente.razsoc" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="curp" class="control-label">C.U.R.P.</label>
							<input class="form-control" type="text" name="curp" v-model="qualitas.cliente.curp">
						</div>
						<div class="form-group col-4">
							<label for="rfc" class="control-label">R.F.C.</label>
							<input class="form-control" type="text" name="rfc" v-model="qualitas.cliente.rfc">
						</div>
						<div class="form-group col-4">
							<label class="control-label">Fecha de nacimiento</label>
							<input class="form-control" type="date" name="f_nac" v-model="qualitas.cliente.f_nac">
						</div>
						<div class="form-group col-4">
							<label class="control-label">Email</label>
							<input class="form-control" type="email" name="email" v-model="qualitas.cliente.email">
						</div>
						<div class="form-group col-4">
							<label class="control-label">Número telefonico</label>
							<input class="form-control" type="text" name="telefono" v-model="qualitas.cliente.telefono">
						</div>
						<div class="form-group col-4">
							<label class="control-label">Calle</label>
							<input class="form-control" type="text" name="calle" v-model="qualitas.cliente.calle">
						</div>
						<div class="form-group col-4">
							<label class="control-label">Número Exterior</label>
							<input class="form-control" type="text" name="ext" v-model="qualitas.cliente.ext">
						</div>
						<div class="form-group col-4">
							<label class="control-label">Número Interior</label>
							<input class="form-control" type="text" name="int" v-model="qualitas.cliente.int">
						</div>
						<div class="form-group col-4">
							<label class="control-label">C.P.</label>
							<input class="form-control" type="text" name="cp" v-model="qualitas.cliente.cp">
						</div>
						<div class="form-group col-8">
							<label class="control-label">Población</label>
							<select class="form-control" v-model="selectPobla" required="">
								<option value="">Seleccione su Población</option>
								<option v-for="poblacion in qualitasPobla" :value="poblacion">{{poblacion.poblacion}}, {{poblacion.municipio}}, {{poblacion.estado}}</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label class="control-label">Nacionalidad</label>
							<select class="form-control" name="nacionalidad" v-model="qualitas.cliente.nacionalidad" required="">
								<option value="">Seleccione su nacionalidad</option>
								<option value="1">Mexicana</option>
								<option value="2">Extranjera</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label class="control-label">Ocupación</label>
							<select class="form-control" name="ocupacion" v-model="qualitas.cliente.ocupacion" required>
								<option value="">Seleccione su ocupación</option>
								<option v-for="ocupacion in qualitasOcupaciones" :value="ocupacion.codigo">{{ocupacion.descripcion}}</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label class="control-label">Giro comercial</label>
							<select class="form-control" name="giro" v-model="qualitas.cliente.giro" required>
								<option value="">Seleccione su giro comercial</option>
								<option v-for="giro in qualitasGiros" :value="giro.codigo">{{giro.descripcion}}</option>
							</select>
						</div>
						<div class="form-group col-4">
							<label class="control-label">Profesión</label>
							<select class="form-control" name="profesion" v-model="qualitas.cliente.profesion" required>
								<option value="">Seleccione su profesión</option>
								<option v-for="profesion in qualitasProfesiones" :value="profesion.codigo">{{profesion.descripcion}}</option>
							</select>
						</div>
					</div>
					<div class="row" v-if="qualitas.cliente.contratante == 0">
						<div class="col-12 mt-3">
							<h6>Datos del contratante:</h6>
						</div>
						<div class="form-group col-6">
							<label class="control-label">Tipo de persona:</label>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona_cont" id="radioF_cont" v-model="qualitas.cliente.tipo_persona_cont" value="1" checked>
	                            <label class="form-check-label" for="radioF_cont">
	                             Fisica
	                            </label>
	                        </div>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona_cont" id="radioM_cont" v-model="qualitas.cliente.tipo_persona_cont" value="2">
	                            <label class="form-check-label" for="radioM_cont">
	                             Moral
	                            </label>
	                        </div>
						</div>
					</div>
					<div class="row" v-if="qualitas.cliente.contratante == 0 && qualitas.cliente.tipo_persona_cont == '1'">
						<div class="form-group col-4">
							<label class="control-label">
								Nombre(s)
							</label>
							<input class="form-control" type="text" name="nombre_cont" v-model="qualitas.cliente.nombre_cont" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Paterno
							</label>
							<input type="text" name="apepat_cont" class="form-control" v-model="qualitas.cliente.appaterno_cont" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Materno
							</label>
							<input type="text" name="apemat_cont" class="form-control" v-model="qualitas.cliente.apmaterno_cont">
						</div>
					</div>
					<div class="row" v-if="qualitas.cliente.tipo_persona_cont == '2'">
						<div class="form-group col-12">
							<label class="control-label">
								Razón Social
							</label>
							<input type="text" name="razsoc_cont" class="form-control" v-model="qualitas.cliente.razsoc_cont" required>
						</div>
					</div>
					<div class="row" v-if="qualitas.cliente.contratante == 0">
						<div class="form-group col-4">
							<label for="curp_cont" class="control-label">C.U.R.P.</label>
							<input class="form-control" type="text" name="curp_cont" v-model="qualitas.cliente.curp_cont">
						</div>
						<div class="form-group col-4">
							<label for="rfc_cont" class="control-label">R.F.C.</label>
							<input class="form-control" type="text" name="rfc_cont" v-model="qualitas.cliente.rfc_cont">
						</div>
					</div>
					<div class="row">
						<div class="col-12 mt-3">
							<h6>Datos del automovil:</h6>
						</div>
						<div class="col-6">
							<label for="serie" class="control-label">Número de serie</label>
							<input type="text" class="form-control" name="serie" v-model="qualitas.vehiculo.serie">
						</div>
						<div class="col-6">
							<label class="control-label">Número de motor</label>
							<input type="text" class="form-control" name="num_motor" v-model="qualitas.vehiculo.num_motor">
						</div>
					</div>
					<div class="row">
						<div class="mt-3 col d-flex justify-content-center">
							<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
						</div>
					</div>
				</form>
				<form v-if="cotizacion.nombre === 'ANASeguros'" @submit="sendANA" method="POST" action="./sendANA">
					<div class="row">
						<div class="offset-1 col-3">
							<img :src="anaImage" class="col">
						</div>
						<div class="offset-1 col-6">
							<h5 class="mt-3 ml-3">ANA Seguros</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mt-3">
							<h6>Datos del asegurado:</h6>
						</div>
						<div class="form-group col-6">
							<label class="control-label">Tipo de persona:</label>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona" id="radioF" v-model="ana.cliente.tipo_persona" value="1" checked>
	                            <label class="form-check-label" for="radioF">
	                             Fisica
	                            </label>
	                        </div>
	                        <div class="form-check col-12">
	                            <input class="form-check-input" type="radio" name="tipo_persona" id="radioM" v-model="ana.cliente.tipo_persona" value="2">
	                            <label class="form-check-label" for="radioM">
	                             Moral
	                            </label>
	                        </div>
						</div>
					</div>
					<div class="row" v-if="ana.cliente.tipo_persona == '1'">
						<div class="form-group col-4">
							<label class="control-label">
								Nombre(s)
							</label>
							<input class="form-control" type="text" name="nombre" v-model="ana.cliente.nombre" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Paterno
							</label>
							<input type="text" name="apepat" class="form-control" v-model="ana.cliente.appat" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">
								Apellido Materno
							</label>
							<input type="text" name="apemat" class="form-control" v-model="ana.cliente.apmat">
						</div>
					</div>
					<div class="row" v-if="ana.cliente.tipo_persona == '2'">
						<div class="form-group col-12">
							<label class="control-label">
								Razón Social
							</label>
							<input class="form-control" type="text" name="nombre" v-model="ana.cliente.nombre" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label class="control-label">Correo electrónico:</label>
							<input class="form-control" type="email" name="correo" v-model="ana.cliente.correo" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">Telefono</label>
							<input class="form-control" type="text" name="telefono" v-model="ana.cliente.telefono" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">R.F.C.:</label>
							<input class="form-control" type="text" name="rfc" v-model="ana.cliente.rfc" required>
						</div>
						<div class="form-group col-4">
							<label class="control-label">Estado:</label>
							<select class="form-control" name="estado" v-model="ana.cliente.estado" required>
								<option value="">Seleccione el estado en donde vive</option>
								<option v-for="estado in anaestados" :value="estado.id">{{estado.descripcion}}</option>
							</select>
						</div>

					</div>
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
			'cotizacion'
		],
		data(){
			return{
				gsImage:null,
				quaImage:null,
				anaImage:null,
				csrf: null,
				qualitas:{
					cotizacion:"",
					cliente:{
						cliente_id:"",
						contratante:"1",
						razsoc:"",
						nombre:"",
						appaterno:"",
						apmaterno:"",
						calle:"",
						ext:"",
						int:"",
						poblacion:"",
						municipio:"",
						estado:"",
						ciudad:"",
						cod_estado:"",
						cod_municipio:"",
						cp:"",
						pais:"",
						tipo_persona:"1",
						f_nac:"",
						nacionalidad:"",
						ocupacion:"",
						giro:"",
						profesion:"",
						email:"",
						curp:"",
						rfc:"",
						razsoc_cont:"",
						nombre_cont:"",
						appaterno_cont:"",
						apmaterno_cont:"",
						tipo_persona_cont:"1",
						curp_cont:"",
						rfc_cont:"",
						telefono:""
					},
					vehiculo:{
						num_motor:"",
						serie:"",
						paquete:""
					}
				},
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
				ana:{
					cliente:{
						tipo_persona:"1",
						nombre:"",
						apepat:"",
						apemat:"",
						rfc:"",
						curp:"",
						calle:"",
						num_int:"",
						num_ext:"",
						poblacion:"",
						estado:"",
						codigo_postal:"",
						pais:"MEXICO",
						telefono:"",
						correo:"",
						nacionalidad:"",
						identificacion:"",
						num_identif:"",
						ocupacion:"",
						f_nac:"",
						giro:"",
						administrador:"",
						nacionalidad_adm:"",
						representante:"",
						nacionalidad_representante:""
					},
					vehiculo:{
						amis:"",
						placas:"",
						serie:"",
						motor:"",
						modelo:"",
						color:"",
					},
					cotizacion:{
						plan:"",
						pago:"",

					}
				},
				selectPobla:{},
				qualitasPobla:[],
				qualitasGiros:[],
				qualitasProfesiones:[],
				qualitasOcupaciones:[],
				estadosCiviles:[],
				anaestados:[],
				ocupaciones:[],
				giros:[],
				tipocontactos:[],
				detallePago:{},

			}
		},
		watch:{
			"cotizacion.id":function (new_value,old_value) {
				// body...
				console.log(new_value);
				this.generalseguro.cotizacion.id_cotizacion = new_value;
			},
			'cotizacion.paquete.id':function(new_value,old_value){
				console.log(new_value);
				this.generalseguro.cotizacion.idpaquete = new_value;
			},
			'cotizacion.paquetequa':function(new_value,old_value){
				console.log(new_value);
				this.qualitas.vehiculo.paquete = new_value;
			},
			'cliente.cotizacion':function(new_value,old_value){
				console.log(new_value);
				this.qualitas.cotizacion = new_value;
			},
			'qualitas.cliente.cp':_.debounce(function(new_value){
				this.selectPobla = "";
				this.searchCP(new_value);
			},500),
			'selectPobla':function (new_value,old_value) {
				console.log(new_value);
				if (new_value !== "") {
					this.qualitas.cliente.poblacion = new_value.poblacion;
					this.qualitas.cliente.municipio = new_value.municipio;
					this.qualitas.cliente.ciudad = new_value.ciudad;
					this.qualitas.cliente.estado= new_value.estado;
					this.qualitas.cliente.cod_estado = new_value.cestado;
					this.qualitas.cliente.cod_municipio = new_value.codigo_municipio;
				}
				else{
					this.qualitas.cliente.poblacion = "";
					this.qualitas.cliente.municipio = "";
					this.qualitas.cliente.ciudad = "";
					this.qualitas.cliente.estado="";
					this.qualitas.cliente.cod_estado = "";
					this.qualitas.cliente.cod_municipio = "";
				}
			},
			'qualitas.cliente.nombre': function(new_value,old_value){
				if (this.qualitas.cliente.contratante == 1) {
					this.qualitas.cliente.nombre_cont = new_value;
				} else {}
			},
			'qualitas.cliente.appaterno': function(new_value,old_value){
				if (this.qualitas.cliente.contratante == 1) {
					this.qualitas.cliente.appaterno_cont = new_value;
				} else {}
			},
			'qualitas.cliente.apmaterno': function(new_value,old_value){
				if (this.qualitas.cliente.contratante == 1) {
					this.qualitas.cliente.apmaterno_cont = new_value;
				} else {}
			},
			'qualitas.cliente.curp': function(new_value,old_value){
				if (this.qualitas.cliente.contratante == 1) {
					this.qualitas.cliente.curp_cont = new_value;
				} else {}
			},
			'qualitas.cliente.rfc': function(new_value,old_value){
				if (this.qualitas.cliente.contratante == 1) {
					this.qualitas.cliente.rfc_cont = new_value;
				} else {}
			},
			'qualitas.cliente.tipo_persona': function(new_value,old_value){
				if (this.qualitas.cliente.contratante == 1) {
					this.qualitas.cliente.tipo_persona_cont = new_value;
				} else {}
			},
			'ana.cliente.estado':function(new_value,old_value){
				this.getMunicipios(new_value);
			}

		},
		created(){
			
		},
		methods:{
			'searchCP':function (cp) {
				// body...
				let url= `./api/cp/${cp}`;
				axios.get(url).then(res=>{
					console.log(res.data);
					if(res.data.response){
						this.qualitasPobla = res.data.response;
					}
				}).catch(err=>{
					console.log(err);
				})
			},
			'sendGS':function(){
				console.log('enviado');
			},
			'sendQua': function(){
				// TODO
			},
			'sendANA':function(){
				// TODO
			},
			'formaPago':function(){
				if (this.generalseguro.cotizacion.id_pago == "" ) {
					this.detallePago = {};
					console.log(this.detallePago);
				} else {
					var result = this.cotizacion.paquete.formasPagoDTO.find(obj=>{
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
			'getEstados':function(){
				let url="./api/estadosANA";
				axios.get(url).then(res=>{
					console.log(res.data);
					this.anaestados=res.data.estados
				}).catch(err=>{
					console.log(err);
				});
			},
			'getMunicipios':function(estado_id){
				let url = `./api/municipiosANA/${estado_id}`;
				axios.get(url).then(res=>{
					console.log(res.data);
					// 
				}).catch(err=>{
					console.log(err);
				});

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
			this.getEstados();
			this.anaImage="./img/ana1.png";
			this.gsImage = "./img/GENERAL-DE-SEGUROS-LOGO.png";
			this.quaImage = "./img/qua.png";
			this.csrf = document.head.querySelector('meta[name="csrf-token"]').content;
			this.qualitasGiros=[
				{ codigo: '0010', descripcion: 'Industrial'},
				{ codigo: '0020', descripcion: 'Comercial'},
				{ codigo: '0030', descripcion: 'Servicios'},
				{ codigo: '0031', descripcion: 'Servicio Públicos'},
				{ codigo: '0032', descripcion: 'Servicio Privados'},
				{ codigo: '0033', descripcion: 'Transporte'},
				{ codigo: '0034', descripcion: 'Turismo'},
				{ codigo: '0035', descripcion: 'Instituciones Financieras'},
				{ codigo: '0036', descripcion: 'Educación'},
				{ codigo: '0037', descripcion: 'Salubridad'},
				{ codigo: '0038', descripcion: 'Fianzas y Seguros'}
			];
			this.qualitasOcupaciones=[
				{codigo:'0001',descripcion:'Comerciante'},
				{codigo:'0002',descripcion:'Empleado'},
				{codigo:'0003',descripcion:'Empresario'},
				{codigo:'0004',descripcion:'Permisionario'},
				{codigo:'0005',descripcion:'Otro'},
				{codigo:'0006',descripcion:'Transportista'},
				{codigo:'0007',descripcion:'Hogar'}
			];
			this.qualitasProfesiones=[
				{codigo:'0001',descripcion:'Administrador'},
				{codigo:'0002',descripcion:'Abogado'},
				{codigo:'0003',descripcion:'Arquitecto'},
				{codigo:'0004',descripcion:'Actuario'},
				{codigo:'0005',descripcion:'Contador'},
				{codigo:'0006',descripcion:'Docente'},
				{codigo:'0007',descripcion:'Economista'},
				{codigo:'0008',descripcion:'Ingeniero'},
				{codigo:'0009',descripcion:'Medico'},
				{codigo:'0010',descripcion:'Psicólogo'},
				{codigo:'0011',descripcion:'Odontólogo'},
				{codigo:'0012',descripcion:'Químico'},
				{codigo:'0013',descripcion:'Biólogo'},
				{codigo:'0014',descripcion:'Sociólogo'},
				{codigo:'0015',descripcion:'Periodista'},
				{codigo:'0016',descripcion:'Otro'},
				{codigo:'0017',descripcion:'Ninguna'}
			];
		}
	}
</script>