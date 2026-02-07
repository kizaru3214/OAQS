<?php
session_start();

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_id'] = rand(1000, 9999);
    $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['user_name'] = $_POST['first_name'] . ' ' . $_POST['last_name'];
    $_SESSION['user_role'] = 'user';
    $_SESSION['user_phone'] = $_POST['phone'];
    
    header('Location: queue.php');
    exit();
}

$pageTitle = "Register";
include('../includes/header.php');
?>

<div class="min-h-[70vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="flex justify-center">
                <div class="gradient-bg w-16 h-16 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Create your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or <a href="login.php" class="font-medium text-[#71C9CE] hover:text-[#5ab4b9]">sign in to existing account</a>
            </p>
        </div>
        <form class="mt-8 space-y-6" method="POST">
            <div class="rounded-md shadow-sm space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first-name" class="sr-only">First Name</label>
                        <input id="first-name" name="first_name" type="text" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="First Name" value="John">
                    </div>
                    <div>
                        <label for="last-name" class="sr-only">Last Name</label>
                        <input id="last-name" name="last_name" type="text" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="Last Name" value="Doe">
                    </div>
                </div>
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="Email address" value="newuser@test.com">
                </div>
                <div>
                    <label for="phone" class="sr-only">Phone Number</label>
                    <input id="phone" name="phone" type="tel" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="Phone Number" value="+1234567890">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="Password" value="password123">
                </div>
                <div>
                    <label for="confirm-password" class="sr-only">Confirm Password</label>
                    <input id="confirm-password" name="confirm_password" type="password" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="Confirm Password" value="password123">
                </div>
            </div>

            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox" required checked class="h-4 w-4 text-[#71C9CE] focus:ring-[#71C9CE] border-gray-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-gray-900">
                    I agree to the <a href="#" class="text-[#71C9CE] hover:text-[#5ab4b9]">Terms of Service</a> and <a href="#" class="text-[#71C9CE] hover:text-[#5ab4b9]">Privacy Policy</a>
                </label>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#71C9CE] hover:bg-[#5ab4b9] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#71C9CE]">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus text-white"></i>
                    </span>
                    Create Account
                </button>
            </div>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>