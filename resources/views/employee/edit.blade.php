<x-app-layout>
    <h1 class="text-center text-2xl">Employee Edit</h1>
    <form method="POST" action="{{ route('employee.update', $employee) }}">
        @csrf
        <div class="sm:col-span-3">
            <label for="emp_no" class="block text-sm font-medium leading-6 text-gray-900">Employee No</label>
            <div class="mt-2">
                <input type="text" name="emp_no" id="emp_no" autocomplete="family-name"
                    value="{{ $employee->emp_no }}"
                    class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                <div class="mt-2">
                    <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                        value="{{ $employee->first_name }}"
                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                <div class="mt-2">
                    <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                        value="{{ $employee->last_name }}"
                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email"
                        value="{{ $employee->email }}"
                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-4">
                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                <div class="mt-2">
                    <input id="phone" name="phone" type="text" autocomplete="phone"
                        value="{{ $employee->phone }}"
                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="col-span-full">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                <div class="mt-2">
                    <x-textarea id="address" name="address" rows="3"
                        class="">{{ $employee->address }}</x-textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600"></p>
            </div>
            <x-button type="submit" class="">Save</x-button>
    </form>
</x-app-layout>
