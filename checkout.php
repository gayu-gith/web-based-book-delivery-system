<?php 
include 'db.php'; session_start(); 
 
// Check if the cart is empty 
if (empty($_SESSION['cart'])) { 
    echo "<p>Your cart is empty! Please add books to the cart.</p>";     
    echo "<a href='index.php'>Go back to Shop</a>";     
    exit(); 
} 
 
// Optional: Warn if not logged in but still allow checkout 
if (!isset($_SESSION['user_id'])) { 
echo "<p>Warning: You are not logged in. Please log in to save your order history.</p>"; }
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Checkout</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <header> 
        <h1>Checkout</h1> 
    </header> 
    <main> 
        <form method="post"> 
            <label for="address">Delivery Address:</label> 
            <textarea id="address" name="address" placeholder="Enter your delivery address" required></textarea> 
            <button type="submit">Place Order</button> 
        </form> 
    </main> 
</body> 
</html> 
 
<?php 
// Handle order placement 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $address = $conn->real_escape_string($_POST['address']); 
   // If the user is not logged in, use a placeholder user_id (e.g., 0) 
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; 
 
    foreach ($_SESSION['cart'] as $book_id) { 
        $query = "INSERT INTO orders (user_id, book_id, delivery_address) VALUES ('$user_id', '$book_id', '$address')"; 
        $conn->query($query); 
    } 
 
    // Clear the cart     
    $_SESSION['cart'] = []; 
    echo "<p>Order placed successfully!</p>";     echo "<a href='index.php'>Continue Shopping</a>";     
    exit(); 
} 
?> 
