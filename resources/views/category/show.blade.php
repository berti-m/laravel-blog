<x-layout title="Delete Category">
	<x-items-in-line>
		<x-admin.items-list/>
		<x-form.standard action="/admin/category/delete">
			<h1 class="text-center text-xl font-bold">Delete Category</h1>
			@method('delete')
			<x-form.tab name="category">
				<x-form.select name="category_id" :items="$categories"/>
			</x-form.tab>

			<x-buttons.submit>Delete</x-buttons.submit>

		</x-form.standard>
	</x-items-in-line>
</x-layout>