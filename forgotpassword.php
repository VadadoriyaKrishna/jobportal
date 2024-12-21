<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobdata";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email from form
    $email = $_POST['email'];

    // Check if email exists in the database
    $sql = "SELECT * FROM tblapplicants WHERE EMAILADDRESS = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a random password
        $new_password = generateRandomString(8);

        // Update user's password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE tblapplicants SET PASS = '$hashed_password' WHERE EMAILADDRESS = '$email'";
        if ($conn->query($update_sql) === TRUE) {
            // Send the new password to the user's email
            $to = $email;
            $subject = 'New Password';
            $message = 'Your new password is: ' . $new_password;
            $headers = 'From: your_email@example.com' . "\r\n" .
                'Reply-To: your_email@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);

            echo "A new password has been sent to your email.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Email not found in the database.";
    }
}

// Function to generate a random string
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
