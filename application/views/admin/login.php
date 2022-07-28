<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title> <?=project_name()?> - Login </title>
  <base href="<?=base_url();?>" />
  <!-- favicon start -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
  <link rel="manifest" href="assets/images/site.webmanifest">
  <!-- favicon end -->
  <link rel="shortcut icon" href="assets/images/favicon-32x32.png" />
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet" />
  <link rel="stylesheet" href="assets/fonts/font-awesome-pro/5.9.0/all.css" />

  <link rel="stylesheet" href="assets/css/theme.min.css" data-skin="default">
  <link rel="stylesheet" href="assets/css/theme-dark.min.css" data-skin="dark" />
  <script>
    var skin = localStorage.getItem('skin') || 'default';
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    // Disable unused skin immediately
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    // add loading class to html immediately
    // document.querySelector('html').classList.add('loading');
  </script>

  <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body>
  <main class="auth">
    <header id="auth-header" class="auth-header">
      <h1>
        <img src="assets/images/logo.png" alt="" height="72">
      </h1>
      <p> Login </p>
    </header>

    <form class="auth-form" autocomplete="off" id="signin-form">
      <!-- Base Url -->
      <!-- THIS DATA FETCHED BY index.js -->
      <div data-base_url="<?=base_url();?>" id="base_url"></div>

      <div class="success_msg"> <!-- ajax msg --> </div>
      <div class="err_msg"> <!-- ajax msg --> </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username"
          autofocus=""
          autocomplete="off" required/>
          <label for="user_name">Username</label>
          <div class="msg msg-red msg-user_name m-t-5">Please enter your Username</div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="password" id="user_pass" name="user_pass" class="form-control" placeholder="Password"
          autocomplete="off" required/>
          <label for="user_pass">Password</label>
          <div class="msg msg-red msg-user_pass m-t-5">Please enter your Password</div>
        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
        <div class="msg msg-red after-submit-msg m-t-5"></div>
      </div>
      <div class="text-center pt-3">
        
        <a href="admin/register" class="link">Register</a>
      </div>
    </form>


  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="assets/admin/js/model-js/index.js"></script>


  <!-- darkmode -->
  <script type="text/javascript">
  $(function() {
    let skin = localStorage.getItem('skin');

    const default_skin = 'assets/css/theme.min.css';
    const dark_skin = 'assets/css/theme-dark.min.css';

    const enableDarkMode = () => {
      // 1. Update darkMode in localStorage
      localStorage.setItem('skin', 'dark');
      location.reload();
    }

    const disableDarkMode = () => {
      // 1. Update darkMode in localStorage
      localStorage.setItem('skin', 'default');
      location.reload();
    }

    $('button.toggle-skin').click(function(e){
      e.preventDefault();

      skin = localStorage.getItem('skin');

      if (skin == 'default') {
        enableDarkMode();
      } else {
        disableDarkMode();
      }
    });
  });
  </script>
  <!-- end darkmode -->
</body>
</html>
