<x-guest>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Register') }}
            </h2>

        </div>
    </x-slot>
    <div class="container py-12 mx-auto">
        <div class="grid w-full">
            <div class="w-full p-5 sm:px-6 lg:px-8 rounded border bg-white ">
                <form action="/register" method="POST">
                    @csrf
                    <x-form-label for="name">Name</x-form-label>
                    <x-text-input type="text" name="name" class="border rounded p-2 w-full"></x-text-input>
                    <x-form-error name="name" />
                    <x-form-label for="email">Email</x-form-label>
                    <x-text-input type="text" name="email" class="border rounded p-2 w-full"></x-text-input>
                    <x-form-error name="email" />
                    <x-form-label for="password">Password</x-form-label>
                    <x-text-input type="password" name="password" class="border rounded p-2 w-full"></x-text-input>
                    <x-form-error name="password" />
                    <x-form-label for="password_confirmation">Confirm</x-form-label>
                    <x-text-input type="password" name="password_confirmation" class="border rounded p-2 w-full"></x-text-input>
                    <x-form-error name="password_confirmation" />
                    <div class="flex justify-between w-full">
                        <a class="px-4 py-2 mt-6 border rounded border-black text-white bg-blue-600 hover:bg-blue-500 font-bold"
                            href="/login">Login</a>
                        <div class="w-1/3"></div>
                        <button
                            class="p-1.5 px-4 rounded border flex justify-end border-black mt-6 text-right  text-white bg-blue-600 hover:bg-blue-500 font-bold">Register</button><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest>
