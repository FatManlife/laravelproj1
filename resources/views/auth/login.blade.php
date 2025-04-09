<x-root-layout>
    <section class="flex justify-center items-center h-screen">

        <div class="card bg-base-100 w-[500px] shrink-0 shadow-2xl">
            <div class="card-body w-full">
                <fieldset class="fieldset">
                    <form method="POST" action="{{ route('login.action') }}">
                        @method('POST')
                        @csrf
                        <h1 class="text-2xl font-semibold text-center text-base-80">Login</h1>

                        {{-- email --}}
                        <div>
                            <label class="fieldset-label">Email</label>
                            <input type="email" class="input w-full" placeholder="Email" value="{{ old('email') }}"
                                name="email" />
                            @error('email')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- password --}}
                        <div>
                            <label class="fieldset-label">Password</label>
                            <input type="password" class="input w-full" placeholder="Password" name="password" />
                            @error('password')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn btn-neutral mt-4 w-full">Login</button>

                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $err)
                                    <li class="text-red-500">{{ $err }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </fieldset>

                <p class="text-center">Don't have ana account? <a href="{{ route('register.view') }}"
                        class="text-primary">Sign up</p>
            </div>
        </div>

    </section>
</x-root-layout>
