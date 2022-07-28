
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=project_name()?> <?=$page_title;?></title>

  <base href="<?=base_url();?>" />

  <!-- favicon start -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
  <!-- <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png"> -->
  <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png"> -->
  <!-- <link rel="manifest" href="assets/images/site.webmanifest"> -->
  <!-- favicon end -->

  <!-- <link rel="shortcut icon" href="assets/images/favicon-32x32.png" /> -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet" />
  <link rel="stylesheet" href="assets/fonts/font-awesome-pro/5.9.0/all.css" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/theme.min.css" data-skin="default">
  <link rel="stylesheet" href="assets/css/theme-dark.min.css" data-skin="dark" />
  <script>
    let skin = localStorage.getItem('skin') || 'default';
    let disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    // Disable unused skin immediately
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    // add loading class to html immediately
    // document.querySelector('html').classList.add('loading');
  </script>
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body ng-app="">
  <!-- .app -->
  <div class="app" id="vueApp">
