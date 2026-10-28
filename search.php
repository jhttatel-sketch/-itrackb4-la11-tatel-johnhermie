<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Search Results</h2>

<?php
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];

    $sql = "SELECT * FROM books 
            WHERE title LIKE '%$keyword%' 
            OR author LIKE '%$keyword%'
            OR year LIKE '%$keyword%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // TABLE START
        echo "<table border='1' width='100%' cellpadding='10'>";
        echo "<tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "</tr>";
        }

        echo "</table>"; // TABLE END

    } else {
        echo "<p>No books found.</p>";
    }
}
?>

<br>
<a href="index.php">← Back to Home</a>

</div>

</body>
</html>