<nav class="fixed top-2 z-50 w-full bg-blue-500 rounded-lg">
    <div class="px-5 py-2 lg:px-7">
        <div class="flex items-center justify-between">

            <!-- Logo -->
            <div class="flex items-center justify-start rtl:justify-end">
                <a href="#">
                    <img src="/images/logo_emonaya.jpg" alt="Logo" class="h-12 w-14 rounded-lg">
                </a>
                <p class="text-white text-lg font-medium truncate px-2">
                    C.S EMONAYA
                </p>
            </div>

            <!-- Barre de recherche -->
            <div class="relative md:block">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar"
                    class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Recherche...">
            </div>

            <!-- Profil utilisateur -->
            <div class="flex items-center">
                <div class="flex items-center ms-3 relative">

                    <!-- Image de profil avec badge -->
                    <label for="profile_photo_path" class="cursor-pointer">
                        <img
                            src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) . '?' . time() : asset('images/logo_emonaya.jpg') }}"
                            alt="Profile"
                            class="w-12 h-13 rounded-full cursor-pointer"
                            title="Changer l'image de profil"
                            data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
                        />
                    </label>

                    <!--dropdown informations profile-->
                    <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">

                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white hover:bg-gray-100 ">
                        <div>Nom</div>
                        <div class="font-medium truncate">{{ Auth::user()->name }}</div>
                    </div>

                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white hover:bg-gray-100 ">
                        <div>Role</div>
                        <div class="font-medium truncate">{{ Auth::user()->role }}</div>
                    </div>

                    <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" onclick="document.getElementById('profile_photo_upload').click();"
                            title="Changer l'image de profil">
                            Changer le profile
                    </a>
                    </div>

                    <div class="py-1">
                    <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se deconnecter</a>
                    </div>
                </div>

                    <!-- Informations utilisateur -->
                    <div class="text-xl ms-5">
                        <div class="font-semibold text-white">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="text-sm text-white">
                            {{ ucfirst(Auth::user()->role) }}
                        </div>
                    </div>

                    <!-- Formulaire invisible d'upload -->
                    <form id="profile_photo_path_form" action="{{ route('profile.updateImage') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="profile_photo_upload" name="profile_image" class="hidden"
                            onchange="document.getElementById('profile_photo_path_form').submit();"
                            accept="image/*">
                    </form>

                </div>
            </div>

        </div>
    </div>
</nav>
