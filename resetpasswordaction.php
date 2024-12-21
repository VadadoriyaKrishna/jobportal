// reset-password-action.php
if (isset($_POST['token']) && isset($_POST['password'])) {
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Assuming you have a function `validateToken` and `updateUserPassword`
    if (validateToken($token)) {
        if (updateUserPassword($token, $newPassword)) {
            echo "Password has been updated.";
            // Don't forget to clear the token after use
            clearToken($token);
        } else {
            echo "Failed to update password.";
        }
    } else {
        echo "Invalid or expired token.";
    }
}
