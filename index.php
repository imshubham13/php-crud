<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" name="name" placeholder="Enter Name" />
        <br>
        <br>
        <input type="email" name="email" placeholder="Enter Email" />
        <br>
        <br>
        <input type="password" name="password" placeholder="Enter password" />
        <br>
        <br>
        <textarea name="address" placeholder="Enter Address"></textarea>
        <br>
        <br>
        <input type="text" name="mobile" placeholder="Enter Phone" />
        <br>
        <br>
        <input type="date" name="dob" placeholder="Enter DOB" />
        <br>
        <br>
        <input type="radio" name="gender" value="male" /> Male
        <input type="radio" name="gender" value="female" /> Female
        <br>
        <br>
        Select Department :
        <select name="dept">
            <option value="account">Account</option>
            <option value="production">Production</option>
            <option value="selling">Selling</option>
        </select>
        <br><br>
        Hobbies:
        <input type="checkbox" name="hobby[]" value="cricket" />Cricket
        <input type="checkbox" name="hobby[]" value="singing" />Singing
        <input type="checkbox" name="hobby[]" value="swimming" />Swimming
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>
</body>

</html>

<?php
include("conn.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $dept = $_POST['dept'];
    $hobby = $_POST['hobby'];
    $h = implode(",", $hobby);

    // $filename = $_FILES["imgUpload"]['name'];
    // $tmpname = $_FILES["imgUpload"]["tmp_name"];
    // $folder = "img/" . $filename;
    // move_uploaded_file($tmpname, $folder);

    $query = "insert into emp(name,email,password,address,mobile,dob,gender,dept,hobby) 
        values ('$name','$email','$password','$address','$mobile','$dob','$gender','$dept','$h')";

    $data = mysqli_query($conn, $query);

    if ($data) {
?>
        <script>
            alert("Record Inserted")
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error: Record Not Inserted ======> ")
        </script>
<?php
    }
}
?>