@extends('layouts.frontend')

@section('content')

    <div class="container mx-auto py-8 px-4">
        <!-- Single Post -->
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md">
            <img src="{{ asset('/storage/'.$post->image) }}" alt="Post Image" class="w-full h-96 object-cover">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                <div class="flex space-x-2">
                    <p class="text-gray-700 mb-6">Categoty: <span class="text-blue-500">{{ $post->category->name}}</span></p>
                    <p class="text-gray-700 mb-6">Author: <span class="text-blue-500">{{ $post->user->name ?? ''}}</span></p>
                </div>
                <p class="text-gray-700 pb-6">{!! $post->content !!}</p>

                <div class="mt-5 mb-10">
                    @foreach($post->tags as $tag)
                    <a href="" class="text-gray-600 bg-gray-200 px-[6px]">{{ $tag->name }}</a>

                    @endforeach
                </div>

                <!-- Comment Section -->

                <!-- Comment Form -->
                {{-- <form class="mb-6">
                    <div class="w-full flex space-x-4">
                        <div class="mb-4 w-1/2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4 w-1/2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" id="email" name="email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                        <textarea id="comment" name="comment" rows="3" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit</button>
                </form> --}}
                <div id="disqus_thread"></div>
                    <script>
                        /**
                        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                        var disqus_config = function () {
                            this.page.url = "{{ config('app.url') }}/frontend/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier =  "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://samtabe.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
        </div>
    </div>

@endsection
