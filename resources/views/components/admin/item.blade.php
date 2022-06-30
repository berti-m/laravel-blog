@props(['selected' => false])
<a {{$attributes}}>
	<li class="p-2 rounded-xl mt-4 border-2 border-black {{ $selected ? 'bg-green-200 font-bold' : 'bg-gray-100 font-semibold'}}">
			{{$slot}}
	</li>
</a>