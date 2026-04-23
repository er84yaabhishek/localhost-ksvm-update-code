@extends('admin.layout.app')
@section('content')
    <div class="login-page">
        <div class="text-center mb-4">
            <img class="login-logo" src="https://codecanyon8.kreativdev.com/superv/demo/assets/front/img/logo-2.png"
                alt="">
        </div>
        <div class="form">
            <form class="login-form" action="{{ route('register') }}" method="POST">
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" placeholder="Enter Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
               
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="Enter Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
               
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="Enter Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="Enter Password Confirmation" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <button type="submit">login</button>
            </form>
            <a class="forget-link" href="#">Forgot Password / Username ?</a>
        </div>
    </div>
@endsection
