<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Poin Reward</title>
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

        .content-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }

        /* Tab Styles */
        .tab-buttons {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
        }

        .tab-buttons button {
            background-color: transparent;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            color: #555;
            transition: color 0.3s ease, border-bottom 0.3s ease;
        }

        .tab-buttons button.active {
            color: #1a4d4a;
            border-bottom: 2px solid #1a4d4a;
        }

        .tab-content {
            display: none; /* Hidden by default */
        }

        .tab-content.active {
            display: block; /* Show active tab content */
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
            .tab-buttons {
                flex-direction: column;
            }
            .tab-buttons button {
                width: 100%;
                margin-bottom: 5px;
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
                <li><a href="poin_reward.html" class="active"><i class="fas fa-award"></i> Poin Reward</a></li>
                <li><a href="pembayaran.html"><i class="fas fa-wallet"></i> Pembayaran</a></li>
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

        <h2 class="section-title">Poin Reward</h2>

        <div class="content-container">
            <div class="tab-buttons">
                <button class="tab-button active" data-tab="customer-points">Poin Customer</button>
                <button class="tab-button" data-tab="redemption-history">Tukar Poin</button>
            </div>

            <div id="customer-points-tab" class="tab-content active">
                <div class="table-controls">
                    <button class="btn-tambah" id="addCustomerPointButton">Tambah</button>
                </div>
                <table class="data-table customer-points-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email Customer</th>
                            <th>Total Poin</th>
                            <th>Terakhir Diperbarui</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="customerPointsTableBody">
                        </tbody>
                </table>
            </div>

            <div id="redemption-history-tab" class="tab-content">
                <div class="table-controls">
                    <button class="btn-tambah" id="addRedemptionButton">Tambah</button>
                </div>
                <table class="data-table redemption-history-table">
                    <thead>
                        <tr>
                            <th>ID Penukaran</th>
                            <th>Email Customer</th>
                            <th>Tanggal</th>
                            <th>Item yang Ditukar</th>
                            <th>Status</th>
                            <th>Poin Ditukar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="redemptionHistoryTableBody">
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="customerPointModal" class="modal">
        <div class="modal-content">
            <span class="close-button customer-point-close">&times;</span>
            <h3 id="customerPointModalTitle">Tambah Poin Customer</h3>
            <form id="customerPointForm">
                <input type="hidden" id="customerPointNo">
                <label for="customerEmail">Email Customer:</label>
                <input type="email" id="customerEmail" required>

                <label for="totalPoints">Total Poin:</label>
                <input type="number" id="totalPoints" required min="0">

                <label for="lastUpdated">Terakhir Diperbarui:</label>
                <input type="date" id="lastUpdated" required>

                <button type="submit" id="saveCustomerPointButton">Simpan</button>
            </form>
        </div>
    </div>

    <div id="redemptionModal" class="modal">
        <div class="modal-content">
            <span class="close-button redemption-close">&times;</span>
            <h3 id="redemptionModalTitle">Tambah Penukaran Poin</h3>
            <form id="redemptionForm">
                <input type="hidden" id="redemptionId">
                <label for="redemptionCustomerEmail">Email Customer:</label>
                <input type="email" id="redemptionCustomerEmail" required>

                <label for="redemptionDate">Tanggal:</label>
                <input type="date" id="redemptionDate" required>

                <label for="redeemedItem">Item yang Ditukar:</label>
                <input type="text" id="redeemedItem" required>

                <label for="redemptionStatus">Status:</label>
                <select id="redemptionStatus" required>
                    <option value="Selesai">Selesai</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Dibatalkan">Dibatalkan</option>
                </select>

                <label for="pointsUsed">Poin Ditukar:</label>
                <input type="number" id="pointsUsed" required min="0">

                <button type="submit" id="saveRedemptionButton">Simpan</button>
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

            // --- Tab Switching Logic ---
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    button.classList.add('active');
                    const targetTab = button.dataset.tab;
                    document.getElementById(`${targetTab}-tab`).classList.add('active');
                });
            });

            // --- Poin Customer CRUD Logic ---
            const customerPointsTableBody = document.getElementById('customerPointsTableBody');
            const addCustomerPointButton = document.getElementById('addCustomerPointButton');
            const customerPointModal = document.getElementById('customerPointModal');
            const customerPointCloseButton = document.querySelector('.customer-point-close');
            const customerPointForm = document.getElementById('customerPointForm');
            const customerPointModalTitle = document.getElementById('customerPointModalTitle');
            const customerPointNoInput = document.getElementById('customerPointNo');
            const customerEmailInput = document.getElementById('customerEmail');
            const totalPointsInput = document.getElementById('totalPoints');
            const lastUpdatedInput = document.getElementById('lastUpdated');

            let customerPoints = JSON.parse(localStorage.getItem('customerPoints')) || [
                { no: 1, email: 'aaaaaaaaaaaa@gmail.com', totalPoints: 100, lastUpdated: '2024-05-02' },
                { no: 2, email: 'bbbbbbbbbbbb@gmail.com', totalPoints: 100, lastUpdated: '2024-05-17' },
                { no: 3, email: 'cccccccccccc@gmail.com', totalPoints: 100, lastUpdated: '2024-04-20' }
            ];

            function renderCustomerPoints() {
                customerPointsTableBody.innerHTML = '';
                customerPoints.forEach((point, index) => {
                    const row = customerPointsTableBody.insertRow();
                    row.insertCell().textContent = point.no;
                    row.insertCell().textContent = point.email;
                    row.insertCell().textContent = point.totalPoints;
                    row.insertCell().textContent = point.lastUpdated;

                    const actionCell = row.insertCell();
                    actionCell.classList.add('action-buttons');
                    const editButton = document.createElement('button');
                    editButton.innerHTML = '<i class="fas fa-edit"></i>';
                    editButton.classList.add('btn-edit');
                    editButton.title = 'Edit';
                    editButton.onclick = () => editCustomerPoint(point.no);
                    actionCell.appendChild(editButton);

                    const deleteButton = document.createElement('button');
                    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    deleteButton.classList.add('btn-delete');
                    deleteButton.title = 'Delete';
                    deleteButton.onclick = () => deleteCustomerPoint(point.no);
                    actionCell.appendChild(deleteButton);
                });
                localStorage.setItem('customerPoints', JSON.stringify(customerPoints));
            }

            addCustomerPointButton.addEventListener('click', () => {
                customerPointModalTitle.textContent = 'Tambah Poin Customer';
                customerPointForm.reset();
                const newNo = customerPoints.length > 0 ? Math.max(...customerPoints.map(p => p.no)) + 1 : 1;
                customerPointNoInput.value = newNo; // For internal tracking, not displayed directly
                customerPointModal.style.display = 'flex';
            });

            customerPointCloseButton.addEventListener('click', () => {
                customerPointModal.style.display = 'none';
            });

            customerPointForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const newCustomerPoint = {
                    no: parseInt(customerPointNoInput.value),
                    email: customerEmailInput.value,
                    totalPoints: parseInt(totalPointsInput.value),
                    lastUpdated: lastUpdatedInput.value
                };

                const existingIndex = customerPoints.findIndex(p => p.no === newCustomerPoint.no);

                if (existingIndex > -1) {
                    customerPoints[existingIndex] = newCustomerPoint;
                } else {
                    customerPoints.push(newCustomerPoint);
                }
                // Sort by 'no' to keep order consistent, especially after deletions
                customerPoints.sort((a, b) => a.no - b.no);
                renderCustomerPoints();
                customerPointModal.style.display = 'none';
            });

            function editCustomerPoint(no) {
                const pointToEdit = customerPoints.find(p => p.no === no);
                if (pointToEdit) {
                    customerPointModalTitle.textContent = 'Edit Poin Customer';
                    customerPointNoInput.value = pointToEdit.no;
                    customerEmailInput.value = pointToEdit.email;
                    totalPointsInput.value = pointToEdit.totalPoints;
                    lastUpdatedInput.value = pointToEdit.lastUpdated;
                    customerPointModal.style.display = 'flex';
                }
            }

            function deleteCustomerPoint(no) {
                if (confirm('Apakah Anda yakin ingin menghapus data poin customer ini?')) {
                    customerPoints = customerPoints.filter(p => p.no !== no);
                    // Re-index 'no' after deletion if needed, but for display purposes, original 'no' is fine if it's an ID.
                    // If 'no' is truly just a display index, you might re-assign them here:
                    // customerPoints.forEach((p, index) => p.no = index + 1);
                    renderCustomerPoints();
                }
            }

            // --- Tukar Poin CRUD Logic ---
            const redemptionHistoryTableBody = document.getElementById('redemptionHistoryTableBody');
            const addRedemptionButton = document.getElementById('addRedemptionButton');
            const redemptionModal = document.getElementById('redemptionModal');
            const redemptionCloseButton = document.querySelector('.redemption-close');
            const redemptionForm = document.getElementById('redemptionForm');
            const redemptionModalTitle = document.getElementById('redemptionModalTitle');
            const redemptionIdInput = document.getElementById('redemptionId');
            const redemptionCustomerEmailInput = document.getElementById('redemptionCustomerEmail');
            const redemptionDateInput = document.getElementById('redemptionDate');
            const redeemedItemInput = document.getElementById('redeemedItem');
            const redemptionStatusInput = document.getElementById('redemptionStatus');
            const pointsUsedInput = document.getElementById('pointsUsed');

            let redemptionHistory = JSON.parse(localStorage.getItem('redemptionHistory')) || [
                { id: 'TRX001', email: 'aaaaaa@gmail.com', date: '2024-05-02', item: 'Keychain', status: 'Selesai', points: 100 },
                { id: 'TRX002', email: 'bbbbbb@gmail.com', date: '2024-05-17', item: 'Tumbler Eksklusif', status: 'Selesai', points: 100 },
                { id: 'TRX003', email: 'cccccc@gmail.com', date: '2024-04-20', item: 'Voucher Rp50.000', status: 'Diproses', points: 100 }
            ];

            function renderRedemptionHistory() {
                redemptionHistoryTableBody.innerHTML = '';
                redemptionHistory.forEach(item => {
                    const row = redemptionHistoryTableBody.insertRow();
                    row.insertCell().textContent = item.id;
                    row.insertCell().textContent = item.email;
                    row.insertCell().textContent = item.date;
                    row.insertCell().textContent = item.item;
                    row.insertCell().textContent = item.status;
                    row.insertCell().textContent = item.points;

                    const actionCell = row.insertCell();
                    actionCell.classList.add('action-buttons');
                    const editButton = document.createElement('button');
                    editButton.innerHTML = '<i class="fas fa-edit"></i>';
                    editButton.classList.add('btn-edit');
                    editButton.title = 'Edit';
                    editButton.onclick = () => editRedemption(item.id);
                    actionCell.appendChild(editButton);

                    const deleteButton = document.createElement('button');
                    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    deleteButton.classList.add('btn-delete');
                    deleteButton.title = 'Delete';
                    deleteButton.onclick = () => deleteRedemption(item.id);
                    actionCell.appendChild(deleteButton);
                });
                localStorage.setItem('redemptionHistory', JSON.stringify(redemptionHistory));
            }

            addRedemptionButton.addEventListener('click', () => {
                redemptionModalTitle.textContent = 'Tambah Penukaran Poin';
                redemptionForm.reset();
                // Generate a new ID for the new redemption
                const newIdNum = redemptionHistory.length > 0 ? Math.max(...redemptionHistory.map(r => parseInt(r.id.substring(3)))) + 1 : 1;
                redemptionIdInput.value = 'TRX' + String(newIdNum).padStart(3, '0');
                redemptionModal.style.display = 'flex';
            });

            redemptionCloseButton.addEventListener('click', () => {
                redemptionModal.style.display = 'none';
            });

            redemptionForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const newRedemption = {
                    id: redemptionIdInput.value,
                    email: redemptionCustomerEmailInput.value,
                    date: redemptionDateInput.value,
                    item: redeemedItemInput.value,
                    status: redemptionStatusInput.value,
                    points: parseInt(pointsUsedInput.value)
                };

                const existingIndex = redemptionHistory.findIndex(item => item.id === newRedemption.id);

                if (existingIndex > -1) {
                    redemptionHistory[existingIndex] = newRedemption;
                } else {
                    redemptionHistory.push(newRedemption);
                }
                renderRedemptionHistory();
                redemptionModal.style.display = 'none';
            });

            function editRedemption(id) {
                const redemptionToEdit = redemptionHistory.find(item => item.id === id);
                if (redemptionToEdit) {
                    redemptionModalTitle.textContent = 'Edit Penukaran Poin';
                    redemptionIdInput.value = redemptionToEdit.id;
                    redemptionCustomerEmailInput.value = redemptionToEdit.email;
                    redemptionDateInput.value = redemptionToEdit.date;
                    redeemedItemInput.value = redemptionToEdit.item;
                    redemptionStatusInput.value = redemptionToEdit.status;
                    pointsUsedInput.value = redemptionToEdit.points;
                    redemptionModal.style.display = 'flex';
                }
            }

            function deleteRedemption(id) {
                if (confirm('Apakah Anda yakin ingin menghapus riwayat penukaran ini?')) {
                    redemptionHistory = redemptionHistory.filter(item => item.id !== id);
                    renderRedemptionHistory();
                }
            }

            // Close modals when clicking outside of them
            window.addEventListener('click', (event) => {
                if (event.target == customerPointModal) {
                    customerPointModal.style.display = 'none';
                }
                if (event.target == redemptionModal) {
                    redemptionModal.style.display = 'none';
                }
            });

            // Initial renders
            renderCustomerPoints();
            renderRedemptionHistory(); // This will render the second table, but it's hidden by default.
        });
    </script>
</body>
</html>