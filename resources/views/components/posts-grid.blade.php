@props(['posts'])
@if($posts->count())
    <x-featured-article :post="$posts[0]" args="col-span-3"></x-featured-article>

    @if($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
        	@foreach($posts->skip(1) as $post)
        		@if($loop->index < 2)
	        		<x-article :post="$post" args="col-span-3"></x-article>
                @else
                    <x-article :post="$post" args="col-span-2"></x-article>
	        	@endif
            @endforeach
        </div>
    @endif
@else
	<p class="text-center">No posts yet!</p>
@endif