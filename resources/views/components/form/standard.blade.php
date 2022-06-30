@props(['action'])
<form method="POST" action="{{$action}}" class="ml-12 mr-12 mx-auto mt-10 border border-gray-400 p-6 rounded-xl bg-gray-100 flex-1" enctype="multipart/form-data">
	@csrf
	{{ $slot }}
</form>