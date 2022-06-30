<!doctype html>

<title>{{ $title }}</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style type="text/css">
    html{
        scroll-behavior: smooth;
    }
</style>


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @guest
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="bg-blue-600 text-xl text-white rounded-xl py-2 px-2 hover:bg-blue-900 font-semibold ml-6">
                            Log In
                    </a>

                @else
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-sm font-bold uppercase border-2 border-black p-2 rounded-xl pr-6 bg-green-200">
                                Welcome, {{ auth()->user()->name }}!
                                <x-svg.down-arrow/>
                            </button>
                        </x-slot>

                        <x-slot name="slots">
                            <x-dropdown-item href="/dashboard" :selected="request()->routeIs('dashboard')">Dashboard</x-dropdown-item>

                            @if(auth()->user()->is_admin)
                                <x-dropdown-item href="/admin/post/create" :selected="request()->is('admin/*')">Admin Panel</x-dropdown-item>
                            @endif

                            <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                            <form id="logout-form" method="POST" action="/logout" class="hidden">
                                @csrf
                            </form>
                        </x-slot>
                    </x-dropdown>

                    
                @endguest

                <a href="#newsletter" class="bg-blue-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 ml-6">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {!! $slot !!}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="email" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>

                <div class="relative mx-auto lg:bg-gray-200 rounded-full mt-4">
                    @error('email')
                        <p class="text-red-700 bg-red-100 rounded-xl font-bold text-sm p-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
        </footer>
    </section>
    @if(session()->has('success'))
        <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 10000)"
        x-show="show"
        class="bg-blue-600 text-white font-bold font-larger p-3 rounded-xl bottom-3 right-3 fixed text-xl">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
