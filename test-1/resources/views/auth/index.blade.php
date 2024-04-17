<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            background-image: url('{{asset("assets/img/background.png")}}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input[type="tel"],
        .login-container input[type="password"] {
            width: calc(100% - 30px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-image: url('{{asset("assets/img/indonesia-flag.png")}}');
            background-size: 20px;
            background-repeat: no-repeat;
            background-position: 5px center;
            padding-left: 30px;
        }

        .login-container input[type="tel"]::placeholder,
        .login-container input[type="password"]::placeholder {
            color: #999;
        }

        .password-toggle {
            position: relative;
            width: calc(100% - 30px);
        }

        .password-toggle input[type="password"] {
            padding-right: 30px;
        }

        .password-toggle .toggle-icon {
            position: absolute;
            top: 50%;
            right: 5px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #56a0ef;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }

        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .forgot-password {
            text-align: right;
            margin-bottom: 10px;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }
        p{
            color: darkgrey;
        }
        .danger{
            background-color: #ff0505;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <div class="sidebar-brand-icon">
            <img style="width: 10em" src="{{asset('assets/img/login.png')}}" alt="...">
        </div>
        <h2>Welcome to Cool</h2>
        <p>You can simply use your cool to sign in</p>
        @if ($errors->any())
        <div class="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('login')}}" method="POST">
            @csrf
            <input type="tel" name="phone" placeholder="🇮🇩 Phone Number" required>
            <div class="password-toggle">
                <input type="password" name="password" placeholder="Password" required>
                <img class="toggle-icon" src="{{asset('assets/img/eye-slash.svg')}}" onclick="togglePassword()">
            </div>
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
            <input type="submit" value="Masuk">
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.querySelector('input[name="password"]');
            var toggleIcon = document.querySelector('.toggle-icon');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.src = "{{asset('assets/img/eye.svg')}}";
            } else {
                passwordInput.type = "password";
                toggleIcon.src = "{{asset('assets/img/eye-slash.svg')}}";
            }
        }
    </script>
</body>
</html>
