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
        TAMBAH AKUN
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Akun</li>
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
            <form  action="<?php echo base_url().'admin/CrudAkun/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                <label for="username">NKK</label>
                <input class="form-control <?php echo form_error('NKK') ? 'is-invalid':'' ?>" 
							type="text" name="NKK" placeholder="NKK"/>
                            <div class="invalid-feedback">
									<?php echo form_error('NKK') ?>
								</div>
                </div>
                <div class="form-group">
                <label for="Password">PASSWORD</label>
                <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" 
							type="text" name="password" placeholder="Password"/>
                            <div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
                </div>
                
                <div class="form-group">
                  <label for="Lvl">Status Warga</label>
                  <select class="form-control <?php echo form_error('statuswarga') ? 'is-invalid':'' ?>" name="statuswarga">
                    <option value="">- Pilih Role -</option>
                    <option value="Ketua RT">Ketua RT</option>
                    <option value="Warga">warga</option>
                  </select>
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