@props(['name'])
<label for="{{ $name }}" class="block mb-2 uppercase font-bold text-sm text-grey-700">
	{{ ucwords($name) }}
</label>