<?php
// Including the header
$page = "| Login";
include "includes/header.php";
?>

<!-- Checking if the POST login is set -->
<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email = test_input($email, $connection);
  $password = test_input($password, $connection);

  $email = mysqli_real_escape_string($connection, $email);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM core_users WHERE email = '{$email}' ";
  $select_admin_query = mysqli_query($connection, $query);

  if (!$select_admin_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_admin_query)) {
    $db_email = $row['email'];
    $db_password = $row['password'];

    if ($email == $db_email && $db_password == $password) {

      // Unsetting all cookies
      setcookie("admin_email", "", time() - (60 * 60 * 24 * 7), "/");

      $expiration = time() + (7200); // Setting Coookie expiration of two hours
      setcookie("admin_email", $email, $expiration);

      // Redirecting to Admin Dashboard
      header("Location: ./");
    } elseif ($email != $db_email) {
      echo '
        <br>
        <div class="alert border-0 border-danger border-start border-5 bg-light-danger alert-dismissible fade show" style="position: relative; min-width: 50%; position: absolute; top: 0; right: 0;">
          <div class="d-flex align-items-center">
            <div class="fs-3 text-info">
              <i class="bi bi-x-circle-fill"></i>
            </div>
            <div class="ms-3">
              <div class="text-danger">Wrong Email or Password</div>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <br>
        <br>
        ';
    } elseif ($db_password != $password) {
      echo '
            <br>
            <div class="alert border-0 border-danger border-start border-5 bg-light-danger alert-dismissible fade show" style="position: relative; min-width: 50%; position: absolute; top: 0; right: 0;">
              <div class="d-flex align-items-center">
                <div class="fs-3 text-info">
                  <i class="bi bi-x-circle-fill"></i>
                </div>
                <div class="ms-3">
                  <div class="text-danger">Wrong Email or Password</div>
                </div>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <br>
            <br>
          ';
    }
  }
}

function test_input($data, $connection)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  // preventing mysql Injection
  $data = mysqli_real_escape_string($connection, $data);
  return $data;
}

?>

<!--start wrapper-->
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="assets/images/error/login.svg" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="" method="post" class="form-body" id="sign_in" accept-charset="utf-8">
          <!-- Email input -->
          <div class="form-outline mb-4 ms-auto position-relative">
            <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" placeholder="Email" autocapitalize="off" require>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example23">Password</label>
            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" placeholder="Password" autocapitalize="off" require>
          </div>

          <!-- Submit button -->
          <div class="text-center mb-4">
            <button id="login-btn" type="submit" class="btn btn-primary btn-lg btn-block" name="login" onclick="changeText()">
              Sign in
            </button>
          </div>

          <div class="col-12">
            <p class="mb-0">New user? <a href="register.php">Sign Up here</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--end wrapper-->


<!-- Js for changing button text -->
<script type="text/javascript">
  function changeText() {
    var x = document.getElementById("login-btn");
    if (x.innerText == "Sign in") {
      x.innerText = "Authenticating...";
    } else {
      x.innerText = "Sign in";
    }
  }
</script>



<script>

</script>

<!-- End of text changer JS -->

<!--plugins-->
<script src="js/jquery.min.js"></script>
<script src="js/pace.min.js"></script>

</body>

</html>