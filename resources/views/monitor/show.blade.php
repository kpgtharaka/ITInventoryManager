<x-app-layout>
    <div class="task-container single-task">
        <div class="task-header">
            <div class="flex justify-between">
                <x-button-link href="{{ route('monitor.edit', $monitor) }}"
                    class="bg-yellow-200 hover:bg-yellow-500">Edit</x-button-link>
                <form action="{{ route('monitor.destroy', $monitor) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button class="bg-red-300 hover:bg-red-500">Delete</x-button>
                </form>
            </div>
        </div>
        <div class="md:flex md:justify-between  w-full">
            <div class="">
                <h1 class="text-3xl py-4">Monitor Serial No : {{ Str::upper($monitor->serial) }}</h1>
                Make : {{ $monitor->make }} / Model :{{ $monitor->model }} <br />
            </div>
            <div class="w-96 mt-3 border rounded p-3">
                Attach a Computer ({{ $computers->count() }} available)
                <form method="POST" action="{{ route('monitor.bind', $monitor) }}">
                    @csrf
                    <select name="computer" class="my-3 p-2">
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}">{{ Str::upper($computer->serial) }} -
                                {{ $computer->make }} ({{ $computer->model }}) </option>
                        @endforeach
                    </select>
                    <x-button class="">Attach</x-button>
                </form>
            </div>
        </div>
        @if ($monitor->computers->count() > 0)
            <div class="mt-5"> Computers assigned to monitor
                <div class="border rouded w-full">
                    @foreach ($monitor->computers as $computer)
                        <div class="border-b-2 p-2 cursor-pointer align-middle hover:bg-blue-100 flex justify-between">
                            <a href="{{ route('computer.show', $computer->id) }}">{{ Str::upper($computer->serial) }}
                                - {{ $computer->make }} ( {{ $computer->model }})</a>
                            <form method="POST" action="{{ route('monitor.unbind', $monitor) }}">
                                @csrf
                                <input type="hidden" name="monitor" value="{{ $monitor->id }}" />
                                <button class="text-xs border rounded py-1 px-2 bg-red-300 hover:bg-red-500">X</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
