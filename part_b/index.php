<?php
// Set default timezone (e.g., Asia/Kolkata for IST, or server default)
date_default_timezone_set('Asia/Kolkata');

// Extract current date, time, and day using PHP date()
$currentDateNumeric = date("d-m-Y");            // e.g., 21-11-2026
$currentDateFull    = date("F j, Y");           // e.g., November 21, 2026
$currentTime12      = date("h:i:s A");          // e.g., 06:50:15 PM
$currentTime24      = date("H:i:s");            // e.g., 18:50:15
$currentDay         = date("l");                // e.g., Saturday
$timezone           = date_default_timezone_get();
$unixTimestamp      = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part B: Current Date, Time and Day</title>
    <link rel="stylesheet" href="style.css">
    <!-- Auto refresh every 30 seconds or user can reload -->
    <meta http-equiv="refresh" content="30">
</head>
<body>
    <div class="container">
        <header>
            <span class="badge">Part B &bull; PHP Date & Time Functions</span>
            <h1>Server Date, Time & Day</h1>
            <p class="subtitle">Generated dynamically via PHP script (Timezone: <?php echo htmlspecialchars($timezone); ?>)</p>
        </header>

        <!-- Cards Grid -->
        <div class="grid">
            <!-- Current Date -->
            <div class="metric-card date">
                <div class="icon">📅</div>
                <div class="metric-label">Current Date</div>
                <div class="metric-value"><?php echo $currentDateNumeric; ?></div>
                <div class="metric-sub"><?php echo $currentDateFull; ?></div>
            </div>

            <!-- Current Time -->
            <div class="metric-card time">
                <div class="icon">⏰</div>
                <div class="metric-label">Current Time</div>
                <div class="metric-value"><?php echo $currentTime12; ?></div>
                <div class="metric-sub">24-Hour: <?php echo $currentTime24; ?></div>
            </div>

            <!-- Current Day -->
            <div class="metric-card day">
                <div class="icon">☀️</div>
                <div class="metric-label">Current Day</div>
                <div class="metric-value"><?php echo $currentDay; ?></div>
                <div class="metric-sub">Day of the Week</div>
            </div>
        </div>

        <!-- Details / Format breakdown table -->
        <div class="details-card">
            <div class="details-title">
                <span>📋</span>
                <span>PHP date() Format Specifiers Used</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>PHP Code</th>
                        <th>Format Specifier</th>
                        <th>Output</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Date</strong></td>
                        <td><code>date("d-m-Y")</code></td>
                        <td>Day-Month-Year (zero-padded)</td>
                        <td><strong><?php echo $currentDateNumeric; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Time</strong></td>
                        <td><code>date("h:i:s A")</code></td>
                        <td>12-hour:minute:second with AM/PM</td>
                        <td><strong><?php echo $currentTime12; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Day</strong></td>
                        <td><code>date("l")</code></td>
                        <td>Full textual representation of the day</td>
                        <td><strong><?php echo $currentDay; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Timestamp</strong></td>
                        <td><code>time()</code></td>
                        <td>Unix epoch seconds</td>
                        <td><code><?php echo $unixTimestamp; ?></code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer-nav">
            <a href="javascript:location.reload();" class="link-btn">🔄 Refresh Time</a>
            <a href="../index.html" class="link-btn">&larr; Return to Lab Hub</a>
        </div>
    </div>
</body>
</html>
