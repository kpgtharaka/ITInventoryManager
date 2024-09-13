<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>
<body>
        <a href="{{ route('employee.show',$employee->id) }}">{{ $employee->emp_no }}</a> {{ $employee->first_name }} {{ $employee->last_name }} {{ $employee->email}} {{ $employee->phone}} {{ $employee->address}} <br>
</body>
</html>
