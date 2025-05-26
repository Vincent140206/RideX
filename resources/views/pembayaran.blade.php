<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Pembayaran</title>
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
            padding: 20px;
            margin-bottom: 20px;
        }

        .balance-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #1a4d4a; /* Teal background for the balance card */
            color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .balance-info {
            display: flex;
            align-items: center;
        }

        .balance-info i {
            font-size: 32px;
            margin-right: 15px;
        }

        .balance-text h3 {
            margin: 0;
            font-weight: 500;
            font-size: 18px;
        }

        .balance-text p {
            margin: 5px 0 0;
            font-size: 28px;
            font-weight: 700;
        }

        .top-up-button {
            background-color: #28a745; /* Green for Top Up */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .top-up-button:hover {
            background-color: #218838;
        }

        .table-controls {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .table-controls .btn-tambah {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .table-controls .btn-tambah:hover {
            background-color: #218838;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: 600;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Styles for action buttons (gray color) */
        .data-table .action-buttons button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            margin: 0 5px;
            padding: 0;
            color: #888; /* Default gray color */
            transition: color 0.3s ease;
        }

        .data-table .action-buttons button:hover {
            color: #555; /* Darker gray on hover */
        }

        .data-table .action-buttons .btn-edit,
        .data-table .action-buttons .btn-delete {
            color: inherit; /* Inherit the gray color */
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            animation-name: animatetop;
            animation-duration: 0.4s;
        }

        /* Add Animation */
        @keyframes animatetop {
            from {top: -300px; opacity: 0}
            to {top: 0; opacity: 1}
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content h3 {
            margin-top: 0;
            color: #1a4d4a;
            margin-bottom: 20px;
        }

        .modal-content form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .modal-content form input[type="text"],
        .modal-content form input[type="email"],
        .modal-content form input[type="number"],
        .modal-content form input[type="date"],
        .modal-content form select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-content form button {
            background-color: #1a4d4a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .modal-content form button:hover {
            background-color: #153a38;
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
            .balance-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }
            .balance-info {
                margin-bottom: 10px;
            }
            .top-up-button {
                width: 100%;
                text-align: center;
            }
            .modal-content {
                width: 95%;
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

        <h2 class="section-title">Pembayaran</h2>

        <div class="card balance-card">
            <div class="balance-info">
                <i class="fas fa-wallet"></i>
                <div class="balance-text">
                    <h3>Saldo E-money</h3>
                    <p id="currentBalance">Rp500.000</p>
                </div>
            </div>
            <button class="top-up-button" id="topUpBtn">Top Up</button>
        </div>

        <h2 class="section-title" style="margin-top: 30px;">Riwayat Transaksi</h2>

        <div class="card">
            <div class="table-controls">
                <button class="btn-tambah" id="addTransactionButton">Tambah</button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Jenis Transaksi</th>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="transactionTableBody">
                    </tbody>
            </table>
        </div>
    </div>

    <div id="transactionModal" class="modal">
        <div class="modal-content">
            <span class="close-button transaction-close">&times;</span>
            <h3 id="transactionModalTitle">Tambah Transaksi</h3>
            <form id="transactionForm">
                <input type="hidden" id="transactionNo">
                <label for="transactionUser">User:</label>
                <input type="text" id="transactionUser" required>

                <label for="transactionType">Jenis Transaksi:</label>
                <input type="text" id="transactionType" required>

                <label for="transactionDate">Tanggal:</label>
                <input type="date" id="transactionDate" required>

                <label for="transactionAmount">Nominal (Rp):</label>
                <input type="number" id="transactionAmount" required min="0">

                <button type="submit" id="saveTransactionButton">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- User Session and Header Logic ---
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

            // --- Pembayaran Page Specific Logic ---

            // Top Up Button Redirection
            document.getElementById('topUpBtn').addEventListener('click', function() {
                window.location.href = 'top_up.html';
            });

            // Transaction CRUD Logic
            const transactionTableBody = document.getElementById('transactionTableBody');
            const addTransactionButton = document.getElementById('addTransactionButton');
            const transactionModal = document.getElementById('transactionModal');
            const transactionCloseButton = document.querySelector('.transaction-close');
            const transactionForm = document.getElementById('transactionForm');
            const transactionModalTitle = document.getElementById('transactionModalTitle');
            const transactionNoInput = document.getElementById('transactionNo');
            const transactionUserInput = document.getElementById('transactionUser');
            const transactionTypeInput = document.getElementById('transactionType');
            const transactionDateInput = document.getElementById('transactionDate');
            const transactionAmountInput = document.getElementById('transactionAmount');
            const currentBalanceDisplay = document.getElementById('currentBalance');

            let transactions = JSON.parse(localStorage.getItem('transactions')) || [
                { no: 1, user: 'Ningring', type: 'Top-Up Saldo (M-Banking)', date: '2024-05-02', amount: 200000 },
                { no: 2, user: 'Karina', type: 'Pembayaran Pesanan', date: '2024-05-24', amount: 30000 },
                { no: 3, user: 'Winter', type: 'Pembayaran Pesanan', date: '2024-05-02', amount: 30000 },
                { no: 4, user: 'Giselle', type: 'Top-Up Saldo (M-Banking)', date: '2024-05-02', amount: 200000 }
            ];

            // Initialize balance (simple sum of all top-ups minus payments for demonstration)
            // A more robust system would calculate balance based on transaction types
            let balance = 0;
            function calculateBalance() {
                balance = 0;
                transactions.forEach(t => {
                    if (t.type.toLowerCase().includes('top-up')) {
                        balance += t.amount;
                    } else if (t.type.toLowerCase().includes('pembayaran')) {
                        balance -= t.amount;
                    }
                });
                currentBalanceDisplay.textContent = 'Rp' + balance.toLocaleString('id-ID');
                localStorage.setItem('currentBalance', balance); // Save balance
            }


            function renderTransactions() {
                transactionTableBody.innerHTML = '';
                transactions.forEach((transaction, index) => {
                    const row = transactionTableBody.insertRow();
                    row.insertCell().textContent = transaction.no;
                    row.insertCell().textContent = transaction.user;
                    row.insertCell().textContent = transaction.type;
                    row.insertCell().textContent = transaction.date;
                    row.insertCell().textContent = 'Rp' + transaction.amount.toLocaleString('id-ID');

                    const actionCell = row.insertCell();
                    actionCell.classList.add('action-buttons');
                    const editButton = document.createElement('button');
                    editButton.innerHTML = '<i class="fas fa-edit"></i>';
                    editButton.classList.add('btn-edit');
                    editButton.title = 'Edit';
                    editButton.onclick = () => editTransaction(transaction.no);
                    actionCell.appendChild(editButton);

                    const deleteButton = document.createElement('button');
                    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    deleteButton.classList.add('btn-delete');
                    deleteButton.title = 'Delete';
                    deleteButton.onclick = () => deleteTransaction(transaction.no);
                    actionCell.appendChild(deleteButton);
                });
                localStorage.setItem('transactions', JSON.stringify(transactions));
                calculateBalance(); // Recalculate and update balance after rendering
            }

            addTransactionButton.addEventListener('click', () => {
                transactionModalTitle.textContent = 'Tambah Transaksi';
                transactionForm.reset();
                const newNo = transactions.length > 0 ? Math.max(...transactions.map(t => t.no)) + 1 : 1;
                transactionNoInput.value = newNo;
                transactionModal.style.display = 'flex';
            });

            transactionCloseButton.addEventListener('click', () => {
                transactionModal.style.display = 'none';
            });

            transactionForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const newTransaction = {
                    no: parseInt(transactionNoInput.value),
                    user: transactionUserInput.value,
                    type: transactionTypeInput.value,
                    date: transactionDateInput.value,
                    amount: parseInt(transactionAmountInput.value)
                };

                const existingIndex = transactions.findIndex(t => t.no === newTransaction.no);

                if (existingIndex > -1) {
                    transactions[existingIndex] = newTransaction;
                } else {
                    transactions.push(newTransaction);
                }
                transactions.sort((a, b) => a.no - b.no); // Ensure consistent order
                renderTransactions();
                transactionModal.style.display = 'none';
            });

            function editTransaction(no) {
                const transactionToEdit = transactions.find(t => t.no === no);
                if (transactionToEdit) {
                    transactionModalTitle.textContent = 'Edit Transaksi';
                    transactionNoInput.value = transactionToEdit.no;
                    transactionUserInput.value = transactionToEdit.user;
                    transactionTypeInput.value = transactionToEdit.type;
                    transactionDateInput.value = transactionToEdit.date;
                    transactionAmountInput.value = transactionToEdit.amount;
                    transactionModal.style.display = 'flex';
                }
            }

            function deleteTransaction(no) {
                if (confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) {
                    transactions = transactions.filter(t => t.no !== no);
                    renderTransactions();
                }
            }

            // Close modal when clicking outside of it
            window.addEventListener('click', (event) => {
                if (event.target == transactionModal) {
                    transactionModal.style.display = 'none';
                }
            });

            // Initial render
            renderTransactions();

            // Load initial balance
            const storedBalance = localStorage.getItem('currentBalance');
            if (storedBalance) {
                currentBalanceDisplay.textContent = 'Rp' + parseFloat(storedBalance).toLocaleString('id-ID');
                balance = parseFloat(storedBalance);
            } else {
                 // If no stored balance, calculate from initial data
                calculateBalance();
            }
        });
    </script>
</body>
</html>