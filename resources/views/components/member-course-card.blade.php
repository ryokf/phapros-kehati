<div>
    <a href="{{ route('lesson.show', ['id' => $id, 'chapter' => 1]) }}">
        <div
            class="rounded-xl overflow-hidden shadow-lg bg-white h-96 dark:bg-[#303150] dark:text-white dark:shadow-none">
            <img src="{{ asset('storage/' . $photo) }}" class="object-cover w-full h-48" />
            <div class="px-4 py-4">
                <span class="font-semibold text-green-500 dark:text-emerald-500">
                    {{ $price == 0 ? 'Gratis' : 'Rp.' . number_format($price) }} </span>
                <div class="mb-4 text-xs">
                    <a href="{{ route('lesson.show', ['id' => $id, 'chapter' => 1]) }}">
                        <h2 class="text-lg font-medium hover:text-blue-700 dark:hover:text-blue-500">
                            {{ $title }}
                        </h2>
                    </a>

                    <p class="mt-2 text-gray-400">{{ $count }} Lesson</p>
                </div>
                <div class="mb-4 text-left">
                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-semibold">
                        {{ $category }}
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
