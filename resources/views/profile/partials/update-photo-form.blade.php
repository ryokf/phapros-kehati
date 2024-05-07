<section>
    <form method="post" action="{{ route('profile.update.photo') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="p-4 p-8 px-4 mb-6 bg-white rounded shadow-lg dark:bg-[#303150]">
            <div class="gap-4 text-sm gap-y-2 ">
                <div class="text-gray-600">
                    <p class="text-lg font-medium dark:text-white">{{ __('Edit Profile Photo') }}</p>

                </div>
                <div class="">
                    @if (session('success'))
                        <div class="p-3 mb-4 text-green-800 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">

                            <p> {{ __('Update Your Profile Photo') }}</p>
                            <div class="w-48 h-48 mx-auto bg-white shadow-lg rounded-xl dark:bg-[#303150]">
                                <img id="photo-preview" src="{{ Auth::user()->photo == null ? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&background=0D8ABC&color=fff&rounded=true&bold=true' : asset(Storage::url(Auth::user()->photo)) }}"

                                    alt="Foto Profil" class="object-cover w-48 h-48">
                            </div>

                            <div class="my-3">
                                <input
                                    class="relative m-0 block w-full min-w-0 flex-auto rounded-lg border border-solid border-zinc-200 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                    type="file" id="photo" name="photo" accept="image/*"
                                    onchange="previewPhoto(event)" />
                            </div>
                        </div>

                        <button type="submit"
                            class="px-4 py-2 font-bold text-white rounded-lg bg-blue-500 hover:bg-slate-900 focus:outline-none focus:shadow-outline">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </form>
    <script>
        function previewPhoto(event) {
            const preview = document.getElementById('photo-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = function() {
                URL.revokeObjectURL(preview.src);
            };
        }
    </script>
</section>
