<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', ['title' => __('A place for your thoughts')])
</head>

<body class="min-h-screen bg-white text-zinc-900 antialiased dark:bg-zinc-950 dark:text-zinc-50">
    <div class="relative isolate overflow-hidden">
        <div
            class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[32rem] bg-linear-to-b from-zinc-100/80 to-transparent dark:from-zinc-900/70 dark:to-transparent">
        </div>

        <header class="mx-auto flex w-full max-w-7xl items-center justify-between px-6 py-6 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3" wire:navigate>
                <span
                    class="flex size-10 items-center justify-center rounded-xl bg-accent text-accent-foreground shadow-sm">
                    <x-app-logo-icon class="size-5 fill-current" />
                </span>
                <span class="text-lg font-semibold tracking-tight">{{ config('app.name', 'Tell Me') }}</span>
            </a>

            <nav class="flex items-center gap-3" aria-label="Navigation principale">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-zinc-600 transition hover:bg-zinc-100 hover:text-zinc-950 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-white"
                        wire:navigate>
                        {{ __('My journal') }}
                    </a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                            class="rounded-lg px-4 py-2 text-sm font-medium text-zinc-600 transition hover:bg-zinc-100 hover:text-zinc-950 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-white">
                            {{ __('Log in') }}
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="hidden rounded-lg bg-accent px-4 py-2 text-sm font-medium text-accent-foreground shadow-sm transition hover:opacity-90 sm:inline-flex">
                            {{ __('Sign up') }}
                        </a>
                    @endif
                @endauth
            </nav>
        </header>

        <main>
            <section
                class="mx-auto grid w-full max-w-7xl gap-16 px-6 pb-24 pt-16 lg:grid-cols-[minmax(0,0.9fr)_minmax(28rem,1.1fr)] lg:items-center lg:px-8 lg:pb-32 lg:pt-24">
                <div class="max-w-2xl">
                    <h1
                        class="max-w-xl text-5xl font-semibold tracking-[-0.04em] text-zinc-950 sm:text-6xl lg:text-7xl dark:text-white">
                        {{ __('Write to rediscover yourself.') }}
                    </h1>
                    <p class="mt-7 max-w-lg text-lg leading-8 text-zinc-600 dark:text-zinc-300">
                        {{ __('A simple personal journal to jot down your thoughts, track your days, and keep a record of what matters.') }}
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-accent px-5 py-3 text-sm font-semibold text-accent-foreground shadow-sm transition hover:opacity-90"
                                wire:navigate>
                                {{ __('Open my journal') }}
                                <span aria-hidden="true">→</span>
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-accent px-5 py-3 text-sm font-semibold text-accent-foreground shadow-sm transition hover:opacity-90">
                                    {{ __('Sign up for free') }}
                                    <span aria-hidden="true">→</span>
                                </a>
                            @endif
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                    class="inline-flex items-center justify-center rounded-xl border border-zinc-200 px-5 py-3 text-sm font-semibold text-zinc-700 transition hover:border-zinc-300 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:border-zinc-600 dark:hover:bg-zinc-900">
                                    {{ __('Log in') }}
                                </a>
                            @endif
                        @endauth
                    </div>
                    <p class="mt-5 text-sm text-zinc-500 dark:text-zinc-400">{{ __('Your words remain yours.') }}</p>
                </div>

                <div class="relative mx-auto w-full max-w-xl lg:mx-0 lg:justify-self-end">
                    <div class="absolute -inset-6 -z-10 rounded-[2.5rem] bg-zinc-200/60 blur-3xl dark:bg-zinc-800/50">
                    </div>
                    <div
                        class="overflow-hidden rounded-3xl border border-zinc-200 bg-zinc-50 p-3 shadow-2xl shadow-zinc-900/10 dark:border-zinc-800 dark:bg-zinc-900 dark:shadow-black/30">
                        <div
                            class="rounded-2xl border border-zinc-200 bg-white p-5 dark:border-zinc-800 dark:bg-zinc-950 sm:p-7">
                            <div
                                class="flex items-center justify-between border-b border-zinc-100 pb-5 dark:border-zinc-800">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex size-10 items-center justify-center rounded-full bg-zinc-100 text-lg dark:bg-zinc-800"
                                        aria-hidden="true">☀</span>
                                    <div>
                                        <p class="text-sm font-semibold text-zinc-900 dark:text-white">
                                            {{ __('My day') }}</p>
                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">
                                            {{ __('Tuesday, June 17th') }}
                                        </p>
                                    </div>
                                </div>
                                <span
                                    class="rounded-full bg-zinc-100 px-2.5 py-1 text-xs text-zinc-500 dark:bg-zinc-800 dark:text-zinc-400">{{ __('Draft') }}</span>
                            </div>
                            <div class="space-y-5 py-7">
                                <div class="space-y-2">
                                    <div class="h-3 w-3/4 rounded-full bg-zinc-900 dark:bg-zinc-100"></div>
                                    <div class="h-3 w-1/2 rounded-full bg-zinc-200 dark:bg-zinc-700"></div>
                                </div>
                                <p class="text-sm leading-7 text-zinc-600 dark:text-zinc-300">
                                    {{ __('Take the time to note down what went well today. Small victories deserve their place too.') }}
                                </p>
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="h-20 rounded-xl bg-zinc-100 dark:bg-zinc-800"></div>
                                    <div class="h-20 rounded-xl bg-zinc-100 dark:bg-zinc-800"></div>
                                    <div class="h-20 rounded-xl bg-zinc-900 dark:bg-zinc-100"></div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between border-t border-zinc-100 pt-5 dark:border-zinc-800">
                                <span class="text-xs text-zinc-400">{{ __('Last saved just now') }}</span>
                                <span
                                    class="flex size-8 items-center justify-center rounded-lg bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300"
                                    aria-label="{{ __('Entry saved!') }}">✓</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-y border-zinc-200/80 bg-zinc-50/70 dark:border-zinc-800 dark:bg-zinc-900/40"
                aria-labelledby="benefits-heading">
                <div class="mx-auto w-full max-w-7xl px-6 py-20 lg:px-8 lg:py-24">
                    <div class="max-w-xl">
                        <p class="text-sm font-medium uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">
                            {{ __('A ritual that reflects who you are') }}</p>
                        <h2 id="benefits-heading"
                            class="mt-4 text-3xl font-semibold tracking-tight text-zinc-950 dark:text-white sm:text-4xl">
                            {{ __('Less noise. More clarity.') }}</h2>
                    </div>
                    <div class="mt-12 grid gap-10 md:grid-cols-3 md:gap-8">
                        <article class="space-y-4">
                            <span
                                class="flex size-10 items-center justify-center rounded-xl bg-white text-sm font-semibold text-zinc-700 shadow-xs ring-1 ring-zinc-200 dark:bg-zinc-800 dark:text-zinc-200 dark:ring-zinc-700">01</span>
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                {{ __('Write without pressure') }}</h3>
                            <p class="text-sm leading-6 text-zinc-600 dark:text-zinc-400">
                                {{ __('A quiet space to set down your ideas, with no goals to meet or formats imposed.') }}
                            </p>
                        </article>
                        <article class="space-y-4">
                            <span
                                class="flex size-10 items-center justify-center rounded-xl bg-white text-sm font-semibold text-zinc-700 shadow-xs ring-1 ring-zinc-200 dark:bg-zinc-800 dark:text-zinc-200 dark:ring-zinc-700">02</span>
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                {{ __('Observe your daily life') }}</h3>
                            <p class="text-sm leading-6 text-zinc-600 dark:text-zinc-400">
                                {{ __('Review your days and watch habits, emotions, and progress emerge.') }}
                            </p>
                        </article>
                        <article class="space-y-4">
                            <span
                                class="flex size-10 items-center justify-center rounded-xl bg-white text-sm font-semibold text-zinc-700 shadow-xs ring-1 ring-zinc-200 dark:bg-zinc-800 dark:text-zinc-200 dark:ring-zinc-700">03</span>
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                {{ __('Keep what matters') }}</h3>
                            <p class="text-sm leading-6 text-zinc-600 dark:text-zinc-400">
                                {{ __('Keep your thoughts in a personal, clear and always-accessible place.') }}
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section
                class="mx-auto flex w-full max-w-7xl flex-col items-start gap-8 px-6 py-20 sm:flex-row sm:items-center sm:justify-between lg:px-8 lg:py-24"
                aria-labelledby="cta-heading">
                <div>
                    <h2 id="cta-heading" class="text-3xl font-semibold tracking-tight text-zinc-950 dark:text-white">
                        {{ __('Start with a sentence.') }}</h2>
                    <p class="mt-3 text-zinc-600 dark:text-zinc-400">{{ __('The rest will come naturally.') }}</p>
                </div>
                @guest
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-accent px-5 py-3 text-sm font-semibold text-accent-foreground shadow-sm transition hover:opacity-90">
                            {{ __('Start journaling') }}
                            <span aria-hidden="true">→</span>
                        </a>
                    @endif
                @else
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-accent px-5 py-3 text-sm font-semibold text-accent-foreground shadow-sm transition hover:opacity-90"
                        wire:navigate>
                        {{ __('Open my journal') }}
                        <span aria-hidden="true">→</span>
                    </a>
                @endguest
            </section>
        </main>

        <footer class="border-t border-zinc-200/80 dark:border-zinc-800">
            <div
                class="mx-auto flex w-full max-w-7xl flex-col gap-3 px-6 py-6 text-sm text-zinc-500 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <span>{{ config('app.name', 'Tell Me') }}</span>
                <span>{{ __('A place for your thoughts.') }}</span>
            </div>
        </footer>
    </div>

    @fluxScripts
</body>

</html>
