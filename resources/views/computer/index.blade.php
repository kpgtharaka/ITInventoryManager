<x-app-layout>
    <div class="sm:flex sm:justify-between">
        <x-button-link href="{{ route('computer.create') }}" class="block mb-3 bg-blue-200 hover:bg-blue-500">
            New Computer
        </x-button-link>
        <form action="{{ route('computer.index') }}" method="GET">
            @csrf
            <x-text-input name="q" type="text" placeholder="Search" value="{{ Request::get('q') }}" />
            <button class="border rounded p-2">Go</button><i class="fa fa-search"></i>
        </form>
    </div>
    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
        @foreach ($computers as $computer)
            <div class="flex p-3 border border-gray-950 bg-white/50 hover:bg-blue-200 rounded">
                <div class="w-full">
                    <div class="computer-body ">
                        <a href="{{ route('computer.show', $computer) }}">
                            <strong class="text-2xl">{{ $computer->serial }}</strong>
                            ({{ $computer->make }})
                            -
                            {{ $computer->model }}</a><br>

                    </div>
                    <div class="h-6">{{ $computer->mac_address }}</div>

                    <div class="flex w-full justify-between">
                        <p>{{ $computer->purchased_date }}</p>
                        <p>LKR {{ number_format($computer->price, 2, '.', ',') }}</p>
                    </div>
                    <div class="justify-between flex row mt-3">
                        <x-button-link href="{{ route('computer.edit', $computer) }}"
                            class="bg-yellow-200 hover:bg-yellow-500">Edit</x-button-link>
                        <form action="{{ route('computer.destroy', $computer) }}" method="POST">
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
        {{ $computers->links() }}
    </div>
</x-app-layout>
