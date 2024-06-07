@extends('layouts.frontend')

@section('content')

<div class="container mx-auto py-8 px-4 md:flex">
    <!-- Content Section -->
    <div class="md:w-4/5 pt-14">
        <!-- Post Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Post 1 -->
            @forelse ( $posts as $post )
            <div class="bg-white shadow-md">
                <img src="{{ asset('/storage/'.$post->image) }}" alt="Post Image" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">{{ $post->title }}</h2>
                    <h4 class="text-sm font-semibold">Category: <span class="text-gray-400">{{ $post->category->name }}</span></h4>
                    @php
                        $content = strip_tags($post->content); // Remove HTML tags
                        $words = explode(' ', $content); // Split content into words
                        if (count($words) > 25) {
                            $words = array_slice($words, 0, 15); // Get only the first 25 words
                        }
                        $excerpt = implode(' ', $words) . (count($words) > 25 ? '...' : ''); // Reconstruct the excerpt and add ellipsis if truncated
                    @endphp
                    <p class="text-gray-700">{!! $excerpt !!}</p>                    </p>                    </p>
                    <a href="{{ route('blog.show', $post->id) }}" class="block mt-4 text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
            @empty
            <p>No result found for search: <strong>{{ request()->query('search') }}</strong></p>
            @endforelse
        </div>
        <div class="my-4">
            {{ $posts->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>

    <!-- Sidebar -->
    <div class="md:w-1/5 md:pl-16 mb-8 pt-14">
        <!-- Search Bar -->
        <div class="mb-6">
            <form action="{{ route('welcome') }}" method="GET">
                <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Search" class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </form>
        </div>
        <!-- Categories -->
        <div class="mb-6">
            <h2 class="text-xl font-bold mb-4">Categories</h2>
            <ul>
                @foreach ($categories as $category )
                <li><a href="#" class="hover:text-gray-600">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- Recent Posts -->
        <div>
            <h2 class="text-xl font-bold mb-4">Recent Posts</h2>
            <ul>
                @foreach ($posts->take(4) as $post )
                <li><a href="{{ route('blog.show', $post->id) }}" class="hover:text-blue-400 text-blue-500">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- Tags -->
        <div class="mb-6">
            <h2 class="text-xl font-bold mb-4">Tags</h2>
            <ul>
                @foreach ($tags as $tag )
                <li><a href="#" class="hover:text-gray-600">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
