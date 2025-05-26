<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Sign Up</title>
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

        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="file"] {
            width: calc(100% - 20px);
            padding: 12px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input[type="file"] {
            padding: 8px 10px; /* Adjust padding for file input */
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
            justify-content: flex-start; /* Align to start */
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

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .login-link a {
            color: #1a4d4a;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
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
            <h2>Sign Up</h2>
            <p>Enter your email and password to sign up!</p>

            <div class="google-btn">
                <img src="https://www.google.com/favicon.ico" alt="Google icon">
                Sign up with Google
            </div>

            <div class="or-divider">or</div>

            <form id="signupForm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="Donia" required>
                </div>
                <div class="form-group">
                    <label for="phone">No. Telp</label>
                    <input type="tel" id="phone" name="phone" value="085xxxxxxxx" required>
                </div>
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" value="mail@simmmple.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password*</label>
                    <input type="password" id="password" name="password" value="Min. 8 characters" required>
                    <span class="password-toggle" onclick="togglePasswordVisibility('password')">👁️</span>
                </div>
                <div class="form-group">
                    <label for="ktp">Kartu Tanda Penduduk</label>
                    <input type="file" id="ktp" name="ktp" accept="image/*,.pdf">
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="keepMeLoggedIn">
                    <label for="keepMeLoggedIn">Keep me logged in</label>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <div class="login-link">
                Already have an account? <a href="index.html">Log in here.</a>
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

        document.getElementById('signupForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const ktpFile = document.getElementById('ktp').files[0]; // Get the file object

            // Simple client-side validation and storage
            if (name && phone && email && password) {
                const newUser = {
                    name: name,
                    phone: phone,
                    email: email,
                    password: password, // In a real app, hash this password!
                    ktpFileName: ktpFile ? ktpFile.name : 'N/A'
                };

                let users = JSON.parse(localStorage.getItem('users')) || [];
                users.push(newUser);
                localStorage.setItem('users', JSON.stringify(users));

                alert("Sign up successful! Please log in.");
                window.location.href = 'index.html'; // Redirect to login page
            } else {
                alert("Please fill in all required fields.");
            }
        });
    </script>
</body>
</html>