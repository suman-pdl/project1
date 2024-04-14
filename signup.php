<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="signup-container">
        <form id="signupForm" action="sign.php" method="post">
            <label for="name">Useremail:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="passwd" name="passwd" required>

            <button type="submit">Sign Up</button>
        </form>

    </div>
    <div>
        <h3>Already have an account ???<a href="login.php" >login</a></li></h3>
    </div>
</body>
</html>