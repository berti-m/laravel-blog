<x-layout :title="$post->title">

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/storage/{{ $post->thumbnail }}" alt="" class="rounded-xl">
                

                <p class="mt-4 block p-3 text-gray-500 bg-gray-100 text-xs rounded-xl">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    <br>
                    Last edited <time>{{ $post->updated_at->diffForHumans() }}</time>
                    <br>
                    Viewed: {{ $post->page_counter }} times
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <a href="/?author={{ $post->author->username }}"><h3 class="font-bold">{{ $post->author->name }}</h3></a>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <x-categories-tab :post="$post"></x-categories-tab>
                </div>

                <div class="font-bold text-3xl lg:text-4xl mb-10">
                    {!! $post->title !!}

                    @if(auth()->user()?->is_admin)
                        <div class="mt-4">
                            <a href="/posts/{{$post->slug}}/edit" class="p-2 rounded-2xl items-center border-2 border-black bg-blue-200 font-bold align-middle text-sm">
                                Edit
                            </a>
                            
                            <x-buttons.confirm method="delete" :action="'/posts/'.$post->slug.'/destroy'">
                                Delete Post
                            </x-buttons.confirm>

                        </div>
                    @endif
                </div>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! $post->body !!}
                </div>
            </div>

            <section class="col-span-8 col-start-5 mt-10">
                @auth
                <form method="POST" action="/posts/{{ $post->slug }}/comment" class="bg-blue-100 p-6 border border-gray-400 rounded-xl">
                    @csrf
                    <header class="flex items-center space-x-4">
                        <img src="https://i.pravatar.cc/100?u={{ auth()->user()->id}}" width="50" class="rounded-full">
                        <h2>Want to participate?</h2>
                    </header>
                    <div class="mt-6">
                        <textarea name="body" rows="5" class="w-full p-2 rounded-xl" placeholder="Write your comment here!" required></textarea>
                    </div>
                    @error('body')
                        <span class="p-1 bg-red-100 underline text-red-600 text-sm mt-6">{{ $message }}</span>
                    @enderror
                    <x-buttons.submit>Comment</x-buttons.submit>
                </form>

                @else
                <div class="font-semibold">
                    <a href="/register" class="font-bold hover:underline text-red-600">Register</a> 
                    or 
                    <a href="/login" class="hover:underline text-red-600 font-bold">log in</a> 
                    to leave a comment!
                </div>
                @endauth

                @foreach($post->comments->sortByDesc('created_at') as $comment)
                    <x-post-comment :comment="$comment" />
                @endforeach
            </section>
            
        </article>
    </main>
</x-layout>