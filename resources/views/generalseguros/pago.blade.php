@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-10 col-sm-6 my-5 mx-0 p-0 bg-light rounded shadow-lg">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link disabled" id="paso1-tab" data-toggle="tab" href="#paso1" role="tab" aria-controls="paso1" aria-selected="true">Datos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="paso2-tab" data-toggle="tab" href="#paso2" role="tab" aria-controls="paso2" aria-selected="false">Cotización</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="paso3-tab" data-toggle="tab" href="#paso3" role="tab" aria-controls="paso3" aria-selected="false">Auto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="paso4-tab" data-toggle="tab" href="#paso4" role="tab" aria-controls="paso4" aria-selected="false">Pago</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="container" v-if="alert.message">
                <div :class="alert.class" id="alert" role="alert">

                    @verbatim
                    <strong>{{alert.message}}</strong>
                    @endverbatim
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="tab-pane fade" id="paso1" role="tabpanel" aria-labelledby="paso1-tab">
                
            </div>
            <div class="tab-pane fade" id="paso2" role="tabpanel" aria-labelledby="paso2-tab">
                
            </div>
            <div class="tab-pane fade {{-- show active --}}" id="paso3" role="tabpanel" aria-labelledby="paso3-tab">
                
            </div>
            <div class="tab-pane fade show active" id="paso4" role="tabpane4" aria-labelledby="paso4-tab">
            	<div class="row m-3">
            		<div class="col-12 m-2 p-2">
            			<h3 class="mt-3 ml-3">Gracias por utilizar General de Seguros</h3>
            		</div>
					<div class="col-6">
						<h5>Su cotización se guardo con la siguiente información</h5>
					</div>
					<div class="col-6">
						<label for="" class="control-label">Número de cliente:</label>
						<p>{{$response['return']['poliza']['numcli']}}</p>
						<label class="control-label">Número de poliza:</label>
						<p>{{$response['return']['poliza']['poliza']}}</p>
					</div>
					<div class="col-12">
						@foreach ($response['return']['listaDocumentos']['SDTDocumentos.SDTDocumentosItem'] as $boton)
							{{-- expr --}}
							<div class="d-flex justify-content-center mt-4">
								<a class="btn btn-primary btn-lg" href="{{$boton['liga']}}" target="_blank" role="button">{{$boton['nombre']}}</a>
							</div>
						@endforeach
					</div>
            	</div>
            </div>
            
            
            {{-- @include('pasos.paso1') --}}
            {{-- @include('pasos.paso2') --}}
            {{-- @include('pasos.paso3') --}}
            {{-- @include('pasos.paso4') --}}
        </div>
    </div>
</div>
@endsection