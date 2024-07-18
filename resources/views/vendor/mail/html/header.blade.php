@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('Assets/Logo_vettoriale.svg')}}" class="logo" alt="Enyty Logo">
@else
<!--<img src="{{asset('Assets/Logo_vettoriale.svg')}}" class="logo" alt="My logo" style="width: auto !important;">-->
@endif
</a>
</td>
</tr>
