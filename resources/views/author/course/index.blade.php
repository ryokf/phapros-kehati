@extends('layouts.layout')

@section('body')
    {{-- @dd($sorts) --}}
    <x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <!-- Header -->
        <x-dashboard-header></x-dashboard-header>
        <div class="relative pt-12 pb-32 md:pt-32">
        </div>
        <div class="w-full px-4 mx-auto md:px-10 -m-36">
            <div class="flex flex-wrap mt-4">
                <div class="w-full px-4 mb-12">
                    <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white dark:bg-[#303150] dark:text-white rounded shadow-lg">
                        <div class="px-4 py-3 mb-0 border-0 rounded-t">
                            <div class="flex flex-wrap items-center">
                                <div class="relative flex flex-wrap justify-between flex-1 flex-grow w-full max-w-full px-4">
                                    <div class="text-lg font-semibold text-blueGray-700">
                                        <form class="flex items-center" action="{{ route('course.index') }}" method="get">
                                            <label for="simple-search" class="sr-only">Search</label>
                                            <div class="relative w-full">

                                                <input type="text" id="simple-search" name="search"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="cari nama kursus..." required>
                                            </div>
                                            <button type="submit"
                                                class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-500 rounded-lg  hover:bg-neutral-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                                <span class="sr-only">Search</span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="flex">
                                        <x-dropdown-button :sorts="$sorts" buttonColor="bg-blue-500" textColor="text-white"> urutkan </x-dropdown-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            @if (session('success'))
                                <x-alert bgColor="bg-green-400"> {{ session('success') }}</x-alert>
                            @endif
                            <!-- Projects table -->
                            <table class="items-center w-full bg-transparent border-collapse dark:text-black">
                                <thead>
                                    <tr class="dark:text-white">
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            No.
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Kursus
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            kategori
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            status
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            harga
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left text-center uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            jumlah peserta
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $number => $course)
                                        {{-- @dd($course) --}}
                                        @if ($course['is_public'])
                                            {{-- <x-course-list :id="$course['id']"
                                                number="{{ $number + 1 + ((request()->query()['page'] ?? 1) - 1) * 10 }}"
                                                title="{{ $course['title'] }}" category="{{ $course['category']['name'] }}"
                                                price="{{ $course['price'] }}" status="{{ $course['status'] }}"
                                                member="{{ count($course['userCourse']) }}"></x-course-list> --}}
                                                <tr class="dark:text-zinc-400">
                                                    <th class="w-8 text-center">
                                                        {{ $number + 1 + ((request()->query()['page'] ?? 1) - 1) * 10 }}
                                                    </th>
                                                    <th
                                                        class="flex items-center max-w-sm p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0">
                                                        <img src="{{ asset('storage/' . $course['photo']) }}" class="object-cover w-12 h-12 bg-white border rounded" alt="..." />
                                                        <span class="ml-3 font-bold whitespace-normal text-blueGray-600 dark:text-white">
                                                            {{ $course['title'] }}
                                                        </span>
                                                    </th>
                                                    <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                        {{ $course['category']['name'] }}
                                                    </td>
                                                    <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0  whitespace-nowrap">
                                                        <i class="fas fa-circle
                                                        @if ($course['status'] == 'berjalan')
                                                        {{ 'text-amber-400' }}
                                                        @elseif ($course['status'] == 'selesai')
                                                        {{ 'text-emerald-500' }}
                                                        @else
                                                    {{ 'text-red-600' }}
                                                        @endif

                                                        mr-2"></i>
                                                        {{ $course['status'] }}
                                                    </td>
                                                    <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                        {{ $course['price'] }}
                                                    </td>
                                                    <td class="p-4 px-6 text-xs text-center align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                        {{ count($course['userCourse']) }}
                                                    </td>
                                                    <td class="p-4 px-6 text-xs align-left whitespace-nowrap dark:border-[#1b1b36]">
                                                        <div class="inline-flex rounded-md" role="group">
                                                            <div class="rounded-l-lg bg-emerald-500" title="lihat detail kursus">
                                                                <a href="{{ url('course-show/' . $course['id']) }}"
                                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border rounded-l-lg border-emerald-500 focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white  dark:text-white dark:hover:text-white dark:focus:bg-gray-700">
                                                                    <i class="fa-solid fa-scroll" style="color: #fafaf9;"></i>
                                                                </a>
                                                            </div>
                                                            <div class="bg-amber-500" title="edit kursus">
                                                                <a href="{{ url('course-edit/' . $course['id'])}}"
                                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-amber-500 focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white  dark:text-white dark:hover:text-white dark:focus:bg-gray-700">
                                                                    <i class="fa-solid fa-pen-to-square" style="color: #fafaf9;"></i>
                                                                </a>
                                                            </div>
                                                            <div class="bg-red-600 rounded-r-md" title="hapus kursus">
                                                                <button type="button" type="button" data-modal-target="popup-modal-delete-{{ $course['id'] }}"
                                                                    data-modal-toggle="popup-modal-delete-{{ $course['id'] }}"
                                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-red-600 rounded-r-md focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white  dark:text-white dark:hover:text-white dark:focus:bg-gray-700">
                                                                    <i class="fa-solid fa-trash-can" style="color: #fafaf9;"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                {{-- modal hapus --}}
                                                <div id="popup-modal-delete-{{ $course['id'] }}" tabindex="-1"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="popup-modal-delete-{{ $course['id'] }}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-6 text-center">
                                                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">anda yakin ingin menghapus kursus
                                                                    <b>{{ $course['title'] }}</b>
                                                                </h3>
                                                                <form action="{{ route('course.delete') }}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <input type="hidden" name="id" value="{{ $course['id'] }}">
                                                                    <button data-modal-hide="popup-modal-delete-{{ $course['id'] }}" type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                        iyah
                                                                    </button>
                                                                </form>
                                                                <button data-modal-hide="popup-modal-delete-{{ $course['id'] }}" type="button"
                                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="flex justify-center py-6">

                                {{ $courses->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col w-full min-w-0 mb-6 break-words rounded shadow-lg bg-amber-100">
                        <div class="px-4 py-3 mb-0 border-0 rounded-t">
                            <div class="flex flex-wrap items-center">
                                <div
                                    class="relative flex flex-wrap justify-between flex-1 flex-grow w-full max-w-full px-4">
                                    <div class="text-lg font-semibold text-blueGray-700 dark:text-black">
                                        <h3>Daftar Kursus yang disimpan</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto dark:text-black">
                            <!-- Projects table -->
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">

                                            No.
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Kursus
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            kategori
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            status
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            harga
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left text-center uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            jumlah peserta
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($draft_courses as $number => $course)
                                        @if (!$course->is_public)
                                        <tr>
                                            <th class="w-8 text-center">
                                                {{ $number + 1 + ((request()->query()['page'] ?? 1) - 1) * 10 }}
                                            </th>
                                            <th
                                                class="flex items-center max-w-sm p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0">
                                                <img src="{{ asset('storage/' . $course['photo']) }}" class="object-cover w-12 h-12 bg-white border rounded" alt="..." />
                                                <span class="ml-3 font-bold whitespace-normal text-blueGray-600">
                                                    {{ $course['title'] }}
                                                </span>
                                            </th>
                                            <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                {{ $course['category']['name'] }}
                                            </td>
                                            <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                <i class="fas fa-circle
                                                @if ($course['status'] == 'berjalan')
                                                {{ 'text-amber-400' }}
                                                @elseif ($course['status'] == 'selesai')
                                                {{ 'text-emerald-500' }}
                                                @else
                                            {{ 'text-red-600' }}
                                                @endif

                                                mr-2"></i>
                                                {{ $course['status'] }}
                                            </td>
                                            <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                {{ $course['price'] }}
                                            </td>
                                            <td class="p-4 px-6 text-xs text-center align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                {{ count($course['userCourse']) }}
                                            </td>
                                            <td class="p-4 px-6 text-xs align-left whitespace-nowrap">
                                                <div class="inline-flex rounded-md" role="group">
                                                    <div class="rounded-l-lg bg-emerald-500" title="lihat detail kursus">
                                                        <a href="{{ url('course-show/' . $course['id']) }}"
                                                            class="flex inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border rounded-l-lg border-emerald-500 focus:z-10 focus:ring-2 focus:ring-gray-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                            <i class="fa-solid fa-scroll" style="color: #fafaf9;"></i>
                                                        </a>
                                                    </div>
                                                    <div class="bg-amber-500" title="edit kursus">
                                                        <a href="{{ url('course-edit/' . $course['id'])}}"
                                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-amber-500 focus:z-10 focus:ring-2 focus:ring-gray-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                            <i class="fa-solid fa-pen-to-square" style="color: #fafaf9;"></i>
                                                        </a>
                                                    </div>
                                                    <div class="bg-red-600 rounded-r-md" title="hapus kursus">
                                                        <button type="button" type="button" data-modal-target="popup-modal-delete-{{ $course['id'] }}"
                                                            data-modal-toggle="popup-modal-delete-{{ $course['id'] }}"
                                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-red-600 rounded-r-md focus:z-10 focus:ring-2 focus:ring-gray-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                            <i class="fa-solid fa-trash-can" style="color: #fafaf9;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- modal hapus --}}
                                        <div id="popup-modal-delete-{{ $course['id'] }}" tabindex="-1"
                                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="popup-modal-delete-{{ $course['id'] }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">anda yakin ingin menghapus kursus
                                                            <b>{{ $course['title'] }}</b>
                                                        </h3>
                                                        <form action="{{ route('course.delete') }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="id" value="{{ $course['id'] }}">
                                                            <button data-modal-hide="popup-modal-delete-{{ $course['id'] }}" type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                iyah
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="popup-modal-delete-{{ $course['id'] }}" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="flex justify-center">
                                {{-- {{ $draft_courses->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <x-author_footer>

            </x-author_footer> --}}

        </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
        /* Make dynamic date appear */
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById("get-current-year").innerHTML =
                    new Date().getFullYear();
            }
        })();
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start",
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
@endsection
