<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboar') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-4">
                @include('layouts.sidebar')
                <div class=" w-3/4">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class=" flex justify-between text-gray-900 mb-6 bg-slate-200 px-8 py-2">
                            <p class="text-xl font-bold">
                                {{ isset($post) ? 'Edit Post': 'Create Post' }}
                            </p>
                            <a href="{{ route('posts.index') }}" class="border bg-slate-800 text-slate-100 p-2 text-sm rounded hover:bg-slate-600">Return</a>
                        </div>
                        <div class="ml-5">
                            @if($errors->any())
                            <div class=" mx-5">
                                <ul>
                                    @foreach($errors->all() as $error)
                                      <li class="text-red-500">
                                        {{ $error }}
                                      </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" enctype="multipart/form-data" method="POST" class="m-6">
                                @csrf

                                @if(isset($post))
                                @method('PUT')
                                @endif
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input type="text" value="{{ isset($post) ? $post->title:'' }}" name="title" id="email" class="bg-gray-100 w-full text-gray-900 text-sm  focus:ring-gray-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 border-none" />
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <input name="desc" id="desc" value="{{ isset($post) ? $post->desc :'' }}" class="bg-gray-100 w-full text-gray-900 text-sm  focus:ring-gray-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 border-none"/>
                                </div>
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content:'' }}">
                                    <trix-editor input="content"></trix-editor>
                                </div>
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
                                    <select name="category" id="category" class="bg-gray-100 w-full text-gray-900 text-sm focus:ring-gray-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 border-none">
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ isset($post) && $category->id == $post->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Tag</label>
                                    @if($tags->count() > 0)
                                    <select name="tags[]" id="tags" multiple class="bg-gray-100 tags-selector w-full text-gray-900 text-sm focus:ring-gray-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 border-none">
                                        <option value=""></option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                              @if(@isset($post))
                                                @if($post->hasTag($tag->id));
                                                    selected
                                                @endif
                                              @endif
                                            >
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @else
                                    <p class="text-sm text-gray-400">No Tags</p>
                                    @endif
                                </div>
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Published At</label>
                                    <input type="text" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at:'' }}" class="bg-gray-100 w-full text-gray-900 text-sm  focus:ring-gray-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 border-none" />
                                </div>
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                    @if(isset($post))
                                    <img src="{{ asset('/storage/'.$post->image) }}" style="width: 100%" class="mb-2"/>
                                    @endif
                                    <input type="file" name="image" id="email" class="bg-gray-100 w-full text-gray-900 text-sm  focus:ring-gray-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 border-none" />
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    {{ isset($post) ? 'Update Post' : 'Create Post' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/lib.min.js" integrity="sha512-LTxGQ9e0m5BLj8PqkTeZdQIWBCGt2L1I3dZkprWs3lwsWkiXD1j+o2rttG+40TVOQPUpQC9rykk3RPX9Dny1Bg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection --}}
