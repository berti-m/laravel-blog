@props(['trigger', 'slots'])
<div x-data="{ open: false }">
    <div @click="open = ! open">
        {!! $trigger !!}
    </div>
    
 
    <div x-show="open" @click.outside="open = false" 
    class="py-2 absolute bg-gray-100 mt-2 rounded-xl z-50 text-left pd w-full overflow-auto max-h-52 w-full lg:w-64"
    style="display: none;word-wrap: break-word;">
        {!! $slots !!}
    </div>
    
</div>