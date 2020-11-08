<!DOCTYPE html>
<html>
<head>
<?php $this->load->view("rt/_partials/head.php") ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view("rt/_partials/navbar.php") ?>
<?php $this->load->view("rt/_partials/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 389px;">

<section class="content-header">
    <!-- Content Header (Page header) -->
    <h1>
        TAMBAH SURAT
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Surat</li>
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
            <form  action="<?php echo base_url().'rt/surat/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                <label for="Surat">NO SURAT</label>
                <input class="form-control <?php echo form_error('no_surat') ? 'is-invalid':'' ?>" type="text" name="no_surat" placeholder="No Surat"/>
                <div class="invalid-feedback">
                <?php echo form_error('no_surat') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="nama">NAMA</label>
                <input class="form-control <?php echo form_error('id_warga') ? 'is-invalid':'' ?>" type="text" name="id_warga" placeholder="Nama Lengkap"/>
                <div class="invalid-feedback">
                <?php echo form_error('id_warga') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="Alamat">KEPERLUAN</label>
                <input class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?>" type="text" name="keperluan" placeholder="Keperluan"/>
                <div class="invalid-feedback">
                <?php echo form_error('keperluan') ?>
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
<!-- /.content-wrapper -->
<?php $this->load->view("rt/_partials/footer.php")?>

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view("rt/_partials/js.php")?>
</body>
</html>