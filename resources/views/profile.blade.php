<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideX - Profile</title>
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

        .profile-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .profile-header-edit {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #888;
        }

        .profile-header-edit:hover {
            color: #1a4d4a;
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            background-color: #ddd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 60px;
            color: #888;
            margin-bottom: 20px;
        }

        .profile-info h3 {
            margin: 0 0 10px;
            font-size: 28px;
            color: #333;
            text-align: center;
        }

        .profile-info p {
            font-size: 16px;
            color: #666;
            margin: 0 0 15px;
            text-align: center;
        }

        .profile-details {
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
        }

        .profile-details .form-group {
            margin-bottom: 15px;
        }

        .profile-details label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .profile-details input[type="text"],
        .profile-details input[type="email"],
        .profile-details input[type="tel"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f8f8f8; /* Read-only appearance */
        }

        .profile-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .profile-actions button {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .profile-actions .back-btn {
            background-color: #1a4d4a;
            color: #fff;
        }

        .profile-actions .back-btn:hover {
            background-color: #153c3a;
        }

        .profile-actions .delete-btn {
            background-color: #e74c3c;
            color: #fff;
        }

        .profile-actions .delete-btn:hover {
            background-color: #c0392b;
        }

        /* Modal for editing profile */
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
        .modal-content input[type="email"],
        .modal-content input[type="tel"] {
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
            .profile-container {
                padding: 20px;
            }
            .profile-avatar-large {
                width: 100px;
                height: 100px;
                font-size: 50px;
            }
            .profile-info h3 {
                font-size: 24px;
            }
            .profile-info p {
                font-size: 14px;
            }
            .profile-details input {
                font-size: 14px;
                padding: 8px;
            }
            .profile-actions button {
                padding: 10px 20px;
                font-size: 14px;
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

        <h2 class="section-title">Profile</h2>

        <div class="profile-container">
            <button class="profile-header-edit" onclick="openProfileModal()"><i class="fas fa-pencil-alt"></i></button>

            <div class="profile-avatar-large"><i class="fas fa-user"></i></div>
            <div class="profile-info">
                <h3 id="profileNameDisplay">Name</h3>
            </div>

            <div class="profile-details">
                <div class="form-group">
                    <label for="profileEmail">Email</label>
                    <input type="email" id="profileEmail" value="mail@simmmple.com" readonly>
                </div>
                <div class="form-group">
                    <label for="profilePhone">No. Telp</label>
                    <input type="tel" id="profilePhone" value="085xxxxxxxx" readonly>
                </div>
            </div>

            <div class="profile-actions">
                <button class="back-btn" onclick="window.history.back()">Kembali</button>
                <button class="delete-btn" onclick="deleteAccount()">Hapus Akun</button>
            </div>
        </div>
    </div>

    <div id="profileModal" class="modal">
        <div class="modal-content">
            <h3>Edit Profile</h3>
            <form id="profileForm">
                <div class="form-group">
                    <label for="editProfileName">Nama</label>
                    <input type="text" id="editProfileName" required>
                </div>
                <div class="form-group">
                    <label for="editProfileEmail">Email</label>
                    <input type="email" id="editProfileEmail" required>
                </div>
                <div class="form-group">
                    <label for="editProfilePhone">No. Telp</label>
                    <input type="tel" id="editProfilePhone" required>
                </div>
                <div class="modal-actions">
                    <button type="button" class="cancel-btn" onclick="closeProfileModal()">Batal</button>
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
            updateProfileDisplay(loggedInUser);
        });

        function updateProfileDisplay(user) {
            document.getElementById('profileNameDisplay').textContent = user.name || 'Name';
            document.getElementById('profileEmail').value = user.email || 'N/A';
            document.getElementById('profilePhone').value = user.phone || 'N/A';
        }

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

        // --- Profile CRUD (Update/Delete) ---
        function openProfileModal() {
            const modal = document.getElementById('profileModal');
            // Try to get loggedInUser from localStorage, if not found, use default/empty object
            const loggedInUser = JSON.parse(localStorage.getItem('loggedInUser')) || { name: "", email: "", phone: "" };

            document.getElementById('editProfileName').value = loggedInUser.name;
            document.getElementById('editProfileEmail').value = loggedInUser.email;
            document.getElementById('editProfilePhone').value = loggedInUser.phone;
            modal.style.display = 'flex';
        }

        function closeProfileModal() {
            document.getElementById('profileModal').style.display = 'none';
            document.getElementById('profileForm').reset();
        }

        document.getElementById('profileForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const newName = document.getElementById('editProfileName').value;
            const newEmail = document.getElementById('editProfileEmail').value;
            const newPhone = document.getElementById('editProfilePhone').value;

            // Get current logged-in user or create a temporary one if none is in localStorage
            let loggedInUser = JSON.parse(localStorage.getItem('loggedInUser')) || { name: "Pengunjung", email: "guest@ridex.com", role: "Guest", phone: "" };

            loggedInUser.name = newName;
            loggedInUser.email = newEmail;
            loggedInUser.phone = newPhone;
            localStorage.setItem('loggedInUser', JSON.stringify(loggedInUser));

            // Also update the 'users' array if this user was from signup
            let users = JSON.parse(localStorage.getItem('users')) || [];
            const userIndex = users.findIndex(u => u.email === loggedInUser.email);
            if (userIndex !== -1) {
                users[userIndex].name = newName;
                users[userIndex].phone = newPhone;
                localStorage.setItem('users', JSON.stringify(users));
            } else {
                // If the user being edited was a 'Guest' or not found in 'users',
                // and it's not the dummy admin user, add it to 'users' for consistency.
                // This scenario might happen if someone directly accesses profile.html
                // and edits their "guest" profile.
                if (loggedInUser.email !== "admin@ridex.com" && loggedInUser.email !== "guest@ridex.com") {
                     users.push(loggedInUser);
                     localStorage.setItem('users', JSON.stringify(users));
                }
            }


            updateProfileDisplay(loggedInUser); // Update the displayed info on the page
            document.getElementById('sidebarUserName').textContent = newName; // Update sidebar name
            alert('Profil berhasil diperbarui!');
            closeProfileModal();
        });

        function deleteAccount() {
            if (confirm('Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan.')) {
                const loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'));

                if (loggedInUser && loggedInUser.email) {
                    // Prevent deleting the dummy admin account for demo purposes
                    if (loggedInUser.email === "admin@ridex.com") {
                        alert("Akun Admin tidak bisa dihapus di mode demo ini.");
                        return;
                    }

                    // Remove from 'users' array (if it exists there)
                    let users = JSON.parse(localStorage.getItem('users')) || [];
                    users = users.filter(user => user.email !== loggedInUser.email);
                    localStorage.setItem('users', JSON.stringify(users));
                }

                // Clear loggedInUser
                localStorage.removeItem('loggedInUser');
                alert('Akun Anda telah berhasil dihapus.');
                window.location.href = 'index.html'; // Redirect to login page
            }
        }
    </script>
</body>
</html>