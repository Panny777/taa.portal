<!-- Including database connection file -->
<?php include "includes/db.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $admin_firstname = test_input($_POST['admin_firstname'], $connection);
    $admin_lastname = test_input($_POST['admin_lastname'], $connection);
    $admin_company = test_input($_POST['admin_company'], $connection);
    $admin_email = test_input($_POST['admin_email'], $connection);
    $admin_password = test_input($_POST['admin_password'], $connection);


    $admin_firstname = mysqli_real_escape_string($connection, $admin_firstname);
    $admin_lastname = mysqli_real_escape_string($connection, $admin_lastname);
    $admin_company = mysqli_real_escape_string($connection, $admin_company);
    $admin_email = mysqli_real_escape_string($connection, $admin_email);
    $admin_password = mysqli_real_escape_string($connection, $admin_password);

    $admin_full_name = $admin_firstname . " " . $admin_lastname;
    $admin_role_id = 1;
    $admin_user_group = "ADGM";

    // Encrypting the admin password
    // $hash = "$2a$10$";
    // $string = "iamacomputersciencestudent";
    // $hashString = $hash . $string;
    // $admin_password = crypt($admin_password, $hashString);
    // $admin_password = md5($admin_company . $admin_password);

    // Checking if the admin exists
    $query = "SELECT * FROM core_users WHERE email = '{$admin_email}' ";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);

    if ($row) {
        echo "Account exists log in instead";
    } else {

        $query = "INSERT INTO core_users(name, roleid, company, email, password, user_group)";
        $query .= "VALUES('{$admin_full_name}','{$admin_role_id}','{$admin_company}', '{$admin_email}', '{$admin_password}', '{$admin_user_group}')";

        $create_new_admin_query = mysqli_query($connection, $query);

        if (!$create_new_admin_query) {
            die("admin Not created" . mysqli_error($connection));
        } else {
            echo '<script type="text/javascript">alert("Registration Successful!");</script>';
            header("Location: login.php");
        }
    }
}

function test_input($data, $connection)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    //Preventing mysql injection
    $data = mysqli_real_escape_string($connection, $data);
    return $data;
}
?>


<?php 
$page = "| Register";
include "includes/header.php"; 
?>
<!--start wrapper-->
<div class="wrapper">
    <!--start content-->
    <main class="authentication-content">
        <div class="container-fluid">
            <div class="authentication-card">
                <div class="card shadow rounded-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                            <img src="assets/images/error/login-img.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title">Sign Up</h5>
                                <p class="card-text mb-5"> </p>
                                <form action="" method="post" class="form-body" id="sign_in" accept-charset="utf-8">
                                    <input type="hidden" name="sign_in" value="a725b4cfb3957b7a5fd88fd43d458443" />

                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="inputName" class="form-label">First Name</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <input class="form-control radius-30 ps-5" name="admin_firstname" type="text" id="exampleInputName" class="input" placeholder="First name" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="inputName" class="form-label">Last Name</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <input class="form-control radius-30 ps-5" name="admin_lastname" type="text" id="exampleInputName" class="input" placeholder="Last Name" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputName" class="form-label">Company</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <input class="form-control radius-30 ps-5" name="admin_company" type="text" id="exampleInputName" class="input" placeholder="Enter Company" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </div>
                                                <input class="form-control radius-30 ps-5" name="admin_email" type="admin_email" class="input" placeholder="Enter Email Address" required>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12 ">
                                                <label for="inputName" class="form-label">Mobile Number</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text radius-30 ps-5" id="basic-addon1">+255</span>
                                                        <input class="form-control radius-30 ps-5" id="mobilenumber" name="admin_phone_number1" type="number" class="input" placeholder="Enter Phone Number" required>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-lock-fill"></i>
                                                </div>
                                                <input class="form-control radius-30 ps-5" name="admin_password" type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I Agree to the Trems & Conditions</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="register" class="btn btn-primary radius-30">Sign Up</button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <p class="mb-0">Already have an account? <a href="login.php">Sign in here</a></p>
                                        </div>
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
</div>
<!--end wrapper-->

<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/pace.min.js"></script>
</body>

</html>