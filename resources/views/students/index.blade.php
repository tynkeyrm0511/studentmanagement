@extends('layouts.app')

@section('content')
    <div>
        <div class="p-3">
            <h1 class="text-2xl text-gray-600 font-bold flex justify-center">MANAGE STUDENTS</h1>
        </div>

        <div class="flex justify-center items-center gap-3 p-3">
            <a href="{{ URL('students/add') }}"
                class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Add Student
            </a>
            <form action={{ URL('students') }} method="GET" class="flex items-center gap-3">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </span>
                    <input id="search" name="search" type="text" value="{{ request('search') }}"
                        class="w-full py-2 pl-10 pr-80 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                        placeholder="Search">
                </div>
                <button type="submit"
                    class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Search
                </button>
            </form>
        </div>

        <div class="p-3">
            <table class="overflow-hidden rounded-lg shadow-md w-full mx-auto">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class=" px-4 py-2 text-left">ID</th>
                        <th class=" px-4 py-2 text-left">Name</th>
                        <th class=" px-4 py-2 text-left">Gender</th>
                        <th class=" px-4 py-2 text-left">DoB</th>
                        <th class=" px-4 py-2 text-left">Email</th>
                        <th class=" px-4 py-2 text-left">Phone</th>
                        <th class=" px-4 py-2 text-left">Class</th>
                        <th class=" px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="hover:bg-blue-200 ">
                            <td class=" px-4 py-2 text-left">{{ $student->id }}</td>
                            <td class=" px-4 py-2 text-left">{{ $student->name }}</td>
                            <td class=" px-4 py-2 text-left">{{ $student->gender }}</td>
                            <td class=" px-4 py-2 text-left">{{ $student->dob }}</td>
                            <td class=" px-4 py-2 text-left">{{ $student->email }}</td>
                            <td class=" px-4 py-2 text-left">{{ $student->phone }}</td>
                            <td class=" px-4 py-2 text-left">{{ $student->class_id }}</td>
                            <td class=" px-4 py-2 text-center">
                                <a href="#"
                                    class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-red-700 hover:cursor-pointer focus:outline-none focus:ring focus:ring-blue-800">Edit</a>
                                <a  href="#"
                                    class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-green-700 hover:cursor-pointer focus:outline-none focus:ring focus:ring-blue-800">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-center bg-gray-200">
                            {{ $students->appends(request()->query())->links() }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    {{-- Javascript --}}
@endsection
