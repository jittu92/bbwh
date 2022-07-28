
<!-- app-header -->
<header class="app-header app-header-dark">
  <div class="top-bar">
    <div class="top-bar-brand bg-transparent d-flex">
      <a href="./"><img src="assets/images/login-logo.png" alt="Logo" style="height: 32px;width: auto;" class="m-r-10">Admin</a>
    </div>

    <div class="top-bar-list">
      <div class="top-bar-item top-bar-item-right px-0 --d-none d-sm-flex">
        <div class="dropdown --d-none d-sm-flex">
          <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="user-avatar user-avatar-md">
              <img src="assets/images/admin-avatars/<?=$_SESSION['admin_avatar'];?>" alt="<?=$_SESSION['admin_fullname'];?>">
            </span>
            <span class="account-summary pr-md-4 d-none d-md-block">
              <span class="account-name"><?=$_SESSION['admin_fullname'];?></span>
            </span>
          </button>
          <div class="dropdown-arrow dropdown-arrow-left"></div>
          <div class="dropdown-menu">
            <h6 class="dropdown-header d-none d-sm-block d-md-none"><?=$_SESSION['admin_fullname'];?></h6>
            <a class="dropdown-item profile" href="profile">
              <span class="dropdown-icon oi oi-account-logout"></span>Profile
            </a>
            <a class="dropdown-item logout">
              <span class="dropdown-icon oi oi-account-logout"></span>Logout
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- app-header -->
