<?php
  if(@$_SESSION['alert_login'] === true):
?>
    <script>

        logado();

    </script>

<?php
    $_SESSION['alert_login'] = false;
  endif;
?>
