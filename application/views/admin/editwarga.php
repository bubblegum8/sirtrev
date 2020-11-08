<!DOCTYPE html>
<html>
<head>
<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view("admin/_partials/navbar.php") ?>
<?php $this->load->view("admin/_partials/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 389px;">

<section class="content-header">
    <!-- Content Header (Page header) -->
    <h1>
        EDIT DATA WARGA
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Data Warga</li>
      </ol>
    </section>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
           
            <!-- form start -->
            <?php foreach($warga as $warga){ ?>
            <form  action="<?php echo base_url().'admin/CrudWarga/update';?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_warga" value="<?php echo $warga->id_warga ?>" />
            <div class="box-body">
                <div class="form-group">
                <label for="NIK">NIK</label>
                <input class="form-control <?php echo form_error('NIK') ? 'is-invalid':'' ?>" type="text" name="NIK" placeholder="NIK" value="<?php echo $warga->NIK ?>"/>
                <div class="invalid-feedback">
                <?php echo form_error('NIK') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="nama">NAMA LENGKAP</label>
                <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $warga->nama ?>"/>
                <div class="invalid-feedback">
                <?php echo form_error('nama') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="alamat">ALAMAT</label>
                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" type="text" name="alamat" placeholder="Alamat" value="<?php echo $warga->alamat ?>"/>
                <div class="invalid-feedback">
                <?php echo form_error('alamat') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="TempatLahir">TEMPAT LAHIR</label>
                <input class="form-control <?php echo form_error('tmpt_lahir') ? 'is-invalid':'' ?>" type="text" name="tmpt_lahir" placeholder="Tempat Lahir" value="<?php echo $warga->tmpt_lahir ?>"/>
                <div class="invalid-feedback">
                <?php echo form_error('tmpt_lahir') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="TanggalLahir">TANGGAL LAHIR</label>
                <input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid':'' ?>" type="text" name="tgl_lahir" placeholder="00/00/0000" value="<?php echo $warga->tgl_lahir ?>"/>
                <div class="invalid-feedback">
                <?php echo form_error('tgl_lahir') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="Pendidikan">PENDIDIKAN</label>
                <input class="form-control <?php echo form_error('pendidikan') ? 'is-invalid':'' ?>" type="text" name="pendidikan" placeholder="Pendidikan" value="<?php echo $warga->pendidikan ?>"/>
                <div class="invalid-feedback">
                <?php echo form_error('pendidikan') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="Agama">AGAMA</label>
                <input class="form-control <?php echo form_error('agama') ? 'is-invalid':'' ?>" type="text" name="agama" placeholder="Agama" value="<?php echo $warga->agama ?>"/>
                <div class="invalid-feedback">
                <?php echo form_error('agama') ?>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <?php } ?>
<!-- /.content-wrapper -->
<?php $this->load->view("admin/_partials/footer.php")?>

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view("admin/_partials/js.php")?>
</body>
</html>