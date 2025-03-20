@extends('layouts.app')

@section('content')

    <div class="">
        <div class="text-center mb-2">{{ __('Login') }}</div>

        <div class="w-[500px] border rounded-[10px] p-5 m-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex flex-col mb-3">
                    <label for="email" class="mb-1">{{ __('Email Address') }}</label>

                    <input id="email" type="email"
                           class="border rounded-[5px] py-1 px-3 @error('email') border-red-200 @enderror"
                           name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email"
                           autofocus>

                    @error('email')
                    <span class="mt-1 text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-3">
                    <label for="password" class="mb-1">{{ __('Password') }}</label>
                    <input id="password" type="password"
                           class="border rounded-[5px] py-1 px-3 @error('password') is-invalid @enderror"
                           name="password" placeholder="password"
                           required autocomplete="current-password">

                    @error('password')
                    <span class="mt-1 text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="mb-2">
                    <input class="mr-2" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="flex flex-col">
                    <button type="submit"
                            class="mb-2 py-2 bg-blue-500 text-white rounded-[10px] font-semibold cursor-pointer">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection
