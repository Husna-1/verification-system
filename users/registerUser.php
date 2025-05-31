<?php
// Include MySQLi connection
include('../connection/db_connection.php'); // Ensure this sets $conn = mysqli_connect(...);

// Initialize variables
$errors = [];
$success = false;

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and assign
    $first_name = mysqli_real_escape_string($conn, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($conn, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'] ?? 'admin';
    $phone = ''; // Add this to the form if needed

    // Validation
    if (empty($first_name)) $errors['first_name'] = 'First name is required';
    if (empty($last_name)) $errors['last_name'] = 'Last name is required';

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    } else {
        $email_check_query = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $email_check_query);
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = 'Email already registered';
        }
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    // Adjust role
    if ($role === 'superadmin') $role = 'super_admin';

    // Insert user if no errors
    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $insert_query = "
            INSERT INTO users (first_name, last_name, email, password_hash, role, phone, created_at, is_active)
            VALUES ('$first_name', '$last_name', '$email', '$password_hash', '$role', '$phone', NOW(), 1)
        ";

        if (mysqli_query($conn, $insert_query)) {
            $success = true;
            $_POST = []; // Clear form
        } else {
            $errors['database'] = 'Registration failed: ' . mysqli_error($conn);
        }
    }
}
?>
