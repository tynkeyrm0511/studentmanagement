@extends('layouts.app')

@section('content')
    <div>
        <div class="p-3">
            <h1 class="text-2xl text-gray-600 font-bold flex justify-center">
                {{ $subject->name }} - {{ $class->name }}
            </h1>
        </div>
        <form action="{{ route('grades.store') }}" method="POST">
            @csrf

            <input type="hidden" name="subject_id" value="{{ $subject_id }}">
            <input type="hidden" name="class_id" value="{{ $class_id }}">

            <div class="p-3">
                <table class="overflow-hidden rounded-lg shadow-md w-full mx-auto">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class=" px-4 py-2 text-left">Index</th>
                            <th class=" px-4 py-2 text-left">Student name</th>
                            <th class=" px-4 py-2 text-left">Student id</th>
                            <th class=" px-4 py-2 text-center">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $index => $student)
                            <tr class="hover:bg-blue-200 ">
                                <td class=" px-4 py-2 text-left">{{ $index + 1 }}</td>
                                <td class=" px-4 py-2 text-left">{{ $student->name }}</td>
                                <td class=" px-4 py-2 text-left">{{ $student->id }}</td>
                                <td class=" px-4 py-2 text-center">
                                    <input
                                        class="block w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"
                                        type="number" name="scores[{{ $student->id }}]"
                                        value="{{ $grades[$student->id]->score ?? '' }}" step="0.1" min="0"
                                        max="10" class="form-control" />
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="9" class="px-4 py-2 text-center bg-gray-200">

                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="flex justify-end mt-6 gap-3">
                    <button type="submit"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-green-800 hover:cursor-pointer focus:outline-none focus:bg-gray-600">
                        Save all
                    </button>
                    <a href="{{ route('grades.select') }}"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-green-800 hover:cursor-pointer focus:outline-none focus:bg-gray-600">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
