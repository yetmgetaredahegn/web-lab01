<?php
require 'db.php';
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure Hashing

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $pass);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Registration Successful");
    } else {
        $msg = "Error: Username or Email already exists.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <?php if($msg) echo "<p class='error'>$msg</p>"; ?>
        <form id="regForm" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Back to <a href="index.php">Login</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
