<?php
function getUsersFilePath(): string
{
    return __DIR__ . '/data/users.json';
}

function ensureUsersStore(): void
{
    $directory = __DIR__ . '/data';

    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }

    if (!file_exists(getUsersFilePath())) {
        file_put_contents(getUsersFilePath(), '[]');
    }
}

function loadUsers(): array
{
    ensureUsersStore();

    $content = @file_get_contents(getUsersFilePath());
    $decoded = json_decode($content, true);

    return is_array($decoded) ? $decoded : [];
}

function saveUsers(array $users): void
{
    ensureUsersStore();

    file_put_contents(
        getUsersFilePath(),
        json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    );
}

function redirect(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function resolveLaptopPath(): string
{
    $candidates = ['Laptops.xml', 'laptops.xml'];

    foreach ($candidates as $candidate) {
        if (file_exists(__DIR__ . '/' . $candidate)) {
            return $candidate;
        }
    }

    return 'Laptops.xml';
}
