<a href="#">
    <div class="w-full font-black uppercase text-2xl">{{ $meta['app_name'] ?? config('app.name') }}</div>
</a>
<div class="flex flex-col justify-between flex-1 mt-6">
    <nav class="-mx-3 space-y-6 ">
        <div class="space-y-3 ">
            <label class="px-3 text-xs text-gray-500 uppercase dark:text-gray-400">analytics</label>

            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                </svg>

                <span class="mx-2 text-sm font-medium">{{ __('Dashboard') }}</span>
            </x-nav-link>
        </div>
    </nav>
    <div class="mt-6">
        <div class="p-3 bg-gray-100 rounded-lg dark:bg-gray-800">
            <h2 class="text-sm font-medium text-gray-800 dark:text-white">New feature availabel!
            </h2>

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Natus harum officia eligendi velit.</p>

            <img class="object-cover w-full h-32 mt-2 rounded-lg"
                src="https://images.unsplash.com/photo-1658953229664-e8d5ebd039ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&h=1374&q=80"
                alt="">
        </div>
    </div>
</div>
