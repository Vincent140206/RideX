<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Dashboard</title>
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

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .card .icon {
            width: 50px;
            height: 50px;
            background-color: #e6f7f5;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            font-size: 24px;
            color: #1a4d4a;
        }

        .card .details h3 {
            margin: 0;
            font-size: 16px;
            color: #666;
            font-weight: 400;
        }

        .card .details p {
            margin: 5px 0 0;
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }

        .station-list {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .station-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .station-item:last-child {
            border-bottom: none;
        }

        .station-info {
            display: flex;
            align-items: center;
        }

        .station-info .icon {
            color: #1a4d4a;
            font-size: 20px;
            margin-right: 15px;
        }

        .station-info .name {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .station-info .bikes {
            font-size: 14px;
            color: #666;
        }

        .station-actions button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            margin-left: 10px;
            color: #888;
            transition: color 0.3s ease;
        }

        .station-actions button:hover {
            color: #1a4d4a;
        }

        .station-actions button.delete:hover {
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
            max-width: 500px;
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
        .modal-content input[type="number"] {
            width: calc(100% - 22px); /* Adjust for padding and border */
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
            .card-grid {
                grid-template-columns: 1fr;
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
                <li><a href="dashboard.html" class="active"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="peminjaman.html"><i class="fas fa-motorcycle"></i> Peminjaman</a></li>
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

        <h2 class="section-title">Selamat datang!</h2>

        <div class="card-grid">
            <div class="card">
                <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                <div class="details">
                    <h3>Total Pendapatan</h3>
                    <p>Rp7.000.000</p>
                </div>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-road"></i></div>
                <div class="details">
                    <h3>Total Stasiun</h3>
                    <p>4</p>
                </div>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                <div class="details">
                    <h3>Pesanan Masuk Hari Ini</h3>
                    <p>390</p>
                </div>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-check-circle"></i></div>
                <div class="details">
                    <h3>Sepeda Tersedia</h3>
                    <p>215 Unit</p>
                </div>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                <div class="details">
                    <h3>Sepeda Dipinjam</h3>
                    <p>215 Unit</p>
                </div>
            </div>
            <div class="card">
                <div class="icon"><i class="fas fa-times-circle"></i></div>
                <div class="details">
                    <h3>Sepeda Rusak</h3>
                    <p>215 Unit</p>
                </div>
            </div>
        </div>

        <h2 class="section-title">Stasiun Sepeda</h2>
        <div class="station-list" id="stationList">
            </div>
    </div>

    <div id="stationModal" class="modal">
        <div class="modal-content">
            <h3 id="modalTitle">Tambah Stasiun</h3>
            <form id="stationForm">
                <input type="hidden" id="stationId">
                <div class="form-group">
                    <label for="stationName">Nama Stasiun</label>
                    <input type="text" id="stationName" required>
                </div>
                <div class="form-group">
                    <label for="stationBikes">Jumlah Sepeda Tersedia</label>
                    <input type="number" id="stationBikes" required>
                </div>
                <div class="modal-actions">
                    <button type="button" class="cancel-btn" onclick="closeModal()">Batal</button>
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
            loadStations();
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

        // --- CRUD for Stations (Dashboard) ---
        let stations = JSON.parse(localStorage.getItem('stations')) || [
            { id: 'st001', name: 'Stasiun Veteran', bikes: 55 },
            { id: 'st002', name: 'Stasiun Ijen', bikes: 30 },
            { id: 'st003', name: 'Stasiun Soekarno Hatta', bikes: 40 },
            { id: 'st004', name: 'Stasiun Oro-oro Dowo', bikes: 60 }
        ];

        function saveStations() {
            localStorage.setItem('stations', JSON.stringify(stations));
        }

        function generateUniqueId(prefix) {
            return prefix + Date.now().toString(36) + Math.random().toString(36).substr(2, 5);
        }

        function loadStations() {
            const stationListDiv = document.getElementById('stationList');
            stationListDiv.innerHTML = ''; // Clear existing list

            // Add "Tambah Stasiun" button at the top
            const addButton = document.createElement('div');
            addButton.className = 'station-item';
            addButton.innerHTML = `
                <div class="station-info" style="cursor: pointer;" onclick="openModal('add')">
                    <i class="fas fa-plus-circle icon" style="color: #28a745;"></i>
                    <div class="details">
                        <div class="name" style="color: #28a745;">Tambah Stasiun Baru</div>
                    </div>
                </div>
            `;
            stationListDiv.appendChild(addButton);


            stations.forEach(station => {
                const item = document.createElement('div');
                item.className = 'station-item';
                item.innerHTML = `
                    <div class="station-info">
                        <i class="fas fa-map-marker-alt icon"></i>
                        <div class="details">
                            <div class="name">${station.name}</div>
                            <div class="bikes">${station.bikes} Sepeda Tersedia</div>
                        </div>
                    </div>
                    <div class="station-actions">
                        <button onclick="openModal('edit', '${station.id}')"><i class="fas fa-pencil-alt"></i></button>
                        <button class="delete" onclick="deleteStation('${station.id}')"><i class="fas fa-trash-alt"></i></button>
                    </div>
                `;
                stationListDiv.appendChild(item);
            });
        }

        function openModal(mode, id = null) {
            const modal = document.getElementById('stationModal');
            const modalTitle = document.getElementById('modalTitle');
            const stationIdField = document.getElementById('stationId');
            const stationNameField = document.getElementById('stationName');
            const stationBikesField = document.getElementById('stationBikes');
            const saveButton = modal.querySelector('.save-btn');

            modal.style.display = 'flex'; // Show modal

            if (mode === 'add') {
                modalTitle.textContent = 'Tambah Stasiun';
                stationIdField.value = '';
                stationNameField.value = '';
                stationBikesField.value = '';
                saveButton.textContent = 'Tambah';
            } else if (mode === 'edit') {
                modalTitle.textContent = 'Edit Stasiun';
                const station = stations.find(s => s.id === id);
                if (station) {
                    stationIdField.value = station.id;
                    stationNameField.value = station.name;
                    stationBikesField.value = station.bikes;
                    saveButton.textContent = 'Simpan Perubahan';
                }
            }
        }

        function closeModal() {
            document.getElementById('stationModal').style.display = 'none';
            document.getElementById('stationForm').reset();
        }

        document.getElementById('stationForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const id = document.getElementById('stationId').value;
            const name = document.getElementById('stationName').value;
            const bikes = parseInt(document.getElementById('stationBikes').value);

            if (id) { // Edit existing station
                const index = stations.findIndex(s => s.id === id);
                if (index !== -1) {
                    stations[index].name = name;
                    stations[index].bikes = bikes;
                    alert('Stasiun berhasil diperbarui!');
                }
            } else { // Add new station
                const newStation = {
                    id: generateUniqueId('st'),
                    name: name,
                    bikes: bikes
                };
                stations.push(newStation);
                alert('Stasiun berhasil ditambahkan!');
            }

            saveStations();
            loadStations();
            closeModal();
        });

        function deleteStation(id) {
            if (confirm('Apakah Anda yakin ingin menghapus stasiun ini?')) {
                stations = stations.filter(s => s.id !== id);
                saveStations();
                loadStations();
                alert('Stasiun berhasil dihapus!');
            }
        }
    </script>
</body>
</html>