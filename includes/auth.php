<?php
session_start();

// Dummy users for testing (no database needed)
$dummyUsers = [
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

// Handle login
if (isset($_GET['action']) && $_GET['action'] == 'login' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (isset($dummyUsers[$email]) && $dummyUsers[$email]['password'] == $password) {
        $_SESSION['user_id'] = 1;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $dummyUsers[$email]['name'];
        $_SESSION['user_role'] = $dummyUsers[$email]['role'];
        
        if ($dummyUsers[$email]['role'] == 'admin') {
            header('Location: /queue-system/admin/dashboard.php');
        } else {
            header('Location: /queue-system/public/queue.php');
        }
        exit();
    } else {
        $_SESSION['error'] = 'Invalid email or password';
        header('Location: /queue-system/public/login.php');
        exit();
    }
}

// Handle registration
if (isset($_GET['action']) && $_GET['action'] == 'register' && isset($_POST['email'])) {
    $_SESSION['user_id'] = 2;
    $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['user_name'] = $_POST['first_name'] . ' ' . $_POST['last_name'];
    $_SESSION['user_role'] = 'user';
    
    header('Location: /queue-system/public/queue.php');
    exit();
}

// Handle logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('Location: /queue-system/public/index.php');
    exit();
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Check if user is admin
function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin';
}

// Get user name
function getUserName() {
    return $_SESSION['user_name'] ?? 'Guest';
}
?>