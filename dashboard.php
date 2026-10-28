<?php
require_once 'session.php';
requireLogin();
require_once 'db.php';

$search = trim($_GET['search'] ?? '');

if ($search !== '') {
    $stmt = $conn->prepare("
        SELECT * FROM books 
        WHERE title LIKE ? OR author LIKE ?
        ORDER BY id DESC
    ");
    $like = "%$search%";
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM books ORDER BY id DESC");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; background:#f3f4f6; margin:0; }

        nav {
            background:#0f3460;
            color:white;
            padding:15px;
            display:flex;
            justify-content:space-between;
        }

        main { padding:20px; }

        table {
            width:100%;
            background:white;
            border-collapse:collapse;
            margin-top:20px;
        }

        th, td {
            padding:10px;
            border-bottom:1px solid #ddd;
        }

        .search {
            padding:10px;
            width:300px;
        }

        .btn {
            padding:10px;
            background:#0f3460;
            color:white;
            border:none;
        }
    </style>
</head>

<body>

<nav>
    <div>📚 Book Library System</div>
    <div>
        👤 <?= htmlspecialchars(currentUser()) ?> |
        <a href="logout.php" style="color:white;">logout</a>
    </div>
</nav>

<main>

<h2>Dashboard</h2>

<form method="GET">
    <input class="search" type="text" name="search" placeholder="Search books...">
    <button class="btn">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
        </tr>
    </thead>

    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['author']) ?></td>
                    <td><?= htmlspecialchars($row['year']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align:center;">
                    No books found
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</main>

</body>
</html>