<div class=" w-1/4">
    <div class="bg-white overflow-hidden shadow-sm">
        <div class="p-4 text-gray-900 border-b-2">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
        @if(auth()->user()->isAdmin())
        <div class="p-4 text-gray-900 border-b-2">
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('Users') }}
            </x-nav-link>
        </div>
        @endif
        <div class="p-4 text-gray-900 border-b-2">
            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Post') }}
            </x-nav-link>
        </div>
        <div class="p-4 text-gray-900 border-b-2">
            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                {{ __('Category') }}
            </x-nav-link>
        </div>
        <div class="p-4 text-gray-900 border-b-2">
            <x-nav-link :href="route('tags.index')" :active="request()->routeIs('tags.index')">
                {{ __('Tag') }}
            </x-nav-link>
        </div>
        <div class="p-4 text-gray-900 border-b-2">
            <x-nav-link :href="route('trashed-posts.index')" :active="request()->routeIs('trashed-posts.index')">
                {{ __('Trashed Posts') }}
            </x-nav-link>
        </div>
    </div>
    {{-- <div class="bg-white overflow-hidden shadow-sm my-1">
        <div class="p-4 text-gray-900 border-b">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
        <div class="p-4 text-gray-900 border-b">
            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Post') }}
            </x-nav-link>
        </div>
        <div class="p-4 text-gray-900 border-b">
            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                {{ __('Category') }}
            </x-nav-link>
        </div>
    </div> --}}

</div>
