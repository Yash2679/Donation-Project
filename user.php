<?php
require('top.inc.php');

$result = mysqli_query($con, "SELECT * FROM usertable");

?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Users </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <!-- <th>ID</th> -->
                                        <th>Name</th>
                                        <th>Email-Id</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Mobile Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=1;
                                    while ($row = mysqli_fetch_array($result) ) {
                                        if($row['code'] ==0){
                                        echo "<tr>";
                                        echo "<td>" . $i;
                                        // echo "<td>" . $row['id'];
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['streetname'] . "</td>";
                                        echo "<td>" . $row['city'] . "</td>";
                                        echo "<td>" . $row['Mobile_Number'] . "</td>";
                                        // echo '<td><a href="delete-member.php?id=' . $row[''] . '">Remove Member</a></td>';
                                        echo "</tr>";
                                        $i=$i+1;
                                    }
                                }
                                    mysqli_free_result($result);
                                    mysqli_close($con);
                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>