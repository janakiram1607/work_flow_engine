<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <a style="color:rgb(61, 61, 238);font-size:40px;" href="/">WorkFlow Engine</a>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if (\Session::has('message'))
            <div class="alert alert-success" style="color:green; text-align:center;">
                <ul>
                    <li>{!! \Session::get('message') !!}</li>
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="fname" :value="__('First Name')" />

                <x-input id="fname" class="block mt-1 w-full" type="text" name="first_name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label for="lname" :value="__('Last Name')" />

                <x-input id="lname" class="block mt-1 w-full" type="text" name="last_name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-label for="dob" :value="__('Date of Birth')" />

                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select id="role"  class="block mt-1 w-full" name="role">
                    <option value="customer">
                        Customer
                    </option>
                    <option value="admin">
                        Admin
                    </option>

                </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sign In') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
