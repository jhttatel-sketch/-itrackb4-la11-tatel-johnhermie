<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add Book Result</h2>

<?php
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $sql = "INSERT INTO books (title, author, year) 
            VALUES ('$title', '$author', '$year')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success'>Book added successfully!</div>";
    } else {
        echo "<div class='error'>Error: " . $conn->error . "</div>";
    }
}
?>

<br>
<a href="index.php">
    <button>← Back to Home</button>
</a>

</div>

</body>
</html>