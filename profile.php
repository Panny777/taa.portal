<?php
// Including the header
$page = "";
include "includes/header.php";
?>

<?php
//Checking if the login cookie is set
if (!isset($_COOKIE["admin_email"])) {
    header("Location: login.php");
} else {
    $admin_email = $_COOKIE["admin_email"];
    $query = "SELECT * FROM core_users WHERE email = '{$admin_email}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
        $admin_name = $row['name'];
        $admin_email = $row['email'];
        $admin_password = $row['password'];
        $admin_company = $row['company'];
    }
}
?>

<!-- Query For updating information of an existing admin -->
<?php
if (isset($_POST['update_admin'])) {
    $admin_email = $_COOKIE['admin_email'];
    $new_password = $_POST['admin_password'];

    if ($new_password != $admin_password) {

        $query = "UPDATE core_users SET ";
        $query .= "password = '{$new_password}' ";
        $query .= "WHERE email = '{$admin_email}' ";

        $update_user_query = mysqli_query($connection, $query);

        header("Location: profile.php");

        if (!$update_auser_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        header("Location: profile.php");
    }
}
?>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php include "includes/navigation.php" ?>
    <!--start content-->
    <main class="page-content">
        <div class="profile-cover bg-dark"></div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="mb-0">My Account</h5>
                        <hr>
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">ADMIN INFORMATION</h6>
                            </div>
                            <div class="card-body">

                                <form class="row g-3" method="post" enctype="multipart/form-data">
                                <div class="col-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $admin_name; ?>" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" value="<?php echo $admin_email; ?>" disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" id="myInput" name="admin_password" class="form-control" value="<?php echo $admin_password; ?>">
                                            <span class="input-group-text" id="basic-addon1"><i id="hide-pass-icon" class="lni lni-eye" style="color: black;" onclick="showPassword()"></i></span>
                                        </div>
                                    </div>
                                    <div class="text-start text-center">
                                        <button id="save-changes-btn" type="submit" class="btn btn-primary px-4" name="update_admin" onclick="changeText()">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--end page main-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
</div>
<!--end wrapper-->

<!-- Show or hide password input -->
<script type="text/javascript">
    function showPassword() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("hide-pass-icon");

        if (x.type === "password" && y.className == "lni lni-eye") {
            x.type = "text";
            y.className = "bx bx-hide";
        } else {
            x.type = "password";
            y.className = "lni lni-eye";
        }
    }
</script>


<!-- Js for changing button text -->
<script type="text/javascript">
    function changeText() {
        var x = document.getElementById("save-changes-btn");
        if (x.innerText == "Save Changes") {
            x.innerText = "Saving..";
        } else {
            x.innerText = "Save Changes";
        }
    }
</script>

<!-- Including the footer -->
<?php include "includes/footer.php"; ?>