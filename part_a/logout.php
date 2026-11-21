<?php
// Start session to access stored session variables
session_start();

$userName = "Guest";
$durationFormatted = "0 seconds";
$totalSeconds = 0;

if (isset($_SESSION['name']) && isset($_SESSION['start_time'])) {
    $userName = $_SESSION['name'];
    $startTime = $_SESSION['start_time'];
    $endTime = time();
    $totalSeconds = $endTime - $startTime;

    // Calculate hours, minutes, and seconds
    $hours = floor($totalSeconds / 3600);
    $minutes = floor(($totalSeconds % 3600) / 60);
    $seconds = $totalSeconds % 60;

    $parts = [];
    if ($hours > 0) {
        $parts[] = $hours . " " . ($hours === 1 ? "hour" : "hours");
    }
    if ($minutes > 0 || $hours > 0) {
        $parts[] = $minutes . " " . ($minutes === 1 ? "minute" : "minutes");
    }
    $parts[] = $seconds . " " . ($seconds === 1 ? "second" : "seconds");

    $durationFormatted = implode(", ", $parts);

    // Clear and destroy the session
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out - Thank You</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <div class="icon-wrapper success">✓</div>
        <span class="badge">Session Ended</span>
        <h1>Thank You, <span class="highlight"><?php echo htmlspecialchars($userName); ?></span>!</h1>
        <p class="subtitle">You have successfully logged out of the application.</p>

        <div class="duration-box">
            <div class="duration-label">Total Duration of Usage</div>
            <div class="duration-val"><?php echo htmlspecialchars($durationFormatted); ?></div>
            <div class="duration-sub"><?php echo $totalSeconds; ?> second<?php echo $totalSeconds === 1 ? '' : 's'; ?> recorded</div>
        </div>

        <a href="index.html" class="btn">Log In Again</a>
        <br>
        <a href="../index.html" class="back-link">&larr; Return to Lab Hub</a>
    </div>
</body>
</html>

