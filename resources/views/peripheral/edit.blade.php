<x-app-layout>
    <div class="container single">
        <h1 class="text-3xl pb-4">Edit Peripheral</h1>
        <form action="{{ route('peripheral.update', $peripheral) }}" method="POST">
            @csrf
            @method('PUT')
            <x-text-input type="text" name="serial" placeholder="Enter serial" value="{{ $peripheral->serial }}"
                class="w-full mb-3" /> <br />
            <x-text-input type="text" name="make" placeholder="Enter Make" value="{{ $peripheral->make }}"
                class="w-full mb-3" /> <br />
            <x-text-input type="text" name="model" placeholder="Enter Model" value="{{ $peripheral->model }}"
                class="w-full mb-3" /> <br />
            <div class="flex justify-between">
                <x-button-link href="{{ route('peripheral.index') }}"
                    class="bg-yellow-200 hover:bg-yellow-500">Cancel</x-button-link>
                <x-button class="bg-blue-200 hover:bg-blue-500">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
