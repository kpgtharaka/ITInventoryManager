<x-app-layout>
    <div class="-container single">
        <h1 class="text-3xl py-4">Create new computer</h1>
        <form action="{{ route('computer.store') }}" method="POST" class="">
            @csrf
            <x-text-input type="text" class="w-full mt-3" name="serial" placeholder="Enter serial here" /><br />
            <x-text-input type="text" class="w-full mt-3" name="make" placeholder="Enter make" /><br />
            <x-text-input type="text" class="w-full mt-3" name="model" placeholder="Enter model" /><br />
            <x-text-input type="text" class="w-full mt-3" name="mac_address" placeholder="Enter mac address" /><br />
            <x-text-input type="date" class="w-full mt-3" name="purchased_date"
                placeholder="Enter purchased date" /><br />
            <x-text-input type="text" class="w-full mt-3" name="price" placeholder="Enter price" /><br />
            {{-- <textarea name="address" class="w-full mt-3" rows="10" class="body" placeholder="Enter employee addreess here"></textarea> --}}
            <div class="flex justify-between mt-2">
                <x-button-link href="{{ route('computer.index') }}"
                    class="bg-yellow-300 hover:bg-yellow-500">Cancel</x-button-link>
                <x-button class="bg-red-300 hover:bg-red-500">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
