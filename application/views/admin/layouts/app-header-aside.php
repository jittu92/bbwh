
<!-- .app-header -->
<header class="app-header app-header-dark">
  <div class="top-bar">
    <div class="top-bar-brand">
      <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu">
        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
      </button>
      <!-- <a href="./user"><img src="assets/images/logo.png" alt="Logo" style="height: 32px;width: auto;" class="m-r-10">Console</a> -->
    </div>

    <div class="top-bar-list">
      <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
        <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
          <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </button>
      </div>

      <div class="top-bar-item top-bar-item-right px-0">
        <ul class="header-nav nav">
          <li class="nav-item">
            <!-- <button class="btn btn-light btn-sm">button</button> -->
            <!-- <button class="btn btn-light btn-block text-primary" data-toggle="skin">
              <i class="fas fa-moon ml-1"></i>
            </button> -->
            <button class="btn nav-link toggle-skin">
              <!-- comes from app-footer-links.php -->
            </button>
          </li>
        </ul>

        <div class="dropdown d-none d-sm-flex">
          <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="user-avatar user-avatar-md">
              <img src="assets/images/10548877_986385781403136_7217125309863284364_o.jpg" alt="user avatar">
            </span>
            <span class="account-summary pr-md-4 d-none d-md-block">
              <span class="account-name"> <?= $admin_name?> </span>
            </span>
          </button>
          <!-- .dropdown-menu -->
          <div class="dropdown-menu">
            <h6 class="dropdown-header d-none d-sm-block d-md-none"></h6>
            <!-- <a class="dropdown-item profile" href="faq">FAQs</a> -->
            <!-- <div class="dropdown-divider"></div> -->


            <a class="dropdown-item profile" href="admin/settings/profile">Profile settings</a>

              <a href="admin/logout" class="dropdown-item">Logout</a>
          </div>
          <!-- /.dropdown-menu -->
        </div>
      </div>
    </div>
  </div>
</header>

<aside class="app-aside app-aside-expand-md app-aside-light">
  <div class="aside-content">
    <header class="aside-header d-block d-md-none">
      <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
        <span class="user-avatar user-avatar-lg">
          <img src="assets/images/10548877_986385781403136_7217125309863284364_o.jpg" alt="" />
        </span>
        <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span>
        <span class="account-summary">
          <span class="account-name"><?=$admin_name?></span>
        </span>
      </button>
      <div id="dropdown-aside" class="dropdown-aside collapse">
        <div class="pb-3">
          <a class="dropdown-item logout"><span class="dropdown-icon oi oi-account-logout"></span>Logout</a>
        </div>
      </div>
    </header>

    <div class="aside-menu overflow-hidden">
      <nav id="stacked-menu" class="stacked-menu">
        <ul class="menu">
          <li class="menu-item" data-link_name="dashboard">
            <a href="admin/dashboard" class="menu-link">
              <span class="menu-icon fal fa-tachometer-fast"></span>
              <span class="menu-text">Dashboard</span>
            </a>
          </li>
          <li class="menu-item" data-link_name="products">
            <a href="admin/products" class="menu-link">
              <span class="menu-icon fas fa-home"></span>
              <span class="menu-text">Products</span></a>
            </a>
          </li>


          <!-- <li class="menu-header">Records</li> -->
          <!-- <li class="menu-item" data-link_name="survey-report">
          <a href="<?=base_url()?>sub/survey-report" class="menu-link">
              <span class="menu-icon fal fa-cabinet-filing"></span>
              <span class="menu-text">Survey Report</span>
            </a>
          </li> -->


        </ul>
      </nav>
    </div>

    
  </div>
</aside>
<!-- /.app-aside -->
