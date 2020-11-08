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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        DATA RT
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data RT</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <a href="<?= site_url()?>admin/CrudRt/tambah" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
        <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
                </div>
            </div>
        </div>
        
            <div class="box-body table-responsive">
            <table id="user" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>NO</th>
                <th>Provinsi</th>
                <th>Kota/Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan/Desa</th>
                <th>RW</th>
                <th>RT</th>
                <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($wilayah as $wilayah){ 
                ?>                
                <tr>
                    <td><?php echo $no++         ?></td>
                    <td><?php echo $wilayah->provinsi ?></td>
                    <td><?php echo $wilayah->kota     ?></td>
                    <td><?php echo $wilayah->kecamatan?></td>
                    <td><?php echo $wilayah->kelurahan?></td>
                    <td><?php echo $wilayah->rw       ?></td>
                    <td><?php echo $wilayah->rt        ?></td>
                    <td>
                    <a href="<?= site_url('admin/CrudRt/edit/'.$wilayah->id_wilayah)?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="<?= site_url('admin/CrudRt/hapus/'.$wilayah->id_wilayah)?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
            </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
  </div>
  <?php $this->load->view("admin/_partials/footer.php")?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view("admin/_partials/js.php")?>
<script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
</body>
</html>