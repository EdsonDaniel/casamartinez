@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

<h2 style="font-weight: 600;">Detalles de tu pedido</h2>


{{-- details products --}}
@isset($productos)
@component('mail::table')
|  | | |
| :- | - | -: |
@foreach($productos as $p)
| <img class="img-sm" src="/storage/{{$p['img_url']}}"> | <span class="span" style="vertical-align: middle;">{{$p['cantidad']}}x {{$p['name']}} </span> | <span> {{$p['precio_unitario']}} </span> |
@endforeach
| | <p>Subtotal:</p> | <span>${{$total - $costo_envio}}</span> |
| | <p>Costo de envío:</p> | <span>${{$costo_envio}}</span> |
| | <p style="font-weight: 600; margin-top: 5px;">Total:</p> | <span style="font-weight: 600; margin-top: 5px;">${{$total}}</span>|

@endcomponent
@endisset

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@if($url != '')
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset
@endif

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards')<br>
{{-- config('app.name') --}}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
