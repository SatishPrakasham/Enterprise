<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - WProduct</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
      <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wadmin.php">WProduct</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_accounts.php"> User Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_sales_report.php">Admin Sales Analytics Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="check_user_order.php"> User Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promotion_update.php">Promotion Update Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedbackview.php">Feedback</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        body {
            background-color: #dedede;
        }
        .container {
            padding: 20px;
        }
        .feedback-card {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .feedback-card h4 {
            margin-bottom: 10px;
        }
        .feedback-card .meta {
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Feedback</h2>
    <div class="row">
        <?php
        include "config.php";
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Query to fetch all feedback records
        $sql = "SELECT * FROM newfeedback ORDER BY id DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-6">';
                echo '<div class="feedback-card">';
                echo '<h4>' . htmlspecialchars($row['name']) . '</h4>';
                echo '<div class="meta">';
                echo '<p>Email: ' . htmlspecialchars($row['email']) . '</p>';
                echo '<p>Rating: ' . htmlspecialchars($row['rating']) . '</p>';
                echo '</div>';
                echo '<p>' . htmlspecialchars($row['comments']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No feedback found.</p>';
        }
        
        $conn->close();
        ?>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function logout() {
            // Implement logout functionality
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>
