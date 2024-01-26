<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="hadmin.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </nav>
    <main>
        <section class="widget">
            <h2>Dashboard</h2>
            <p>Welcome to the admin dashboard.</p>
        </section>
        <section class="widget">
            <h2>Users</h2>
            <table>
                <thead>

                    <tr>
                    </tr>
                </thead>
                <tbody>
              
// Include your database connection script
<?php
include 'connection.php';
?>
<table>
    <tr>
        <th>Name</th>
        <th>email</th>
        <th>Password</th>
    </tr>

    <?php
    $sql = "SELECT * FROM users"; // Correct table name is 'userdata'
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            echo $row["name"];
            echo '</td>';
            echo '<td>';
            echo $row["email"];
            echo '</td>';
            echo '<td>';
            echo $row["password"];
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo 'No data found in the database.';
    }
    ?>
</table>