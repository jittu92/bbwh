
</div>
<!-- /.app -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
<script src="assets/vendor/stacked-menu/stacked-menu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.1/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap.min.js"></script> -->
<script src="assets/js/jkey.js"></script>
<script src="assets/js/theme.min.js"></script>

<script type="text/javascript">
  $(function() {
    var page_name = $('.app-main').data('page_name');
    var aside_menu_name = $('.app-main').data('aside_menu_name');
    $(`.aside-menu li[data-link_name="${aside_menu_name}"]`).addClass('has-active');

    // for settings page
    var active_nav_link = $('.app-main').data('active_nav_link');
    $(`a[data-navlink="${active_nav_link}"]`).addClass('active');


    $('.logout').click(function(){
      $('#logout').submit();
    });
  });
</script>

<!-- darkmode -->
<script type="text/javascript">
$(function() {
  let skin = localStorage.getItem('skin');

  const default_skin = 'assets/css/theme.min.css';
  const dark_skin = 'assets/css/theme-dark.min.css';

  if (skin === 'default') {
    $('.toggle-skin').html('<i class="fas fa-moon" title="Switch to dark mode"></i>');
  } else {
    $('.toggle-skin').html('<i class="fas fa-moon" title="Switch to light mode"></i>');
  }

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
