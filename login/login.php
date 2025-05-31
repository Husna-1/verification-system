<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        header('Location: loginForm.php?error=' . urlencode('Please fill in all fields.'));
        exit;
    }

    require_once '../connection/db_connection.php'; // adjust path if needed

    // Use $conn since that's your connection variable
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    // Prepare the statement using procedural style (mysqli_prepare)
    $stmt = mysqli_prepare($conn, 'SELECT password_hash FROM users WHERE email = ?');
    if (!$stmt) {
        die('Prepare failed: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 0) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: loginForm.php?error=' . urlencode('Invalid email or password.'));
        exit;
    }

    mysqli_stmt_bind_result($stmt, $password_hash);
    mysqli_stmt_fetch($stmt);

    if (!password_verify($password, $password_hash)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: loginForm.php?error=' . urlencode('Invalid email or password.'));
        exit;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $_SESSION['user_email'] = $email;
    header('Location: dashboard.php');
    exit;
} else {
    header('Location: loginForm.php');
    exit;
}
