<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Registration Form</title>
  <style>
    :root {
        --primary: #2c3e50;
        --secondary: #3498db;
        --accent: #e74c3c;
        --light: #f8fafc;
        --dark: #1e293b;
        --success: #27ae60;
        --border: #e2e8f0;
        --font-main: 'Inter', sans-serif;
        --transition: all 0.2s ease;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: var(--font-main);
        background: var(--light);
        padding: 2rem;
        display: grid;
        place-items: center;
        min-height: 100vh;
    }

    .admin-form {
        width: 100%;
        max-width: 800px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        padding: 2.5rem;
    }

    .form-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .form-header h2 {
        color: var(--primary);
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
    }

    .form-header p {
        color: #64748b;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .form-group { margin-bottom: 1rem; }
    .form-group.full-width { grid-column: span 2; }

    label {
        display: block;
        font-weight: 500;
        color: var(--dark);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .input-field {
        position: relative;
    }

    input {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        background: var(--light);
        transition: var(--transition);
    }

    input:focus {
        outline: none;
        border-color: var(--secondary);
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    .role-options {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .role-option {
        flex: 1;
    }

    .role-option input {
        display: none;
    }

    .role-option label {
        display: block;
        padding: 0.8rem;
        background: #f1f5f9;
        border: 1px solid var(--border);
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        margin-bottom: 0;
    }

    .role-option input:checked + label {
        background: var(--secondary);
        color: white;
        border-color: var(--secondary);
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: var(--secondary);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        margin-top: 1rem;
    }

    .submit-btn:hover {
        background: #2980b9;
    }

    .error-message {
        color: var(--accent);
        font-size: 0.8rem;
        margin-top: 0.25rem;
    }

    .success-message {
        color: var(--success);
        background: rgba(39, 174, 96, 0.1);
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: span 1;
        }
    }
  </style>
</head>
<body>
  <form class="admin-form" method="POST" action="registerUser.php">
    <div class="form-header">
      <h2>Register New Admin</h2>
      <p>Create administrator accounts for system access</p>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
      <div class="success-message">Registration successful! The admin account has been created.</div>
    <?php elseif (isset($_GET['error'])): ?>
      <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <div class="form-grid">
      <!-- First Name -->
      <div class="form-group">
        <label for="first_name">First Name</label>
        <div class="input-field">
          <input type="text" id="first_name" name="first_name" placeholder="First name" required>
        </div>
      </div>

      <!-- Last Name -->
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <div class="input-field">
          <input type="text" id="last_name" name="last_name" placeholder="Last name" required>
        </div>
      </div>

      <!-- Email -->
      <div class="form-group full-width">
        <label for="email">Email</label>
        <div class="input-field">
          <input type="email" id="email" name="email" placeholder="Email address" required>
        </div>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-field">
          <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <div class="input-field">
          <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        </div>
      </div>

      <!-- Role -->
      <div class="form-group full-width">
        <label>Role</label>
        <div class="role-options">
          <div class="role-option">
            <input type="radio" id="admin" name="role" value="admin" checked>
            <label for="admin">Admin</label>
          </div>
          <div class="role-option">
            <input type="radio" id="superadmin" name="role" value="superadmin">
            <label for="superadmin">Super Admin</label>
          </div>
        </div>
      </div>
    </div>

    <button type="submit" class="submit-btn">Register Admin</button>
  </form>
</body>
</html>
