
<x-layout :title="'Edit: '.$post->title">
	<x-items-in-line>
		<x-admin.items-list/>
		<x-form.standard :action="'/posts/'.$post->slug.'/edit'">
			<h1 class="text-center text-xl font-bold">Edit: {{$post->title }}</h1>

			<x-form.tab name="title">
				<x-form.input name="title" :value="$post->title"/>
			</x-form.tab>
			
			<x-form.tab name="slug">
				<x-form.input name="slug" :value="$post->slug"/>
			</x-form.tab>

			<x-form.tab name="thumbnail">
				<x-form.input name="thumbnail" type="file" :required="false"/>
				<img src="/storage/{{ $post->thumbnail }}" alt="" width="200" class="rounded-xl">
			</x-form.tab>

			<x-form.tab name="excerpt">
				<x-form.textarea name="excerpt" :value="$post->excerpt"/>
			</x-form.tab>

			<x-form.tab name="body">
				<x-form.textarea name="body" :value="$post->body"/>
			</x-form.tab>

			<x-form.tab name="category">
				<x-form.select name="category_id" :items="$categories" :selected="$post->category_id"/>
			</x-form.tab>

			<x-buttons.submit>Save</x-buttons.submit>

		</x-form.standard>
	</x-items-in-line>
</x-layout>