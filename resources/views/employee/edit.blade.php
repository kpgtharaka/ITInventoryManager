<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>
<body>
    <h1>Employee Edit</h1>
        <form method="POST" action="{{ route('employee.update',$employee)}}">
            @csrf
        {{ $employee->id }}<br/>
        <input type="text" name="emp_no" value="{{ $employee->emp_no }}" /><br/>
        <input type="text" name="first_name" value="{{ $employee->first_name }}" /><br/>
        <input type="text" name="last_name" value="{{ $employee->last_name }}" /><br/>
        <input type="text" name="email" value="{{ $employee->email}}" /><br/>
        <input type="text" name="phone" value="{{ $employee->phone}}" /><br/>
        <textarea name="address" >{{ $employee->address}}</textarea><br/>
        <button>Save</button>
        </form>
</body>
</html>
