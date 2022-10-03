<div class="wrapper">
  <!--start top header-->
  <header class="top-header">
    <nav class="navbar navbar-expand gap-3">
      <div class="mobile-toggle-icon fs-3">
        <i class="bi bi-list"></i>
      </div>

      <div class="top-navbar-right ms-auto">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown dropdown-user-setting">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="user-setting d-flex align-items-center">
                <img src="" class="user-img" alt="">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="profile.php">
                  <div class="d-flex align-items-center">
                    <img src="" alt="" class="rounded-circle" width="60" height="54">

                    <div class="ms-3">
                      <h6 class="mb-0 dropdown-user-name"><?= $admin_name;?></h6>
                      <small class="mb-0 dropdown-user-designation text-secondary">System Administrator</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item" href="./">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <i class="bi bi-speedometer"></i>
                    </div>
                    <div class="ms-3">
                      <span>Dashboard</span>
                    </div>
                  </div>
                </a>
              </li>

              <li>
                <a class="dropdown-item" href="profile.php">
                  <div class="d-flex align-items-center">
                    <div class=""><i class="bi bi-person-fill"></i></div>
                    <div class="ms-3"><span>Profile</span></div>
                  </div>
                </a>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="logout.php">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <i class="bi bi-lock-fill"></i>
                    </div>
                    <div class="ms-3">
                      <span id="logout">Logout</span>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!--end top header-->

  <!--start sidebar -->
  <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div class="rounded">
        <a href="./">
          <img src="./assets/images/logo.jpg" class="rounded-circle logo-icon" alt="logo icon">
        </a>
      </div>

      <div>
        <a href="./">
          <h4 class="logo-text">TAA PORTAL</h4>
        </a>
        <!-- <h8 class="logo-text">version : 1.4</h8> -->
      </div>


      <div class="toggle-icon ms-auto">
        <i class="bi bi-list"></i>
      </div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="./">
          <div class="parent-icon"><i class="bi bi-house-fill"></i>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>

      <li class="menu-label text-black">System</li>
      <hr>

      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon"><i class="bi bi-pie-chart-fill"></i>
          </div>
          <div class="menu-title">Administration</div>
        </a>
        <ul>
          <li> <a href="#"><i class="bi bi-circle"></i>Profile</a>
          </li>
          <li> <a href="#"><i class="bi bi-circle"></i>General Settings</a>
          </li>
        </ul>
      </li>


      <li>
        <a href="profile.php">
          <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
          </div>
          <div class="menu-title">Admin Profile</div>
        </a>
      </li>

      <li>
        <a href="#" target="_blank" onclick="clickLabel()">
          <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
          </div>
          <div class="menu-title">Support</div>
        </a>
      </li>
    </ul>
    <!--end navigation-->
  </aside>
  <!--end sidebar -->


  <!--start overlay-->
  <div class="overlay nav-toggle-icon"></div>
  <!--end overlay-->

  <!--Start Back To Top Button-->
  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
  <!--End Back To Top Button-->

</div>
<!--end wrapper-->


<!-- Support Popup Modal -->
<div class="popup centere">
  <div class="title">
    Support
    <button popup-close-button class="close-button" onclick="closeModal()">&times;</button>
  </div>
  <div class="dismiss-btn">
    <a href="tel:255621433903">
      <button type="submit" id="dismiss-popup-btn" onclick="removePopup()">
        <i class="h4 bi bi-telephone-outbound"></i>
      </button>
    </a>
    
    <a href="https://wa.me/255621433903">
      <button type="submit" id="dismiss-popup-btn" onclick="removePopup()">
        <i class="h4 bi bi-whatsapp"></i>
      </button>
    </a>
  </div>
</div>
<!-- End of Popup Modal -->