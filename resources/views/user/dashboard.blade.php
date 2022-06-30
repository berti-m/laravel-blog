<x-layout title="Dashboard">
	<div class="ml-12 mr-12 mx-auto mt-10 border border-gray-400 p-6 rounded-xl bg-gray-100 flex items-center justify-center">
		<x-buttons.confirm method="delete" action="/dashboard/delete">
			Delete Account
		</x-buttons.confirm>
	</div>
</x-layout>