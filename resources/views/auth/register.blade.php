<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Register Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Arial', sans-serif;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl">
    <div class="md:w-1/2 bg-gradient-to-r from-purple-500 to-orange-300 p-10 flex flex-col justify-center items-center">
      <h1 class="text-4xl text-white font-bold">Create an Account</h1>
    </div>
    <div class="md:w-1/2 p-10">
      <h2 class="text-3xl font-bold mb-4">Register</h2>
      <p class="text-gray-500 mb-6">Please fill out the form to create your account.</p>

      <!-- Registration Form -->
      <x-guest-layout>
        <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
          @csrf

          <!-- Name -->
          <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
          </div>

          <!-- Email Address -->
          <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
          </div>

          <!-- Password -->
          <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
          </div>

          <!-- Confirm Password -->
          <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
          </div>

          <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
              {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-3 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              {{ __('Register') }}
            </x-primary-button>
          </div>
        </form>
      </x-guest-layout>
    </div>
  </div>
</body>
</html>
