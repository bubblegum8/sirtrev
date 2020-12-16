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
            <form  action="<?php echo base_url().'admin/CrudWarga/'.$aksi.'';?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                <label for="NIK">NIK</label>
                <input class="form-control <?php echo form_error('nik') ? 'is-invalid':'' ?>" 
                            type="text" name="nik" placeholder="NIK" value="<?=$nik?>"/>
                            <div class="invalid-feedback">
                                    <?php echo form_error('nik') ?>
                                </div>
                </div>
                <div class="form-group">
                <label for="Name">Nama</label>
                <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" 
                            type="text" name="nama" placeholder="Nama" value="<?=$nama;?>"/>
                            <div class="invalid-feedback">
                                    <?php echo form_error('nama') ?>
                                </div>
                </div>
                
                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>" value="<?=$tanggal_lahir;?>"/>
                </div>

                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <select class="form-control <?php echo form_error('jk') ? 'is-invalid':'' ?>" name="jk">
                    <option value="">- Pilih Jenis Kelamin -</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                  </select>
                </div>

                <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
                            type="text" name="alamat" placeholder="Alamat" value="<?=$alamat;?>"/>
                            <div class="invalid-feedback">
                                    <?php echo form_error('alamat') ?>
                                </div>
                </div>
                
                <div class="form-group">
                <label for="Pekerjaan">Pekerjaan</label>
                <input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>" 
                            type="text" name="pekerjaan" placeholder="Pekerjaan" value="<?=$pekerjaan;?>"/>
                            <div class="invalid-feedback">
                                    <?php echo form_error('pekerjaan') ?>
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
<?php $this->load->view("admin/_partials/footer.php")?>

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view("admin/_partials/js.php")?>
</body>
</html>