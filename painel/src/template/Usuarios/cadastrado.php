<?php
  if(@$_SESSION['alert_cadastro'] === true):
?>
    <script>

        cadastrado();

    </script>

<?php
    $_SESSION['alert_cadastro'] = false;
  endif;
?>
