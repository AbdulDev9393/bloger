<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Secure Access</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
        }

        .login-container {
            background: #fff;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        /* Decorative elements */
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #ff5500, #ff9900);
        }

        .logo-container {
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }

        .logo-container img {
            width: 90px;
            height: 90px;
            object-fit: contain;
            border-radius: 50%;
            padding: 10px;
            background: linear-gradient(135deg, #ff5500 0%, #ff9900 100%);
            box-shadow: 0 5px 15px rgba(255, 85, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.05);
        }

        .logo-container::after {
            content: 'Admin Portal';
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .login-container h2 {
            margin-bottom: 30px;
            color: #222;
            font-weight: 700;
            font-size: 28px;
            position: relative;
            display: inline-block;
        }

        .login-container h2::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 4px;
            background: #ff5500;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .login-form {
            margin-top: 10px;
        }

        .input-group {
            margin-bottom: 25px;
            text-align: left;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }

        .input-group .input-with-icon {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group .input-with-icon i {
            position: absolute;
            left: 15px;
            color: #777;
            font-size: 18px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            background-color: #f9f9f9;
        }

        .input-group input:focus {
            border-color: #ff5500;
            outline: none;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(255, 85, 0, 0.1);
        }

        .input-group input:valid {
            border-color: #4CAF50;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            background: none;
            border: none;
            color: #777;
            cursor: pointer;
            font-size: 18px;
        }

        .password-toggle:hover {
            color: #ff5500;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(to right, #ff5500, #ff9900);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            box-shadow: 0 5px 15px rgba(255, 85, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .login-btn:hover {
            background: linear-gradient(to right, #e64e00, #e68a00);
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(255, 85, 0, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn i {
            font-size: 18px;
        }

        .form-footer {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }

        .forgot-link {
            color: #ff5500;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .forgot-link:hover {
            color: #e64e00;
            text-decoration: underline;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            cursor: pointer;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
            accent-color: #ff5500;
        }

        .security-notice {
            margin-top: 25px;
            padding: 12px;
            background-color: #f8f9fa;
            border-radius: 8px;
            font-size: 13px;
            color: #666;
            border-left: 4px solid #ff5500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .security-notice i {
            color: #ff5500;
            font-size: 16px;
        }

        /* Loading animation for button */
        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive design */
        @media(max-width: 500px){
            .login-container{
                padding: 35px 25px;
                border-radius: 15px;
            }
            
            .logo-container img {
                width: 80px;
                height: 80px;
            }
            
            .form-footer {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }

        /* Animation for form */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-form {
            animation: fadeIn 0.5s ease-out;
        }

        /* Error styling */
        .error-message {
            color: #ff3333;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .input-group.error input {
            border-color: #ff3333;
            background-color: #fff5f5;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Website Logo -->
        <div class="logo-container">
            <img src="{{ asset('storage/sitelogo.png') }}" alt="Website Logo" onerror="this.onerror=null; this.src='https://via.placeholder.com/90?text=LOGO'">
        </div>

        <h2>Admin Login</h2>

        <form class="login-form" action="{{route('admin.login.post')}}" method="POST" id="loginForm">
            @csrf
            <div class="input-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> Email Address
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" id="email" placeholder="admin@example.com" required>
                </div>
                <div class="error-message" id="email-error">Please enter a valid email address</div>
            </div>

            <div class="input-group">
                <label for="password">
                    <i class="fas fa-key"></i> Password
                </label>
                <div class="input-with-icon" style="position: relative;">
                    <i class="fas fa-lock" style="left: 15px; position: absolute; top: 50%; transform: translateY(-50%);"></i>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required style="padding-right: 45px;">

                </div>
                <div class="error-message" id="password-error">Password must be at least 8 characters</div>
            </div>



            <button type="submit" class="login-btn" id="submitBtn">
                <span class="btn-text">Login</span>
                <i class="fas fa-sign-in-alt"></i>
                <div class="loading" id="loadingSpinner"></div>
            </button>
<div class="form-footer" style="margin-top: 20px; justify-content: center;">
    <a href="{{ route('admin.Registar') }}" class="forgot-link">
        <i class="fas fa-key"></i> Change / Forgot Password?
    </a>
</div>
          
        </form>
    </div>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            confirmButtonColor: '#28a745',
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#ff3333',
        });
    @endif
</script>

</body>
</html>