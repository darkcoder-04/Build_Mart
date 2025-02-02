<?php
$host = "localhost"; 
$dbname = "build_mart";
$username = "root";  
$password = "";    

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = trim($_POST["user_id"]);
    $name = trim($_POST["name"]);
    $unique_id = trim($_POST["unique_id"]);
    $password = trim($_POST["password"]);

    if (empty($unique_id) || empty($password)) {
        die("<script>alert('Unique ID and Password cannot be empty!'); window.history.back();</script>");
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update Database
    $query = "UPDATE users_regis SET unique_id = '$unique_id', password = '$hashed_password' WHERE id = '$user_id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Credentials updated successfully!'); window.location.href='admin_panel.php';</script>";
    } else {
        echo "<script>alert('Database update failed!'); window.location.href='admin_panel.php';</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Credentials</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }
    .form-container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background: white;
    }
    .btn-primary {
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h3 class="text-center mb-4">Generate Credentials</h3>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="user_id" class="form-label">User ID:</label>
        <input type="text" class="form-control" name="user_id" required>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" required>
      </div>

      <div class="mb-3">
        <label for="unique_id" class="form-label">Unique ID:</label>
        <input type="text" class="form-control" name="unique_id" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
