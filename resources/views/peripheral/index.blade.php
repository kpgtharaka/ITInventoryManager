<x-app-layout>
    <div class="sm:flex sm:justify-between">
        <x-button-link href="{{ route('peripheral.create') }}" class="block mb-3 bg-blue-200 hover:bg-blue-500">
            New Peripheral
        </x-button-link>
        <form action="{{ route('peripheral.index') }}" method="GET">
            @csrf
            <x-text-input name="q" type="text" placeholder="Search" value="{{ Request::get('q') }}" />
            <button class="border rounded p-2">Go</button><i class="fa fa-search"></i>
        </form>
    </div>
    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
        @foreach ($peripherals as $peripheral)
            <div class="flex p-3 border border-gray-950 bg-white/50 hover:bg-blue-200 rounded">
                <div class="w-full">
                    <div class="">
                        <a href="{{ route('peripheral.show', $peripheral) }}">
                            <strong class="text-2xl">{{ $peripheral->serial }}</strong>
                            ({{ $peripheral->make }})
                            -
                            {{ $peripheral->model }} : {{ $peripheral->type }}</a><br>

                    </div>
                    <div class="justify-between flex row mt-3">
                        <x-button-link href="{{ route('peripheral.edit', $peripheral) }}"
                            class="bg-yellow-200 hover:bg-yellow-500">Edit</x-button-link>
                        <form action="{{ route('peripheral.destroy', $peripheral) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button class="bg-red-300 hover:bg-red-500">Delete</x-button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="p-6">
        {{ $peripherals->links() }}
    </div>
</x-app-layout>
