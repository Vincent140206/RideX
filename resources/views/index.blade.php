<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
        }

        .container {
            display: flex;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 90%;
            max-width: 1000px;
        }

        .auth-form {
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-logo {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .auth-logo img {
            max-width: 80%;
            height: auto;
        }

        h2 {
            color: #1a4d4a;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .google-btn:hover {
            background-color: #eee;
        }

        .google-btn img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .or-divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #aaa;
            margin-bottom: 20px;
        }

        .or-divider::before,
        .or-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .or-divider:not(:empty)::before {
            margin-right: .5em;
        }

        .or-divider:not(:empty)::after {
            margin-left: .5em;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 12px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        .checkbox-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 8px;
            accent-color: #1a4d4a;
        }

        .checkbox-group a {
            color: #1a4d4a;
            text-decoration: none;
            font-weight: 500;
        }

        .checkbox-group a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1a4d4a;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #153c3a;
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .signup-link a {
            color: #1a4d4a;
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 95%;
            }
            .auth-logo {
                display: none; /* Hide logo on smaller screens */
            }
            .auth-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-form">
            <h2>Log In</h2>
            <p>Enter your email and password to log in!</p>

            <div class="google-btn">
                <img src="https://www.google.com/favicon.ico" alt="Google icon">
                Log in with Google
            </div>

            <div class="or-divider">or</div>

            <form id="loginForm">
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" value="mail@simmmple.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password*</label>
                    <input type="password" id="password" name="password" value="Min. 8 characters" required>
                    <span class="password-toggle" onclick="togglePasswordVisibility('password')">👁️</span>
                </div>
                <div class="checkbox-group">
                    <div>
                        <input type="checkbox" id="rememberMe">
                        <label for="rememberMe">Keep me logged in</label>
                    </div>
                    <a href="#">Forgot password?</a>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Log In</button>
                </form>

            </form>
            <div class="signup-link">
                Don't have an account? <a href="signup.html">Sign up here.</a>
            </div>
        </div>
        <div class="auth-logo">
            <img src="Logo RIDEX.jpg" alt="RideX Logo">
        </div>
    </div>

    <script>
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            const toggle = input.nextElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                toggle.textContent = '🔒';
            } else {
                input.type = 'password';
                toggle.textContent = '👁️';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Simple client-side validation
            if (email === "admin@ridex.com" && password === "password123") { // Dummy login for demonstration
                alert("Login successful!");
                localStorage.setItem('loggedInUser', JSON.stringify({ email: email, role: 'Administrator' }));
                window.location.href = 'dashboard.html'; // Redirect to dashboard
            } else {
                alert("Invalid email or password. Please try again.");
            }
        });
    </script>
</body>
</html>