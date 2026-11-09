<?php
require __DIR__ . '/auth.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('login.php');
}

$email = trim($_POST['email'] ?? '');
$password = (string)($_POST['password'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please enter a valid email address.'];
    redirect('login.php');
}

if ($password === '') {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Password is required.'];
    redirect('login.php');
}

$users = loadUsers();
$user = null;

foreach ($users as $candidate) {
    if (strtolower((string)$candidate['email']) === strtolower($email)) {
        $user = $candidate;
        break;
    }
}

if (!$user || !password_verify($password, (string)$user['password_hash'])) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Invalid email or password.'];
    redirect('login.php');
}

$_SESSION['user'] = [
    'name' => (string)$user['name'],
    'email' => (string)$user['email'],
];

redirect('dashboard.php');
