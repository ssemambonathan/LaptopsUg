<?php
require __DIR__ . '/auth.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('register.php');
}

$name = trim((string)($_POST['full_name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$password = (string)($_POST['password'] ?? '');

if ($name === '') {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Full name is required.'];
    redirect('register.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please enter a valid email address.'];
    redirect('register.php');
}

if (strlen($password) < 8) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Password must be at least 8 characters long.'];
    redirect('register.php');
}

$users = loadUsers();

foreach ($users as $user) {
    if (strtolower((string)$user['email']) === strtolower($email)) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'An account with that email already exists.'];
        redirect('register.php');
    }
}

$users[] = [
    'name' => $name,
    'email' => $email,
    'password_hash' => password_hash($password, PASSWORD_DEFAULT),
];

saveUsers($users);

$_SESSION['flash'] = ['type' => 'success', 'message' => 'Registration successful. Please log in.'];
redirect('login.php');
