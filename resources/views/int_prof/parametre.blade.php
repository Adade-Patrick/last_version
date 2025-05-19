@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebarProf')

<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-gray-100 bg-blend-multiply">
    <main class="mt-24 mb-0">
        <div class="space-y-6">
            <!-- Page Header -->
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Settings</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Manage your account and application preferences
                </p>
            </div>

            <!-- Settings Sections -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Profile Settings -->
                <div class="md:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Profile Settings</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Update your personal information and profile settings
                            </p>
                        </div>

                        <form class="p-6 space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Profile Photo
                                </label>
                                <div class="mt-2 flex items-center space-x-4">
                                    <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <i data-lucide="user" class="w-6 h-6 text-indigo-600"></i>
                                    </div>
                                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                                        Change Photo
                                    </button>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        First Name
                                    </label>
                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Last Name
                                    </label>
                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Email Address
                                    </label>
                                    <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Phone Number
                                    </label>
                                    <input type="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Preferences -->
                <div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Preferences</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Customize your application experience
                            </p>
                        </div>

                        <div class="p-6 space-y-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Dark Mode</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Enable dark mode for the interface
                                    </p>
                                </div>
                                <button
                                    type="button"
                                    onclick="toggleDarkMode()"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 bg-gray-200 dark:bg-indigo-600"
                                >
                                    <span class="sr-only">Toggle dark mode</span>
                                    <span class="translate-x-0 dark:translate-x-5 pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                        <i data-lucide="moon" class="w-3 h-3 absolute inset-0 m-auto dark:hidden text-gray-400"></i>
                                        <i data-lucide="sun" class="w-3 h-3 absolute inset-0 m-auto hidden dark:block text-indigo-600"></i>
                                    </span>
                                </button>
                            </div>

                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Email Notifications</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Receive email updates about your courses
                                    </p>
                                </div>
                                <button
                                    type="button"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 bg-indigo-600"
                                >
                                    <span class="sr-only">Enable notifications</span>
                                    <span class="translate-x-5 pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                </button>
                            </div>

                            <div>
                                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Language</h3>
                                <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                                    <option>English</option>
                                    <option>French</option>
                                    <option>German</option>
                                    <option>Spanish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


@endsection
