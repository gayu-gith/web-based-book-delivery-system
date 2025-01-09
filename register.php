<?php 
include 'db.php'; 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $username = $_POST['username']; 
    $email = $_POST['email']; 
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
 
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', 
'$email', '$password')";     if ($conn->query($query)) { 
        echo "Registration successful! <a href='login.php'>Login here</a>"; 
    } else { 
        echo "Error: " . $conn->error; 
    } 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Register</title> 
</head> 
<body style="background-image: url('register.jpg'); 
background-size: cover; 
backgroundposition: center; 
background-repeat: no-repeat; 
color: white; font-family: Arial, 
sans-serif; 
margin: 0; 
padding: 0;"> 
 
    <h1 style="text-align: center; margin-top: 50px;">Register</h1> 
     
    <form method="post" 
    style="max-width: 400px; 
    margin: 50px auto; 
    padding: 20px; 
    background: rgba(0, 0, 0, 0.6); 
    border-radius: 10px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"> 

        <input type="text" name="username" placeholder="Username" required 
        style="width: 100%; 
        padding: 10px; 
        margin: 10px 0; 
        border: none; 
        border-radius: 5px;"> 

        <input type="email" name="email" placeholder="Email" required 
        style="width: 100%; 
        padding: 10px; 
        margin: 10px 0; 
        border: none; 
        border-radius: 5px;"> 

        <input type="password" name="password" placeholder="Password" required 
        style="width: 100%; 
        padding: 10px; 
        margin: 10px 0; 
        border: none; 
        border-radius: 5px;"> 

        <button type="submit" 
        style="width: 100%; 
        padding: 10px; 
        margin: 10px 0; 
        border: none; 
        border-radius: 5px; 
        background-color: #007BFF; 
        color: white; 
        font-size: 1rem;">Register</button> 
    </form> 
 
</body> 
</html> 
