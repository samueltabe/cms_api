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
                                {{-- {{isset($category) ? 'Edit Tags' : 'Create Tags'}} --}}
                            </p>
                            <a href="{{ route('tags.index') }}" class="border bg-slate-800 text-slate-100 p-2 text-sm rounded hover:bg-slate-600">Return</a>
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
                            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST" class="m-6">
                                @csrf
                                @if(isset($tag))
                                @method('PUT')
                                @endif
                                <div class="mb-5">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag Name</label>
                                <input type="text" name="name" value="{{ isset($tag)? $tag->name : '' }}" id="email" class="bg-gray-100 w-full text-gray-900 text-sm  focus:ring-gray-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 border-none" />
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    {{ isset($tag) ? 'Update' : 'Submit' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
