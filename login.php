<?php 
include 'db.php'; 
session_start(); 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
 
    $query = "SELECT * FROM users WHERE email = '$email'"; 
    $result = $conn->query($query); 
 
    if ($result->num_rows > 0) {         $user = $result->fetch_assoc(); 
        if (password_verify($password, $user['password'])) { 
            $_SESSION['user_id'] = $user['id']; 
            header('Location: page1.php'); // Redirecting to page1.php             
            exit(); 
        } else { 
            $error = "Invalid password!"; 
        } 
    } else { 
        $error = "User not found!"; 
    } 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login</title> 
</head> 
<body style="background-image: url('login.jpg'); background-size: cover; backgroundposition: center; background-repeat: no-repeat; margin: 0; font-family: Arial, sans-serif; color: white;"> 
 
    <h1 style="text-align: center; margin-top: 50px;">Login</h1> 
     
    <?php if (isset($error)): ?> 
        <p style="color: red; text-align: center;"><?php echo $error; ?></p>     <?php endif; ?> 
     
    <form method="post" style="max-width: 400px; margin: 50px auto; padding: 20px; background: rgba(0, 0, 0, 0.6); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"> 
        <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 10px; margin: 10px 0; border: none; border-radius: 5px;"> 
        <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 10px; margin: 10px 0; border: none; border-radius: 5px;"> 
        <button type="submit" style="width: 100%; padding: 10px; margin: 10px 0; border: none; border-radius: 5px; background-color: #007BFF; color: white; font-size: 1rem;">Login</button> 
    </form> 
 
</body> 
</html> 
