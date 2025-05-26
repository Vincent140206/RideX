<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Riwayat Peminjaman</title>
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

        /* Updated styles for action buttons to be gray */
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
            color: inherit; /* Inherit the gray color from parent button */
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
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
            animation-duration: 0.4s
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
        .modal-content form input[type="date"],
        .modal-content form input[type="time"],
        .modal-content form input[type="number"],
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
                <li><a href="pembayaran.html"><i class="fas fa-wallet"></i> Pembayaran</a></li>
                <li><a href="riwayat_peminjaman.html" class="active"><i class="fas fa-history"></i> Riwayat Peminjaman</a></li>
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

        <h2 class="section-title">Riwayat Peminjaman</h2>

        <div class="content-container">
            <div class="table-controls">
                <button class="btn-tambah" id="addLoanButton">Tambah</button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID Histori</th>
                        <th>User</th>
                        <th>Sepeda</th>
                        <th>Tgl & Jam Mulai</th>
                        <th>Tgl & Jam Selesai</th>
                        <th>Durasi (Jam)</th>
                        <th>Status</th>
                        <th>Total Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="loanTableBody">
                    </tbody>
            </table>
        </div>
    </div>

    <div id="loanModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h3 id="modalTitle">Tambah Peminjaman</h3>
            <form id="loanForm">
                <input type="hidden" id="loanId">
                <label for="userId">User:</label>
                <input type="text" id="userId" required>

                <label for="bikeId">Sepeda:</label>
                <input type="text" id="bikeId" required>

                <label for="startDate">Tanggal Mulai:</label>
                <input type="date" id="startDate" required>

                <label for="startTime">Jam Mulai:</label>
                <input type="time" id="startTime" required>

                <label for="endDate">Tanggal Selesai:</label>
                <input type="date" id="endDate" required>

                <label for="endTime">Jam Selesai:</label>
                <input type="time" id="endTime" required>

                <label for="duration">Durasi (Jam):</label>
                <input type="number" id="duration" readonly> <label for="status">Status:</label>
                <select id="status" required>
                    <option value="Selesai">Selesai</option>
                    <option value="Dibatalkan">Dibatalkan</option>
                    <option value="Terlambat">Terlambat</option>
                    <option value="Berlangsung">Berlangsung</option>
                </select>

                <label for="totalCost">Total Biaya:</label>
                <input type="text" id="totalCost" required>

                <button type="submit" id="saveLoanButton">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // User session logic
            let loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'));
            if (!loggedInUser) {
                // Redirect to login or set a default guest user if no one is logged in
                loggedInUser = { name: "Pengunjung", email: "guest@ridex.com", role: "Guest", phone: "" };
            }
            document.getElementById('sidebarUserName').textContent = loggedInUser.name;
            document.getElementById('sidebarUserRole').textContent = loggedInUser.role;

            // Logout functionality
            document.getElementById('logoutButton').addEventListener('click', function(e) {
                e.preventDefault();
                localStorage.removeItem('loggedInUser');
                window.location.href = 'index.html'; // Redirect to login page
            });

            document.getElementById('dropdownLogoutButton').addEventListener('click', function(e) {
                e.preventDefault();
                localStorage.removeItem('loggedInUser');
                window.location.href = 'index.html'; // Redirect to login page
            });

            // Dropdown menu toggle
            document.getElementById('userMenuToggle').addEventListener('click', function() {
                this.classList.toggle('active');
            });

            window.addEventListener('click', function(e) {
                const userMenu = document.getElementById('userMenuToggle');
                if (!userMenu.contains(e.target)) {
                    userMenu.classList.remove('active');
                }
            });

            // CRUD Operations for Loan History
            const loanTableBody = document.getElementById('loanTableBody');
            const addLoanButton = document.getElementById('addLoanButton');
            const loanModal = document.getElementById('loanModal');
            const closeButton = document.querySelector('.modal .close-button');
            const loanForm = document.getElementById('loanForm');
            const modalTitle = document.getElementById('modalTitle');
            const loanIdInput = document.getElementById('loanId');
            const userIdInput = document.getElementById('userId');
            const bikeIdInput = document.getElementById('bikeId');
            const startDateInput = document.getElementById('startDate');
            const startTimeInput = document.getElementById('startTime');
            const endDateInput = document.getElementById('endDate');
            const endTimeInput = document.getElementById('endTime');
            const durationInput = document.getElementById('duration');
            const statusInput = document.getElementById('status');
            const totalCostInput = document.getElementById('totalCost');

            // Sample data (replace with actual backend data in a real application)
            let loans = JSON.parse(localStorage.getItem('loanHistory')) || [
                { id: 'HIS001', user: 'Ningning', bike: 'Genio Easton S1', startDate: '2024-05-02', startTime: '08:00', endDate: '2024-05-02', endTime: '18:00', duration: 10, status: 'Selesai', totalCost: 'Rp100.000' },
                { id: 'HIS002', user: 'Karina', bike: 'Genio Easton S1', startDate: '2024-05-02', startTime: '09:00', endDate: '2024-05-02', endTime: '17:00', duration: 8, status: 'Dibatalkan', totalCost: 'Rp0' },
                { id: 'HIS003', user: 'Winter', bike: 'Genio Easton S1', startDate: '2024-05-02', startTime: '07:00', endDate: '2024-05-02', endTime: '21:00', duration: 14, status: 'Terlambat', totalCost: 'Rp140.000' }
            ];

            // Function to render loans to the table
            function renderLoans() {
                loanTableBody.innerHTML = '';
                loans.forEach(loan => {
                    const row = loanTableBody.insertRow();
                    row.insertCell().textContent = loan.id;
                    row.insertCell().textContent = loan.user;
                    row.insertCell().textContent = loan.bike;
                    row.insertCell().textContent = `${loan.startDate} ${loan.startTime}`;
                    row.insertCell().textContent = `${loan.endDate} ${loan.endTime}`;
                    row.insertCell().textContent = loan.duration;
                    row.insertCell().textContent = loan.status;
                    row.insertCell().textContent = loan.totalCost;

                    const actionCell = row.insertCell();
                    actionCell.classList.add('action-buttons');
                    const editButton = document.createElement('button');
                    editButton.innerHTML = '<i class="fas fa-edit"></i>';
                    editButton.classList.add('btn-edit');
                    editButton.title = 'Edit';
                    editButton.onclick = () => editLoan(loan.id);
                    actionCell.appendChild(editButton);

                    const deleteButton = document.createElement('button');
                    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    deleteButton.classList.add('btn-delete');
                    deleteButton.title = 'Delete';
                    deleteButton.onclick = () => deleteLoan(loan.id);
                    actionCell.appendChild(deleteButton);
                });
                localStorage.setItem('loanHistory', JSON.stringify(loans));
            }

            // Function to open the modal for adding a new loan
            addLoanButton.addEventListener('click', () => {
                modalTitle.textContent = 'Tambah Peminjaman';
                loanForm.reset(); // Clear form fields
                loanIdInput.value = ''; // Ensure ID is empty for new entry
                // Generate a new ID for the new loan
                const newIdNum = loans.length > 0 ? Math.max(...loans.map(l => parseInt(l.id.substring(3)))) + 1 : 1;
                loanIdInput.value = 'HIS' + String(newIdNum).padStart(3, '0');
                loanModal.style.display = 'flex'; // Use flex to center
            });

            // Function to close the modal
            closeButton.addEventListener('click', () => {
                loanModal.style.display = 'none';
            });

            // Close modal when clicking outside of it
            window.addEventListener('click', (event) => {
                if (event.target == loanModal) {
                    loanModal.style.display = 'none';
                }
            });

            // Calculate duration automatically
            function calculateDuration() {
                const startDateTime = new Date(`${startDateInput.value}T${startTimeInput.value}`);
                const endDateTime = new Date(`${endDateInput.value}T${endTimeInput.value}`);

                if (startDateTime && endDateTime && endDateTime > startDateTime) {
                    const diffMs = endDateTime - startDateTime; // Difference in milliseconds
                    const diffHours = diffMs / (1000 * 60 * 60); // Convert to hours
                    durationInput.value = diffHours.toFixed(0); // Display as integer hours
                } else {
                    durationInput.value = '';
                }
            }

            startDateInput.addEventListener('change', calculateDuration);
            startTimeInput.addEventListener('change', calculateDuration);
            endDateInput.addEventListener('change', calculateDuration);
            endTimeInput.addEventListener('change', calculateDuration);


            // Function to handle form submission (Add/Edit)
            loanForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const newLoan = {
                    id: loanIdInput.value,
                    user: userIdInput.value,
                    bike: bikeIdInput.value,
                    startDate: startDateInput.value,
                    startTime: startTimeInput.value,
                    endDate: endDateInput.value,
                    endTime: endTimeInput.value,
                    duration: parseInt(durationInput.value),
                    status: statusInput.value,
                    totalCost: totalCostInput.value
                };

                const existingLoanIndex = loans.findIndex(loan => loan.id === newLoan.id);

                if (existingLoanIndex > -1) {
                    // Update existing loan
                    loans[existingLoanIndex] = newLoan;
                } else {
                    // Add new loan
                    loans.push(newLoan);
                }
                renderLoans();
                loanModal.style.display = 'none';
            });

            // Function to edit a loan
            function editLoan(id) {
                const loanToEdit = loans.find(loan => loan.id === id);
                if (loanToEdit) {
                    modalTitle.textContent = 'Edit Peminjaman';
                    loanIdInput.value = loanToEdit.id;
                    userIdInput.value = loanToEdit.user;
                    bikeIdInput.value = loanToEdit.bike;
                    startDateInput.value = loanToEdit.startDate;
                    startTimeInput.value = loanToEdit.startTime;
                    endDateInput.value = loanToEdit.endDate;
                    endTimeInput.value = loanToEdit.endTime;
                    durationInput.value = loanToEdit.duration;
                    statusInput.value = loanToEdit.status;
                    totalCostInput.value = loanToEdit.totalCost;
                    loanModal.style.display = 'flex';
                }
            }

            // Function to delete a loan
            function deleteLoan(id) {
                if (confirm('Are you sure you want to delete this loan record?')) {
                    loans = loans.filter(loan => loan.id !== id);
                    renderLoans();
                }
            }

            // Initial render of loans
            renderLoans();
        });
    </script>
</body>
</html>