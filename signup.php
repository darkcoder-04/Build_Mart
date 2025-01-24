<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Body Styling */
    body {
      font-family: 'Arial', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #e0f7fa;  /* Light cyan background */
      margin: 0;
    }

    /* Sign-up Container Styling */
    .signup-container {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: white;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .signup-container:hover {
      transform: scale(1.02);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Heading Styling */
    .signup-container h3 {
      font-size: 24px;
      font-weight: 600;
      color: #00796b;  /* Teal color */
      margin-bottom: 20px;
      text-align: center;
    }

    /* Label Styling */
    .form-label {
      font-weight: 500;
      color: #00796b;  /* Teal color */
    }

    /* Input field styling */
    .form-control {
      border-radius: 8px;
      font-size: 16px;
      padding: 12px 16px;
      border: 1px solid #ced4da;
    }

    .form-control:focus {
      border-color: #00796b;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    /* Select field styling */
    .form-select {
      border-radius: 8px;
      font-size: 16px;
      padding: 12px 16px;
      border: 1px solid #ced4da;
    }

    /* Button Styling */
    .btn-primary {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      font-weight: 600;
      background-color: #00796b;
      border: none;
      border-radius: 8px;
      color: #ffffff;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #004d40;
    }

    /* Additional Mobile Styling */
    @media (max-width: 480px) {
      .signup-container {
        width: 90%;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <h3 class="text-center mb-4">Sign Up</h3>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <div class="mb-3">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number" required pattern="[0-9]{10}">
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role" class="form-select" required>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
  </div>


  <?php
// Database connection details
$host = "localhost";
$dbname = "build_mart";
$db_username = "root"; // Replace with your database username
$db_password = ""; // Replace with your database password

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $mobile = trim($_POST["mobile"]);
        $role = trim($_POST["role"]);

        // Check if the username already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Username already exists. Please choose another.'); window.location.href = 'login.php';</script>";
            exit;
        }

        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, password, mobile, role) VALUES (:username, :password, :mobile, :role)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! You can now log in.'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again later.'); window.location.href = 'signup.php';</script>";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
</body>
</html>
