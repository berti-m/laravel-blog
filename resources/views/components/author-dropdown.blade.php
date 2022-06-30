<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm w-full font-semibold text-left">
            {{ isset($currentAuthor) ? ucwords($currentAuthor->name) : 'Authors'}}
        
        <x-svg.down-arrow/>

        </button>
    </x-slot>

    <x-slot name="slots">
        <x-dropdown-item :href="'/?'.http_build_query(request()->except('author'))" :selected="!isset($currentAuthor)">All</x-dropdown-item>
        @foreach($authors as $author)
            <x-dropdown-item :href="'?author='.$author->username.'&'.http_build_query(request()->except('author', 'page'))" :selected="isset($currentAuthor) && ($author->id == $currentAuthor->id)">
                {{ ucwords($author->name) }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>