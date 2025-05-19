<aside id="logo-sidebar" class="fixed top-9 left-0 z-40 w-60 h-full pt-16 transition-transform -translate-x-full bg-gray-100 from-gray via-blue-500 to-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-500 dark:focus:ring-blue-500 font-medium  border-r border-gray-200 sm:translate-x-0 dark:bg-gray-500 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-2 py-4 pb-4 overflow-y-auto bg-gradient-to-r from-blue-500 via-blue-500 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg">
        <ul class="space-y-4 font-medium">
            <!--dashboard-->
             <li>
                <a href="{{ route('int_prof.dashboard') }}" class="cursor-pointer group font-bold shadow-2xl hover:scale-110 transition active:scale-90 flex items-center w-full p-2 text-base text-white rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-gray-700">
                 <svg class="shrink-0 w-5 h-5 text-green-300 transition duration-75 dark:text-gray-400 dark:group-hover:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11H1L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11H20V20ZM18 19V9.15745L12 3.7029L6 9.15745V19H18ZM12 17L8.64124 13.6412C7.76256 12.7625 7.76256 11.3379 8.64124 10.4592C9.51992 9.58056 10.9445 9.58056 11.8232 10.4592L12 10.636L12.1768 10.4592C13.0555 9.58056 14.4801 9.58056 15.3588 10.4592C16.2374 11.3379 16.2374 12.7625 15.3588 13.6412L12 17Z"></path></svg>
                 <span class="ms-3 font-extrabold">Tableau de bord</span>
                </a>
             </li>

           <!--Mes cours-->
            <li>
                <a href="{{ route('int_prof.cours') }}" class="cursor-pointer group font-bold shadow-2xl hover:scale-110 transition active:scale-90 flex items-center w-full p-2 text-base text-white rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-gray-700 ">
                <svg class="shrink-0 w-6 h-6 text-green-300 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
                <span class="ms-3 font-extrabold">Mes Cours</span>
                </a>
            </li>

            <!--Créer cours-->
            <li>
                <a href="{{ route('int_prof.creer_cours') }}" class="cursor-pointer group font-bold shadow-2xl hover:scale-110 transition active:scale-90 flex items-center w-full p-2 text-base text-white rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-gray-700">
                    <svg class="shrink-0 w-6 h-6 text-green-300 transition duration-75 dark:text-gray-400 dark:group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <span class="ms-3 font-extrabold">Créer cours</span>
                </a>
            </li>

            <!--Mes classes-->
            <li>
                <a href="#" class="cursor-pointer group font-bold shadow-2xl hover:scale-110 transition active:scale-90 flex items-center w-full p-2 text-base text-white rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-gray-700">
                    <svg  class="shrink-0 w-6 h-6 text-green-300 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                    <span class="ms-3 font-extrabold">Mes Classes</span>
                </a>
            </li>

            <!--Evaluation-->
            <li>
                <a href="#" class="cursor-pointer group font-bold shadow-2xl hover:scale-110 transition active:scale-90 flex items-center w-full p-2 text-base text-white rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-gray-700">
                    <svg class="shrink-0 w-5 h-5 text-green-300 transition duration-75 dark:text-whith-400  dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>
                    <span class="ms-3 font-extrabold">Evaluation</span>
                </a>
            </li>

            <!-- Notification-->
            <li>
                <a href="#" class="cursor-pointer group font-bold shadow-2xl hover:scale-110 transition active:scale-90 flex items-center w-full p-2 text-base text-white rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-gray-700">
                    <svg class="shrink-0 w-5 h-5 text-green-300 transition duration-75 dark:text-whith-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11 14.0619V20H13V14.0619C16.9463 14.554 20 17.9204 20 22H4C4 17.9204 7.05369 14.554 11 14.0619ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
                    <span class="ms-3 font-extrabold">Notifications</span>
                </a>
            </li>

            <!--Parametre-->
            <li>
                <a href="{{ route('int_prof.parametre') }}" class="cursor-pointer group font-bold shadow-2xl hover:scale-110 transition active:scale-90 flex items-center w-full p-2 text-base text-white rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-gray-700">
                    <svg class="shrink-0 w-5 h-5 text-green-300 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M13 21V23.5L10 21.5L7 23.5V21H6.5C4.567 21 3 19.433 3 17.5V5C3 3.34315 4.34315 2 6 2H20C20.5523 2 21 2.44772 21 3V20C21 20.5523 20.5523 21 20 21H13ZM7 19V17H13V19H19V16H6.5C5.67157 16 5 16.6716 5 17.5C5 18.3284 5.67157 19 6.5 19H7ZM7 5V7H9V5H7ZM7 8V10H9V8H7ZM7 11V13H9V11H7Z"></path>
                    </svg>
                    <span class="ms-3 font-extrabold">Parametre</span>
                </a>
            </li>
        </ul>
    </div>
 </aside>

