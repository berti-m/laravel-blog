<x-layout title="New Post">
	<x-items-in-line>
		<x-admin.items-list/>
		<x-form.standard action="/admin/post/create">
			<h1 class="text-center text-xl font-bold">New Post</h1>

			<x-form.tab name="title">
				<x-form.input name="title"/>
			</x-form.tab>
			
			<x-form.tab name="slug">
				<x-form.input name="slug"/>
			</x-form.tab>

			<x-form.tab name="thumbnail">
				<x-form.input name="thumbnail" type="file" :required="false"/>
			</x-form.tab>

			<x-form.tab name="excerpt">
				<x-form.textarea name="excerpt"/>
			</x-form.tab>

			<x-form.tab name="body">
				<x-form.textarea name="body"/>
			</x-form.tab>

			<x-form.tab name="category">
				<x-form.select name="category_id" :items="$categories"/>
			</x-form.tab>

			<x-buttons.submit>Post</x-buttons.submit>

		</x-form.standard>
	</x-items-in-line>
</x-layout>