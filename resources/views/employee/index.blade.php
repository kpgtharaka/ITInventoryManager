<x-app-layout>
 <div class="sm:flex sm:justify-between">
    <x-button-link href="{{ route('employee.create') }}" class="block mb-3 bg-blue-200 hover:bg-blue-400">
        New Employee
    </x-button-link>
    <form action="{{ route("employee.index") }}" method="GET">
        @csrf
     <x-text-input name="q" type="text" placeholder="Search" value="{{ Request::get('q') }}" />
     <button class="border rounded p-2">Go</button><i class="fa fa-search"></i>
 </form>
 </div>
    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
        @foreach ($employees as $employee)
            <div class="flex p-3 border border-gray-950 backdrop-blur-xl bg-white/30 hover:bg-white cursor-pointer rounded">
                <div class="">
                    <div class="h-28 block">
                        <a href="{{ route('employee.show', $employee) }}"><strong
                                class="text-2xl">{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                            ({{ $employee->emp_no }})
                            <br />
                            {{ $employee->address }}</a>
                    </div>
                    <div class="justify-between flex">
                        <x-button-link href="{{ route('employee.edit', $employee) }}"
                            class="bg-yellow-600 hover:bg-yellow-500">Edit</x-button-link>
                        <form action="{{ route('employee.destroy', $employee) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button class="bg-red-600 hover:bg-red-500">Delete</x-button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        <div class="w-full mt-3">
            {{ $employees->links() }}
        </div>
</x-app-layout>