<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add Transaction</h1>
    <a href="index.php">View List</a>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
        First Name: <input type="text" name="firstName"><br>
        Last Name: <input type="text" name="lastName"><br>
        Book : <input type="text" name="book"><br>
        Date To Return: <input type="text" name="date"><br>
        Contact: <input type="text" name="contact"><br>
        Profile Picture: <input type="file" name="profilePicture"><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>