<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <h2>Register</h2>
      <div class="input-field">
        <input id="name" type="text" name="name" required autofocus autocomplete="name" value="{{ old('name') }}" />
        <label for="name">Enter your name</label>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div class="input-field">
        <input id="email" type="email" name="email" required autocomplete="username" value="{{ old('email') }}" />
        <label for="email">Enter your email</label>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="input-field">
        <input id="password" type="password" name="password" required autocomplete="new-password" />
        <label for="password">Enter your password</label>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="input-field">
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
        <label for="password_confirmation">Confirm your password</label>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
      <button type="submit">Register</button>
      <div class="register">
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
