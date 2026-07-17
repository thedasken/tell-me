@php
    $stats = [
        [
            'label' => __('Entries this month'),
            'value' => '18',
            'change' => '+12%',
            'caption' => __('vs. last month'),
            'icon' => 'book-open',
        ],
        [
            'label' => __('Current streak'),
            'value' => '7',
            'change' => __('days'),
            'caption' => __('Your best is 14 days'),
            'icon' => 'fire',
        ],
        [
            'label' => __('Words written'),
            'value' => '4,280',
            'change' => '+18%',
            'caption' => __('vs. last month'),
            'icon' => 'pencil-square',
        ],
        [
            'label' => __('Average mood'),
            'value' => '4.2',
            'change' => '/ 5',
            'caption' => __('A thoughtful month'),
            'icon' => 'sparkles',
        ],
    ];

    $activity = [
        ['day' => 'Mon', 'height' => 'h-12', 'entries' => 2],
        ['day' => 'Tue', 'height' => 'h-20', 'entries' => 4],
        ['day' => 'Wed', 'height' => 'h-8', 'entries' => 1],
        ['day' => 'Thu', 'height' => 'h-28', 'entries' => 6],
        ['day' => 'Fri', 'height' => 'h-16', 'entries' => 3],
        ['day' => 'Sat', 'height' => 'h-24', 'entries' => 5],
        ['day' => 'Sun', 'height' => 'h-10', 'entries' => 2],
    ];

    $recentEntries = [
        [
            'date' => 'Today, 9:24 AM',
            'title' => 'A slower morning',
            'excerpt' => 'I made space for a quiet start and noticed how much better the day felt...',
            'mood' => 'Calm',
            'moodTone' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-300',
            'words' => '248 words',
        ],
        [
            'date' => 'Yesterday, 8:47 PM',
            'title' => 'Small wins count',
            'excerpt' => 'Finished the thing I had been putting off. It was smaller than I expected...',
            'mood' => 'Proud',
            'moodTone' => 'bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-300',
            'words' => '186 words',
        ],
        [
            'date' => 'June 15, 7:12 PM',
            'title' => 'What I want to remember',
            'excerpt' => 'The long walk, the warm light through the windows, and the conversation after dinner...',
            'mood' => 'Grateful',
            'moodTone' => 'bg-sky-100 text-sky-700 dark:bg-sky-950 dark:text-sky-300',
            'words' => '312 words',
        ],
    ];
@endphp

<x-layouts::app :title="__('Dashboard')">
    <div class="mx-auto flex w-full max-w-7xl flex-1 flex-col gap-8">
        <header class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <div class="space-y-2">
                <p class="text-sm font-medium uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">
                    {{ __('Your journal') }}
                </p>
                <div>
                    {{-- Change message according to the time of the day (timezone aware) --}}
                    <h1 class="text-3xl font-semibold tracking-tight text-zinc-950 dark:text-white sm:text-4xl">
                        {{ __('Good morning, :name.', ['name' => auth()->user()->name]) }}
                    </h1>
                    <p class="mt-2 text-zinc-600 dark:text-zinc-400">
                        {{ __('Take a moment to check in with yourself.') }}
                    </p>
                </div>
            </div>

            <flux:button variant="primary" icon="plus">
                {{ __('New entry') }}
            </flux:button>
        </header>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="{{ __('Journal overview') }}">
            @foreach ($stats as $stat)
                <article
                    class="rounded-2xl border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900">
                    <div class="flex items-start justify-between gap-4">
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $stat['label'] }}</p>
                        <span
                            class="flex size-9 items-center justify-center rounded-xl bg-zinc-100 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-200">
                            <flux:icon :name="$stat['icon']" class="size-4" />
                        </span>
                    </div>
                    <div class="mt-5 flex items-baseline gap-2">
                        <p class="text-3xl font-semibold tracking-tight text-zinc-950 dark:text-white">
                            {{ $stat['value'] }}</p>
                        <span class="text-sm font-medium text-zinc-500 dark:text-zinc-400">{{ $stat['change'] }}</span>
                    </div>
                    <p class="mt-1 text-xs text-zinc-400 dark:text-zinc-500">{{ $stat['caption'] }}</p>
                </article>
            @endforeach
        </section>

        <section class="grid gap-6 xl:grid-cols-[minmax(0,1.35fr)_minmax(20rem,0.65fr)]">
            <article
                class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-semibold text-zinc-950 dark:text-white">{{ __('Your rhythm') }}</h2>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                            {{ __('Entries over the last 7 days') }}</p>
                    </div>
                    <span
                        class="rounded-full bg-zinc-100 px-3 py-1 text-xs font-medium text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300">
                        {{ __('This week') }}
                    </span>
                </div>

                <div class="mt-8 flex h-48 items-end justify-between gap-3 border-b border-zinc-200 pb-8 dark:border-zinc-800"
                    aria-label="{{ __('Journal entries by day') }}">
                    @foreach ($activity as $item)
                        <div class="flex h-full flex-1 flex-col items-center justify-end gap-3">
                            <span
                                class="text-xs font-medium text-zinc-500 dark:text-zinc-400">{{ $item['entries'] }}</span>
                            <div class="{{ $item['height'] }} w-full max-w-10 rounded-t-lg bg-zinc-900 transition dark:bg-zinc-100"
                                title="{{ $item['entries'] }} {{ __('entries') }}"></div>
                            <span class="text-xs text-zinc-400 dark:text-zinc-500">{{ $item['day'] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 flex items-center gap-2 text-sm text-zinc-500 dark:text-zinc-400">
                    <span class="size-2 rounded-full bg-zinc-900 dark:bg-zinc-100"></span>
                    {{ __('You wrote in your journal 6 days this week.') }}
                </div>
            </article>

            <article
                class="relative overflow-hidden rounded-2xl bg-zinc-900 p-6 text-white shadow-xs dark:bg-zinc-100 dark:text-zinc-900 sm:p-7">
                <div
                    class="absolute -right-12 -top-16 size-48 rounded-full border border-white/10 dark:border-zinc-900/10">
                </div>
                <div
                    class="absolute -bottom-20 -right-2 size-56 rounded-full border border-white/10 dark:border-zinc-900/10">
                </div>
                <div class="relative flex h-full flex-col">
                    <span class="flex size-10 items-center justify-center rounded-xl bg-white/10 dark:bg-zinc-900/10">
                        <flux:icon name="sparkles" class="size-5" />
                    </span>
                    <div class="mt-8">
                        <p class="text-sm font-medium text-white/60 dark:text-zinc-900/60">{{ __('Daily prompt') }}</p>
                        <h2 class="mt-3 text-2xl font-semibold leading-tight">{{ __('What felt meaningful today?') }}
                        </h2>
                        <p class="mt-4 text-sm leading-6 text-white/65 dark:text-zinc-900/65">
                            {{ __('A few honest lines can help you notice the moments you might otherwise miss.') }}
                        </p>
                    </div>
                    <div class="mt-auto pt-10">
                        <flux:button variant="ghost"
                            class="!bg-white !text-zinc-900 hover:!bg-zinc-100 dark:!bg-zinc-900 dark:!text-white dark:hover:!bg-zinc-800">
                            {{ __('Reflect on this') }}
                            <span aria-hidden="true">→</span>
                        </flux:button>
                    </div>
                </div>
            </article>
        </section>

        <section class="grid gap-6 xl:grid-cols-[minmax(0,1.35fr)_minmax(20rem,0.65fr)]">
            <article
                class="rounded-2xl border border-zinc-200 bg-white shadow-xs dark:border-zinc-800 dark:bg-zinc-900">
                <div
                    class="flex items-center justify-between gap-4 border-b border-zinc-200 px-6 py-5 dark:border-zinc-800 sm:px-7">
                    <div>
                        <h2 class="text-lg font-semibold text-zinc-950 dark:text-white">{{ __('Recent entries') }}</h2>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ __('Your latest reflections') }}
                        </p>
                    </div>
                    <a href="#"
                        class="text-sm font-medium text-zinc-600 transition hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-white">
                        {{ __('View all') }}
                    </a>
                </div>

                <div class="divide-y divide-zinc-100 dark:divide-zinc-800">
                    @foreach ($recentEntries as $entry)
                        <article
                            class="flex flex-col gap-4 px-6 py-5 sm:flex-row sm:items-start sm:justify-between sm:px-7">
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2 text-xs text-zinc-400 dark:text-zinc-500">
                                    <span>{{ $entry['date'] }}</span>
                                    <span aria-hidden="true">·</span>
                                    <span>{{ $entry['words'] }}</span>
                                </div>
                                <h3 class="mt-2 text-base font-semibold text-zinc-900 dark:text-white">
                                    {{ $entry['title'] }}</h3>
                                <p class="mt-1 max-w-2xl truncate text-sm text-zinc-500 dark:text-zinc-400">
                                    {{ $entry['excerpt'] }}</p>
                            </div>
                            <span
                                class="shrink-0 self-start rounded-full px-2.5 py-1 text-xs font-medium {{ $entry['moodTone'] }}">{{ $entry['mood'] }}</span>
                        </article>
                    @endforeach
                </div>
            </article>

            <article
                class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900 sm:p-7">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-semibold text-zinc-950 dark:text-white">{{ __('This month') }}</h2>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ __('A little perspective') }}</p>
                    </div>
                    <span class="text-2xl" aria-hidden="true">☀</span>
                </div>

                <div class="mt-8 space-y-6">
                    <div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-zinc-600 dark:text-zinc-400">{{ __('Calm days') }}</span>
                            <span class="font-semibold text-zinc-900 dark:text-white">12</span>
                        </div>
                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-zinc-100 dark:bg-zinc-800">
                            <div class="h-full w-[68%] rounded-full bg-zinc-900 dark:bg-zinc-100"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-zinc-600 dark:text-zinc-400">{{ __('Days reflected on') }}</span>
                            <span class="font-semibold text-zinc-900 dark:text-white">18 / 30</span>
                        </div>
                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-zinc-100 dark:bg-zinc-800">
                            <div class="h-full w-[60%] rounded-full bg-zinc-900 dark:bg-zinc-100"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 rounded-xl bg-zinc-50 p-4 dark:bg-zinc-800/60">
                    <p class="text-sm leading-6 text-zinc-600 dark:text-zinc-300">
                        {{ __('You are building a thoughtful habit. Keep going at your own pace.') }}</p>
                </div>
            </article>
        </section>
    </div>
</x-layouts::app>
