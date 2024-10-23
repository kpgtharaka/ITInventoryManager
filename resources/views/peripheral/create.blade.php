<x-app-layout>
    <div class="-container single">
        <h1 class="text-3xl py-4">Create new Peripheral</h1>
        <form action="{{ route('peripheral.store') }}" method="POST" class="">
            @csrf
            <x-text-input type="text" class="w-full mt-3" name="serial" placeholder="Enter serial here" /><br />
            <x-text-input type="text" class="w-full mt-3" name="make" placeholder="Enter make" /><br />
            <x-text-input type="text" class="w-full mt-3" name="model" placeholder="Enter model" /><br />
            <div class="flex justify-between mt-2">
                <x-button-link href="{{ route('peripheral.index') }}"
                    class="bg-yellow-300 hover:bg-yellow-500">Cancel</x-button-link>
                <x-button class="bg-red-300 hover:bg-red-500">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
