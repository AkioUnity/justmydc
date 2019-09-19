<div class="row" style="margin-bottom: 2%;">
    <div class="col-3"></div>
    <div class="col-6">
        <?php echo $form->open(); ?>

        <?php echo $form->messages(); ?>

        <?php echo $form->bs3_password('Password', 'password'); ?>
        <?php echo $form->bs3_password('Retype Password', 'retype_password'); ?>
        <?php echo $form->bs3_submit(); ?>

        <?php echo $form->close(); ?>

    </div>
</div>
