@component('mail::message')
# Bienvenido a {{ config('app.name') }} {{$cliente->nombre}} {{$cliente->appaterno}} {{$cliente->apmaterno}}:

La cotización de tú auto {{$cliente->auto->marca->descripcion}} {{$cliente->auto->submarca->descripcion}} {{$cliente->auto->submarca->anio}} se guardo en nuestro sistema con este folio:

{{$cliente->cotizacion}}

@component('mail::button', ['url' => url("/")."?cotizacion=".$cliente->cotizacion])
Ver cotización
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
