@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
<img 
src="{{ url('/images/logo.png') }}" 
class="logo" 
alt="{{ config('app.name') }}"
style="height: 100%; width: 80%; object-fit: cover;"
>
</a>
</td>
</tr>
