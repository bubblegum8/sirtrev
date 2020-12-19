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
        <?= $judul;?>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $judul;?></li>
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
            <form  action="<?php echo base_url().'rt/CrudSurat/'.$aksi.'';?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                <label for="JENIS SURAT">Jenis Surat</label>
                <input class="form-control <?php echo form_error('jenis_surat') ? 'is-invalid':'' ?>"
                            type="text" name="jenis_surat" placeholder="Jenis Surat" value="<?=$jenis_surat?>"/>
                            <div class="invalid-feedback">
                                    <?php echo form_error('jenis_surat') ?>
                                </div>
                </div>
                <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>" 
                             type="text" name="keterangan" placeholder="Keterangan" value="<?=$keterangan;?>"/>
                            <div class="invalid-feedback">
                                    <?php echo form_error('keterangan') ?>
                                </div>
                </div>
                
                <div class="form-group">
                  <label for="tanggal">Tanggal Pembuatan</label>
                  <input type="date" name="tanggal" class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" value="<?=$tanggal;?>"/>
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