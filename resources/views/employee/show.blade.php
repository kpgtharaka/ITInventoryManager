<x-app-layout>
    <h1>Employee {{ $employee->id }}</h1>
    <a href="{{ route('employee.edit', $employee->id) }}">{{ $employee->emp_no }}</a>
    {{ $employee->first_name }}
    {{ $employee->last_name }}
    {{ $employee->email }}
    {{ $employee->phone }}
    {{ $employee->address }} <br>
</x-app-layout>
