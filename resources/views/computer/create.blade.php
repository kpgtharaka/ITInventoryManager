<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Computer') }}
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
                    <div class="-container single">
                        <h1  class="text-3xl py-4">Create new computer</h1>
                        <form action="{{ route('computer.store') }}" method="POST" class="">
                            @csrf
                            <x-text-input type="text" class="w-full mt-3" name="serial" placeholder="Enter serial here"/><br />
                            <x-text-input type="text" class="w-full mt-3" name="make" placeholder="Enter make"/><br />
                            <x-text-input type="text" class="w-full mt-3" name="model" placeholder="Enter model"/><br />
                            <x-text-input type="text" class="w-full mt-3" name="mac_address" placeholder="Enter mac address"/><br />
                            <x-text-input type="date" class="w-full mt-3" name="purchased_date" placeholder="Enter purchased date"/><br />
                            <x-text-input type="text" class="w-full mt-3" name="price" placeholder="Enter price"/><br />
                            {{-- <textarea name="address" class="w-full mt-3" rows="10" class="body" placeholder="Enter employee addreess here"></textarea> --}}
                            <div class="flex justify-between mt-2">
                                <x-button-link href="{{ route('computer.index') }}" class="bg-yellow-300 hover:bg-yellow-500">Cancel</x-button-link>
                                <x-button class="bg-red-300 hover:bg-red-500">Submit</x-button>
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