<x-app-layout>
    <div class="container single">
        <h1 class="text-3xl pb-4">Edit Monitor</h1>
        <form action="{{ route('monitor.update', $monitor) }}" method="POST">
            @csrf
            @method('PUT')
            <x-text-input type="text" name="serial" placeholder="Enter serial" value="{{ $monitor->serial }}"
                class="w-full mb-3" /> <br />
            <x-text-input type="text" name="make" placeholder="Enter Make" value="{{ $monitor->make }}"
                class="w-full mb-3" /> <br />
            <x-text-input type="text" name="model" placeholder="Enter Model" value="{{ $monitor->model }}"
                class="w-full mb-3" /> <br />
            <div class="flex justify-between">
                <x-button-link href="{{ route('monitor.index') }}"
                    class="bg-yellow-200 hover:bg-yellow-500">Cancel</x-button-link>
                <x-button class="bg-blue-200 hover:bg-blue-500">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
