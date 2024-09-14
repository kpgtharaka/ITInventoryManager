<x-app-layout>
    <h1>Employee Edit</h1>
    <form method="POST" action="{{ route('employee.store') }}">
        @csrf
        Employee No <input type="text" name="emp_no" value="" /><br />
        First Name <input type="text" name="first_name" value="" /><br />
        Last Name <input type="text" name="last_name" value="" /><br />
        Email <input type="text" name="email" value="" /><br />
        Phone <input type="text" name="phone" value="" /><br />
        Address <textarea name="address"></textarea><br />
        <button>Save</button>
    </form>
</x-app-layout>
