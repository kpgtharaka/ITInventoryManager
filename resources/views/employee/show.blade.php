<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>

<body>
    <h1>Employee {{ $employee->id }}</h1>
    @session('message')
        <div class="success-message ">
            {{ session('message') }}
        </div>
    @endsession
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    <a href="{{ route('employee.edit', $employee->id) }}">{{ $employee->emp_no }}</a>
    {{ $employee->first_name }}
    {{ $employee->last_name }}
    {{ $employee->email }}
    {{ $employee->phone }}
    {{ $employee->address }} <br>
</body>

</html>
