<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaQueue - <?php echo $pageTitle ?? 'Appointment System'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #71C9CE 0%, #A6E3E9 100%); }
        .card-hover  { transition: all 0.3s ease; }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(113,201,206,0.2);
        }
    </style>
</head>

<?php
// Detect pages that need full-bleed (no padding/max-w on main)
$isFullBleed = in_array(basename($_SERVER['PHP_SELF']), ['index.php', 'about.php']);
?>

<body class="<?php echo $isFullBleed ? 'bg-[#f0fdfd]' : 'bg-[#E3FDFD]'; ?>">

    <!-- NAV -->
    <nav id="main-nav" class="bg-white shadow-sm sticky top-0 z-50 transition-all duration-300 relative z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <!-- Left: Logo + Links -->
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center space-x-2">
                        <div class="gradient-bg w-8 h-8 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-gray-800">AquaQueue</span>
                    </a>

                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">

                        <!-- Home -->
                        <a href="index.php"
                           class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php'
                               ? 'text-[#71C9CE] border-b-2 border-[#71C9CE]'
                               : 'text-gray-500 hover:text-gray-900'; ?>
                               inline-flex items-center px-1 pt-1 text-sm font-medium">
                            Home
                        </a>

                        <!-- Book -->
                        <a href="book.php"
                           class="<?php echo basename($_SERVER['PHP_SELF']) == 'book.php'
                               ? 'text-[#71C9CE] border-b-2 border-[#71C9CE]'
                               : 'text-gray-500 hover:text-gray-900'; ?>
                               inline-flex items-center px-1 pt-1 text-sm font-medium">
                            Book
                        </a>

                        <!-- About -->
                        <a href="about.php"
                           class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php'
                               ? 'text-[#71C9CE] border-b-2 border-[#71C9CE]'
                               : 'text-gray-500 hover:text-gray-900'; ?>
                               inline-flex items-center px-1 pt-1 text-sm font-medium">
                            About
                        </a>

                        <!-- My Queue — ONLY for logged-in users -->
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="queue.php"
                           class="<?php echo basename($_SERVER['PHP_SELF']) == 'queue.php'
                               ? 'text-[#71C9CE] border-b-2 border-[#71C9CE]'
                               : 'text-gray-500 hover:text-gray-900'; ?>
                               inline-flex items-center px-1 pt-1 text-sm font-medium">
                            My Queue
                        </a>
                        <?php endif; ?>

                        <!-- Admin — ONLY for admin role -->
                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                        <a href="../admin/dashboard.php"
                           class="<?php echo in_array(basename($_SERVER['PHP_SELF']), ['dashboard.php','manage-queue.php'])
                               ? 'text-[#71C9CE] border-b-2 border-[#71C9CE]'
                               : 'text-gray-500 hover:text-gray-900'; ?>
                               inline-flex items-center px-1 pt-1 text-sm font-medium">
                            Admin
                        </a>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- Right: Auth buttons -->
                <div class="flex items-center">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="text-gray-700 mr-4">
                            Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
                        </span>
                        <?php if ($_SESSION['user_role'] == 'admin'): ?>
                            <a href="../admin/dashboard.php"
                               class="bg-[#71C9CE] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#5ab4b9] mr-4">
                                Dashboard
                            </a>
                        <?php endif; ?>
                        <a href="logout.php" class="text-gray-700 hover:text-gray-900 text-sm font-medium">Logout</a>
                    <?php else: ?>
                        <a href="login.php"
                           class="<?php echo basename($_SERVER['PHP_SELF']) == 'login.php'
                               ? 'text-[#71C9CE]'
                               : 'text-gray-700 hover:text-gray-900'; ?>
                               px-3 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                        <a href="register.php"
                           class="ml-4 bg-[#71C9CE] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#5ab4b9]">
                            Sign Up
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </nav>

    <!-- MAIN: full-bleed on index.php + about.php, normal container on all other pages -->
    <?php if ($isFullBleed): ?>
    <main>
    <?php else: ?>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <?php endif; ?>

<style>
/* Nav scroll effect */
#main-nav { transition: box-shadow 0.3s ease; background: #ffffff !important; }
#main-nav.scrolled {
    box-shadow: 0 4px 24px rgba(113,201,206,0.18);
}
</style>

<script>
const nav = document.getElementById('main-nav');
window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 10);
});
</script>