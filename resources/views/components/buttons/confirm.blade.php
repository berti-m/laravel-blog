@props(['method' => 'post', 'action'])
<span x-data="{ initial: true }">
	<button class="p-2 rounded-2xl items-center ml-6 border-2 border-black bg-red-200 font-bold align-middle text-sm"
	x-show="initial"
	x-on:click.prevent="initial = false"
	x-transition:enter.duration.1000ms
	x-transition:leave.duration.200ms
	>
	    {{ $slot }}
	</button>
	<span x-show="initial == false" style="display: none;"
	x-transition:enter.duration.1000ms
	x-transition:leave.duration.200ms
	class="p-3 border border-black ml-6 rounded-xl bg-gray-200 inline-flex" 
	>
	    <form class="p-2 rounded-2xl items-center border-2 border-black bg-red-700 font-bold align-middle text-sm text-white" method="POST" action={{ $action }}>
	        @csrf
	        @method($method)
	        <button type="submit" class="p-2 rounded-2xl items-center bg-red-700 font-bold align-middle text-sm text-white">
	            Confirm {{ $slot }}
	        </button>
	    </form>
	    <button class="p-2 rounded-2xl items-center ml-6 border-2 border-black bg-green-600 font-bold align-middle text-sm text-white"
	    x-on:click.prevent="initial = true"
	    >
	        Abort
	    </button>
	</span>
</span>