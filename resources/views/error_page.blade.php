<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops! Something went wrong</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .error-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
            border-top: 5px solid #ff5500;
        }

        .error-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #ff5500 0%, #ff9900 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            color: white;
            font-size: 50px;
            box-shadow: 0 10px 20px rgba(255, 85, 0, 0.2);
        }

        h1 {
            color: #222;
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .error-code {
            background: #f8f9fa;
            padding: 8px 20px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 20px;
            color: #ff5500;
            font-weight: 600;
            border: 2px solid #ffddcc;
        }

        .error-message {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
            padding: 0 20px;
        }

        .error-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-align: left;
            border-left: 4px solid #ff5500;
        }

        .error-details h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-details h3 i {
            color: #ff5500;
        }

        .error-details p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 5px;
        }

        .actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            cursor: pointer;
            min-width: 180px;
        }

        .btn-primary {
            background: linear-gradient(to right, #ff5500, #ff9900);
            color: white;
            box-shadow: 0 5px 15px rgba(255, 85, 0, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 85, 0, 0.4);
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #ddd;
        }

        .btn-secondary:hover {
            background: #e9ecef;
            border-color: #ccc;
        }

        .btn-ghost {
            background: transparent;
            color: #ff5500;
            border: 2px solid #ff5500;
        }

        .btn-ghost:hover {
            background: rgba(255, 85, 0, 0.1);
        }

        .debug-info {
            margin-top: 30px;
            padding: 15px;
            background: #fff3cd;
            border-radius: 10px;
            border-left: 4px solid #ffc107;
            text-align: left;
            display: none;
        }

        .debug-toggle {
            color: #ff5500;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            margin-top: 20px;
            display: inline-block;
        }

        .debug-toggle:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s;
        }

        @media (max-width: 768px) {
            .error-container {
                padding: 30px 20px;
            }
            
            .error-icon {
                width: 100px;
                height: 100px;
                font-size: 40px;
            }
            
            h1 {
                font-size: 26px;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 22px;
            }
            
            .error-message {
                font-size: 16px;
                padding: 0;
            }
            
            .error-icon {
                width: 80px;
                height: 80px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        
        <h1>Oops! Something went wrong</h1>
     
        <div class="error-message">
            {{ $text ?? 'We encountered an unexpected error. Please try again.' }}
        </div>
        
        
        <div class="actions">
            <a href="{{ route('frontend.login') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
        </div>
        
    
    </div>

    <script>
        function toggleDebug() {
            const debugInfo = document.getElementById('debugInfo');
            const toggleLink = document.querySelector('.debug-toggle');
            
            if (debugInfo.style.display === 'none' || debugInfo.style.display === '') {
                debugInfo.style.display = 'block';
                toggleLink.innerHTML = '<i class="fas fa-bug"></i> Hide Debug Information';
            } else {
                debugInfo.style.display = 'none';
                toggleLink.innerHTML = '<i class="fas fa-bug"></i> Show Debug Information';
            }
            
            return false;
        }

        // Add shake animation to error icon
        document.addEventListener('DOMContentLoaded', function() {
            const errorIcon = document.querySelector('.error-icon');
            errorIcon.classList.add('shake');
        });

        // Handle back button
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                window.history.back();
            }
        });

        // Auto-redirect after 30 seconds (optional)
        setTimeout(function() {
            window.location.href = '{{ route("frontend.login") }}';
        }, 30000);
    </script>
</body>
</html>