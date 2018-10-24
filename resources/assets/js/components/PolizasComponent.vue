<template>
	<div>
		polizas {{cliente}}
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
    				console.log('coberturas res',res)
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