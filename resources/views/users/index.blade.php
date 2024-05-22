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
                            <p class="text-xl font-bold">List of Users</p>
                            {{-- <a href="{{ route('categories.create') }}" class="border bg-slate-800 text-slate-100 p-2 text-sm rounded hover:bg-slate-600">Add Category</a> --}}
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

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-[17px]">
                                                Image
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-[17px]">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-4">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-4">
                                                Role
                                            </th>
                                            <th scope="col" class="px-6 py-4">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row" class="px-6 py-3 text-[15px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{  Gravatar::get('email@example.com');}}" alt="" style="width: 50%">

                                            </th>
                                            <th scope="row" class="px-6 py-3 text-[15px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $user->name }}
                                            </th>
                                            <td class="px-6 py-3">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-3">
                                                {{ $user->role }}
                                            </td>
                                            <td class="px-6 py-3 flex space-x-2">
                                                @if(!$user->isAdmin())
                                                <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-300 p-2 text-white">Make Admin</button>
                                                </form>
                                                @endif

                                                {{-- <form action="{{ route('categories.destroy', $user->id) }}" method="POST">
                                                    @auth
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type='submit' class="bg-red-500 hover:bg-red-300 p-2 text-white">
                                                            Delete
                                                        </button>
                                                    @endauth
                                                </form> --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
