@extends('layouts.app')

@section('content')
    {{-- Noi dung cua page --}}
    <div class="grid grid-rows-2 gap-4 p-4 w-full" style="height: calc(100vh - 2rem);">
        {{-- Row 1: Welcome & Clock --}}
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <div class="p-6 h-full bg-blue-100 border-l-4 border-blue-500 rounded-lg shadow">
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
                <div class="p-6 h-full bg-green-100 border-l-4 border-green-500 rounded-lg shadow">
                    <h1 class="text-2xl font-bold text-green-700">Welcome back!</h1>
                    <p class="mt-2 text-gray-700 text-xl font-mono" id="clock"></p> {{-- Thêm class cho đồng hồ --}}
                </div>
            </div>
        </div>

        {{-- Row 2: Statistics Cards --}}
        <div class="grid grid-cols-3 gap-4">
            {{-- Students Card --}}
            <div class="p-6 bg-white border-l-4 border-indigo-500 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-indigo-600">Students</h2>
                    <span class="text-2xl font-bold text-indigo-600">{{ $studentsCount }}</span>
                </div>
                <div class="mt-4 h-[200px]">
                    <canvas id="studentsChart"></canvas>
                </div>
            </div>

            {{-- Classes Card --}}
            <div class="p-6 bg-white border-l-4 border-yellow-500 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-yellow-600">Classes</h2>
                    <span class="text-2xl font-bold text-yellow-600">{{ $classesCount }}</span>
                </div>
                <div class="mt-4 h-[200px]">
                    <canvas id="classesChart"></canvas>
                </div>
            </div>

            {{-- Subjects Card --}}
            <div class="p-6 bg-white border-l-4 border-purple-500 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-purple-600">Subjects</h2>
                    <span class="text-2xl font-bold text-purple-600">{{ $subjectsCount }}</span>
                </div>
                <div class="mt-4 h-[200px]">
                    <canvas id="subjectsChart"></canvas>
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

        // Common chart options
        const commonOptions = {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        };

        // Students Chart
        new Chart(document.getElementById('studentsChart'), {
            type: 'bar',
            data: {
                labels: ['Total Students'],
                datasets: [{
                    data: [{{ $studentsCount }}],
                    backgroundColor: 'rgba(99, 102, 241, 0.5)',
                    borderColor: 'rgb(99, 102, 241)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        // Classes Chart
        new Chart(document.getElementById('classesChart'), {
            type: 'bar',
            data: {
                labels: ['Total Classes'],
                datasets: [{
                    data: [{{ $classesCount }}],
                    backgroundColor: 'rgba(234, 179, 8, 0.5)',
                    borderColor: 'rgb(234, 179, 8)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        // Subjects Chart
        new Chart(document.getElementById('subjectsChart'), {
            type: 'bar',
            data: {
                labels: ['Total Subjects'],
                datasets: [{
                    data: [{{ $subjectsCount }}],
                    backgroundColor: 'rgba(168, 85, 247, 0.5)',
                    borderColor: 'rgb(168, 85, 247)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });
    </script>
@endsection
