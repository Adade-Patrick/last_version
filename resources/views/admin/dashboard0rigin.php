@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')


<div class="p-4 sm:ml-64 bg-no-repeat bg-cover  bg-white bg-blend-multiply">
    <main class="mt-20 mb-20">
            <div class="relative z-10 flex justify-center items-center px-6">
                 <div class="max-w-3xl w-full rounded-3xl border border-white/20 backdrop-blur-xl bg-white/10 shadow-2xl transition hover:scale-105 duration-300 p-8 md:p-12 flex flex-col md:flex-row items-center justify-between animate-fade-in-up group">

                    <div class="text-center md:text-left">
                        <h2 class="text-4xl font-extrabold text-white mb-2 animate-text-glow">Bienvenue sur le tableau de bord !</h2>
                        <p class="text-black text-lg font-light">Gérer efficacement vos utilisateurs, contenus et paramètres</p>
                    </div>

                    <div class="mt-6 md:mt-0 md:ml-6">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-40 h-40 rounded-full border-4 border-blue-500 shadow-lg group-hover:rotate-6 transition duration-500 ease-in-out">
                    </div>

                </div>
            </div>


    <div id="main-content" class="transition-all duration-300 ml-60">
                <div class="space-y-6 p-14 ">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Overview of your course management system
                        </p>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Students</p>
                                    {{-- <p class="text-2xl font-bold mt-1">{{ $totalStudents }}</p> --}}
                                </div>
                                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Similar cards for other stats -->
                    </div>

                    <!-- Charts -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-lg font-semibold mb-4">Top Courses</h2>
                            <canvas id="topCoursesChart"></canvas>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-lg font-semibold mb-4">Monthly Enrollments</h2>
                            <canvas id="enrollmentsChart"></canvas>
                        </div>
                    </div>

                    <!-- Recent Students -->
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-lg font-semibold">Recently Enrolled Students</h2>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Enrolled</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Courses</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    {{-- @foreach($recentStudents as $student) --}}
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded-full bg-indigo-100">
                                                    {{-- @if($student->avatar) --}}
                                                        {{-- <img src="{{ $student->avatar }}" alt="{{ $student->name }}" class="h-10 w-10 rounded-full"> --}}
                                                    {{-- @else --}}
                                                        <span class="h-10 w-10 rounded-full flex items-center justify-center text-indigo-600">
                                                            {{-- {{ substr($student->name, 0, 1) }} --}}
                                                        </span>
                                                    {{-- @endif --}}
                                                </div>
                                                <div class="ml-4">
                                                    {{-- <div class="text-sm font-medium text-gray-900">{{ $student->name }}</div> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{-- {{ $student->email }} --}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{-- {{ $student->created_at->format('M d, Y') }} --}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{-- {{ $student->courses->count() }} --}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- <span class="px-2 py-1 text-xs rounded-full {{ $student->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}"> --}}
                                                {{-- {{ ucfirst($student->status) }} --}}
                                            </span>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>

                @push('scripts')
                {{-- <script>
                    // Initialize charts using Chart.js
                    const topCoursesChart = new Chart(
                        document.getElementById('topCoursesChart'),
                        {
                            type: 'bar',
                            data: {
                                // labels: {!! json_encode($topCourses->pluck('title')) !!},
                                datasets: [{
                                    label: 'Enrollments',
                                    data: {!! json_encode($topCourses->pluck('enrollment_count')) !!},
                                    backgroundColor: '#4F46E5',
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        }
                    );

                    const enrollmentsChart = new Chart(
                        document.getElementById('enrollmentsChart'),
                        {
                            type: 'line',
                            data: {
                                labels: {!! json_encode($monthlyEnrollments->pluck('month')) !!},
                                datasets: [{
                                    label: 'Enrollments',
                                    data: {!! json_encode($monthlyEnrollments->pluck('count')) !!},
                                    borderColor: '#4F46E5',
                                    tension: 0.1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        }
                    );
                </script> --}}
                @endpush






                <!--Div  classe-->
    <div class="mt-8">
        {{-- <h3 class="mb-2 text-3xl text-center font-bold tracking-tight text-blue-600 dark:text-white">Cycles</h3>   --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <a href="{{ route('cycle_primaire')}}">
                    <h4 class="mb-2 text-3xl text-center font-bold tracking-tight text-blue-600 dark:text-white">Primaire</h4>
                    <img class="h-60 max-w-sm w-full rounded-lg" src="{{ asset('images/cycle/primaire.jpg') }}" alt="">
                </a>

                <a href="{{ route('cycle_college')}}">
                    <h4 class="mb-2 text-3xl text-center font-bold tracking-tight text-blue-600 dark:text-white">Collège</h4>
                    <img class="h-60 max-w-sm w-full rounded-lg" src="{{ asset('images/cycle/college.jpg') }}" alt="">
                </a>

                <a href="{{ route('cycle_lycee')}}">
                    <h4 class="mb-2 text-3xl text-center font-bold tracking-tight text-blue-600 dark:text-white">Lycée</h4>
                    <img class="h-60 max-w-sm w-full rounded-lg" src="{{ asset('images/cycle/lycee.jpg') }}" alt="">
                </a>


        </div>
    </div>


            <!--Div liste Enseignant-->
            <div class="mt-10">
                <h3 class="mb-2 text-3xl text-center font-bold tracking-tight text-blue-600 dark:text-white">Enseignants</h3>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-blue-600 dark:bg-black dark:text-black">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prenom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Classes affectées
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 text-black">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    A
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    B
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    C
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>


@endsection
