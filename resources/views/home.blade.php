@extends('layouts.app')

@section('content')

    <div class="w-[80vw] flex flex-col gap-5 m-auto p-5 border rounded-[10px]">
        <div class="">{{ __('Dashboard') }}</div>

        @guest
            <h1>Hello guest!</h1>
            <div>{{ __('You are should logged in.') }}</div>
        @else
            <h1>Hello {{ Auth::user()->name }}</h1>
            <div>{{ __('You are logged in!') }}</div>
        @endguest

        <div class="">
            @if (session('status'))
                <div class="" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

@endsection
