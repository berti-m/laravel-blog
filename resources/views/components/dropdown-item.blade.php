@props(['href', 'selected' => false])
<a href={{$href}} class="block text-left px-3 leading-6 hover:bg-green-300 focus:bg-green-300 rounded-xl {{ $selected ? 'bg-blue-200' : '' }}" {{ $attributes }}>
    {{ $slot }}
</a>