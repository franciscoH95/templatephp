<?php
    include('plantilla/nav.php');
    $rol = $user->getUser()->rol;
?>

<?php if ($rol == 'vendedor'):?>
    <h1>Vendedor</h1>

<?php endif ?>
<?php if ($rol == 'jefe_operaciones'):?>
<h1>Jefe Operaciones</h1>
<?php endif ?>
<?php if ($rol == 'chofer'):?>
<h1>Chofer</h1>
<?php endif ?>


<?php
include('plantilla/footer.php');
?>