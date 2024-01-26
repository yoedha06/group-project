<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Login & Signup Form</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body>
<section class="wrapper">
      <div class="form signup">
        <header>Signup</header>
        <form action="#">
          <input type="text" placeholder="Email address" required />
          <input type="password" placeholder="Password" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" />
            <label for="signupCheck">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" />
        </form>
      </div>
<div class="form login">
<header>Login</header>
    <div class="container">
        <form action="" method="POST">
            @csrf
                <label for="id" class="form-label">Email</label>
                <input value="{{ old('email') }}" placeholder="Email address"name="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    id="id"required >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password"placeholder="Password"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"required >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            <input type="submit" value="Login" />
        </form>
    </div>
    <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");
        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
</body>
</html>