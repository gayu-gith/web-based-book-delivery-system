<?php 
include 'db.php'; session_start(); 
 
// Initialize cart if not already set 
if (!isset($_SESSION['cart'])) { 
    $_SESSION['cart'] = []; 
} 
 
// Add book to cart 
if (isset($_POST['book_id'])) { 
    $book_id = $_POST['book_id'];     
    // Add book ID to the session cart array    
    if (!in_array($book_id, $_SESSION['cart'])) { 
        $_SESSION['cart'][] = $book_id; 
    } 
} 
 
// Remove an item from the cart 
if (isset($_GET['remove'])) {     
    $remove_id = $_GET['remove']; 
    if (($key = array_search($remove_id, $_SESSION['cart'])) !== false) {         
        unset($_SESSION['cart'][$key]); 
    } 
    header('Location: cart.php');     exit(); 
} 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Shopping Cart</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <header> 
    <h1>Shopping Cart</h1> 
       <nav> 
            <a href="index.php">Home</a> 
            <a href="checkout.php" class="button">Checkout</a> 
        </nav> 
    </header> 
    <main> 
        <?php if (!empty($_SESSION['cart'])): ?> 
            <table> 
                <thead> 
                    <tr> 
                        <th>Image</th> 
                        <th>Name</th> 
                        <th>Price</th> 
                        <th>Actions</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php 
                    $total = 0;                    
                    foreach ($_SESSION['cart'] as $book_id): 
                        $query = "SELECT * FROM books WHERE id = '$book_id'"; 
                        $result = $conn->query($query);                         
                        if ($book = $result->fetch_assoc()): 
                            $total += $book['price']; 
                    ?> 
                        <tr> 
                            <td><img src="<?php echo $book['image']; ?>" 
                            style="width: 50px; height: auto;"></td> 
                            <td><?php echo $book['name']; ?></td> 
                            <td>$<?php echo number_format($book['price'], 2); ?></td> 
                           <td><a href="cart.php?remove=<?php echo $book['id']; 
?>">Remove</a></td> 
                        </tr> 
                    <?php endif; endforeach; ?> 
                </tbody> 
            </table> 
            <h2>Total: $<?php echo number_format($total, 2); ?></h2> 
            <a href="checkout.php" class="button">Proceed to Checkout</a> 
        <?php else: ?> 
            <p>Your cart is empty!</p> 
            <a href="index.php" class="button">Back to Shop</a> 
        <?php endif; ?> 
    </main> 
</body> 
</html> 
