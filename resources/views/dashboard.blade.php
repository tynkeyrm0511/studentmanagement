@extends('layouts.app')

@section('content')
    {{-- Noi dung cua page --}}
    <div class="grid grid-rows-2 gap-4 p-4 w-full" style="height: calc(100vh - 2rem);">
        {{-- Row 1: Welcome & Clock --}}
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <div class="p-6 h-full bg-blue-100 hover:bg-blue-200 transition duration-300 ease-in-out border-l-4 border-blue-500  rounded-lg shadow">
                    <p class="text-2xl font-bold mt-2 text-gray-700">
                        Welcome to the Student Management System
                    </p>
                    <p class="text-2xl mt-2 text-gray-700">
                        A lightweight yet powerful
                        Laravel-based web application designed to streamline the management of students, classes, subjects,
                        and academic performance.
                        This system helps administrators and educators to efficiently track student records, manage class
                        schedules, enter grades, and generate overviews — all in one intuitive dashboard.
                    </p>
                </div>
            </div>
            <div class="col-span-1">
                <div class="p-6 h-full bg-green-100 hover:bg-green-200 transition duration-300 ease-in-out border-l-4 border-green-500 rounded-lg shadow">
                    <h1 class="text-2xl font-bold text-green-700">Welcome back!</h1>
                    <p class="mt-2 text-gray-700 text-xl font-mono" id="clock"></p> {{-- Thêm class cho đồng hồ --}}
                </div>
            </div>
        </div>

        {{-- Row 2: Statistics Cards --}}
        <div class="grid grid-cols-3 gap-4">
            {{-- Students Card --}}
            <div class="p-6 bg-indigo-100 hover:bg-indigo-200 transition duration-300 ease-in-out border-l-4 border-indigo-500 rounded-lg shadow">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-xl font-semibold text-indigo-800">Total Students</h2>
                    <span class="text-4xl font-bold text-indigo-800 mt-4 counter">{{ $studentsCount }}</span>
                    <i class="fas fa-users text-9xl text-indigo-800 mt-4"></i>
                </div>
            </div>

            {{-- Classes Card --}}
            <div class="p-6 bg-yellow-100 hover:bg-yellow-200 transition duration-300 ease-in-out border-l-4 border-yellow-500 rounded-lg shadow">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-xl font-semibold text-yellow-800">Total Classes</h2>
                    <span class="text-4xl font-bold text-yellow-800 mt-4 counter">{{ $classesCount }}</span>
                    <i class="fas fa-chalkboard text-9xl text-yellow-800 mt-4"></i>
                </div>
            </div>

            {{-- Subjects Card --}}
            <div class="p-6 bg-purple-100 hover:bg-purple-200 transition duration-300 ease-in-out border-l-4 border-purple-500 rounded-lg shadow">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-xl font-semibold text-purple-800">Total Subjects</h2>
                    <span class="text-4xl font-bold text-purple-800 mt-4 counter">{{ $subjectsCount }}</span>
                    <i class="fas fa-book text-9xl text-purple-800 mt-4"></i>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Real-time Clock
        function updateClock() {
            const now = new Date();
            const date = now.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            const time = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });

            document.getElementById('clock').innerHTML = `
            <div class="text-lg">${date}</div>
            <div class="text-2xl font-bold mt-2">${time}</div>
        `;
        }

        // Update clock every second
        setInterval(updateClock, 1000);
        updateClock(); // Initial call

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = parseInt(counter.innerText);
            const duration = 1000; // 1 second
            const increment = target / (duration / 16); // 60fps
            let current = 0;

            const updateCounter = () => {
                current += increment;
                counter.innerText = Math.round(current);
                
                if(current < target) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = target;
                }
            };

            updateCounter();
        });
    </script>
@endsection