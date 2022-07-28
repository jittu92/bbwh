<?php
include 'layouts/app-header-links.php';
include 'layouts/app-header-aside.php';
?>
      <main class="app-main" data-page_name="<?=$page_name?>" data-aside_menu_name="<?=$aside_menu_name?>">
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">


                <div class="d-flex flex-column flex-md-row">
                  <p class="lead">
                    <span class="font-weight-bold">Hi, <?=$admin_name?>.</span>

                  </p>
                  <div class="ml-auto">
                  </div>
                </div>
              </header>
              <div class="page-section">
                <div class="container-fluid">
                  <div class="row">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <?php
      include 'layouts/app-footer-links.php';
      ?>

      <!-- <script src="assets/user/js/model-js/main.js"></script> -->
      <!-- <script src="assets/user/js/pages/dashboard-demo.js"></script> -->
  </body>
</html>
