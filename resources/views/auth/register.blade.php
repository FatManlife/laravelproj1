<x-root-layout>
    <section class="flex justify-center items-center h-screen">

        <div class="card bg-base-100 w-[500px] shrink-0 shadow-2xl">
            <div class="card-body w-full">
                <fieldset class="fieldset">
                    <h1 class="text-2xl font-semibold text-center text-base-80">Register</h1>
                    <form method="POST" action="{{ route('register.action') }}">
                        @method('POST')
                        @csrf
                        {{-- username --}}
                        <div>
                            <label class="fieldset-label">Username</label>
                            <input type="text" class="input w-full" placeholder="Username" name="name"
                                value="{{ old('name') }}" />
                            @error('name')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- email --}}
                        <div>
                            <label class="fieldset-label">Email</label>
                            <input type="email" class="input w-full" placeholder="Email" name="email"
                                value="{{ old('email') }}" />
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
                        {{-- cpassword --}}
                        <div>
                            <label class="fieldset-label">Confirm Password</label>
                            <input type="password" class="input w-full" placeholder="Confirm Password"
                                name="password_confirmation" />
                            @error('password_confirmation')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="w-full btn btn-neutral mt-4 align-center">Regiser</button>
                    </form>
                </fieldset>
                <p class="text-center">Already have an account?<a href="{{ route('login.view') }}"
                        class="text-primary ml-0.5">
                        Login</p>
            </div>
        </div>

    </section>
</x-root-layout>
