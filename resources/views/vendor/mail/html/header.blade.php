<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="./img/1.png" class="logo" alt="PTACODEA Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
