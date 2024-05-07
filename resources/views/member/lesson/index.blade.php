<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/c473da0646.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>
        DevLearn
    </title>
</head>

@extends('layouts.layout')

<body class="antialiased text-blueGray-700 dark:bg-[#1B1B36] dark:text-white">
    <!-- hidden switch theme -->
    <div class="hidden">
        <input type="checkbox" class="hidden" id="dark-toggle" />
        <label for="dark-toggle">
            <div class="cursor-pointer rounded-full border border-zinc-500 p-2 !px-3 dark:!px-4">
            <div class="text-xl toggle-icon far fa-sun text-slate-800 dark:text-white ">
        </div>
            </div>
            </label>
        </div>
        <!-- hidden switch theme -->

    <div id="root">
        {{-- Sidebar --}}
        <div
            class="relative z-10 flex flex-wrap items-center justify-between px-6 py-4 bg-white dark:bg-[#303150] shadow-xl md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden md:w-80 ">
            <div
                class="flex flex-wrap items-center w-full px-0 mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap">
                <div class="flex flex-row justify-between w-full md:hidden">
                    <div class="font-semibold text-md">
                        @role('member')
                            <p class="text-xl"><a href="{{ route('course.index') }}"><i class="fas fa-arrow-left"></i></a>
                            </p>
                        @endrole
                        @role('admin')
                            <p class="text-xl"><a href="{{ route('homepage') }}"><i class="fas fa-arrow-left"></i></a>
                            </p>
                        @endrole
                        @role('author')
                            <p class="text-xl"><a href="{{ route('homepage') }}"><i class="fas fa-arrow-left"></i></a>
                            </p>
                        @endrole
                    </div>
                    <div>
                        <p class="text-xl">{{ $course->title }}</p>
                    </div>
                    <button
                        class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
                        type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>


                <div class="flex flex-row w-full gap-1">
                    <div class="w-1/12">
                        @role('member')
                            <p class="hidden mt-2 text-sm font-bold md:text-xl md:block"><a
                                    href="{{ route('course.index') }}"><i class="fas fa-arrow-left"></i></a>
                            </p>
                        @endrole
                        @role('admin')
                            <p class="hidden mt-2 text-sm font-bold md:text-xl md:block"><a
                                    href="{{ route('homepage') }}"><i class="fas fa-arrow-left"></i></a>
                            </p>
                        @endrole
                        @role('author')
                            <p class="hidden mt-2 text-sm font-bold md:text-xl md:block"><a
                                    href="{{ route('homepage') }}"><i class="fas fa-arrow-left"></i></a>
                            </p>
                        @endrole
                    </div>


                    <div class="flex flex-col justify-end w-11/12">
                        <p class="hidden mt-2 text-sm font-bold md:text-xl md:block">{{ $course->title }}</p>
                        @role('member')
                            <p class="hidden text-xs font-semibold text-gray-400 md:block">{{ $completed }} /
                                {{ $totalLessons }} Progress</p>
                            <p class="hidden text-xs font-semibold text-gray-400 md:block">{{ $progressPercentage }}%
                                Complete
                            </p>
                        @endrole
                    </div>

                </div>


                <ul class="flex flex-wrap items-center list-none md:hidden">
                </ul>
                <div class="absolute top-0 left-0 right-0 z-40 items-center flex-1 hidden h-auto overflow-x-hidden overflow-y-auto rounded shadow md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none"
                    id="example-collapse-sidebar">
                    <div class="block border-b border-solid md:min-w-full md:hidden border-blueGray-200">
                        <div class="flex flex-wrap pb-2 border-b border-solid">
                            <div class="w-11/12">
                                <p class="font-semibold ">{{ $course->title }} </p>
                                @role('member')
                                    <p class="text-xs font-semibold text-gray-400 ">{{ $completed }} /
                                        {{ $totalLessons }} Progress</p>
                                    <p class="text-xs font-semibold text-gray-400 ">
                                        {{ $progressPercentage }}% Complete</p>
                                @endrole
                            </div>
                            <div class="flex justify-end w-1/12">
                                <button type="button"
                                    class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
                                    onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <ul class="flex flex-col list-none md:flex-col md:min-w-full">
                        @foreach ($lessons as $lesson)
                            <div class="flex flex-wrap border-b border-solid">
                                <div class="w-10/12 ">
                                    <li class="items-center">
                                        <a href="{{ route('lesson.show', ['id' => $course->id, 'chapter' => $lesson->chapter]) }}"
                                            class=" text-md   py-3  block duration-100
                                               {{ request()->routeIs('lesson.show') && request('id') == $course->id && request('chapter') == $lesson->chapter ? 'text-blueGray-700 hover:text-blueGray-500 hover:ml-2 font-bold' : 'text-blueGray-700 hover:text-blueGray-500 hover:ml-2' }}">
                                            Chapter {{ $lesson->chapter }} - {{ $lesson->title }}
                                        </a>

                                    </li>
                                </div>

                                @role('member')
                                    @if ($lesson->pivot->status == true)
                                        <div class="flex items-center justify-end w-2/12 pr-5 text-green-500 md:pr-0"><i
                                                class="far fa-check-circle"></i>
                                        </div>
                                    @endif
                                    <hr class="mb-1">
                                @endrole
                            </div>
                        @endforeach
                    </ul>
                    <ul>
                        <li>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- EndSidebar --}}
        <div class="relative md:ml-80">

            @foreach ($lesson_detail as $item)
                <div class="w-full px-8 mx-auto mb-8 md:px-16">
                    <p class="my-4 text-xl font-semibold bg-white md:my-8 dark:bg-[#1B1B36]">{{ $item->chapter }} .
                        {{ $item->title }}</p>
                    <div class="flex flex-col items-center justify-center md:flex-row md:space-x-8">
                        <div class="relative w-full h-0" style="padding-bottom: 56.25%;">
                            <iframe class="absolute inset-0 object-cover w-full h-full"
                                src="https://youtube.com/embed/{{ $item->media_link }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="py-2 ">
                        <div class="p-2 mt-2 leading-relaxed ">{!! $item->text_content !!}
                        </div>
                    </div>
                    <div class="flex justify-end w-full">
                        @if ($nextChapter)
                            <form action="{{ route('lesson.next', ['id' => $course->id, 'chapter' => $nextChapter]) }}"
                                method="post">
                                @csrf
                                <input hidden type="text" name="id_lesson" value="{{ $item->id }}">
                                <button type="submit"
                                    class="px-10 py-2 font-bold text-white rounded bg-slate-800 hover:bg-blue-900">Next
                                    Chapter</button>
                            </form>
                        @endif
                        @role('member')
                            @if ($lastChapter)
                                {{-- <form
                                action="{{ route('certificate.index', ['course_id' => $course->id, 'user_id' => Auth::id()]) }}">
                                @csrf
                                <input name="id_lesson" type="number" hidden value="{{ $item->id }}">
                                <button type="submit" class="p-2 text-white rounded-md bg-slate-800">Course
                                    Selesai</button>
                            </form> --}}

                                @if ($totalLessons == $completed)
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="p-2 text-white rounded-md bg-slate-800" type="button">
                                        Download PDF
                                    </button>
                                @endif
                                @if ($existCertificates == null)
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="p-2 text-white rounded-md bg-slate-800" type="button">
                                        Selesaikan Kelas
                                    </button>
                                @endif
                                <div id="popup-modal" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden p-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="text-center p-14">
                                                <span class="text-5xl text-green-500"> <i
                                                        class="far fa-check-circle"></i></span>


                                                @if ($totalLessons == $completed)
                                                    <h3 class="mb-5 text-2xl font-normal text-gray-500 dark:text-gray-400">
                                                        Selamat ! Anda telah menyelesaikan course {{ $course->title }}
                                                    </h3>
                                                    <form action="{{ route('certificate.download') }}" method="post"
                                                        class="inline">
                                                        @csrf
                                                        <input name="course_id" type="number" hidden
                                                            value="{{ $course->id }}">

                                                        <button data-modal-hide="popup-modal" type="submit"
                                                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            Download PDF
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ($existCertificates == null)
                                                    <h3 class="mb-5 text-2xl font-normal text-gray-500 dark:text-gray-400">
                                                        Apakah anda yakin akan menyelesaikan course ini ?
                                                        {{ $course->title }}</h3>
                                                    <form action="{{ route('certificate.index') }}" method="post">
                                                        @csrf
                                                        <input type="text" name="course_id"
                                                            value="{{ $course->id }}" hidden>
                                                        <input type="text" name="id_lesson"
                                                            value="{{ $item->id }}" hidden>
                                                        <button type="submit"
                                                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Selesaikan
                                                            Kelas</button>
                                                    </form>
                                                @endif


                                                <button data-modal-hide="popup-modal" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endrole
                    </div>
                </div>

                <!-- Next button -->
            @endforeach
            {{-- <x-author_footer class="" /> --}}

            <hr>
            <div class="container mt-5">
                <div class="mb-10 ">
                    <h1 class="text-xl font-bold">Forum pembahasan</h1>
                    <p class="text-gray-400">bergabung bersama yang lain dalam membahas materi tersebut, pertanyaan
                        yang
                        anda tanyakan akan segera mentor balas</p>
                </div>
                {{-- @dd($comments) --}}
                @if (count($comments) == 0)
                    <h1 class="my-10 text-xl font-semibold text-center">belum ada diskusi pada materi ini</h1>
                @else
                    @foreach ($comments as $comment)
                        {{-- <x-comment-section :name="$comment->user->name", :photo="$comment->user->photo", :comment="$comment->comment" :userId="$comment->user->id" /> --}}
                        <x-comment-section :id="$comment->id" :userId="$comment->user_id" :name="$comment->user->name" :photo="$comment->user->photo"
                            :comment="$comment->comment" :replyCount="$comment->lessonCommentReply"></x-comment-section>
                    @endforeach
                    <div class="mt-10">
                        {{ $comments->links() }}
                    </div>
                @endif

                <div id="comment-form" class="mt-5">

                    <form action="{{ route('comment.store') }}" method="post" class="flex items-end">
                        @csrf

                        @if (request()->get('replyTo'))
                            <input type="hidden" name="lesson_comment_id" value="{{ request()->get('replyTo') }}">

                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full -mb-3">
                                <div
                                    class="flex items-center justify-between px-2 py-1 mr-2 text-sm font-medium text-gray-800 bg-gray-100 rounded max-w-max dark:bg-gray-700 dark:text-gray-300">
                                    membalas komentar {{ '@' . request()->get('name') }}
                                    <a href="{{ route('lesson.show', ['id' => $course->id, 'chapter' => $lesson_detail['0']->chapter]) . '#comment-form' }}"
                                        class="inline-flex items-center p-1 ml-2 text-sm text-gray-400 bg-transparent rounded-sm hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-gray-300">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                                <input type="text" id="simple-search" name="reply"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="tuliskan balasan anda..." required>
                            </div>

                            <button type="submit"
                                class="p-2.5 ml-2 -mb-3 text-sm font-medium text-white bg-slate-700 rounded-lg border border-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                <i class="fa-regular fa-paper-plane" style="color: #ffffff;"></i>
                                <span class="sr-only">Search</span>
                            </button>
                        @else
                            <input type="hidden" name="lesson_id" value="{{ $id_lesson->id }}">

                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fa-regular fa-message"></i>
                                </div>
                                <input type="text" id="simple-search" name="comment"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="tuliskan komentar anda..." required>
                            </div>

                            <button type="submit"
                                class="p-2.5 ml-2 text-sm font-medium text-white bg-slate-700 rounded-lg border border-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                <i class="fa-regular fa-paper-plane" style="color: #ffffff;"></i>
                                <span class="sr-only">Search</span>
                            </button>
                        @endif

                    </form>

                </div>
            </div>
            <hr class="mt-5">

            <!-- Start Footer Section -->
            <footer class="bg-white dark:bg-[#1B1B36]">
                <div class="container py-16 mx-auto space-y-8 lg:space-y-16">
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                        <div>
                            <div class="h-8">
                                <img src="{{ asset('landingpage/images/logo-dncc.webp') }}" class="h-10 w-25"
                                    alt="" />
                            </div>
                            <p class="max-w-xs pt-3 mt-4 text-sm text-slate-500 dark:text-white">
                                <b>Basecamp DNCC</b>
                                <br>
                                Jl. Nakula 1 No.5-11, Pendrikan Kidul,
                                Kec. Semarang Tengah, Kota Semarang,
                                Jawa Tengah 50131
                            </p>

                            <ul class="flex gap-6 mt-8">

                                <li>
                                    <a href="https://www.instagram.com/dnccsemarang/?hl=id" rel="noreferrer"
                                        target="_blank" class="text-gray-700 transition hover:opacity-75 dark:text-white dark:text-white">
                                        <span class="sr-only">Instagram</span>

                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://www.youtube.com/channel/UCbGj3OU4Qq8KOgaY9zuyZsA"
                                        rel="noreferrer" target="_blank"
                                        class="text-gray-700 transition hover:opacity-75 dark:text-white dark:text-white">
                                        <span class="sr-only">YouTube</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                                        </svg>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://github.com/dnccsemarang" rel="noreferrer" target="_blank"
                                        class="text-gray-700 transition hover:opacity-75 dark:text-white dark:text-white">
                                        <span class="sr-only">GitHub</span>

                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="grid grid-cols-2 gap-8 lg:col-span-2 md:grid-cols-3">
                            <!-- tentang kami -->
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">Tentang Kami</p>

                                <ul class="mt-6 space-y-4 text-sm">
                                    <li>
                                        <a href="#" class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                            Mulai Belajar
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                            Lihat Semua Kursus
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                            Kontak Kami
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://dnccudinus.org/"
                                            class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                            Website Resmi DNCC
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://dinus.ac.id/"
                                            class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                            Website Resmi Universitas
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- kategori -->
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">Kategori</p>

                                <ul class="mt-6 space-y-4 text-sm">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('category.show', [$category->id]) }}"
                                                class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- developer -->
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">Tentang Developer</p>

                                <ul class="mt-6 space-y-4 text-sm">
                                    <li>
                                        <a href="https://github.com/ryokf"
                                            class="flex items-center text-sm text-gray-700 transition hover:opacity-75 dark:text-white">
                                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Ryo Khrisna Fitriawan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/marioapn3"
                                            class="flex items-center text-sm text-gray-700 transition hover:opacity-75 dark:text-white">
                                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Mario Aprilnino Prasetyo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/taliyameyswara"
                                            class="flex items-center text-sm text-gray-700 transition hover:opacity-75 dark:text-white">
                                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Taliya Meyswara
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/isnanramalia"
                                            class="flex items-center text-sm text-gray-700 transition hover:opacity-75 dark:text-white">
                                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Isna Nur Amalia
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <p class="text-xs text-center text-gray-500">
                        &copy; 2023. DNCC. All rights reserved.
                    </p>
                </div>
            </footer>
            <!-- End Footer Section -->
        </div>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script>
        function enableFullscreen() {
            var iframe = document.querySelector('iframe');
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) { // Firefox
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari, Opera
                iframe.webkitRequestFullscreen();
            }
        }
    </script>


    <script>
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
                placement: "bottom-start"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>


</html>
