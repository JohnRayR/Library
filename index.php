<?php
require "db_connect.php";

$records_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $records_per_page;

$sql = "SELECT COUNT(id) FROM list";
$result = $conn->query($sql);
$row = $result->fetch_row();
$total_records = $row[0];
$total_pages = ceil($total_records / $records_per_page);

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = "SELECT * FROM list
    WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR
    book LIKE '%$search%'
    LIMIT $start, $records_per_page";
} else {
    $sql = "SELECT * FROM list
    LIMIT $start, $records_per_page";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>

<body>

    <h1>Gym Member List</h1>
    <a href='create.php'>Create</a>
    <form action="index.php" method="get">
        <input type='text' name="search" placeholder='search' require>
        <button type="submit">Search</button>
    </form>
    <table border='1' cellspacing=0 cellpadding=5>
        <thead>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Book Borrowed</td>
            <td>Due Date</td>
            <td>Contact</td>
            <td>Profile</td>
            <td>Action</td>
        </thead>
        <?php
        if ($result->num_rows >= 0) {
            $count = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $count . "</td>
                <td>" . $row['firstName'] . "</td>
                <td>" . $row['lastName'] . "</td>
                <td>" . $row['book'] . "</td>
                <td>" . $row['date'] . "</td>
                <td>" . $row['contact'] . "</td>
                <td>" . $row['profilePicture'] . "</td>
                <td><a href='update.php?id=" . $row['id'] . "'>Update</a> | <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
            </tr>";
                // echo "<li>" . $row['firstName'] ." ". $row['lastName']." ". $row['address'] . "</li>";
                $count++;
            }
            echo "</table>";
        }
        ?>
    </table>
    <div>
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='index.php?page=$i'>$i</a> ";
        }
        ?>
    </div>
</body>

</html>