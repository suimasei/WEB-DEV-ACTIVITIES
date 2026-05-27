<?php
// Enable error reporting to diagnose potential issues within the system code
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// ==========================================================================
// 1. DEFAULT XAMPP MYSQL CONFIGURATION CREDENTIALS
// ==========================================================================
$servername = "localhost";
$username   = "root";
$password   = ""; // Default XAMPP root user contains no password by default
$dbname     = "finals_db";

try {
    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

// ==========================================================================
// 2. SECURITY LOCK: LOCALHOST ADMIN RESTRICTION ON REGISTRATION FEEDS
// ==========================================================================
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['action']) && $_GET['action'] === 'fetch_comments') {
    header('Content-Type: application/json');
    
    $remote_ip = $_SERVER['REMOTE_ADDR'];
    
    // Hard security check: Request must originate from Localhost admin machine
    if ($remote_ip === '127.0.0.1' || $remote_ip === '::1' || $remote_ip === 'localhost') {
        try {
            $sql = "SELECT name, email, artist, subject, message, timestamp FROM registrations ORDER BY timestamp DESC";
            $result = $conn->query($sql);
            
            $fans = [];
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $fans[] = $row;
                }
            }
            echo json_encode($fans);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["error" => "Database Query Error: " . $e->getMessage()]);
        }
    } else {
        http_response_code(403);
        echo json_encode(["error" => "Access Denied. Only the local administrator can view this feed."]);
    }
    exit();
}

// ==========================================================================
// 3. FORM POST HANDLING (PROCESS UNIFORM DATA PERSISTENCE)
// ==========================================================================
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name    = trim($_POST['fullName'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $artist  = trim($_POST['selectedArtist'] ?? 'Our Artist Network');

    // Server-side Validation
    if (
        empty($name) || 
        empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || 
        empty($subject) || 
        empty($message) || strlen($message) < 20
    ) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Server Validation Failure</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-dark text-white py-5">
            <div class="container text-center">
                <div class="card bg-danger border-0 shadow-lg mx-auto p-4" style="max-width: 600px;">
                    <h4 class="fw-bold">⚠️ Server-Side Verification Failure</h4>
                    <p class="mb-3">The data packet submission process was rejected by the local server. Double-check that your message is at least 20 characters long.</p>
                    <hr class="border-light">
                    <a href="sample.html" class="btn btn-light rounded-pill px-4">← Return to Form</a>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit(); 
    }

    // Sanitization against Cross-Site Scripting (XSS) HTML Injection Attacks
    $clean_name    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $clean_email   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $clean_subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    $clean_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    $clean_artist  = htmlspecialchars($artist, ENT_QUOTES, 'UTF-8');

    try {
        // SQL INSERT Execution Using Prepared Statements
        $stmt = $conn->prepare("INSERT INTO registrations (name, email, artist, subject, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $clean_name, $clean_email, $clean_artist, $clean_subject, $clean_message);
        $stmt->execute();
        $stmt->close();
    } catch (Exception $e) {
        die("Critical Database Insert Failure: " . $e->getMessage());
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fan Submission Confirmed</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #090d16; color: #f1f5f9; font-family: system-ui, sans-serif; }
            .confirmation-box { background-color: #111827; border: 1px solid #374151; border-radius: 16px; }
            .custom-visible-text { color: #cbd5e1 !important; font-size: 1.1rem; opacity: 0.9; }
        </style>
    </head>
    <body class="d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="confirmation-box shadow-lg p-5 mx-auto" style="max-width: 620px;">
                <div class="text-center mb-4">
                    <span class="display-3 text-success">✓</span>
                    <h2 class="fw-bold mt-2">Thank You, <?php echo $clean_name; ?>!</h2>
                    <p class="custom-visible-text my-3">Your entry message has been simulated and processed securely for:</p>
                    <h4 class="text-info fw-bold"><?php echo $clean_artist; ?> Network</h4>
                </div>
                
                <h5 class="fw-bold text-primary mb-3">Submission Summary Log (Saved to MySQL Database):</h5>
                <ul class="list-group list-group-flush border rounded border-secondary overflow-hidden mb-4">
                    <li class="list-group-item bg-dark text-white"><strong>Routing Email:</strong> <code><?php echo $clean_email; ?></code></li>
                    <li class="list-group-item bg-dark text-white"><strong>Subject Vector:</strong> <?php echo $clean_subject; ?></li>
                    <li class="list-group-item bg-dark text-white">
                        <strong>Sanitized Message Payload:</strong><br>
                        <p class="text-secondary small mt-1 mb-0" style="white-space: pre-wrap;"><?php echo $clean_message; ?></p>
                    </li>
                </ul>

                <div class="text-center">
                    <a href="sample.html" class="btn btn-primary px-5 rounded-pill shadow">Return back to Homepage</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    
    $conn->close();
} else {
    header("Location: sample.html");
    exit();
}
?>
