<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name    = trim($_POST['fullName'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $artist  = trim($_POST['selectedArtist'] ?? 'Our Artist Network');

    if (empty($name) || empty($email) || empty($subject) || empty($message) || strlen($message) < 20) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Server Validation Failure</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-dark text-white py-5">
            <div class="container text-center">
                <div class="card bg-danger border-0 shadow-lg mx-auto p-4" style="max-width: 600px;">
                    <h4 class="fw-bold">⚠️ Server-Side Verification Failure</h4>
                    <p class="mb-3">The data packet submission process was rejected by the local server. Ensure all fields are properly populated and your main message contains at least 20 characters.</p>
                    <hr class="border-light">
                    <a href="index.html" class="btn btn-light rounded-pill px-4">← Return to Form</a>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit(); 
    }

    $clean_name    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $clean_email   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $clean_subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    $clean_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    $clean_artist  = htmlspecialchars($artist, ENT_QUOTES, 'UTF-8');

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
        </style>
    </head>
    <body class="d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="confirmation-box shadow-lg p-5 mx-auto" style="max-width: 620px;">
                <div class="text-center mb-4">
                    <span class="display-3 text-success">✓</span>
                    <h2 class="fw-bold mt-2">Thank You, <?php echo $clean_name; ?>!</h2>
                    <p class="text-muted">Your entry message has been simulated and processed securely for:</p>
                    <h4 class="text-info fw-bold"><?php echo $clean_artist; ?> Network</h4>
                </div>
                
                <h5 class="fw-bold text-primary mb-3">Submission Summary Log:</h5>
                <ul class="list-group list-group-flush border rounded border-secondary overflow-hidden mb-4">
                    <li class="list-group-item bg-dark text-white"><strong>Routing Email:</strong> <code><?php echo $clean_email; ?></code></li>
                    <li class="list-group-item bg-dark text-white"><strong>Subject Vector:</strong> <?php echo $clean_subject; ?></li>
                    <li class="list-group-item bg-dark text-white">
                        <strong>Sanitized Message Payload:</strong><br>
                        <p class="text-secondary small mt-1 mb-0" style="white-space: pre-wrap;"><?php echo $clean_message; ?></p>
                    </li>
                </ul>

                <div class="text-center">
                    <a href="index.html" class="btn btn-primary px-5 rounded-pill shadow">Return back to Homepage</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    header("Location: index.html");
    exit();
}
?>
