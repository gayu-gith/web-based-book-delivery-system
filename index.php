<?php 
include 'db.php'; 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Bookstore Dashboard</title> 
</head> 
<body> 
<img src="index2.jpg" alt="simple image" style="width:1600px;height:400px;"> 
<style>     body {     display: flex;     flex-direction: column;     justify-content: flex-end;     align-items: center; 
} 
 
</style> 
    <!-- Welcome to Bookstore --> 
    <header style="margin-bottom: 20px; font-size: 2rem; font-family: 'Cursive', sans-serif"> 
        <h3>NOVEL STORIES<br> - Your Gateway to Knowledge</h3> 
    </header> 
    <!-- Register | Login --> 
    <nav style="margin-bottom: 20px; font-size: 1.2rem;" > 
        <?php if (isset($_SESSION['user_id'])): ?> 
            <a href="logout.php" style="color: white; text-decoration: none; margin: 0 10px;">Logout</a> | 
            <a href="cart.php" style="color: white; text-decoration: none; margin: 0 10px;">Cart</a> 
        <?php else: ?> 
            <a href="register.php" style="color: BlueViolet; text-decoration: none; margin: 0 10px;">Register</a> | 
            <a href="login.php" style="color: BlueViolet; text-decoration: none; margin: 0 10px;">Login</a> 
        <?php endif; ?> 
    </nav> 
 
    <!-- Explore More --> 
    <footer style="font-size: 1rem;"> 
        <p><h6>Our Collections - Explore more: 
            <a href="page1.php" style="color: black; text-decoration: none; margin: 0 5px;">Page 1</a> |  
            <a href="page2.php" style="color: black; text-decoration: none; margin: 0 5px;">Page 2</a> |  
            <a href="page3.php" style="color: black; text-decoration: none; margin: 0 
5px;">Page 3</a><h6> 
        </p> 
    </footer> 
 
</body> 
</html> 
