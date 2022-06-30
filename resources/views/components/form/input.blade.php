@props(['name', 'type' => 'text', 'value' => null, 'required' => true])
<input type="{{ $type }}" 
			name="{{ $name }}"
			id="{{ $name }}"
			placeholder="Enter {{ $name }}"
			class="w-full rounded-xl text-lg p-2"
			value="{{ $value == null ? old($name) : $value }}" 
			{{ $required == 'true' ? 'required' : ""}}>