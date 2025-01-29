<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'Build_mart');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Accept or Deny actions
if (isset($_POST['accept'])) {
    $complaint_id = $_POST['complaint_id'];
    $sql = "UPDATE complaints SET status='Accepted' WHERE complaint_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $complaint_id);
    $stmt->execute();
    $stmt->close();
} elseif (isset($_POST['deny'])) {
    $complaint_id = $_POST['complaint_id'];
    $sql = "UPDATE complaints SET status='Denied' WHERE complaint_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $complaint_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch complaints data
$sql = "SELECT * FROM complaints ORDER BY complaint_date DESC";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints | build_mart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h2 {
            margin-bottom: 20px;
        }
        .btn-accept {
            background-color: #28a745;
            color: white;
        }
        .btn-deny {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Complaints List</h2>

        <!-- Complaints Data Table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>username</th>
                    <th>mobileno</th>
                    <th>Details</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($result) && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['complaint_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['mobileno']; ?></td>
                            <td><?php echo $row['complaintdetails']; ?></td>
                            <td><?php echo $row['complaint_date']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <?php if ($row['status'] == 'Pending') { ?>
                                    <form method="POST" action="">
                                        <input type="hidden" name="complaint_id" value="<?php echo $row['complaint_id']; ?>">
                                        <button type="submit" name="accept" class="btn btn-accept btn-sm">Accept</button>
                                        <button type="submit" name="deny" class="btn btn-deny btn-sm">Deny</button>
                                    </form>
                                <?php } else { ?>
                                    <span><?php echo $row['status']; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr><td colspan="8">No complaints found.</td></tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Back Button -->
        <div class="mt-3">
            <button onclick="window.location.href='admin_dashboard.php'" class="btn btn-secondary">Back</button>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>