<?php
// Total Shift Counting
$total_shifts_query = "SELECT * FROM shifts";
$total_shifts_result = mysqli_query($connection, $total_shifts_query);
if (!$total_shifts_result) {
    die("QUERY FAILED" . mysqli_error($connection));
}
$total_shifts_count = mysqli_num_rows($total_shifts_result);


// Open Shift Counting
$open_shifts_query = "SELECT * FROM shifts WHERE `shifts`.`shiftstatus` = 1";
$open_shifts_result = mysqli_query($connection, $open_shifts_query);

if (!$open_shifts_result) {
    die("QUERY FAILED" . mysqli_error($connection));
}
$open_shifts_count = mysqli_num_rows($open_shifts_result);

// Closed Shift Counting
$closed_shifts_query = "SELECT * FROM shifts WHERE `shifts`.`shiftstatus` = 4";
$closed_shifts_result = mysqli_query($connection, $closed_shifts_query);

if (!$closed_shifts_result) {
    die("QUERY FAILED" . mysqli_error($connection));
}
$closed_shifts_count = mysqli_num_rows($closed_shifts_result);

$bill_pay_shifts_query = "SELECT * FROM shifts WHERE `shifts`.`billpay_TrxId` IS NULL ORDER BY `shifts`.`id` DESC LIMIT 50";
$bill_pay_shifts_result = mysqli_query($connection, $bill_pay_shifts_query);

if (!$bill_pay_shifts_result) {
    die("QUERY FAILED" . mysqli_error($connection));
}
$bill_pay_shifts_count = mysqli_num_rows($bill_pay_shifts_result);

?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
    <div class="col">
        <div class="card radius-10 border-0 border-start border-tiffany border-3">
            <div class="card-body">
                <a href="../total-shifts.php">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Shifts</p>
                            <h4 class="mb-0 text-tiffany"><?= $total_shifts_count; ?></h4>
                        </div>
                        <div class="ms-auto widget-icon bg-tiffany text-white">
                            <i class="bi bi-folder2-open"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End of card  -->

    <!-- Start of Open shifts card -->
    <div class="col">
        <div class="card radius-10 border-0 border-start border-success border-3">
            <div class="card-body">
                <a href="../">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Open Shifts</p>
                            <h4 class="mb-0 text-success"><?= $open_shifts_count; ?></h4>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-door-open-fill"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End of Open shifts card -->

    <!-- Start of closed shifts card -->
    <div class="col">
        <div class="card radius-10 border-0 border-start border-danger border-3">
            <div class="card-body">
                <a href="../closed-shifts.php">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Closed Shifts</p>
                            <h4 class="mb-0 text-danger"><?= $closed_shifts_count; ?></h4>
                        </div>
                        <div class="ms-auto widget-icon bg-danger text-white">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End of Items count card  -->

    <!-- Start of signed shifts card -->
    <div class="col">
        <div class="card radius-10 border-0 border-start border-purple border-3">
            <div class="card-body">
            <a href="../bill-pay.php">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">Bill Pay</p>
                        <h4 class="mb-0 text-purple"><?= $bill_pay_shifts_count; ?></h4>
                    </div>
                    <div class="ms-auto widget-icon bg-purple text-white">
                        <i class="bi bi-pencil-fill"></i>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>
    <!-- end of signed shifts card -->
</div>