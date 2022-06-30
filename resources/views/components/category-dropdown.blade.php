<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm w-full font-semibold text-left">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
        
        <x-svg.down-arrow/>

        </button>
    </x-slot>

    <x-slot name="slots">
        <x-dropdown-item :href="'/?'.http_build_query(request()->except('category'))" :selected="!isset($currentCategory)">All</x-dropdown-item>
        @foreach($categories as $category)
            <x-dropdown-item :href="'?category='.$category->slug.'&'.http_build_query(request()->except('category', 'page'))" :selected="isset($currentCategory) && ($category->id == $currentCategory->id)">
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>