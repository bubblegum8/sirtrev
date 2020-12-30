
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
            <form  action="<?php echo base_url(''.$role.'/CrudAkun/'.$aksi.'')?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                <label for="username">NKK</label>
                <input class="form-control <?php echo form_error('nkk') ? 'is-invalid':'' ?>" 
							type="text" name="nkk" placeholder="NKK" value="<?=$nkk?>"/>
                            <div class="invalid-feedback">
									<?php echo form_error('nkk') ?>
                  <input class="form-control <?php echo form_error('nkkLama') ? 'is-invalid':'' ?>" 
              type="hidden" name="nkkLama" placeholder="NKK" value="<?=$nkk?>"/>
                            <div class="invalid-feedback">
                  <?php echo form_error('nkkLama') ?>
								</div>
                </div>
                </div>
                <div class="form-group">
                <label for="id_wilayah">ID Wilayah</label>
                 <select class="form-control" name="id_wilayah" required>
                    <?php
                    foreach ($data as $row) {
                      if($nkk == $row->id_wilayah){
                        echo '<option value="'.$row->id_wilayah.'" selected>'.$row->id_wilayah.'</option>';
                      }
                      else{
                        echo '<option value="'.$row->id_wilayah.'">'.$row->id_wilayah.'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                <label for="Password">PASSWORD</label>
                <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" 
							type="text" name="password" placeholder="Password" value="<?=$password;?>"/>
                            <div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
                </div>
                
                <div class="form-group">
                  <label for="Lvl">Role</label>
                  <select class="form-control <?php echo form_error('role') ? 'is-invalid':'' ?>" name="role">
                    <option value="">- Pilih Role -</option>
                    <option value="rt" <?= $role == "rt" ? "selected" : ""; ?> >RT</option>
                    <option value="Warga" <?= $role == "warga" ? "selected" : ""; ?>>warga</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="Lvl">Created</label>
                  <input type="date" name="created" class="form-control <?php echo form_error('Created') ? 'is-invalid':'' ?>" value="<?=$created;?>"/>
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

<!-- jQuery 3 -->
<script src="<?= base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url()?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url()?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>assets/dist/js/demo.js"></script>
</body>
</html>