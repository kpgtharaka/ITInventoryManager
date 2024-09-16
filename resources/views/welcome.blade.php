<x-app-layout>
    Welcome @auth {{ Auth::user()->name }} @endauth @guest Please Login to access @endguest
</x-app-layout>
