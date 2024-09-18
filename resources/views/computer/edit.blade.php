<x-app-layout>
    <div class="container single">
        <h1 class="text-3xl pb-4">Edit Computer</h1>
        <form action="{{ route('computer.update', $computer) }}" method="POST" class="computer">
            @csrf
            @method('PUT')
            <x-text-input type="text" name="serial" placeholder="Enter serial" value="{{ $computer->serial }}"
                class="w-full mb-3" /> <br />
            <x-text-input type="text" name="make" placeholder="Enter Make" value="{{ $computer->make }}"
                class="w-full mb-3" /> <br />
            <x-text-input type="text" name="model" placeholder="Enter Model" value="{{ $computer->model }}"
                class="w-full mb-3" /> <br />
            <x-text-input type="text" name="mac_address" placeholder="Enter mac_address"
                value="{{ $computer->mac_address }}" class="w-full mb-3" /> <br />
            <x-text-input type="date" name="purchased_date" placeholder="Enter Purchased date"
                value="{{ $computer->purchased_date }}" class="w-full mb-3" /> <br />
            <x-text-input type="text" name="price" placeholder="Enter Price" value="{{ $computer->price }}"
                class="w-full mb-3" /> <br />
            {{-- <textarea name="mac_address" rows="10" class="body w-full mb-3" placeholder="Enter mac address here">{{ $computer->mac_address }}</textarea> --}}
            <div class="flex justify-between">
                <x-button-link href="{{ route('computer.index') }}"
                    class="bg-yellow-200 hover:bg-yellow-500">Cancel</x-button-link>
                <x-button class="bg-blue-200 hover:bg-blue-500">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
