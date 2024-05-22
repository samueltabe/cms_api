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
                            <p class="text-xl font-bold">List of Posts</p>
                            <a href="{{ route('posts.create') }}" class="border bg-slate-800 text-slate-100 p-2 text-sm rounded hover:bg-slate-600">Add Post</a>
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

                            <div class="relative overflow-x-auto shadow-md m-4">
                                @if($posts->count() > 0)
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-[17px]">
                                                Image
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-[17px]">
                                                Title
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-[17px]">
                                                Author
                                            </th>
                                          <th scope="col" class="px-6 py-3 text-[17px]">
                                                Category
                                            </th>
                                              {{-- <th scope="col" class="px-6 py-3 text-[17px]">
                                                Content
                                            </th> --}}
                                            <th scope="col" class="px-6 py-4 text-[17px]">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post )
                                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row" class="px-6 py-3 text-[15px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{ asset('/storage/'.$post->image) }}" alt="" style="width: 80px; height: 60px">
                                            </th>
                                            <td class="px-6 py-3">
                                                {{ $post->title }}
                                            </td>
                                            <td class="px-6 py-3">
                                                {{ $post->user->name ?? '' }}
                                            </td>
                                            <td class="px-6 py-3">
                                                <a class="text-blue-500" href="{{ $post->category ? route('categories.edit', $post->category->id) : '#' }}">
                                                    {{ $post->category->name ?? ''}}
                                                </a>
                                            </td>
                                            {{-- <td class="px-6 py-3">
                                                {{ $post->content }}
                                            </td> --}}
                                            <td class="px-6 py-3 flex space-x-2">
                                                @if($post->trashed())
                                                <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-300 p-2 text-white">Restore</button>
                                                </form>
                                                @else
                                                <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-300 p-2 text-white">Edit</a>
                                                @endif
                                                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                                                    @auth
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type='submit' class="bg-red-500 hover:bg-red-300 p-2 text-white">
                                                            {{ $post->trashed() ? 'Delete' : 'Trashed' }}
                                                        </button>
                                                    @endauth
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="flex justify-center py-3">
                                    <p class="text-2xl">No Post Yet </p>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
