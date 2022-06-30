<x-layout title="New Category">
	<x-items-in-line>
		<x-admin.items-list/>
		<x-form.standard action="/admin/category/create">
			<h1 class="text-center text-xl font-bold">New Category</h1>

			<x-form.tab name="name">
				<x-form.input name="name"/>
			</x-form.tab>
			
			<x-form.tab name="slug">
				<x-form.input name="slug"/>
			</x-form.tab>

			<x-buttons.submit>Create</x-buttons.submit>

		</x-form.standard>
	</x-items-in-line>
</x-layout>