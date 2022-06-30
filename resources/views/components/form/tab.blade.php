@props(['name'])
<div class="mt-4">
	<x-form.label :name="$name"/>
	{{ $slot }}
	<x-form.error :name="$name"/>
</div>