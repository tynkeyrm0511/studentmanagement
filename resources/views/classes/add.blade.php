@extends('layouts.app')

@section('content')
    @extends('layouts.app')

@section('content')
    <div class="p-3">
        <h1 class="text-2xl text-gray-600 font-bold flex justify-center">MANAGE CLASS</h1>
    </div>

    <div class="relative">
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error!',
                    html: `{!! implode('<br>', $errors->all()) !!}`
                });
            </script>
        @endif
    </div>

    <div class="container mx-auto mt-25">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Class Registration</h2>

            <form action="{{ URL('classes/create') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label for="name" class="block text-sm text-gray-500 dark:text-gray-300">Class Name</label>
                        <input type="text" placeholder="Enter your class name" id="name" name="name"
                            class="block  mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                    </div>
                </div>

                <div class="flex justify-end mt-6 gap-3">
                    <button type="submit"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-green-800 hover:cursor-pointer focus:outline-none focus:bg-gray-600">
                        Save
                    </button>
                    <a href="{{ route('classes.index') }}"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-red-800 hover:cursor-pointer focus:outline-none focus:bg-gray-600">
                        Cancel
                    </a>
                </div>
            </form>
        </section>


    </div>
@endsection

@section('scripts')
    {{-- Javascript --}}
@endsection

@endsection

@section('script')
@endsection
