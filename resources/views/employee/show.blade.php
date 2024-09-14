<x-app-layout>
    <h1>
        <a href="{{ route('employee.edit', $employee->id) }}" class="text-4xl">
            {{ $employee->first_name }} {{ $employee->last_name }}
        </a>
        ({{ $employee->emp_no }})
    </h1>
    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $employee->email }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Phone</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $employee->phone }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Address</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $employee->address }}</dd>
      </div>
    <div class="flex justify-between mt-3">
        <x-button-link href="{{ route('employee.edit', $employee) }}" class="bg-yellow-600 hover:bg-yellow-500">Edit</x-button-link>
        <form action="{{ route('employee.destroy', $employee) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button class="bg-red-600 hover:bg-red-500">Delete</x-button>
        </form>
    </div>
</x-app-layout>
