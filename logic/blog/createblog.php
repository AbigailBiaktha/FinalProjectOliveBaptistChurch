<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$database = "church";

$conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $image = $_FILES['image']['name'];
        $target_dir = "../blog_img/";
    
        // Check if the directory exists, if not, create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        $target_file = $target_dir . basename($image);
    
        // Basic validation
        if (empty($title) || empty($content) || empty($author)) {
            echo "All fields are required.";
            exit;
        }
    
        // Escape input data to prevent SQL injection
        $title = $conn->real_escape_string($title);
        $content = $conn->real_escape_string($content);
        $author = $conn->real_escape_string($author);
    
        // Handle file upload
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO blogs (title, content, author, image) VALUES ('$title', '$content', '$author', '$image')";
    
            if ($conn->query($sql) === TRUE) {
                echo "<script>showMessage('New pastor profile created successfully');</script>";
                header("Location: ./adminblogview.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    
        $conn->close();
    }
}
    ?>

    