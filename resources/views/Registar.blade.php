
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration | Create Account</title>
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

        .registration-container {
            background: #fff;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .registration-container:hover {
            transform: translateY(-5px);
        }

        /* Decorative elements */
        .registration-container::before {
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
            content: 'Admin Registration';
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .registration-container h2 {
            margin-bottom: 30px;
            color: #222;
            font-weight: 700;
            font-size: 28px;
            position: relative;
            display: inline-block;
        }

        .registration-container h2::after {
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

        .registration-form {
            margin-top: 10px;
        }

        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-row .input-group {
            flex: 1;
        }

        .input-group {
            margin-bottom: 20px;
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

        .input-group input, .input-group select {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            background-color: #f9f9f9;
        }

        .input-group input:focus, .input-group select:focus {
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

        .register-btn {
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

        .register-btn:hover {
            background: linear-gradient(to right, #e64e00, #e68a00);
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(255, 85, 0, 0.4);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .register-btn i {
            font-size: 18px;
        }

        .form-footer {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }

        .login-link {
            color: #ff5500;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .login-link:hover {
            color: #e64e00;
            text-decoration: underline;
        }

        .terms-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            cursor: pointer;
            font-size: 13px;
        }

        .terms-checkbox input {
            width: 16px;
            height: 16px;
            accent-color: #ff5500;
        }

        .terms-checkbox a {
            color: #ff5500;
            text-decoration: none;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
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

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            height: 5px;
            background: #eee;
            border-radius: 5px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
        }

        .strength-weak {
            background: #ff3333;
            width: 33%;
        }

        .strength-medium {
            background: #ff9900;
            width: 66%;
        }

        .strength-strong {
            background: #4CAF50;
            width: 100%;
        }

        .strength-text {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            text-align: right;
        }

        /* Error styling */
        .error-message {
            color: #ff3333;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .input-group.error input, .input-group.error select {
            border-color: #ff3333;
            background-color: #fff5f5;
        }

        /* Success message */
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
            display: none;
        }

        /* Responsive design */
        @media(max-width: 500px){
            .registration-container{
                padding: 35px 25px;
                border-radius: 15px;
            }
            
            .logo-container img {
                width: 80px;
                height: 80px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
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

        .registration-form {
            animation: fadeIn 0.5s ease-out;
        }

        /* Role selection */
        .role-selection {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .role-option {
            flex: 1;
            text-align: center;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .role-option:hover {
            border-color: #ff5500;
            background: #fff5f0;
        }

        .role-option.selected {
            border-color: #ff5500;
            background: #fff5f0;
            color: #ff5500;
            font-weight: 600;
        }

        .role-option i {
            font-size: 24px;
            margin-bottom: 10px;
            display: block;
        }
    </style>
</head>
<body>

    <div class="registration-container">
        <!-- Website Logo -->
        <div class="logo-container">
            <img src="https://techblogs.site/storage/blogs/favicon.ico" alt="Website Logo" onerror="this.onerror=null; this.src='https://via.placeholder.com/90?text=LOGO'">
        </div>

        <h2>Admin Registration</h2>

        <div class="success-message" id="successMessage">
            <i class="fas fa-check-circle"></i> Registration successful! You will receive an email once your account is approved by Super Admin.
        </div>

        <form class="registration-form" action="{{route('admin.Registar.store')}}" method="POST" id="registrationForm">
            @csrf
            
            <div class="form-row">
                <div class="input-group">
                    <label for="firstName">
                        <i class="fas fa-user"></i> First Name
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" name="firstName" id="firstName" placeholder="John" required>
                    </div>
                    <div class="error-message" id="firstName-error">First name is required</div>
                </div>

                <div class="input-group">
                    <label for="lastName">
                        <i class="fas fa-user"></i> Last Name
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lastName" id="lastName" placeholder="Doe" required>
                    </div>
                    <div class="error-message" id="lastName-error">Last name is required</div>
                </div>
            </div>

            <div class="input-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> Email Address
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="admin@example.com" required>
                </div>
                <div class="error-message" id="email-error">Please enter a valid email address</div>
            </div>

          

            <div class="form-row">
                <div class="input-group">
                    <label for="password">
                        <i class="fas fa-key"></i> Password
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Create password" required>
                       
                    </div>
                    
                  </div>

               
            </div>

          
           
            <div class="error-message" id="terms-error">You must agree to the terms and conditions</div>

            <button type="submit" class="register-btn" id="submitBtn">
                <span class="btn-text">Register Admin Account</span>
                <i class="fas fa-user-plus"></i>
                <div class="loading" id="loadingSpinner"></div>
            </button>

          
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