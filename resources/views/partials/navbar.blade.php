
<div class="navbar bg-base-100 container mx-auto">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <ul
          tabindex="0"
          class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li><a href="{{ route('loket') }}">Loket</a></li>
          <li><a>TV Loket 1</a></li>
          <li><a>TV Loket 2</a></li>
        </ul>
      </div>
      <a class="btn btn-ghost text-green-600 text-xl" href="{{ route('home') }}">Loket App</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-2">
        <li><a class="{{ request()->routeIs('home') ? ' active ' : ' ' }}mx-1" href="{{ route('home') }}">Home</a></li>
        <li><a class="{{ request()->routeIs('loket') ? ' active ' : ' ' }}mx-1" href="{{ route('loket') }}">Loket</a></li>
        <li><a class="mx-1">TV Loket 1</a></li>
        <li><a class="mx-1" >TV Loket 2</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a href="{{ route('login') }}" class="btn bg-green-400">Login</a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
          <button class="btn bg-red-400">Logout</button>
      </form>
    </div>
  </div>
