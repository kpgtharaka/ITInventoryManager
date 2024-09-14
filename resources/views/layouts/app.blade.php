<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT Inventory Manager</title>
</head>

<body>
    <div>
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
        {{ $slot }}
    </div>
</body>

</html>
