<?php require_once "userData.php"; ?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'userform');


$result = mysqli_query($con, "SELECT * FROM usertable");

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Members</title>
    
    <link href="admin_styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="page">
        <div id="header">
            <h1>Members Management </h1>
            <a href="index.php">Home</a> | <a href="admin_user.php">Accounts</a> |  <a href="logout.php">Logout</a>
        </div>
        <div id="container">
            <table border="0" width="950" align="center" >
                <CAPTION>
                    <h3>MEMBERS LIST</h3>
                </CAPTION>
                <tr >
                    <th>Name</th>
                    <th>Email-Id</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Mobile Number</th>
                </tr>

                <?php
                //loop through all table rows
                while ($row = mysqli_fetch_array($result) ) {
                    if($row['code'] ==0){
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['streetname'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['Mobile_Number'] . "</td>";
                    // echo '<td><a href="delete-member.php?id=' . $row[''] . '">Remove Member</a></td>';
                    echo "</tr>";
                }
            }
                mysqli_free_result($result);
                mysqli_close($con);
                ?>
            </table>
            <hr>
        </div>
      
    </div>
</body>

</html>