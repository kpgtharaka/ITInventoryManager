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
        {{ $employee->id }}<br/>
        {{ $employee->emp_no }}<br/>
        {{ $employee->first_name }} <br/>
        {{ $employee->last_name }} <br/>
        {{ $employee->email}} <br/>
        {{ $employee->phone}} <br/>
        {{ $employee->address}} <br/>
</body>
</html>
