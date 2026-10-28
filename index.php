<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Add Book</h2>
    <form method="POST" action="add.php">
        Title:
        <input type="text" name="title" required>

        Author:
        <input type="text" name="author" required>

        Year:
        <input type="number" name="year">

        <button type="submit" name="add">Add Book</button>
    </form>

    <hr>

    <h2>Search Book</h2>
    <form method="POST" action="search.php">
        Keyword:
        <input type="text" name="keyword" required>

        <button type="submit" name="search">Search</button>
    </form>

</div>

</body>         
</html>