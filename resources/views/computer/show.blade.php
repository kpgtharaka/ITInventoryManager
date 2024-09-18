<x-app-layout>
    <div class="task-container single-task">
        <div class="task-header">
            <div class="flex justify-between">
                <x-button-link href="{{ route('computer.edit', $computer) }}"
                    class="bg-yellow-200 hover:bg-yellow-500">Edit</x-button-link>
                <form action="{{ route('computer.destroy', $computer) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button class="bg-red-300 hover:bg-red-500">Delete</x-button>
                </form>
            </div>
        </div>
        <div class="md:flex md:justify-between  w-full">
            <div class="">
                <h1 class="text-3xl py-4">Computer Serial No : {{ Str::upper($computer->serial) }}</h1>
                Make : {{ $computer->make }} / Model :{{ $computer->model }} <br />
                MAC Address : {{ $computer->mac_address }}<br />
                Purchased Date : {{ $computer->purchased_date }}<br />
                Price : LKR {{ number_format($computer->price, 2, '.', ',') }}
            </div>
            <div class="w-96 mt-3 border rounded p-3">
                Attach a Monitor ({{ $monitors->count() }} available)
                <form method="POST" action="{{ route('computer.bind', $computer) }}">
                    @csrf
                    <select name="monitor" class="my-3 p-2">
                        @foreach ($monitors as $monitor)
                            <option value="{{ $monitor->id }}">{{ Str::upper($monitor->serial) }} -
                                {{ $monitor->make }} ({{ $monitor->model }}) </option>
                        @endforeach
                    </select>
                    <x-button class="">Attach</x-button>
                </form>
            </div>
        </div>
        @if ($computer->monitors->count() > 0)
            <div class="mt-5"> Monitors assigned to Computer
                <div class="border rouded w-full">
                    @foreach ($computer->monitors as $monitor)
                        <div class="border-b-2 p-2 cursor-pointer align-middle hover:bg-blue-100 flex justify-between">
                            <a href="{{ route('monitor.show', $monitor->id) }}">{{ Str::upper($monitor->serial) }}
                                - {{ $monitor->make }} ( {{ $monitor->model }})</a>
                            <form method="POST" action="{{ route('computer.unbind', $computer) }}">
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
