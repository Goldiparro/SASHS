<?php
global $conn;
include 'config/database.php';
session_start();

/**
 * Authenticate user
 */
function loginUser($conn, $username, $password) {
    $sql = "SELECT id, firstname, lastname, username, password FROM account WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            return $row;
        }
    }
    return false;
}

// Handle login
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $user = loginUser($conn, $username, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['firstname'] . " " . $user['lastname'];

        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Enrollment System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            border-radius: 12px;
        }
        .slide {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .fade {
            animation: fade 2s ease-in-out;
        }
        @keyframes fade {
            from { opacity: 0.4; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<!-- 🔹 HEADER -->
<header class="bg-green-700 text-white py-6 shadow-lg">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-wider uppercase">
            Stand Alone Senior High School
        </h1>
    </div>
</header>

<!-- 🔹 MAIN CONTAINER -->
<div class="flex flex-col items-center justify-center p-6 space-y-8">

    <!-- 🔹 Row 1: Slideshow + Login -->
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-xl flex flex-col md:flex-row overflow-hidden">

        <!-- Slideshow -->
        <div class="md:w-1/2 p-4">
            <div class="slideshow-container">
                <img src="images/shool.jpg" alt="Slide 1" class="slide fade">
                <img src="images/shool1.jpg" alt="Slide 2" class="slide fade">
                <img src="images/shool2.jpg" alt="Slide 3" class="slide fade">
            </div>
        </div>

        <!-- Login Form -->
        <div class="md:w-1/2 p-8">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="mb-4 p-3 text-red-700 bg-red-100 rounded-lg">
                    <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>

            <form method="post" class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" placeholder="Enter username" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Enter password" required
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none pr-10">
                        <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-600 hover:text-gray-900">
                            👁
                        </button>
                    </div>
                </div>

                <button type="submit" name="login"
                        class="w-full bg-green-500 text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">
                    Login
                </button>
            </form>

            <p class="text-center text-gray-600 mt-4">
                Don’t have an account?
                <a href="index.php" class="text-green-600 hover:underline">Sign Up here</a>
            </p>
        </div>
    </div>

    <!-- 🔹 Row 2: Enrollment Steps (Landscape Row) -->
    <div class="w-full max-w-6xl">
        <h3 class="text-lg font-bold text-gray-800 mb-6 text-center">Enrollment Steps</h3>
        <div class="flex flex-wrap justify-between gap-4">
            <div class="flex-1 min-w-[150px] bg-green-50 rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold text-green-700">Step 1</h4>
                <p class="text-sm text-gray-700">Create an online account with your complete details.</p>
            </div>
            <div class="flex-1 min-w-[150px] bg-green-50 rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold text-green-700">Step 2</h4>
                <p class="text-sm text-gray-700">Fill up the enrollment form with accurate student information.</p>
            </div>
            <div class="flex-1 min-w-[150px] bg-green-50 rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold text-green-700">Step 3</h4>
                <p class="text-sm text-gray-700">Upload required documents (Report Card, PSA, Good Moral).</p>
            </div>
            <div class="flex-1 min-w-[150px] bg-green-50 rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold text-green-700">Step 4</h4>
                <p class="text-sm text-gray-700">Wait for the school admin to verify and approve your application.</p>
            </div>
            <div class="flex-1 min-w-[150px] bg-green-50 rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold text-green-700">Step 5</h4>
                <p class="text-sm text-gray-700">Receive a confirmation message with your enrollment details.</p>
            </div>
        </div>
    </div>

</div>

<!-- 🔹 Scripts -->
<script>
    function togglePassword() {
        const passField = document.getElementById("password");
        passField.type = passField.type === "password" ? "text" : "password";
    }

    let slideIndex = 0;
    showSlides();

    function showSlides() {
        const slides = document.getElementsByClassName("slide");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000);
    }
</script>

</body>
</html>
