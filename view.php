<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>

<body>
    <h1>Display Data</h1>
   <a href="./index.php">Add Data</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Hobbies</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        $query = "select * from emp";
        $data = mysqli_query($conn, $query);

        if ($data) {
            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                echo "<td>" . $row['eid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['dept'] . "</td>";
                echo "<td>" . $row['hobby'] . "</td>";

                echo
                "<td> 
                        <a href='edit.php?eid={$row['eid']}'>Edit</a> | 
                         <a href='delete.php?eid={$row['eid']}'>Delete</a>
                </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>