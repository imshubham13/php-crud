<?php
include("conn.php");
$eid = $_GET['eid'];

$query = "select * from `emp` where eid = $eid";
$data = mysqli_query($conn, $query);

$row = mysqli_fetch_array($data);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $dept = $_POST['dept'];
    $hobby = implode(",", $_POST['hobby']);

    $query = "update `emp` set name='$name', email='$email', password='$password',
             address='$address',mobile='$mobile',dob='$dob', gender='$gender',dept='$dept',
             hobby='$hobby' where eid=$eid ";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo
        "<script>
            alert('Data Updated Successfully');
            window.location.href='view.php';
        </script>";
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>

<body>
    <h2>Update Record</h2>
    <form method="post" action="">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" />
        <br>
        <br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" />
        <br>
        <br>
        <input type="password" name="password" value="<?php echo $row['password']; ?>" />
        <br>
        <br>
        <textarea name="address" value="<?php echo $row['address']; ?>"></textarea>
        <br>
        <br>
        <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" />
        <br>
        <br>
        <input type="date" name="dob" value="<?php echo $row['dob']; ?>" />
        <br>
        <br>
        <input type="radio" name="gender" value="male"  checked="echo <?php if($row['gender'] == 'male'?TRUE :FALSE) echo 'checked'; ?>"/> Male
        <input type="radio" name="gender" value="female"  checked="echo <?php if($row['gender'] == 'female'?TRUE :FALSE) echo 'checked'; ?>" /> Female
        <br>
        <br>
        Select Department :
        <select name="dept">
            <option value="account" <?php if ($row['dept'] == 'account') echo 'selected'; ?>>Account</option>
            <option value="production" <?php if ($row['dept'] == 'production') echo 'selected'; ?>>Production</option>
            <option value="selling" <?php if ($row['dept'] == 'selling') echo 'selected'; ?>>Selling</option>
        </select>
        <br><br>
        Hobbies:
        <input type="checkbox" name="hobby[]" value="cricket" <?php if (strpos($row['hobby'], 'cricket') !== false) echo 'checked'; ?> />Cricket
        <input type="checkbox" name="hobby[]" value="singing" <?php if (strpos($row['hobby'], 'singing') !== false) echo 'checked'; ?> />Singing
        <input type="checkbox" name="hobby[]" value="swimming" <?php if (strpos($row['hobby'], 'swimming') !== false) echo 'checked'; ?> />Swimming
        <br>
        <br>
        <input type="submit" name="submit" value="Update">
        <br><br>
    </form>
</body>

</html>