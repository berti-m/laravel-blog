<aside class="max-w-lg mt-10 border border-gray-400 p-6 text-center rounded-xl">
	<h1 class="text-xl font-bold mb-8">Admin Panel</h1>
	<ul>
		<x-admin.item :selected="request()->routeIs('new_post')" href="/admin/post/create">New Post</x-admin.item>
		<x-admin.item :selected="request()->routeIs('new_category')" href="/admin/category/create">New Category</x-admin.item>
		<x-admin.item :selected="request()->routeIs('delete_category')" href="/admin/category/delete">Delete Category</x-admin.item>
	</ul>
</aside>