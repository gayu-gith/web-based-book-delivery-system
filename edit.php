<?php 
include 'db.php'; if (isset($_GET['id'])) { 
    $id = $_GET['id']; 
    $query = "SELECT * FROM books WHERE id = '$id'"; 
    $result = $conn->query($query); 
    $book = $result->fetch_assoc(); 
} 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $name = $_POST['name']; 
    $price = $_POST['price']; 
    $description = $_POST['description']; 
 
    if (!empty($_FILES['image']['name'])) {         
        $image = $_FILES['image']['name'];         
        $target = "uploads/" . basename($image); 
        move_uploaded_file($_FILES['image']['tmp_name'], 
        $target); 
        $query = "UPDATE books SET name='$name', price='$price', description='$description', image='$target' WHERE id='$id'"; 
    } 
    else { 
        $query = "UPDATE books SET name='$name', price='$price', description='$description' WHERE id='$id'"; 
    } 
 
    if ($conn->query($query)) {         
        echo "Book updated successfully!"; 
    } 
    else { 
        echo "Error: " . $conn->error; 
    } 
    header('Location: admin.php');     exit(); 
} 
?> 
<form method="post" enctype="multipart/form-data"> 
    <input type="text" name="name" value="<?php echo $book['name']; ?>" required> 
    <input type="number" step="0.01" name="price" value="<?php echo $book['price']; ?>" required> 
    <textarea name="description" required><?php echo $book['description']; ?></textarea> 
    <input type="file" name="image"> 
    <button type="submit">Update Book</button> 
</form> 
