# Lab 10: PHP Web Applications

A collection of three interactive PHP web applications demonstrating session management, server-side date and time functions, and request-based authorization logic.

---

## Table of Contents
1. [Overview & Requirements](#overview--requirements)
2. [Project Structure](#project-structure)
3. [Applications Breakdown](#applications-breakdown)
   - [Part A: User Session & Duration Tracker](#part-a-user-session--duration-tracker)
   - [Part B: Current Date, Time & Day](#part-b-current-date-time--day)
   - [Part C: Age Verification Portal](#part-c-age-verification-portal)
4. [How to Run](#how-to-run)
   - [Method 1: PHP Built-in Web Server (Recommended)](#method-1-php-built-in-web-server-recommended)
   - [Method 2: Apache / XAMPP / WAMP](#method-2-apache--xampp--wamp)
5. [Technical Concepts Demonstrated](#technical-concepts-demonstrated)

---

## Overview & Requirements

### Part a: Session & Duration Tracker
- Accepts a name as user input.
- Displays a hello greeting page taking the name from the request/session.
- Prominently displays the session start time at the **right top corner** of the page.
- Provides a **Logout** button.
- On clicking logout, displays a thank you page showing the total **duration of usage** (calculated from stored session timestamps).

### Part b: Date, Time and Day Display
- Pure PHP script utilizing native `date()` functions.
- Formats and displays the current **Date**, **Time**, and **Day of the Week** dynamically.
- Includes explanations for PHP date formatting specifiers.

### Part c: Age Verification Portal
- An HTML form that collects user `Name` and `Age`.
- Evaluates the user's age on submission:
  - **Age < 18**: Displays `"Hello <name>, you are not authorized to visit the site"`.
  - **Age &ge; 18**: Displays `"Welcome to this site"`.

---

## Project Structure

```text
LAb10/
├── index.html              # Central Lab Dashboard linking to all 3 parts
├── README.md               # Complete documentation and setup guide
│
├── part_a/                 # Part A: Session Management & Usage Duration
│   ├── index.html          # Name submission form
│   ├── hello.php           # Active session page with top-right start time
│   ├── logout.php          # Session termination & elapsed duration calculation
│   └── style.css           # Modern styling and pinned top-right badge
│
├── part_b/                 # Part B: Date, Time & Day Script
│   ├── index.php           # PHP script showing formatted Date, Time, and Day
│   └── style.css           # Clean metric cards layout
│
└── part_c/                 # Part C: Age Verification Application
    ├── index.html          # Form taking name and age input
    ├── verify.php          # Conditional authorization processor
    └── style.css           # Responsive access granted/denied UI states
```

---

## Applications Breakdown

### Part A: User Session & Duration Tracker
1. **`index.html`**: The user inputs their name and submits the form via `POST`.
2. **`hello.php`**:
   - Calls `session_start()`.
   - Records the user's name and initial timestamp:
     ```php
     $_SESSION['name'] = trim($_POST['name']);
     $_SESSION['start_time'] = time();
     $_SESSION['start_time_formatted'] = date("d-m-Y h:i:s A");
     ```
   - Renders a greeting alongside a fixed badge at the top-right corner showing the exact start time.
   - Provides a `Logout` button submitting to `logout.php`.
3. **`logout.php`**:
   - Computes elapsed time: `$duration = time() - $_SESSION['start_time'];`.
   - Breaks down seconds into hours, minutes, and seconds.
   - Clears and destroys the session using `session_unset()` and `session_destroy()`.
   - Renders `"Thank You, <name>!"` alongside the exact duration of application usage.

---

### Part B: Current Date, Time & Day
1. Sets the timezone: `date_default_timezone_set('Asia/Kolkata')`.
2. Extracts key temporal components:
   - **Date**: `date("d-m-Y")` & `date("F j, Y")`
   - **Time**: `date("h:i:s A")` & `date("H:i:s")`
   - **Day**: `date("l")`
3. Presents the data in modern metric cards with an auto-refresh tag.

---

### Part C: Age Verification Portal
1. **`index.html`**: Form gathering `name` (text) and `age` (number).
2. **`verify.php`**: Validates input:
   ```php
   if ($age < 18) {
       // Hello <name>, you are not authorized to visit the site
   } else {
       // Welcome to this site
   }
   ```
3. Shows visually distinct UI feedback (red alert for unauthorized, emerald badge for authorized).

---

## How to Run

### Method 1: PHP Built-in Web Server (Recommended)
1. Open a terminal inside the project directory:
   ```bash
   cd /path/to/LAb10
   ```
2. Start the PHP server:
   ```bash
   php -S localhost:8000
   ```
3. Open your browser and navigate to:
   - **Main Portal**: [http://localhost:8000/index.html](http://localhost:8000/index.html)
   - **Part A**: [http://localhost:8000/part_a/index.html](http://localhost:8000/part_a/index.html)
   - **Part B**: [http://localhost:8000/part_b/index.php](http://localhost:8000/part_b/index.php)
   - **Part C**: [http://localhost:8000/part_c/index.html](http://localhost:8000/part_c/index.html)

### Method 2: Apache / XAMPP / WAMP
1. Copy the `LAb10` folder into your web server's root directory:
   - **XAMPP (Windows)**: `C:\xampp\htdocs\LAb10`
   - **XAMPP (Linux)**: `/opt/lampp/htdocs/LAb10`
   - **Apache (Ubuntu/Debian)**: `/var/www/html/LAb10`
2. Start Apache via XAMPP Control Panel or terminal (`sudo systemctl start apache2`).
3. Open [http://localhost/LAb10/](http://localhost/LAb10/) in your browser.

---

## Technical Concepts Demonstrated
- **PHP Sessions**: `session_start()`, `$_SESSION` superglobal, `session_unset()`, `session_destroy()`.
- **Time Tracking**: Unix epoch calculation via `time()`, human-readable duration formatting.
- **Date & Time API**: `date()`, format characters (`d`, `m`, `Y`, `h`, `i`, `s`, `A`, `l`).
- **Form Handling & Validation**: `POST` processing, sanitization via `htmlspecialchars()`, numeric validation.
- **Access Control & Conditional Branching**: Server-side logic branching and dynamic response generation.
