<?php
include("connection.php");
session_start();
$query = "SELECT * FROM users where user_id='".$_SESSION['id']."'";
$result = mysqli_query($db, $query) or die(mysqli_error());
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/style.css">
</head>
<body>
    <h1>User Profile</h1>
    <div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="post" action="#" >
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['full_name']; ?>" required />
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" class="form-control" name="gender" style="width:20em;" placeholder="Enter your Gender" required value="<?php echo $row['gender']; ?>" />
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Enter your Age" value="<?php echo $row['age']; ?>">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row['address']; ?>"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
                <center>
                    <a href="logout.php">Log out</a>
                </center>
            </div>
        </form>
    </div>
</body>
</html>