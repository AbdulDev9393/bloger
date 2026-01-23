<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification | Admin Security</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        .otp-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
        }

        .otp-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #ff5500, #ff9900);
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            padding: 8px;
            background: linear-gradient(135deg, #ff5500 0%, #ff9900 100%);
            box-shadow: 0 5px 15px rgba(255, 85, 0, 0.2);
        }

        .otp-container h2 {
            margin-bottom: 15px;
            color: #222;
            font-weight: 700;
            font-size: 24px;
        }

        .otp-container .subtitle {
            color: #666;
            margin-bottom: 25px;
            font-size: 15px;
            line-height: 1.5;
        }

        .otp-box {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
            border-left: 4px solid #ff5500;
        }

        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .otp-input {
            width: 50px;
            height: 60px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            border: 2px solid #ddd;
            border-radius: 10px;
            background: white;
            outline: none;
            transition: all 0.3s;
        }

        .otp-input:focus {
            border-color: #ff5500;
            box-shadow: 0 0 0 3px rgba(255, 85, 0, 0.1);
        }

        .otp-input.filled {
            border-color: #4CAF50;
            background-color: #f8fff9;
        }

        .timer-container {
            margin: 20px 0;
            font-size: 14px;
            color: #666;
        }

        .timer {
            font-weight: 600;
            color: #ff5500;
            font-size: 16px;
        }

        .resend-link {
            color: #ff5500;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .resend-link:hover {
            text-decoration: underline;
            color: #e64e00;
        }

        .resend-link.disabled {
            color: #999;
            cursor: not-allowed;
            text-decoration: none;
        }

        .verify-btn {
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
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(255, 85, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .verify-btn:hover:not(:disabled) {
            background: linear-gradient(to right, #e64e00, #e68a00);
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(255, 85, 0, 0.4);
        }

        .verify-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #ff5500;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            border-left: 4px solid #28a745;
            display: none;
            align-items: center;
            gap: 10px;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
            border-left: 4px solid #dc3545;
            font-size: 14px;
            display: none;
        }

        .email-info {
            background: #e7f3ff;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #0066cc;
            border-left: 4px solid #0066cc;
        }

        .email-info i {
            margin-right: 8px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s;
        }

        @media(max-width: 500px){
            .otp-container{
                padding: 30px 20px;
                border-radius: 15px;
            }
            
            .otp-input {
                width: 45px;
                height: 55px;
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="otp-container">
        <div class="logo-container">
            <img src="https://techblogs.site/storage/blogs/favicon.ico" alt="Logo" onerror="this.onerror=null; this.src='https://via.placeholder.com/70?text=LOGO'">
        </div>

        <h2>OTP Verification</h2>
        <p class="subtitle">Enter the 6-digit verification code sent to your registered email address</p>

        <div class="email-info">
            <i class="fas fa-envelope"></i>
            <span id="userEmail">{{$email}}</span>
        </div>

<div class="otp-box">

    <form action="{{ route('admin.otp.verify') }}" method="GET">

        <div class="otp-inputs" id="otpInputs">
            <!-- JS se OTP inputs yahin aayenge -->
        </div>

        <!-- FINAL OTP yahan combine ho kar aayega -->
        <input type="hidden" name="otp" id="finalOtp">
        <input type="hidden" name="email" id="finalOtp" value="{{$email}}">

     

     

        <div class="error-message" id="errorMessage">
            Invalid OTP code. Please try again.
        </div>

        <!-- BUTTON MUST BE INSIDE FORM -->
        <button type="submit" class="verify-btn" id="verifyBtn" disabled>
            <span class="btn-text">Verify & Continue</span>
            <i class="fas fa-shield-check"></i>
        </button>

    </form>

</div>


        

        <div class="success-message" id="successMessage">
            <i class="fas fa-check-circle"></i>
            <span>Verification successful! Redirecting to admin dashboard...</span>
        </div>

        <a href="{{route('frontend.login')}}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Login
        </a>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const otpLength = 6;
    const otpInputsContainer = document.getElementById('otpInputs');
    const finalOtp = document.getElementById('finalOtp');
    const verifyBtn = document.getElementById('verifyBtn');
    let otpValues = new Array(otpLength).fill('');

    for (let i = 0; i < otpLength; i++) {
        const input = document.createElement('input');
        input.type = 'text';
        input.maxLength = 1;
        input.className = 'otp-input';
        input.dataset.index = i;

        input.addEventListener('input', function () {
            if (/^\d$/.test(this.value)) {
                otpValues[i] = this.value;
                this.classList.add('filled');
                if (i < otpLength - 1) {
                    otpInputsContainer.children[i + 1].focus();
                }
            } else {
                this.value = '';
                otpValues[i] = '';
            }

            const isComplete = otpValues.every(v => v !== '');
            verifyBtn.disabled = !isComplete;
            finalOtp.value = otpValues.join('');
        });

        otpInputsContainer.appendChild(input);
    }
});
</script>

</body>
</html>