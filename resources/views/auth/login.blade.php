<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIMENU</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            margin:0;
            overflow:hidden;
            background:#f5f5f5;
        }

        .login-page{
            width:100%;
            height:100vh;
            display:flex;
        }

        .left-side{
            width:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:80px;
        }

        .login-box{
            width:100%;
            max-width:500px;
        }

        .login-title{
            font-size:60px;
            font-weight:700;
            color:#1F5168;
            margin-bottom:50px;
        }

        .form-control{
            height:55px;
            border-radius:12px;
        }

        .btn-login{
            width:100%;
            height:60px;
            border:none;
            border-radius:12px;
            background:#1F5168;
            color:white;
            font-size:24px;
            font-weight:600;
        }

        .forgot{
            text-align:center;
            margin:20px 0;
        }

        .forgot a{
            text-decoration:none;
            color:#1F5168;
            font-size:24px;
        }

        .right-side{
            width:50%;
            background:#1F5168;
            border-radius:180px 0 0 180px;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            padding:80px;
        }

        .welcome-title{
            font-size:70px;
            font-weight:300;
        }

        .welcome-title span{
            font-weight:700;
        }

        .welcome-subtitle{
            font-size:30px;
            font-style:italic;
        }

    </style>

</head>
<body>

<div class="login-page">

    <div class="left-side">

        <div class="login-box">

            <h1 class="login-title">
                LOGIN
            </h1>

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="mb-4">

                    <label class="mb-2 fs-3">
                        Username
                    </label>

                    <input type="text" name="username"
                           class="form-control" required>

                </div>

                <div class="mb-3">

                    <label class="mb-2 fs-3">
                        Password
                    </label>

                    <div class="position-relative">

                        <input type="password" name="password"
                               class="form-control" required>

                        <i class="fa-solid fa-eye position-absolute top-50 end-0 translate-middle-y me-3"></i>

                    </div>

                </div>

                <div class="forgot">

                    <a href="#">
                        Forgot your password?
                    </a>

                </div>

                <button type="submit" class="btn-login">
                    Login
                </button>

            </form>
            </div>

    </div>

    <div class="right-side">

        <div>

            <div class="welcome-title">
                Welcome to <span>SIMENU</span>
            </div>

            <div class="welcome-subtitle">
                Manage inpatient meal plans and patient dietary needs efficiently
            </div>

        </div>

    </div>

</div>

</body>
</html>