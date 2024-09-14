<x-app-layout>
    <h1>Employees</h1>
    @foreach ($employees as $employee)
        <a href="{{ route('employee.show', $employee->id) }}">{{ $employee->emp_no }}</a> {{ $employee->first_name }}
        {{ $employee->last_name }} {{ $employee->email }} {{ $employee->phone }} {{ $employee->address }} <br>
    @endforeach
</x-app-layout>
