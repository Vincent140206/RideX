<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Top Up</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Make the entire profile section clickable */
        .sidebar .profile-section a {
            text-decoration: none;
            color: inherit; /* Inherit color from parent */
            display: block; /* Make the entire div clickable */
            padding: 10px 0;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .sidebar .profile-section a:hover {
            background-color: #e6f7f5;
        }

        .sidebar .profile-avatar {
            width: 80px;
            height: 80px;
            background-color: #ddd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            color: #888;
            margin: 0 auto 10px;
        }

        .sidebar .profile-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .sidebar .profile-role {
            background-color: #e6f7f5;
            color: #1a4d4a;
            padding: 4px 10px;
            border-radius: 5px;
            font-size: 12px;
            display: inline-block;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 10px;
        }

        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: #555;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar nav ul li a i {
            margin-right: 15px;
            font-size: 18px;
            width: 25px; /* Ensure consistent icon alignment */
            text-align: center;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background-color: #e6f7f5;
            color: #1a4d4a;
            font-weight: 500;
        }

        .sidebar .logout-section {
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .sidebar .logout-section a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: #e74c3c; /* Red color for logout */
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar .logout-section a i {
            margin-right: 15px;
            font-size: 18px;
            width: 25px;
            text-align: center;
        }

        .sidebar .logout-section a:hover {
            background-color: #ffe6e6;
            color: #c0392b;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f0f2f5;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a4d4a;
            color: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header .logo {
            font-size: 24px;
            font-weight: 700;
        }

        .header .user-menu {
            position: relative;
            cursor: pointer;
        }

        .header .user-menu i {
            font-size: 24px;
        }

        .header .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
            top: 40px;
            border-radius: 5px;
        }

        .header .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
        }

        .header .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .header .user-menu.active .dropdown-content {
            display: block;
        }

        .section-title {
            color: #1a4d4a;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 20px;
        }

        .payment-methods {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .payment-methods button {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            min-width: 100px; /* Ensure buttons don't get too small */
        }

        .payment-methods button.active {
            background-color: #1a4d4a;
            color: white;
            border-color: #1a4d4a;
        }

        .nominal-input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .nominal-input-group input {
            width: calc(100% - 40px); /* Adjust for "Rp" and icon */
            padding: 10px 10px 10px 40px; /* Padding for "Rp" prefix */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .nominal-input-group .rp-prefix {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
            font-size: 16px;
        }

        .nominal-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .nominal-buttons button {
            padding: 15px 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .nominal-buttons button:hover {
            background-color: #e6f7f5;
            border-color: #1a4d4a;
        }

        .nominal-buttons button.selected {
            background-color: #1a4d4a;
            color: white;
            border-color: #1a4d4a;
        }

        .action-buttons-bottom {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .action-buttons-bottom .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            flex-grow: 1;
            transition: background-color 0.3s ease;
        }

        .action-buttons-bottom .btn-back:hover {
            background-color: #5a6268;
        }

        .action-buttons-bottom .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            flex-grow: 1;
            transition: background-color 0.3s ease;
        }

        .action-buttons-bottom .btn-submit:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
                padding: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }
            .sidebar nav ul {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .sidebar nav ul li {
                margin: 5px;
            }
            .sidebar nav ul li a {
                padding: 8px 12px;
                font-size: 14px;
            }
            .sidebar nav ul li a i {
                margin-right: 8px;
                font-size: 16px;
            }
            .sidebar .profile-section, .sidebar .logout-section {
                display: none; /* Hide for mobile to save space */
            }
            .main-content {
                padding: 15px;
            }
            .payment-methods {
                flex-direction: column;
            }
            .payment-methods button {
                width: 100%;
            }
            .nominal-buttons {
                grid-template-columns: repeat(2, 1fr); /* 2 columns on small screens */
            }
            .action-buttons-bottom {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <a href="profile.html">
                <div class="profile-avatar"><i class="fas fa-user"></i></div>
                <div class="profile-name" id="sidebarUserName">Name</div>
                <div class="profile-role" id="sidebarUserRole">Administrator</div>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.html"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="peminjaman.html"><i class="fas fa-motorcycle"></i> Peminjaman</a></li>
                <li><a href="poin_reward.html"><i class="fas fa-award"></i> Poin Reward</a></li>
                <li><a href="pembayaran.html" class="active"><i class="fas fa-wallet"></i> Pembayaran</a></li>
                <li><a href="riwayat_peminjaman.html"><i class="fas fa-history"></i> Riwayat Peminjaman</a></li>
            </ul>
        </nav>
        <div class="logout-section">
            <a href="#" id="logoutButton"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="logo">RideX</div>
            <div class="user-menu" id="userMenuToggle">
                <i class="fas fa-user-circle"></i>
                <div class="dropdown-content">
                    <a href="profile.html">Profile</a>
                    <a href="#" id="dropdownLogoutButton">Log Out</a>
                </div>
            </div>
        </div>

        <h2 class="section-title">Top Up</h2>

        <div class="card">
            <h3>Pilih sumber dana:</h3>
            <div class="payment-methods">
                <button class="payment-method-button active" data-method="M-banking">M-banking</button>
                <button class="payment-method-button" data-method="ShopeePay">ShopeePay</button>
                <button class="payment-method-button" data-method="OVO">OVO</button>
                <button class="payment-method-button" data-method="Gopay">Gopay</button>
            </div>

            <h3>Masukkan nominal:</h3>
            <div class="nominal-input-group">
                <span class="rp-prefix">Rp</span>
                <input type="text" id="nominalInput" placeholder="Masukkan nominal lainnya" oninput="formatAndSelectNominal(this)">
            </div>

            <div class="nominal-buttons">
                <button data-nominal="20000">20.000</button>
                <button data-nominal="30000">30.000</button>
                <button data-nominal="40000">40.000</button>
                <button data-nominal="50000">50.000</button>
                <button data-nominal="55000">55.000</button>
                <button data-nominal="70000">70.000</button>
                <button data-nominal="75000">75.000</button>
                <button data-nominal="100000">100.000</button>
                <button data-nominal="150000">150.000</button>
                <button data-nominal="200000">200.000</button>
                <button data-nominal="300000">300.000</button>
                <button data-nominal="500000">500.000</button>
            </div>

            <div class="action-buttons-bottom">
                <button class="btn-back" id="backButton">Kembali</button>
                <button class="btn-submit" id="submitTopUpButton">Submit</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- User Session and Header Logic (copied from other pages for consistency) ---
            let loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'));
            if (!loggedInUser) {
                loggedInUser = { name: "Pengunjung", email: "guest@ridex.com", role: "Guest", phone: "" };
            }
            document.getElementById('sidebarUserName').textContent = loggedInUser.name;
            document.getElementById('sidebarUserRole').textContent = loggedInUser.role;

            document.getElementById('logoutButton').addEventListener('click', function(e) {
                e.preventDefault();
                localStorage.removeItem('loggedInUser');
                window.location.href = 'index.html';
            });

            document.getElementById('dropdownLogoutButton').addEventListener('click', function(e) {
                e.preventDefault();
                localStorage.removeItem('loggedInUser');
                window.location.href = 'index.html';
            });

            document.getElementById('userMenuToggle').addEventListener('click', function() {
                this.classList.toggle('active');
            });

            window.addEventListener('click', function(e) {
                const userMenu = document.getElementById('userMenuToggle');
                if (!userMenu.contains(e.target)) {
                    userMenu.classList.remove('active');
                }
            });

            // --- Top Up Page Specific Logic ---
            const paymentMethodButtons = document.querySelectorAll('.payment-method-button');
            const nominalInput = document.getElementById('nominalInput');
            const nominalButtons = document.querySelectorAll('.nominal-buttons button');
            const backButton = document.getElementById('backButton');
            const submitTopUpButton = document.getElementById('submitTopUpButton');

            let selectedMethod = 'M-banking'; // Default selected method
            let selectedNominal = 0; // Stores the numeric value of the selected nominal

            // Initialize active payment method button
            paymentMethodButtons.forEach(button => {
                if (button.dataset.method === selectedMethod) {
                    button.classList.add('active');
                }
                button.addEventListener('click', () => {
                    paymentMethodButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    selectedMethod = button.dataset.method;
                });
            });

            // Handle nominal button clicks
            nominalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    nominalButtons.forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');
                    selectedNominal = parseInt(button.dataset.nominal);
                    nominalInput.value = selectedNominal.toLocaleString('id-ID'); // Update input field
                });
            });

            // Format nominal input as user types and select corresponding button
            window.formatAndSelectNominal = function(input) {
                let value = input.value.replace(/\D/g, ''); // Remove non-digits
                let numericValue = parseInt(value || '0');
                input.value = numericValue.toLocaleString('id-ID'); // Format with dot separators

                selectedNominal = numericValue; // Update selected nominal value

                // Remove 'selected' class from all nominal buttons
                nominalButtons.forEach(btn => btn.classList.remove('selected'));

                // Find and select the matching button if available
                const matchingButton = Array.from(nominalButtons).find(btn => parseInt(btn.dataset.nominal) === numericValue);
                if (matchingButton) {
                    matchingButton.classList.add('selected');
                }
            };

            // Back button functionality
            backButton.addEventListener('click', () => {
                window.location.href = 'pembayaran.html';
            });

            // Submit button functionality
            submitTopUpButton.addEventListener('click', () => {
                if (selectedNominal > 0) {
                    if (confirm(`Anda akan melakukan Top Up sebesar Rp${selectedNominal.toLocaleString('id-ID')} menggunakan ${selectedMethod}. Lanjutkan?`)) {
                        // Get existing transactions from localStorage
                        let transactions = JSON.parse(localStorage.getItem('transactions')) || [];

                        // Find the highest existing 'no' and increment it
                        const newNo = transactions.length > 0 ? Math.max(...transactions.map(t => t.no)) + 1 : 1;

                        // Create new transaction object
                        const newTransaction = {
                            no: newNo,
                            user: loggedInUser.name, // Use logged-in user's name
                            type: `Top-Up Saldo (${selectedMethod})`,
                            date: new Date().toISOString().slice(0, 10), // Current date (YYYY-MM-DD)
                            amount: selectedNominal
                        };

                        // Add new transaction and save to localStorage
                        transactions.push(newTransaction);
                        localStorage.setItem('transactions', JSON.stringify(transactions));

                        // Update current balance in localStorage
                        let currentBalance = parseFloat(localStorage.getItem('currentBalance') || '0');
                        currentBalance += selectedNominal;
                        localStorage.setItem('currentBalance', currentBalance);

                        alert('Top Up berhasil!');
                        window.location.href = 'pembayaran.html'; // Redirect back to payment page
                    }
                } else {
                    alert('Silakan masukkan nominal Top Up atau pilih dari opsi yang tersedia.');
                }
            });
        });
    </script>
</body>
</html>