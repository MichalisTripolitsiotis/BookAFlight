<div x-data="{ isOpen: false }" x-on:click="isOpen = true" @click.away="isOpen = false">
    <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400"
        for="{{ $title }}">{{ ucfirst($title) }}:</label>

    @include('layouts.loading')

    <input wire:model.debounce.500ms="query"
        class="appearance-none block w-full rounded-md bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        id="{{ $title }}" name="{{ $title }}" type="text" />

    @if (strlen($query) >= 2)
            @if (count($data) > 0)
                <ul class="appearance-none block w-full mt-1 rounded-md bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    x-show.transition.opacity="isOpen"
                >
                    @foreach ($data['data'] as $result)
                        <li wire:click="select('{{$result['name'] .' / '. $result['address']['countryName']}}')"
                        @click.away="isOpen = false"
                            class="w-full px-4 py-2 font-medium text-left border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                            {{ $result['name'] }} / {{ $result['address']['countryName']}}
                        </li>
                    @endforeach
                </ul>
                @endif
        </div>
    @endif
</div>
