<nav class="flex items-center justify-between p-2 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="/" class="-m-1.5 p-1.5">
        <span class="sr-only">Your Company</span>
        <img class="h-8 w-auto" src="/images/logo.png" alt="">
      </a>
    </div>
    <div class="flex lg:hidden">
      <button id="open" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
        @auth
        <a href="/employee" class="text-sm font-semibold leading-6 text-gray-900">Employee</a>
        <a href="/computer" class="text-sm font-semibold leading-6 text-gray-900">Computer</a>
        @endauth
    </div>
    
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      @guest
      <a href="/login" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
      @endguest
      @auth
            <form action="/logout" method="post">
              @csrf
              <button class="text-sm font-semibold leading-6 text-gray-900">Logout</button>
            </form>
            @endauth
    </div>
  </nav>
  
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div class="lg:hidden hidden" role="dialog" aria-modal="true" id="responsivemenu">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-50"></div>
    <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="/images/logo.png" alt="">
        </a>
        <button id="close" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Close menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
            <a href="/employee" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Employee</a>
            <a href="/computer" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Computer</a>
            
          </div>
          <div class="py-6">
            @auth
            <form action="/logout" method="post">
              @csrf
              <button class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Logout</button>
            </form>
            @endauth
            @guest 
            <a href="/login" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
            @endguest
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const open = document.getElementById('open');
    const close = document.getElementById('close');

    open.addEventListener('click', () => {
      responsivemenu.classList.toggle('hidden');
    });
    close.addEventListener('click', () => {
      responsivemenu.classList.toggle('hidden');
    });
  </script>