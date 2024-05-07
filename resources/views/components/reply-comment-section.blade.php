<div class="flex items-start space-x-4 my-5">
    <img class="w-10 h-10 rounded-full" src="{{ $photo == null ? 'https://ui-avatars.com/api/?name=' . $name . '&background=0D8ABC&color=fff&rounded=true&bold=true' : asset(Storage::url($photo)) }}" alt="">
    <div class=" dark:text-white">
        <div class="text-sm font-semibold">
            <span>
                {{ $name }}
            </span>
            @if ($user->hasRole('author'))
            <i class="fa-solid fa-medal"></i>
            @endif
        </div>
        <div class="max-w-xl"><a href="" class="font-semibold text-blue-500"><span>@</span>{{ $replyTo }}</a>
            {{ $reply }}</div>
    </div>
</div>
