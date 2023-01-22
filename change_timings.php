<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "delete from add_timings where id='$id'";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "select * from add_timings order by timings desc";
$res = mysqli_query($con, $sql);

$date = isset($_GET['date']) ? $_GET['date'] : date('d-m-Y');
$next_date = date('D,d M', strtotime($date .' +1 day'));
$dayafternext_date = date('D,d M', strtotime($date .' +2 day'));
$dayafter2next_date = date('D,d M', strtotime($date .' +3 day'));
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Timings </h4>
                        <h4 class="box-link"><a href="manage_timings.php">Add Timings's</a> </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <!-- <th>ID</th> -->
                                        <th>Timings-(<?php echo $next_date  ?>)</th>
                                        <!-- <th>NGO City</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        // $check = "current";
                                        // if ($row['difference'] == $check) {
                                    ?>
                                            <tr>
                                                <td class="serial"><?php echo $i ?></td>
                                                <!-- <td><?php echo $row['id']
                                                            ?></td> -->
                                                <td><?php echo $row['timings'] ?></td>
                                                <!-- <td><?php echo $row['ngo_city'] ?></td> -->
                                                <?php $i = $i + 1 ?>
                                                <td>
                                                    <?php
                                                    echo "<span class='badge badge-edit'><a href='manage_timings.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
                                                    echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php }
                                     ?>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <!-- <th>ID</th> -->
                                        <th>Timings-(<?php echo $dayafternext_date  ?>)</th>
                                        <!-- <th>NGO City</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = "select * from add_timings order by timings desc";
                                    $res = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $check = "tomorrow";
                                        if ($row['difference'] == $check) {
                                    ?>
                                            <tr>
                                                <td class="serial"><?php echo $i ?></td>
                                                <!-- <td><?php echo $row['id']
                                                            ?></td> -->
                                                <td><?php echo $row['timings'] ?></td>
                                                <!-- <td><?php echo $row['ngo_city'] ?></td> -->
                                                <?php $i = $i + 1 ?>
                                                <td>
                                                    <?php
                                                    echo "<span class='badge badge-edit'><a href='manage_timings.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
                                                    echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <!-- <th>ID</th> -->
                                        <th>Timings-(<?php echo $dayafter2next_date  ?>)</th>
                                        <!-- <th>NGO City</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = "select * from add_timings order by timings desc";
                                    $res = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $check = "dayaftertomorrow";
                                        if ($row['difference'] == $check) {
                                    ?>
                                            <tr>
                                                <td class="serial"><?php echo $i ?></td>
                                                <!-- <td><?php echo $row['id']
                                                            ?></td> -->
                                                <td><?php echo $row['timings'] ?></td>
                                                <!-- <td><?php echo $row['ngo_city'] ?></td> -->
                                                <?php $i = $i + 1 ?>
                                                <td>
                                                    <?php
                                                    echo "<span class='badge badge-edit'><a href='manage_timings.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
                                                    echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
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