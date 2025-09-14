<?php
include 'config/database.php';
session_start();

// Redirect kung hindi naka-login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Enrollment System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function confirmLogout() {
            if (confirm("Do you want to log out?")) {
                window.location.href = "logout.php";
            }
        }
        function openEnrollment() {
            document.getElementById('enrollmentModal').classList.remove('hidden');
        }
        function closeEnrollment() {
            document.getElementById('enrollmentModal').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Top Navigation -->
<nav class="bg-green-600 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-white text-xl font-bold">SASHS Enrollment System</h1>
        <div class="flex items-center space-x-4">
            <span class="text-white">👋 Welcome, <strong><?php echo htmlspecialchars($username); ?></strong></span>
            <button onclick="confirmLogout()"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                Logout
            </button>
        </div>
    </div>
</nav>

<!-- Dashboard Content -->
<div class="container mx-auto mt-10 px-4">
    <div class="grid md:grid-cols-3 gap-6">
        <!-- Card: Enrollment -->
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-bold text-gray-800 mb-2">📚 Enrollment</h2>
            <p class="text-gray-600 mb-4">Manage student enrollment records.</p>
            <button onclick="openEnrollment()"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                Go to Enrollment
            </button>
        </div>

        <!-- Card: Students -->
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-bold text-gray-800 mb-2">👨‍🎓 Students</h2>
            <p class="text-gray-600 mb-4">View and manage student profiles.</p>
            <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                View Students
            </a>
        </div>

        <!-- Card: Reports -->
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-bold text-gray-800 mb-2">📑 Reports</h2>
            <p class="text-gray-600 mb-4">Generate and view system reports.</p>
            <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                View Reports
            </a>
        </div>
    </div>
</div>

<!-- Enrollment Modal -->
<div id="enrollmentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-11/12 md:w-3/4 lg:w-2/3 p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-xl font-bold mb-4">📚 Basic Education Enrollment Form</h2>

        <!-- Iframe para sa enrollment form -->
        <iframe src="enrollment.php" class="w-full h-[500px] rounded-lg border"></iframe>

        <!-- Close Button -->
        <div class="text-right mt-4">
            <button onclick="closeEnrollment()"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                Close
            </button>
        </div>
    </div>
</div>

</body>
</html>
