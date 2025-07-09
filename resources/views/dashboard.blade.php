@extends('layouts.app')

@section('content')
    {{-- Noi dung cua page --}}
    <div class="grid grid-rows-2 gap-4 p-4 w-full h-screen">
        {{-- row 1 --}}
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <div class="p-4 h-85 bg-blue-400 rounded shadow">
                    <h1>STUDENT MANAGEMENT SYSTEM</h1>
                    <h1>About this app</h1>
                </div>
            </div>
            <div class="col-span-1">
                <div class="p-4 h-85 bg-blue-400 rounded shadow">
                    <h1>Welcome back</h1>
                    <h1>Show time</h1>
                </div>
            </div>
        </div>
        {{-- row 2 --}}
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1">
                <div class="p-4 h-85 bg-blue-400 rounded shadow">
                    <h1>TOTAL STUDENTS:</h1>
                    <h1>111</h1>
                </div>
            </div>
            <div class="col-span-1">
                <div class="p-4 h-85 bg-blue-400 rounded shadow">
                    <h1>TOTAL CLASSES:</h1>
                    <h1>222</h1>
                </div>
            </div>
            <div class="col-span-1">
                <div class="p-4 h-85 bg-blue-400 rounded shadow">
                    <h1>TOTAL SUBJECTS:</h1>
                    <h1>333</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- Javascript --}}
@endsection
