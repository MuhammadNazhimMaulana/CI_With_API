<?= $this->extend('Template/Design/admin_template') ?>
<?= $this->section('content_data') ?>

<h1>Testing</h1>

<?php $session = session();?>

<div class="row mt-5">
  <div class="col-md-12">
    <div class="card text-dark bg-light mb-3">
      <div class="card-header"></div>
      <div class="card-body">
        <a href="<?= site_url('Admin/Data_A/insert') ?>" class="btn btn-success">Tambah Postingan</a>
        <h5 class="card-title text-center">Daftar Seluruh Postingan</h5>
        <?php if($session->get('pesan')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: auto;">
            <strong><?= session()->getFlashdata('pesan') ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul</th>
              <th scope="col">Isi</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php $i = 1;?>
              <?php foreach ($datas as $index => $posts) :?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $posts->title ?></td>
                  <td><?= $posts->body ?></td>
                  <td class="col-md-3">
                    <a href="<?= site_url('Admin/Data_A/view/' . $posts->id) ?>" class="btn btn-primary">View</a>
                    <a href="<?= site_url('Admin/Data_A/update/' . $posts->id) ?>" class="btn btn-success">Update</a>
                    <a href="#modalDelete<?= $posts->id ?>" data-bs-toggle="modal" onclick="" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
              <div class="card-footer">
              </div>
          </div>
        </div>
      </div>

    <!-- Modal -->
    <?php foreach ($datas as $index => $posts) :?>
        <div class="modal fade" id="modalDelete<?= $posts->id ?>" tabindex="-1" data-bs-backdrop="static">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                      <div class="modal-body">
                          <p>Apakah Anda yakin akan menghapus data ini?</p>
                      </div>
                       <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button class="btn btn-danger"><a href="<?= site_url('Admin/Data_A/delete/' . $posts->id) ?>">Delete</a></button>
                        </div>
                  </div>
              </div>
          </div>
<?php endforeach ?>

<?= $this->endSection() ?>