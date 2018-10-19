<template>
    <div class="container">
    	<div class="tab-pane">
    		<div class="row m-0 p-1 no-gutters">
    			<div class="col-sm-6 d-none d-sm-block p-2">
    				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-Uso-tab" data-toggle="pill" href="#v-pills-Uso" role="tab" aria-controls="v-pills-Uso" aria-selected="true">Uso: {{cliente.uso_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Marca-tab" data-toggle="pill" href="#v-pills-Marca" role="tab" aria-controls="v-pills-Marca" aria-selected="false">Marca: {{cliente.marca_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Modelo-tab" data-toggle="pill" href="#v-pills-Modelo" role="tab" aria-controls="v-pills-Modelo" aria-selected="false">Modelo: {{cliente.modelo_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-Descripcion-tab" data-toggle="pill" href="#v-pills-Descripcion" role="tab" aria-controls="v-pills-Descripcion" aria-selected="false">Descripción:{{cliente.descripcion_auto}}</a>
		              <a class="nav-link disabled" id="v-pills-CP-tab" data-toggle="pill" href="#v-pills-CP" role="tab" aria-controls="v-pills-CP" aria-selected="false">CP: {{cliente.cp}}</a>
		              <a class="nav-link disabled" id="v-pills-Nombre-tab" data-toggle="pill" href="#v-pills-Nombre" role="tab" aria-controls="v-pills-Nombre" aria-selected="false">Nombre: {{cliente.nombre}} {{cliente.appaterno}} {{cliente.apmaterno}}</a>
		              <a class="nav-link disabled" id="v-pills-Celular-tab" data-toggle="pill" href="#v-pills-Celular" role="tab" aria-controls="v-pills-Celular" aria-selected="false">Celular: {{cliente.telefono}}</a>
		              <a class="nav-link disabled" id="v-pills-Correo-tab" data-toggle="pill" href="#v-pills-Correo" role="tab" aria-controls="v-pills-Correo" aria-selected="false">Correo: {{cliente.email}}</a>
		              <a class="nav-link disabled" id="v-pills-Sexo-tab" data-toggle="pill" href="#v-pills-Sexo" role="tab" aria-controls="v-pills-Sexo" aria-selected="false">Sexo: {{cliente.sexo}}</a>
		              <a class="nav-link disabled" id="v-pills-Edad-tab" data-toggle="pill" href="#v-pills-Edad" role="tab" aria-controls="v-pills-Edad" aria-selected="false">Nacimiento: {{cliente.f_nac}}</a>
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
    		}
    	},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>