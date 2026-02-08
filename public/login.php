<?php
session_start();

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Demo users
    $users = [
        'user@test.com' => ['password' => 'password123', 'name' => 'John User', 'role' => 'user'],
        'admin@test.com' => ['password' => 'admin123', 'name' => 'Admin User', 'role' => 'admin']
    ];

    if (isset($users[$email]) && $users[$email]['password'] === $password) {
        $_SESSION['user_id'] = rand(1000, 9999);
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $users[$email]['name'];
        $_SESSION['user_role'] = $users[$email]['role'];

        // Redirect based on role
        if ($users[$email]['role'] == 'admin') {
            header('Location: ../admin/dashboard.php');
        } else {
            header('Location: index.php');
        }
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}

$pageTitle = "Login";
include('../includes/header.php');
?>

<div class="min-h-[70vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div>
                <div class="flex justify-center">
                    <div class="bg-[#A6E3E9] w-16 h-16 rounded-xl flex items-center justify-center">
                        <i class="fas fa-sign-in-alt text-[#71C9CE] text-2xl"></i>
                    </div>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Sign in to your account
                </h2>
                <p class="mt-3 text-center text-sm text-gray-600">
                    Or <a href="register.php" class="font-semibold text-[#71C9CE] hover:text-[#5ab4b9]">create a new account</a>
                </p>

                <?php if (isset($error)): ?>
                    <div class="mt-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
                        <i class="fas fa-exclamation-circle mr-2"></i><?php echo $error; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Test Credentials -->
            <div class="mt-6 bg-[#E3FDFD] border border-[#A6E3E9] rounded-xl p-4">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <i class="fas fa-info-circle text-[#71C9CE] mr-2"></i>
                    Test Credentials
                </h3>
                <div class="space-y-2 text-sm text-gray-700">
                    <div class="flex items-start">
                        <span class="font-medium w-28">Regular User:</span>
                        <span class="text-gray-600">user@test.com / password123</span>
                    </div>
                    <div class="flex items-start">
                        <span class="font-medium w-28">Admin User:</span>
                        <span class="text-gray-600">admin@test.com / admin123</span>
                    </div>
                </div>
            </div>

            <form class="mt-8 space-y-5" method="POST">
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                        <input id="email" name="email" type="email" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#71C9CE] focus:border-transparent transition"
                            placeholder="Enter your email"
                            value="user@test.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input id="password" name="password" type="password" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#71C9CE] focus:border-transparent transition"
                            placeholder="Enter your password"
                            value="password123">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-[#71C9CE] focus:ring-[#71C9CE] border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-[#71C9CE] hover:text-[#5ab4b9]">Forgot password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 text-sm font-semibold rounded-xl text-white bg-[#71C9CE] hover:bg-[#5ab4b9] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#71C9CE] transition-all shadow-md hover:shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign in
                    </button>
                </div>

                <div class="text-center pt-2">
                    <p class="text-sm text-gray-600">
                        Just want to browse? <a href="index.php" class="font-semibold text-[#71C9CE] hover:text-[#5ab4b9]">Continue as guest</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>