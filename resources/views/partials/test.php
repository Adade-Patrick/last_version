navbar amelioré
<aside
  id="logo-sidebar"
  class="fixed top-2 left-0 z-40 w-64 h-screen pt-16 -translate-x-full sm:translate-x-2
         bg-white/80 backdrop-blur-lg border border-gray-100 rounded-2xl shadow-lg
         transition-transform duration-300 dark:bg-gray-800 dark:border-gray-700"
  aria-label="Sidebar"
>
  <div class="h-full px-4 py-3 overflow-y-auto">
    <ul class="space-y-3">

      {{-- Tableau de bord --}}
      <li>
        <a href="{{ route('dashboard') }}"
           class="flex items-center p-2.5 text-gray-700 rounded-xl hover:bg-blue-50
                  dark:text-white dark:hover:bg-gray-700 transition-all duration-150"
        >
          <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20 20C20 20.5523 19.552 21 19 21H5C4.448 21 4 20.552 4 20V11H1L11.328 1.612C11.709 1.265 12.291 1.265 12.672 1.612L23 11H20V20Z" />
          </svg>
          <span class="ml-3 font-medium">Tableau de bord</span>
        </a>
      </li>

      <div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent dark:via-gray-700"></div>

      {{-- Données de base --}}
      <li x-data="{ openBase: false }">
        <button @click="openBase = !openBase"
                class="flex items-center justify-between w-full p-2.5 text-gray-700 rounded-xl
                       hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700
                       transition-all duration-150"
        >
          <div class="flex items-center">
            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M11 2.049V13h10.951c-.501 5.053-4.765 9-10.951 9C6.477 22 2 17.523 2 12c0-5.185 4.767-9.736 9-9.951z"/>
            </svg>
            <span class="ml-3 font-medium">Données de base</span>
          </div>
          <svg class="w-4 h-4 transition-transform duration-200"
               :class="{ 'rotate-180': openBase }"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <polyline points="6 9 12 15 18 9"/>
          </svg>
        </button>
        <ul x-show="openBase" x-transition class="mt-2 space-y-1 px-2">
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Année scolaire</span>
            </a>
          </li>
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Classes</span>
            </a>
          </li>
        </ul>
      </li>

      {{-- Traitements --}}
      <li x-data="{ openTreat: false }">
        <button @click="openTreat = !openTreat"
                class="flex items-center justify-between w-full p-2.5 text-gray-700 rounded-xl
                       hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700
                       transition-all duration-150"
        >
          <div class="flex items-center">
            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M16 16a3 3 0 110 6 3 3 0 010-6z"/>
              <path d="M6 12a4 4 0 110 8h12v-8H6z"/>
            </svg>
            <span class="ml-3 font-medium">Traitements</span>
          </div>
          <svg class="w-4 h-4 transition-transform duration-200"
               :class="{ 'rotate-180': openTreat }"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <polyline points="6 9 12 15 18 9"/>
          </svg>
        </button>
        <ul x-show="openTreat" x-transition class="mt-2 space-y-1 px-2">
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Élèves</span>
            </a>
          </li>
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Professeurs</span>
            </a>
          </li>
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Cours</span>
            </a>
          </li>
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Évaluations</span>
            </a>
          </li>
        </ul>
      </li>

      {{-- Administration --}}
      <li x-data="{ openAdmin: false }">
        <button @click="openAdmin = !openAdmin"
                class="flex items-center justify-between w-full p-2.5 text-gray-700 rounded-xl
                       hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700
                       transition-all duration-150"
        >
          <div class="flex items-center">
            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 14v8H4v-8h8z"/>
              <path d="M12 2v8h8V2h-8z"/>
            </svg>
            <span class="ml-3 font-medium">Administration</span>
          </div>
          <svg class="w-4 h-4 transition-transform duration-200"
               :class="{ 'rotate-180': openAdmin }"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <polyline points="6 9 12 15 18 9"/>
          </svg>
        </button>
        <ul x-show="openAdmin" x-transition class="mt-2 space-y-1 px-2">
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Utilisateurs</span>
            </a>
          </li>
          <li>
            <a href="#"
               class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-blue-50
                      dark:text-gray-300 dark:hover:bg-gray-700 transition-all duration-150"
            >
              <span class="ml-3 font-medium">Rôles</span>
            </a>
          </li>
        </ul>
      </li>

      <div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent dark:via-gray-700"></div>

      {{-- Statistiques --}}
      <li>
        <a href="#"
           class="flex items-center p-2.5 text-gray-700 rounded-xl hover:bg-blue-50
                  dark:text-white dark:hover:bg-gray-700 transition-all duration-150"
        >
          <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M5 3v16h16v2H3V3h2z"/>
            <path d="M8 12h3v7H8v-7zM13 9h3v10h-3V9zM18 5h3v14h-3V5z"/>
          </svg>
          <span class="ml-3 font-medium">Statistiques</span>
        </a>
      </li>

      {{-- Notifications --}}
      <li>
        <a href="#"
           class="flex items-center p-2.5 text-gray-700 rounded-xl hover:bg-blue-50
                  dark:text-white dark:hover:bg-gray-700 transition-all duration-150"
        >
          <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
            <path d="M12 16h0M12 8v4"/>
          </svg>
          <span class="ml-3 font-medium">Notifications</span>
        </a>
      </li>

      <div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent dark:via-gray-700"></div>

      {{-- Déconnexion --}}
      <li>
        <form method="POST" action="#">
          @csrf
          <button type="submit"
                  class="flex items-center w-full p-2.5 text-red-600 rounded-xl hover:bg-red-50
                         dark:text-red-400 dark:hover:bg-gray-700 transition-all duration-150"
          >
            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M16 17l5-5-5-5M21 12H9"/>
              <path d="M4 4h8v16H4z"/>
            </svg>
            <span class="ml-3 font-medium">Déconnexion</span>
          </button>
        </form>
      </li>

    </ul>
  </div>
</aside>
