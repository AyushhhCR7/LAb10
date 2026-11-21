<?php
// Validate and capture POST parameters
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $ageInput = isset($_POST['age']) ? trim($_POST['age']) : '';

    if ($name === '' || !is_numeric($ageInput)) {
        header("Location: index.html");
        exit();
    }

    $age = intval($ageInput);
} else {
    // Redirect if visited without POST submission
    header("Location: index.html");
    exit();
}

// Age threshold logic: strictly less than 18 is unauthorized
$isAuthorized = ($age >= 18);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Result - <?php echo htmlspecialchars($name); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <?php if (!$isAuthorized): ?>
            <!-- Age < 18: Access Denied Page -->
            <div class="status-icon unauthorized">✕</div>
            <span class="badge" style="background-color: rgba(239, 68, 68, 0.2); color: #f87171;">Access Denied</span>
            <h1>Restricted Area</h1>

            <div class="status-box unauthorized">
                <div class="message-text">
                    Hello <?php echo htmlspecialchars($name); ?>, you are not authorized to visit the site
                </div>
                <div class="detail-text">
                    Entry requires a minimum age of 18 years. (Recorded age: <?php echo $age; ?>)
                </div>
            </div>
        <?php else: ?>
            <!-- Age >= 18: Access Granted Page -->
            <div class="status-icon authorized">✓</div>
            <span class="badge" style="background-color: rgba(16, 185, 129, 0.2); color: #34d399;">Access Granted</span>
            <h1>Authorization Confirmed</h1>

            <div class="status-box authorized">
                <div class="message-text">
                    Welcome to this site
                </div>
                <div class="detail-text">
                    Welcome <?php echo htmlspecialchars($name); ?>! Age verification passed successfully. (Age: <?php echo $age; ?>)
                </div>
            </div>
        <?php endif; ?>

        <a href="index.html" class="btn">Test Another Age</a>
        <br>
        <a href="../index.html" class="back-link">&larr; Return to Lab Hub</a>
    </div>
</body>
</html>

