<template>
	<div>
		<!-- polizas {{cliente}} -->
		<div class="row p-3 m-0">
			<div class="col">
				<h3>{{cliente.nombre}} {{cliente.appaterno}} {{cliente.apmaterno}} <span class="badge badge-info">{{cliente.marca_auto}} {{cliente.descripcion_auto.cTipo}} {{cliente.descripcion_auto.cVersion}}</span> </h3>
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
	            				<div class="card">
	            					<img class="card-img-top" :src="cotizacion.imagen" alt="Card image cap">
	            					<div class="card-body">
	            						<h5 class="card-title">Prima Neta:</h5>
	            						<p>${{cotizacion.response.Primas.PrimaNeta}}MXN</p>
	            						<h5 class="card-title">Gastos de expedición de poliza:</h5>
	            						<p>${{cotizacion.response.Primas.Derecho}}MXN</p>
	            						<h5 class="card-title">Impuestos:</h5>
	            						<p>${{cotizacion.response.Primas.Impuestos}}MXN</p>
	            						<!-- {{cotizacion}} -->
	            					</div>
	            				</div>
	            			</div>
	            		</div>
	            	</div>

	            	<div class="tab-pane fade" id="pills-Limitada" role="tabpanel" aria-labelledby="pills-Limitada-tab"></div>

	            	<div class="tab-pane fade" id="pills-RC" role="tabpanel" aria-labelledby="pills-RC-tab"></div>

	            </div>
			</div>
		</div>
		<pre>
			{{$data}}
		</pre>
	</div>
</template>
<script>
	export default{
		props:[
    		'cliente',
    		'getcotizacion'
    	],
    	data(){
    		return{
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
    				this.error = res.data.response.Movimiento.CodigoError;
					console.log(this.error.length);
    				if(this.error.length == 0){
    					this.cotizaciones.push({'imagen':'./img/qua.png','response':res.data.response.Movimiento});
    				}
    			}).catch(err=>{
    				console.log('coberturas err', err)
    			});
    		},
    	},
    	created(){
    	},
    	mounted(){
    		console.log('Polizas Component mounted.');
    	}
	}
</script>