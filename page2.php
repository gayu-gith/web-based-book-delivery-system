<?php 
include 'db.php'; 
 
$query = "SELECT * FROM books WHERE page = 'page2'"; // Fetch books for page2 only $result = $conn->query($query); 
 
// Start grid container echo "<div style='display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; padding: 20px;'>"; 
 
while ($book = $result->fetch_assoc()) {     
    echo " 
    <div style='border: 1px solid #ddd; padding: 15px; text-align: center; border-radius: 5px; box-shadow: 0 0 5px rgba(0,0,0,0.1);'> 
        <img src='{$book['image']}' alt='{$book['name']}' style='width: 150px; height: auto; margin-bottom: 10px;'> 
        <h3 style='font-size: 18px; color: #333;'>{$book['name']}</h3> 
<p style='font-size: 16px; color: #555;'>\${$book['price']}</p> 
       <p style='font-size: 14px; color: #777;'>{$book['description']}</p> 
        <form method='post' action='cart.php'> 
            <input type='hidden' name='book_id' value='{$book['id']}'> 
            <button type='submit' style='padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 3px; cursor: pointer;'>Add to Cart</button>         </form> 
    </div>"; 
} 
 
// End grid container echo "</div>"; 
 
// Add navigation to page1 
echo "<div style='margin-top: 20px; text-align: center;'> 
        <a href='page1.php' style='font-size: 18px; color: blue; text-decoration: none;'>Go to Page 1</a> 
      </div>"; 
?> 
