@props(['name', 'items', 'type' => 'text', 'selected' => null])

<select type="{{ $type }}" 
name="{{ $name }}"
id="{{ $name }}"
class="w-full rounded-xl text-lg p-2"
rows="4"
>
	@foreach($items as $cat)
		<option value="{{ $cat->id }}" class="hover:bg-blue-600 hover:text-white" {{ (($cat->id == $selected) or ($cat->id == old($name))) ? 'selected' : "" }}>{{ ucwords($cat->name) }}</option>
	@endforeach
</select> 