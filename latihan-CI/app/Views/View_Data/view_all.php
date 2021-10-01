<?= $this->extend('Template/Design/admin_template') ?>
<?= $this->section('content_data') ?>

<h1>Testing</h1>

<div class="row mt-5">
  <div class="col-md-12">
    <div class="card text-dark bg-light mb-3">
      <div class="card-header"></div>
      <div class="card-body">
        <a href="<?= site_url('admin/posts/create') ?>" class="btn btn-success">Tambah Postingan</a>
        <h5 class="card-title text-center">Daftar Seluruh Postingan</h5>

        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategory</th>
              <th scope="col">Nama Penulis</th>
            </tr>
          </thead>
          <tbody>
              <?php $i = 1;?>
              <?php foreach ($datas as $index => $posts) :?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $posts->title ?></td>
                  <td><?= $posts->body ?></td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
              <div class="card-footer">
              </div>
          </div>
        </div>
      </div>

<?= $this->endSection() ?>