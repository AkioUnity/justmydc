<div class="row" style="margin-bottom: 2%;">
    <div class="col-3"></div>
    <div class="col-6">
        <?php echo $form->open(); ?>

        <?php echo $form->messages(); ?>

        <?php echo $form->bs3_email('Email'); ?>
        <?php echo $form->bs3_submit('Submit'); ?>

        <?php echo $form->close(); ?>

    </div>
</div>
