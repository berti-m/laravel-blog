@props(['name'])
@error($name)
	<p class="text-red-700 bg-red-100 rounded-xl font-bold text-sm p-1">{{$message}}</p>
@enderror