<?php $this->load->view('_partials/navbar'); ?>
    <div class="container" style="margin-top: 3rem;margin-bottom: 3rem">
        <section class="content">
            <?php $this->load->view($inner_view); ?>
        </section>
    </div>

<?php $this->load->view('_partials/footer'); ?>