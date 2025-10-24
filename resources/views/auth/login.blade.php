<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Link to CSS -->
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <h2>Login</h2>
      <div class="input-field">
        <input id="email" type="email" name="email" required autofocus autocomplete="username" />
        <label for="email">Masukan username</label>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="input-field">
        <input id="password" type="password" name="password" required autocomplete="current-password" />
        <label for="password">Masukkan password</label>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="forget">
        <label>
          <input id="remember_me" type="checkbox" name="remember" />
          <span>Remember me</span>
        </label>
      </div>
      <button type="submit">Log In</button>
    </form>
  </div>
</body>
@if(session('login_error'))
<script>
  Swal.fire({
    icon: 'error',
    title: 'Login Gagal',
    text: '{{ session("login_error") }}',
    confirmButtonColor: '#d33',
    confirmButtonText: 'Coba Lagi'
  });
</script>
@endif
</html>