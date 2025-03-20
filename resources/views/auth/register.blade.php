@extends('layouts.app')

@section('content')
    <div class="">

        <div class="text-center mb-2">{{ __('Register') }}</div>

        <div class="w-[500px] border rounded-[10px] p-5 m-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex flex-col mb-3">
                    <label for="name" class="mb-1">{{ __('Name') }}</label>

                    <input id="name" type="text" placeholder="name"
                           class="border rounded-[5px] py-1 px-3 @error('name') border-red-200 @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="mt-1 text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="flex flex-col mb-3">
                    <label for="email"
                           class="mb-1">{{ __('Email Address') }}</label>

                    <input id="email" type="email" placeholder="email"
                           class="border rounded-[5px] py-1 px-3 @error('email') border-red-200 @enderror"
                           name="email"
                           value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="mt-1 text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="flex flex-col mb-3">
                    <label for="password"
                           class="mb-1">{{ __('Password') }}</label>

                    <input id="password" type="password" placeholder="password"
                           class="border rounded-[5px] py-1 px-3 @error('password') border-red-200 @enderror"
                           name="password"
                           required autocomplete="new-password">

                    @error('password')
                    <span class="mt-1 text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="flex flex-col mb-4">
                    <label for="password-confirm"
                           class="mb-1">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="border rounded-[5px] py-1 px-3"
                           name="password_confirmation" required autocomplete="new-password"
                           placeholder="confirm password">
                </div>

                <div class="flex flex-col">
                    <button type="submit"
                            class="mb-2 py-2 bg-blue-500 text-white rounded-[10px] font-semibold cursor-pointer">
                        {{ __('Register') }}
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
