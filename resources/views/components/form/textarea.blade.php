@props(['name', 'type' => 'text', 'required' => true, 'value' => null])
<textarea type="{{ $type }}" 
			name="{{ $name }}"
			id="{{ $name }}"
			placeholder="Enter {{ $name }}"
			class="w-full rounded-xl text-lg p-2"
			rows="4"
			{{ $required ? 'required' : ""}}>{{ $value == null ? old($name) : $value }}</textarea>  