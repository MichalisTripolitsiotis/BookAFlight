<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-28">
            <form action="/api/search" class="mt-3" method="POST">
                @csrf
                <div class="mb-6">
                    <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400"
                        for="from">From:</label>
                    <input
                        class="appearance-none block w-full rounded-md bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="from" type="text">
                </div>
                <div class="mb-6">
                    <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400"
                        for="to">To:</label>
                    <input
                        class="appearance-none block w-full rounded-md bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="to" type="text">
                </div>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400"
                            for="departure-date">
                            Departure Date:
                        </label>
                        <input
                            class="appearance-none block w-full rounded-md bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="departure-date" type="date">
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400" for="return-date">
                            Return Date:
                        </label>
                        <input
                            class="appearance-none rounded-md block w-full bg-white text-gray-700 border border-gray-200  py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="return-date" type="date">
                    </div>
                </div>
                <div class="grid xl:gap-1">
                    <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400" for="adults">
                        Adults (> 11 years old):
                    </label>
                    <input
                        class="appearance-none rounded-md block w-full bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="adults" type="number" value="1">

                    <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400 mt-5" for="children">
                        Children (2-11 years old):
                    </label>
                    <input
                        class="appearance-none rounded-md block w-full bg-white text-gray-700 border border-gray-200  py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="children" type="number" value="0">

                    <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400 mt-5" for="kids">
                        Kids (< 2 years old): </label>
                            <input
                                class="appearance-none rounded-md block w-full bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="kids" type="number" value="0">


                            <button type="button"
                                class="mt-10 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                Search
                            </button>
                </div>

        </div>
        </form>
    </div>
</x-app-layout>
