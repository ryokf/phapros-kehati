<nav
    class="absolute top-0 left-0 w-full z-[99999] bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4 pt-9">
    <div class="flex flex-wrap items-center justify-between w-full px-4 mx-auto md:flex-nowrap md:px-10">
        <div class="">

            <a class="@if (auth()->user()->roles[0]['name'] != 'member')  @endif text-lg uppercase hidden lg:inline-block font-medium"
                href="">
                Dashboard {{ request()->user()->roles[0]['name'] }}
            </a>
            <div class="@if (auth()->user()->roles[0]['name'] != 'member')  @endif hidden lg:block dark:text-zinc-400">
                Selamat Datang, {{ auth()->user()->name }}
            </div>
        </div>
        <div class="flex gap-2">
            <ul>
                <!-- tombol switch theme -->
                <div class="hidden my-auto md:block">
                    <input type="checkbox" class="hidden" id="dark-toggle" />
                    <label for="dark-toggle">
                        <div class="cursor-pointer rounded-full border border-zinc-500 p-2 !px-3 dark:!px-4">
                            <div class="text-xl toggle-icon far fa-sun text-slate-800 dark:text-white ">
                            </div>
                        </div>
                    </label>
                </div>
                <!-- end tombol switch theme -->
            </ul>
            <ul class="flex-col items-center hidden list-none md:flex-row md:flex">
                <a class="block cursor-pointer text-blueGray-500" onclick="openDropdown(event,'user-dropdown')">
                    <div class="flex items-center">
                        <span
                            class="inline-flex items-center justify-center w-12 h-12 text-sm rounded-full 0 bg-blueGray-200">
                            <img alt="..."
                                class="w-12 h-12 align-middle border border-white rounded-full shadow-lg"
                                src="{{ Auth::user()->photo == null ? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&background=0D8ABC&color=fff&rounded=true&bold=true' : asset(Storage::url(Auth::user()->photo)) }}">

                        </span>
                    </div>
                </a>
                <div class="z-[9999999999] hidden float-left py-2 text-base text-left list-none bg-white rounded shadow-lg min-w-48"
                    id="user-dropdown">
                    <span
                        class="block w-full px-4 py-2 text-sm font-bold bg-transparent whitespace-nowrap text-blueGray-700">{{ auth()->user()->name }}
                    </span>
                    <span
                        class="block w-full px-4 pb-2 text-sm font-normal text-gray-400 bg-transparent whitespace-nowrap">{{ auth()->user()->email }}
                    </span>
                    <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <a href="/profile"
                        class="block w-full px-4 py-2 text-sm font-normal text-center bg-transparent whitespace-nowrap hover:bg-gray-100">profile
                    </a>
                    <span data-modal-target="popup-modal-logout" data-modal-toggle="popup-modal-logout"
                        class="block w-full px-4 py-2 text-sm font-normal text-center text-red-500 bg-transparent cursor-pointer whitespace-nowrap text-blueGray-700 hover:bg-red-100">logout
                    </span>
                </div>
            </ul>
            <form class="flex-row flex-wrap items-center hidden mr-3 md:flex lg:ml-auto">
                <div class="relative flex w-full flex-wrap items-stretch text-lg font-medium">
                    {{ auth()->user()->name }}</div>
            </form>
        </div>
    </div>
</nav>


<div id="popup-modal-logout" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-logout">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">

                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">anda yakin ingin melakukan logout?
                </h3>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" data-modal-hide="popup-modal-logout" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        logout
                    </button>
                    <button data-modal-hide="popup-modal-logout" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
