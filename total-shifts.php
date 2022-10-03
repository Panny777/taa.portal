<?php
// Including the header
$page = "";
include "includes/header.php";
?>

<?php
// Navigation
include "includes/navigation.php";
?>

<!--Checking Login -->
<?php
// if (!isset($_COOKIE["admin_email"])) {
//     header("Location: login.php");
// }
?>

<!-- Start of wrapper -->
<div class="wrapper">
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col col-lg-12 mx-auto">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="align-items-center">
                            <h5 class="mb-2"></h5>
                            <!-- Start of shifts cards  -->
                            <?php include "includes/shifts-cards.php"; ?>
                            <!-- End of shifts cards  -->

                            <!-- Start of Data Table -->
                            <div class="table-responsive mt-3">
                                <table class="table align-middle table-striped">
                                    <h4>Total Shifts</h4>
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>Shift Id</th>
                                            <th>Start date</th>
                                            <th>Cashier</th>
                                            <th></th>
                                            <th>Shift Status</th>
                                            <th>Shift Amount (Tsh)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM shifts ORDER BY `shifts`.`id` DESC LIMIT 50";
                                        $result = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $shift_id = $row['shiftid'];
                                            $cashier_name = $row['cashiername'];
                                            $shift_amount = $row['shiftamount'];
                                            $shift_amount = number_format($shift_amount);

                                            $shift_start_date = $row['shiftstartdate'];
                                            $shift_start_date = str_replace('.000000', '', $shift_start_date);

                                            $shift_status = $row['shiftstatus'];
                                            if ($shift_status == 1) {
                                                $shift_status = "Open";
                                            } else {
                                                $shift_status = "Closed";
                                            }


                                            echo "<tr>";
                                            echo "<td>$shift_id</td>";
                                            echo "<td>$shift_start_date</td>";
                                            echo "<td>$cashier_name</td>";
                                            echo "<td></td>";
                                            echo "<td>$shift_status</td>";
                                            echo "<td>$shift_amount</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End of Data Table -->

                            <div class="mb-2 d-flex align-items-center">
                                <h6 class="mb-0">Total Shifts:&nbsp;</h6>
                                <h7></h7>
                            </div>
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Total Signed:&nbsp;</h6>
                                <h7></h7>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Including the footer -->
<?php include "includes/footer.php"; ?>