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
            header('Location: queue.php');
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
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="flex justify-center">
                <div class="gradient-bg w-16 h-16 rounded-lg flex items-center justify-center">
                    <i class="fas fa-sign-in-alt text-white text-2xl"></i>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Sign in to your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or <a href="register.php" class="font-medium text-[#71C9CE] hover:text-[#5ab4b9]">create a new account</a>
            </p>
            
            <?php if(isset($error)): ?>
            <div class="mt-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Test Credentials -->
        <div class="bg-[#CBF1F5] border border-[#A6E3E9] rounded-lg p-4">
            <h3 class="font-medium text-gray-800 mb-2">📋 Test Credentials:</h3>
            <div class="space-y-1 text-sm">
                <div><span class="font-medium">👤 Regular User:</span> user@test.com / password123</div>
                <div><span class="font-medium">👑 Admin User:</span> admin@test.com / admin123</div>
            </div>
        </div>
        
        <form class="mt-8 space-y-6" method="POST">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="Email address" value="user@test.com">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-[#71C9CE] focus:border-[#71C9CE] focus:z-10 sm:text-sm" placeholder="Password" value="password123">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-[#71C9CE] focus:ring-[#71C9CE] border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-[#71C9CE] hover:text-[#5ab4b9]">Forgot your password?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#71C9CE] hover:bg-[#5ab4b9] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#71C9CE]">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-sign-in-alt text-white"></i>
                    </span>
                    Sign in
                </button>
            </div>
            
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Just want to browse? <a href="index.php" class="font-medium text-[#71C9CE] hover:text-[#5ab4b9]">Continue as guest</a>
                </p>
            </div>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>