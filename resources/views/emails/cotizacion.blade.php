@component('mail::message')
# Bienvenido a Seguros {{$cliente->nombre}} {{$cliente->appaterno}} {{$cliente->apmaterno}}:

La cotización de tú auto {{$cliente->marca_auto}}  {{$cliente->modelo_auto}} {{$cliente->tipo_auto}} {{$cliente->descripcion_auto}} se guardo en nuestro sistema con este numero:

{{$cliente->cotizacion}}

@component('mail::button', ['url' => 'http://localhost/seguros_cotiza/public/'])
Ver cotización
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
