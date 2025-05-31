<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Driver Registration</title>
    <link rel="stylesheet" href="..Aassets.css">
</head>
<body class="auth-body">
    <div class="auth-container">
        <h2>Driver Registration</h2>
        <form action="register_driver_process.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="text" name="license_number" placeholder="License Number" required>
            <input type="file" name="certificate" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
