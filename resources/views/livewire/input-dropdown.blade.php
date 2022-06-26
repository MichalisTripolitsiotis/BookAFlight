<div x-data="{ isOpen: false, name: '' }" x-on:click="isOpen = true" @click.away="isOpen = false">
    <label class="block text-lg tracking-wide text-gray-500 dark:text-gray-400"
        for="{{ $title }}">{{ ucfirst($title) }}:</label>

    <input wire:model="search"
        class="appearance-none block w-full rounded-md bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        id="{{ $title }}" name="{{ $title }}" type="text" x-bind:value="name">

    @if (strlen($search) >= 2)
        <div class="appearance-none block w-full mt-1 rounded-md bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            x-show.transition.opacity="isOpen" x-cloak>
            @if (count($data) > 0)
                <ul>
                    @foreach ($data['data'] as $result)
                        <li x-on:click="name = '{{ $result['name'] }}'"
                            class="w-full px-4 py-2 font-medium text-left border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                            {{ $result['name'] }}
                        </li>
                    @endforeach

                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>
