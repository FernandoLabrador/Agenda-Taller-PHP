<?php 
session_start();
?>

<?php if (isset($_SESSION['mensaje']['bien'])): ?>
    <div role="alert" class="bien" >
        <?= $_SESSION['mensaje']['bien'] ?>        
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje']['mal'])): ?>
    <div role="alert" class="malena" >
        <?= $_SESSION['mensaje']['mal'] ?>        
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['tabla']['datos'])): ?>
    <div>
        <?= $_SESSION['tabla']['datos'] ?>        
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje']['borrada'])): ?>
    <div role="alert" class="malena" >
        <?= $_SESSION['mensaje']['borrada'] ?>        
    </div>
<?php endif; ?>

<?php 
unset($_SESSION['mensaje']['bien']);
unset($_SESSION['mensaje']['mal']);
unset($_SESSION['tabla']['datos']);
unset($_SESSION['mensaje']['borrada']);
?>
