<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Computer') }}
            </h2>
            <x-button-link href="{{ route('computer.create') }}" class="bg-blue-200 hover:bg-blue-500">
                New Computer
            </x-button-link>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container single">
                        <h1 class="text-3xl py-4">Edit Computer</h1>
                        <form action="{{ route('computer.update', $computer) }}" method="POST" class="computer">
                            @csrf
                            @method('PUT')
                            <x-text-input type="text" name="serial" placeholder="Enter serial" value="{{ $computer->serial }}" class="w-full mb-3" /> <br />
                            <x-text-input type="text" name="make" placeholder="Enter Make" value="{{ $computer->make }}" class="w-full mb-3" /> <br />
                            <x-text-input type="text" name="model" placeholder="Enter Model" value="{{ $computer->model }}" class="w-full mb-3" /> <br />
                            <x-text-input type="text" name="mac_address" placeholder="Enter mac_address" value="{{ $computer->mac_address }}" class="w-full mb-3" /> <br />
                            <x-text-input type="date" name="purchased_date" placeholder="Enter Purchased date" value="{{ $computer->purchased_date }}" class="w-full mb-3" /> <br />
                            <x-text-input type="text" name="price" placeholder="Enter Price" value="{{ $computer->price }}" class="w-full mb-3" /> <br />
                            {{-- <textarea name="mac_address" rows="10" class="body w-full mb-3" placeholder="Enter mac address here">{{ $computer->mac_address }}</textarea> --}}
                            <div class="flex justify-between">
                                <x-button-link href="{{ route('computer.index') }}" class="bg-yellow-200 hover:bg-yellow-500">Cancel</x-button-link>
                                <x-button class="bg-blue-200 hover:bg-blue-500">Submit</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8">


    </div>
</x-app-layout>