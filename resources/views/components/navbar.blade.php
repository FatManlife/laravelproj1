{{-- <nav>
    @if ($user)
        <p>user is auth</p>
    @else
        </p>user is not auth</p>
    @endif
</nav> --}}

<nav class="navbar bg-base-200 shadow-sm px-48">
    <div class="flex-1">
        <a class=" text-2xl flex items-center gap-2 font-semibold" href="{{ route('posts.index.view') }}"><svg
                xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-package-search-icon lucide-package-search">
                <path
                    d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                <path d="m7.5 4.27 9 5.15" />
                <polyline points="3.29 7 12 12 20.71 7" />
                <line x1="12" x2="12" y1="22" y2="12" />
                <circle cx="18.5" cy="15.5" r="2.5" />
                <path d="M20.27 17.27 22 19" />
            </svg>
            <label class="text-xl">Things</label>
        </a>
    </div>
    <div class="flex gap-2">
        <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
        {{-- Drop down --}}
        @if (isset($user))
            <div class="dropdown dropdown-end">
                <div class="bg-primary flex justify-center items-center h-full aspect-square rounded-full "
                    tabindex="0" role="button">
                    <p class="text-white text-2xl font-semibold">{{ strtoupper($user->name[0]) }}</p>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li class="w-full">
                        <form method="POST" action="{{ route('logout.action') }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="w-full">Logout</button>
                        </form>
                    </li>
                </ul>
            @else
                <div class="flex items-center gap-2">
                    <a href="{{ route('register.view') }}" class="btn btn-primary ">Register</a>
                    <a href="{{ route('login.view') }}" class="btn bg-base-100 btn-primary">Login</a>
                </div>
        @endif
    </div>
    </div>
</nav>
