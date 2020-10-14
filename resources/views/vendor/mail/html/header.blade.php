<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<!--<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">-->
<img src="/img/logo-casa-martinez.png" class="c-logo" alt="Logo Casa Martínez">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
