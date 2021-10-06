<?= $this->extend('Template/Design/admin_template') ?>
<?= $this->section('content_data') ?>

<div class="row mt-5">
  <div class="col-md-12">
    <div class="card text-dark bg-light mb-3">
      <div class="card-header text-center">Postingan Spesifik</div>
        <div class="card-body">
            <a href="<?= site_url('Admin/Data_A/ketiga') ?>" class="btn btn-success">Kembali Ke Awal</a>
            <h5 class="card-title text-center"><?= $datas->title ?></h5>

            <p class="card-text"><?= $datas->body ?></p>
        </div>
    </div>
   </div>
</div>

<?= $this->endSection() ?>