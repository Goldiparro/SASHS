<?php
global $conn;
include 'config/database.php';
session_start();

if (isset($_POST['signup'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO account (firstname, lastname, username, password) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstname, $lastname, $username, $password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Account created successfully! You can now login.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up | Enrollment System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 100%;
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
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-wider uppercase">
            Stand Alone Senior High School
        </h1>
    </div>
</header>

<!-- 🔹 MAIN CONTAINER -->
<div class="flex flex-1 items-center justify-center p-6">
    <div class="w-full max-w-7xl bg-white rounded-2xl shadow-xl flex flex-col md:flex-row overflow-hidden">

        <!-- 🔹 LEFT: Slideshow -->
        <div class="md:w-1/2 slideshow-container">
            <img src="images/shool.jpg" alt="Slide 1" class="slide fade">
            <img src="images/shool1.jpg" alt="Slide 2" class="slide fade">
            <img src="images/shool2.jpg" alt="Slide 3" class="slide fade">
        </div>

        <!-- 🔹 RIGHT: Signup Form + Steps -->
        <div class="md:w-1/2 p-10 overflow-y-auto">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="mb-4 p-3 text-red-700 bg-red-100 rounded-lg">
                    <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

            <!-- Signup Form -->
            <form method="post" class="space-y-4 mb-6">
                <div>
                    <label class="block text-gray-700 mb-1">First Name</label>
                    <input type="text" name="firstname" placeholder="Enter first name" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="lastname" placeholder="Enter last name" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" placeholder="Enter username" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" placeholder="Enter password" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>

                <button type="submit" name="signup"
                        class="w-full bg-green-500 text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">
                    Sign Up
                </button>
            </form>


            <p class="text-center text-gray-600 mb-6">
                Already have an account?
                <a href="login.php" class="text-green-600 hover:underline">Login here</a>
            </p>
</div>


<!-- 🔹 Scripts -->
<script>
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
