<?= $this->extend('Template/Design/admin_template') ?>
<?= $this->section('content_data') ?>
<?php
    
    $title = [
        'name' => 'title',
        'id' => 'title',
        'value' => $datas->title,
        'class' => 'form-control'
    ];

    $body = [
        'name' => 'body',
        'id' => 'body',
        'value' => $datas->body,
        'class' => 'form-control'
    ];

    $userId = [
        'name' => 'userId',
        'id' => 'userId',
        'type' => 'number',
        'readonly' => true,
        'value' => $datas->userId,
        'class' => 'form-control'
    ];

    $id = [
        'name' => 'id',
        'id' => 'id',
        'type' => 'hidden',
        'readonly' => true,
        'value' => $datas->id,
        'class' => 'form-control'
    ];
    
    $submit = [
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Submit',
        'class' => 'btn btn-success',
        'type' => 'submit'
    ];

$session = session();
$errors = $session->getFlashdata('errors');
?>

<div class="row mt-5">
  <div class="col-md-12">
    <div class="container mt-4 vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-50 my-auto">
                <div class="card-header text-center">
                    <h1>Form Tambah Postingan</h1>
                </div>
                <div class="card-body">
                    <?php if ($errors != null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Terjadi Kesalahan</h4>
                            <hr>
                            <p class="mb-0">
                                <?php foreach ($errors as $err) {
                                    echo $err . '<br>';
                                }

                                ?>
                            </p>
                        </div>
                    <?php endif ?>

                    <!-- Membuat Form dengan Form Helper -->
                    <?= form_open_multipart('Admin/Data_A/update/'. $datas->id) ?>

                        <div class="form-group mt-3">
                                <?= form_label("Judul Tulisan", "title") ?>
                                <?= form_input($title) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Isi Tulisan", "body") ?>
                            <?= form_textarea($body) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Nomor Penulis", "userId") ?>
                            <?= form_input($userId) ?>
                        </div>

                        <div class="form-group mt-3">                        
                            <?= form_input($id) ?>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                        <!-- Form submit terkait submit-->
                        <?= form_submit($submit) ?>
                        </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>

<?= $this->endSection() ?>