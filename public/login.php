<?php
session_start();

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Demo users (In production, use database with hashed passwords)
    $users = [
        'user@test.com' => [
            'password' => 'password123', 
            'name' => 'John User', 
            'role' => 'user'
        ],
        'admin@test.com' => [
            'password' => 'admin123', 
            'name' => 'Admin User', 
            'role' => 'admin'
        ]
    ];

    if (isset($users[$email]) && $users[$email]['password'] === $password) {
        // Set session variables
        $_SESSION['user_id'] = rand(1000, 9999);
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $users[$email]['name'];
        $_SESSION['user_role'] = $users[$email]['role'];

        // Redirect based on role
        $redirectUrl = ($users[$email]['role'] === 'admin') 
            ? '../admin/dashboard.php' 
            : 'index.php';
        
        header('Location: ' . $redirectUrl);
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
            <!-- Header -->
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
                        <i class="fas fa-exclamation-circle mr-2"></i><?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Social Login Buttons -->
            <div class="mt-8 space-y-3">
                <button type="button" onclick="loginWithGoogle()"
                    class="w-full flex justify-center items-center py-3 px-4 border border-gray-300 rounded-xl text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#71C9CE] transition-all">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Continue with Google
                </button>

                <button type="button" onclick="loginWithFacebook()"
                    class="w-full flex justify-center items-center py-3 px-4 border border-gray-300 rounded-xl text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#71C9CE] transition-all">
                    <svg class="w-5 h-5 mr-2" fill="#1877F2" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    Continue with Facebook
                </button>
            </div>

            <!-- Divider -->
            <div class="mt-6 relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Or continue with email</span>
                </div>
            </div>

            <!-- Email Login Form -->
            <form class="mt-6 space-y-5" method="POST">
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email address
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            required
                            autocomplete="email"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#71C9CE] focus:border-transparent transition"
                            placeholder="Enter your email">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            required
                            autocomplete="current-password"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#71C9CE] focus:border-transparent transition"
                            placeholder="Enter your password">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember-me" 
                            name="remember-me" 
                            type="checkbox"
                            class="h-4 w-4 text-[#71C9CE] focus:ring-[#71C9CE] border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="forgot-password.php" class="font-medium text-[#71C9CE] hover:text-[#5ab4b9]">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <div>
                    <button 
                        type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 text-sm font-semibold rounded-xl text-white bg-[#71C9CE] hover:bg-[#5ab4b9] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#71C9CE] transition-all shadow-md hover:shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign in
                    </button>
                </div>

                <div class="text-center pt-2">
                    <p class="text-sm text-gray-600">
                        Just want to browse? 
                        <a href="index.php" class="font-semibold text-[#71C9CE] hover:text-[#5ab4b9]">
                            Continue as guest
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function loginWithGoogle() {
    // TODO: Implement Google OAuth 2.0 login
    // Reference: https://developers.google.com/identity/protocols/oauth2
    console.log('Google login clicked');
    alert('Google login integration coming soon!');
}

function loginWithFacebook() {
    // TODO: Implement Facebook Login
    // Reference: https://developers.facebook.com/docs/facebook-login/web
    console.log('Facebook login clicked');
    alert('Facebook login integration coming soon!');
}
</script>

<?php include('../includes/footer.php'); ?>