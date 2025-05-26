<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Peminjaman</title>
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

        .tabs {
            display: flex;
            margin-bottom: 20px;
            background-color: #e6f7f5;
            border-radius: 8px;
            padding: 5px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
            width: fit-content;
        }

        .tabs button {
            background: none;
            border: none;
            padding: 12px 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            color: #555;
            border-radius: 6px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .tabs button.active {
            background-color: #1a4d4a;
            color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .tabs button:hover:not(.active) {
            background-color: #d1e9e7;
        }

        .tab-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            display: none; /* Hidden by default */
        }

        .tab-content.active {
            display: block;
        }

        .action-bar {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .action-bar button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-bar button:hover {
            background-color: #218838;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th, .data-table td {
            border: 1px solid #eee;
            padding: 12px 15px;
            text-align: left;
        }

        .data-table th {
            background-color: #f8f8f8;
            font-weight: 600;
            color: #333;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #fbfbfb;
        }

        .data-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .data-table .actions button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            color: #888;
            transition: color 0.3s ease;
        }

        .data-table .actions button:hover {
            color: #1a4d4a;
        }

        .data-table .actions button.delete:hover {
            color: #e74c3c;
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 100; /* Sit on top */
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            width: 80%;
            max-width: 600px;
            position: relative;
        }

        .modal-content h3 {
            color: #1a4d4a;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .modal-content .form-group {
            margin-bottom: 15px;
        }

        .modal-content label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .modal-content input[type="text"],
        .modal-content input[type="email"],
        .modal-content input[type="number"],
        .modal-content input[type="date"],
        .modal-content input[type="time"],
        .modal-content select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
        }

        .modal-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .modal-actions .cancel-btn {
            background-color: #ccc;
            color: #333;
        }

        .modal-actions .cancel-btn:hover {
            background-color: #bbb;
        }

        .modal-actions .save-btn {
            background-color: #1a4d4a;
            color: #fff;
        }

        .modal-actions .save-btn:hover {
            background-color: #153c3a;
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
            .tabs {
                width: 100%;
                justify-content: center;
            }
            .tabs button {
                flex: 1;
                padding: 10px;
            }
            .data-table th, .data-table td {
                padding: 8px;
                font-size: 14px;
            }
            .data-table .actions button {
                font-size: 14px;
                margin-right: 5px;
            }
            .modal-content {
                width: 95%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <a href="profile.html"> <div class="profile-avatar"><i class="fas fa-user"></i></div>
                <div class="profile-name" id="sidebarUserName">Name</div>
                <div class="profile-role" id="sidebarUserRole">Administrator</div>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.html"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="peminjaman.html" class="active"><i class="fas fa-motorcycle"></i> Peminjaman</a></li>
                <li><a href="poin_reward.html"><i class="fas fa-award"></i> Poin Reward</a></li> <li><a href="pembayaran.html"><i class="fas fa-wallet"></i> Pembayaran</a></li> <li><a href="riwayat_peminjaman.html"><i class="fas fa-history"></i> Riwayat Peminjaman</a></li> </ul>
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

        <h2 class="section-title">Peminjaman</h2>

        <div class="tabs">
            <button class="tab-button active" onclick="showTab('pesanan')">Daftar Pesanan</button>
            <button class="tab-button" onclick="showTab('kendaraan')">Daftar Kendaraan</button>
        </div>

        <div id="pesanan" class="tab-content active">
            <div class="action-bar">
                <button onclick="openPesananModal('add')">Tambah</button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>User</th>
                        <th>Sepeda</th>
                        <th>Tgl & Jam Mulai</th>
                        <th>Durasi (Jam)</th>
                        <th>Jam Selesai</th>
                        <th>Status</th>
                        <th>Total Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="pesananTableBody">
                    </tbody>
            </table>
        </div>

        <div id="kendaraan" class="tab-content">
            <div class="action-bar">
                <button onclick="openKendaraanModal('add')">Tambah</button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID Sepeda</th>
                        <th>Tipe Sepeda</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>Terakhir Dipinjam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="kendaraanTableBody">
                    </tbody>
            </table>
        </div>
    </div>

    <div id="pesananModal" class="modal">
        <div class="modal-content">
            <h3 id="pesananModalTitle">Tambah Pesanan</h3>
            <form id="pesananForm">
                <input type="hidden" id="pesananId">
                <div class="form-group">
                    <label for="pesananUser">User</label>
                    <input type="text" id="pesananUser" required>
                </div>
                <div class="form-group">
                    <label for="pesananSepeda">Sepeda</label>
                    <input type="text" id="pesananSepeda" required>
                </div>
                <div class="form-group">
                    <label for="pesananTglMulai">Tanggal Mulai</label>
                    <input type="date" id="pesananTglMulai" required>
                </div>
                <div class="form-group">
                    <label for="pesananJamMulai">Jam Mulai</label>
                    <input type="time" id="pesananJamMulai" required>
                </div>
                <div class="form-group">
                    <label for="pesananDurasi">Durasi (Jam)</label>
                    <input type="number" id="pesananDurasi" required>
                </div>
                <div class="form-group">
                    <label for="pesananJamSelesai">Jam Selesai</label>
                    <input type="time" id="pesananJamSelesai">
                </div>
                <div class="form-group">
                    <label for="pesananStatus">Status</label>
                    <select id="pesananStatus" required>
                        <option value="Berjalan">Berjalan</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pesananTotalBiaya">Total Biaya (Rp)</label>
                    <input type="number" id="pesananTotalBiaya" required>
                </div>
                <div class="modal-actions">
                    <button type="button" class="cancel-btn" onclick="closePesananModal()">Batal</button>
                    <button type="submit" class="save-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="kendaraanModal" class="modal">
        <div class="modal-content">
            <h3 id="kendaraanModalTitle">Tambah Kendaraan</h3>
            <form id="kendaraanForm">
                <input type="hidden" id="kendaraanId">
                <div class="form-group">
                    <label for="kendaraanTipe">Tipe Sepeda</label>
                    <input type="text" id="kendaraanTipe" required>
                </div>
                <div class="form-group">
                    <label for="kendaraanStatus">Status</label>
                    <select id="kendaraanStatus" required>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kendaraanLokasi">Lokasi</label>
                    <input type="text" id="kendaraanLokasi" required>
                </div>
                <div class="form-group">
                    <label for="kendaraanTerakhirDipinjam">Terakhir Dipinjam</label>
                    <input type="date" id="kendaraanTerakhirDipinjam">
                </div>
                <div class="modal-actions">
                    <button type="button" class="cancel-btn" onclick="closeKendaraanModal()">Batal</button>
                    <button type="submit" class="save-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Set default user info if not logged in
        document.addEventListener('DOMContentLoaded', function() {
            let loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'));
            if (!loggedInUser) {
                // Default user data for direct access without login
                loggedInUser = { name: "Pengunjung", email: "guest@ridex.com", role: "Guest", phone: "" };
            }
            document.getElementById('sidebarUserName').textContent = loggedInUser.name;
            document.getElementById('sidebarUserRole').textContent = loggedInUser.role;

            loadPesanan();
            loadKendaraan();
        });

        // Logout functionality
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

        // Toggle user menu dropdown
        document.getElementById('userMenuToggle').addEventListener('click', function() {
            this.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            const userMenu = document.getElementById('userMenuToggle');
            if (!userMenu.contains(e.target)) {
                userMenu.classList.remove('active');
            }
        });

        // --- Tab Functionality ---
        function showTab(tabId) {
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            document.querySelector(`.tab-button[onclick="showTab('${tabId}')"]`).classList.add('active');
        }

        // --- CRUD for Pesanan (Orders) ---
        let pesanan = JSON.parse(localStorage.getItem('pesanan')) || [
            { id: 'PM3001', user: 'Nilningning', sepeda: 'Genio Easton S1', tglMulai: '2024-05-02', jamMulai: '09:00', durasi: 8, jamSelesai: '17:00', status: 'Berjalan', totalBiaya: 80000 },
            { id: 'PM3002', user: 'Karina', sepeda: 'Genio Easton S1', tglMulai: '2024-05-02', jamMulai: '10:00', durasi: 4, jamSelesai: '14:00', status: 'Menunggu', totalBiaya: 40000 },
            { id: 'PM3003', user: 'Winter', sepeda: 'Genio Easton S1', tglMulai: '2024-05-02', jamMulai: '07:00', durasi: 6, jamSelesai: '13:00', status: 'Selesai', totalBiaya: 30000 },
            { id: 'PM3004', user: 'Giselle', sepeda: 'Genio Easton S1', tglMulai: '2024-05-02', jamMulai: '08:00', durasi: 0, jamSelesai: '', status: 'Dibatalkan', totalBiaya: 0 }
        ];

        function savePesanan() {
            localStorage.setItem('pesanan', JSON.stringify(pesanan));
        }

        function generatePesananId() {
            const lastId = pesanan.length > 0 ? parseInt(pesanan[pesanan.length - 1].id.replace('PM', '')) : 3000;
            return 'PM' + (lastId + 1).toString().padStart(4, '0');
        }

        function loadPesanan() {
            const pesananTableBody = document.getElementById('pesananTableBody');
            pesananTableBody.innerHTML = ''; // Clear existing data

            pesanan.forEach(item => {
                const row = pesananTableBody.insertRow();
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td>${item.user}</td>
                    <td>${item.sepeda}</td>
                    <td>${item.tglMulai} ${item.jamMulai}</td>
                    <td>${item.durasi}</td>
                    <td>${item.jamSelesai}</td>
                    <td>${item.status}</td>
                    <td>Rp${item.totalBiaya.toLocaleString('id-ID')}</td>
                    <td class="actions">
                        <button onclick="openPesananModal('edit', '${item.id}')"><i class="fas fa-pencil-alt"></i></button>
                        <button class="delete" onclick="deletePesanan('${item.id}')"><i class="fas fa-trash-alt"></i></button>
                    </td>
                `;
            });
        }

        function openPesananModal(mode, id = null) {
            const modal = document.getElementById('pesananModal');
            const modalTitle = document.getElementById('pesananModalTitle');
            const form = document.getElementById('pesananForm');
            const saveButton = modal.querySelector('.save-btn');

            form.reset(); // Clear form fields
            document.getElementById('pesananId').value = '';

            modal.style.display = 'flex';

            if (mode === 'add') {
                modalTitle.textContent = 'Tambah Pesanan';
                saveButton.textContent = 'Tambah';
            } else if (mode === 'edit') {
                modalTitle.textContent = 'Edit Pesanan';
                saveButton.textContent = 'Simpan Perubahan';
                const item = pesanan.find(p => p.id === id);
                if (item) {
                    document.getElementById('pesananId').value = item.id;
                    document.getElementById('pesananUser').value = item.user;
                    document.getElementById('pesananSepeda').value = item.sepeda;
                    document.getElementById('pesananTglMulai').value = item.tglMulai;
                    document.getElementById('pesananJamMulai').value = item.jamMulai;
                    document.getElementById('pesananDurasi').value = item.durasi;
                    document.getElementById('pesananJamSelesai').value = item.jamSelesai;
                    document.getElementById('pesananStatus').value = item.status;
                    document.getElementById('pesananTotalBiaya').value = item.totalBiaya;
                }
            }
        }

        function closePesananModal() {
            document.getElementById('pesananModal').style.display = 'none';
        }

        document.getElementById('pesananForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const id = document.getElementById('pesananId').value;
            const user = document.getElementById('pesananUser').value;
            const sepeda = document.getElementById('pesananSepeda').value;
            const tglMulai = document.getElementById('pesananTglMulai').value;
            const jamMulai = document.getElementById('pesananJamMulai').value;
            const durasi = parseInt(document.getElementById('pesananDurasi').value);
            const jamSelesai = document.getElementById('pesananJamSelesai').value;
            const status = document.getElementById('pesananStatus').value;
            const totalBiaya = parseInt(document.getElementById('pesananTotalBiaya').value);

            if (id) { // Edit existing
                const index = pesanan.findIndex(p => p.id === id);
                if (index !== -1) {
                    pesanan[index] = { id, user, sepeda, tglMulai, jamMulai, durasi, jamSelesai, status, totalBiaya };
                    alert('Pesanan berhasil diperbarui!');
                }
            } else { // Add new
                const newPesanan = {
                    id: generatePesananId(),
                    user, sepeda, tglMulai, jamMulai, durasi, jamSelesai, status, totalBiaya
                };
                pesanan.push(newPesanan);
                alert('Pesanan berhasil ditambahkan!');
            }

            savePesanan();
            loadPesanan();
            closePesananModal();
        });

        function deletePesanan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
                pesanan = pesanan.filter(p => p.id !== id);
                savePesanan();
                loadPesanan();
                alert('Pesanan berhasil dihapus!');
            }
        }

        // --- CRUD for Kendaraan (Vehicles) ---
        let kendaraan = JSON.parse(localStorage.getItem('kendaraan')) || [
            { id: 'PM001', tipe: 'Genio Easton S1', status: 'Dipinjam', lokasi: 'Jakarta', terakhirDipinjam: '02/05/2024' },
            { id: 'PM002', tipe: 'Genio Easton S1', status: 'Tersedia', lokasi: 'Bandung', terakhirDipinjam: '04/17/2024' },
            { id: 'PM003', tipe: 'Genio Easton S1', status: 'Rusak', lokasi: 'Surabaya', terakhirDipinjam: '04/20/2024' },
            { id: 'PM004', tipe: 'Genio Easton S1', status: 'Rusak', lokasi: 'Malang', terakhirDipinjam: '05/18/2024' }
        ];

        function saveKendaraan() {
            localStorage.setItem('kendaraan', JSON.stringify(kendaraan));
        }

        function generateKendaraanId() {
            const lastId = kendaraan.length > 0 ? parseInt(kendaraan[kendaraan.length - 1].id.replace('PM', '')) : 0;
            return 'PM' + (lastId + 1).toString().padStart(3, '0');
        }

        function loadKendaraan() {
            const kendaraanTableBody = document.getElementById('kendaraanTableBody');
            kendaraanTableBody.innerHTML = ''; // Clear existing data

            kendaraan.forEach(item => {
                const row = kendaraanTableBody.insertRow();
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td>${item.tipe}</td>
                    <td>${item.status}</td>
                    <td>${item.lokasi}</td>
                    <td>${item.terakhirDipinjam}</td>
                    <td class="actions">
                        <button onclick="openKendaraanModal('edit', '${item.id}')"><i class="fas fa-pencil-alt"></i></button>
                        <button class="delete" onclick="deleteKendaraan('${item.id}')"><i class="fas fa-trash-alt"></i></button>
                    </td>
                `;
            });
        }

        function openKendaraanModal(mode, id = null) {
            const modal = document.getElementById('kendaraanModal');
            const modalTitle = document.getElementById('kendaraanModalTitle');
            const form = document.getElementById('kendaraanForm');
            const saveButton = modal.querySelector('.save-btn');

            form.reset(); // Clear form fields
            document.getElementById('kendaraanId').value = '';

            modal.style.display = 'flex';

            if (mode === 'add') {
                modalTitle.textContent = 'Tambah Kendaraan';
                saveButton.textContent = 'Tambah';
            } else if (mode === 'edit') {
                modalTitle.textContent = 'Edit Kendaraan';
                saveButton.textContent = 'Simpan Perubahan';
                const item = kendaraan.find(k => k.id === id);
                if (item) {
                    document.getElementById('kendaraanId').value = item.id;
                    document.getElementById('kendaraanTipe').value = item.tipe;
                    document.getElementById('kendaraanStatus').value = item.status;
                    document.getElementById('kendaraanLokasi').value = item.lokasi;
                    document.getElementById('kendaraanTerakhirDipinjam').value = item.terakhirDipinjam.split('/').reverse().join('-'); // Convert to YYYY-MM-DD
                }
            }
        }

        function closeKendaraanModal() {
            document.getElementById('kendaraanModal').style.display = 'none';
        }

        document.getElementById('kendaraanForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const id = document.getElementById('kendaraanId').value;
            const tipe = document.getElementById('kendaraanTipe').value;
            const status = document.getElementById('kendaraanStatus').value;
            const lokasi = document.getElementById('kendaraanLokasi').value;
            const terakhirDipinjamInput = document.getElementById('kendaraanTerakhirDipinjam').value;
            const terakhirDipinjam = terakhirDipinjamInput ? new Date(terakhirDipinjamInput).toLocaleDateString('en-GB') : ''; // Convert back to DD/MM/YYYY

            if (id) { // Edit existing
                const index = kendaraan.findIndex(k => k.id === id);
                if (index !== -1) {
                    kendaraan[index] = { id, tipe, status, lokasi, terakhirDipinjam };
                    alert('Kendaraan berhasil diperbarui!');
                }
            } else { // Add new
                const newKendaraan = {
                    id: generateKendaraanId(),
                    tipe, status, lokasi, terakhirDipinjam
                };
                kendaraan.push(newKendaraan);
                alert('Kendaraan berhasil ditambahkan!');
            }

            saveKendaraan();
            loadKendaraan();
            closeKendaraanModal();
        });

        function deleteKendaraan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')) {
                kendaraan = kendaraan.filter(k => k.id !== id);
                saveKendaraan();
                loadKendaraan();
                alert('Kendaraan berhasil dihapus!');
            }
        }
    </script>
</body>
</html>