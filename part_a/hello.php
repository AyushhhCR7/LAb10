<?php
// Start session to persist user information and start timestamp
session_start();

// Check if request has a name via POST (or existing session)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && trim($_POST['name']) !== '') {
    $_SESSION['name'] = trim($_POST['name']);
    $_SESSION['start_time'] = time();
    $_SESSION['start_time_formatted'] = date("d-m-Y h:i:s A");
} elseif (!isset($_SESSION['name']) || !isset($_SESSION['start_time'])) {
    // If accessed directly without form submission or active session, redirect to index
    header("Location: index.html");
    exit();
}

$name = $_SESSION['name'];
$startTimeDisplay = $_SESSION['start_time_formatted'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?php echo htmlspecialchars($name); ?> - Active Session</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Start time displayed at the right top corner of the page as required -->
    <div class="start-time-badge" title="Session Start Time">
        <span class="label">Start Time:</span>
        <span class="time"><?php echo htmlspecialchars($startTimeDisplay); ?></span>
    </div>

    <div class="card">
        <span class="badge">Session Active</span>
        <h1>Hello, <span class="highlight"><?php echo htmlspecialchars($name); ?></span>!</h1>
        <p class="subtitle">
            Your session has commenced. The start time is pinned at the top-right corner of this page. Click below when you are ready to log out.
        </p>

        <!-- Form providing logout button -->
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>

        <a href="../index.html" class="back-link">&larr; Return to Lab Hub</a>
    </div>
</body>
</html>
