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
        EDIT DATA RT
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Data RT</li>
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
            <?php foreach($wilayah as $wilayah){ ?>
            <form  action="<?php echo base_url().'admin/CrudRt/update';?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_wilayah" value="<?php echo $wilayah->id_wilayah ?>" />
            <div class="box-body">
                <div class="form-group">
                <label for="provinsi">PROVINSI</label>
                <input class="form-control <?php echo form_error('provinsi') ? 'is-invalid':'' ?>" 
              type="text" name="provinsi" placeholder="Provinsi" value="<?php echo $wilayah->provinsi ?>"/>
                            <div class="invalid-feedback">
                  <?php echo form_error('provinsi') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="Kota">KOTA/KABUPATEN</label>
                <input class="form-control <?php echo form_error('kota') ? 'is-invalid':'' ?>" 
              type="text" name="kota" placeholder="Kota/Kabupaten" value="<?php echo $wilayah->kota ?>"/>
                            <div class="invalid-feedback">
                  <?php echo form_error('kota') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="Kecamatan">KECAMATAN</label>
                <input class="form-control <?php echo form_error('kecamatan') ? 'is-invalid':'' ?>" 
              type="text" name="kecamatan" placeholder="Kecamatan" value="<?php echo $wilayah->kecamatan ?>"/>
                            <div class="invalid-feedback">
                  <?php echo form_error('kecamatan') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="Kelurahan">KELURAHAN/DESA</label>
                <input class="form-control <?php echo form_error('kelurahan') ? 'is-invalid':'' ?>" 
              type="text" name="kelurahan" placeholder="Kelurahan/Desa" value="<?php echo $wilayah->kelurahan ?>"/>
                            <div class="invalid-feedback">
                  <?php echo form_error('kelurahan') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="RW">RW</label>
                <input class="form-control <?php echo form_error('rw') ? 'is-invalid':'' ?>" 
              type="text" name="rw" placeholder="RW" value="<?php echo $wilayah->rw ?>"/>
                            <div class="invalid-feedback">
                  <?php echo form_error('rw') ?>
                </div>
                </div>
                <div class="form-group">
                <label for="RT">RT</label>
                <input class="form-control <?php echo form_error('rt') ? 'is-invalid':'' ?>" 
              type="text" name="rt" placeholder="RT" value="<?php echo $wilayah->rt ?>"/>
                            <div class="invalid-feedback">
                  <?php echo form_error('rt') ?>
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