<section>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="p-8 bg-white dark:bg-[#303150] rounded shadow-lg">
            <div class="gap-4 text-sm gap-y-2 ">
                <div class="text-gray-600">
                    <p class="text-lg font-medium dark:text-white">{{ __('Perbarui Password') }}</p>
                    <p class="text-zinc-400 mb-4">
                        {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}</p>
                </div>
                <div class="lg:col-span-2">
                    <div class="flex flex-col text-sm gap-y-4">
                        <div class="">
                            <label  for="current_password">Password Saat Ini</label>
                            <input type="password" name="current_password" id="current_password"
                                class="w-full h-10 px-4 mt-1 border border-zinc-200 rounded bg-gray-50 dark:text-zinc-400 " value="" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="">
                            <label for="password">Password Baru</label>
                            <input type="password" name="password" id="password"
                                class="w-full h-10 px-4 mt-1 border border-zinc-200 rounded bg-gray-50 dark:text-black" value="" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>


                        <div class="">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full h-10 px-4 mt-1 border border-zinc-200 rounded bg-gray-50 dark:text-black" value="" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="mt-2 text-right ">
                            <div class="inline-flex items-end">
                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                                <button type="submit"
                                    class="px-4 py-2 font-bold text-white rounded-lg bg-blue-500 hover:bg-blue-600">Ganti
                                    Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</section>
