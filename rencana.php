<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="img\logo2.png">
  <title>Rencana - Money</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php require 'koneksi.php'; ?>
<?php require 'sidebar.php'; ?>
      <!-- Main Content -->
      <div id="content">

<?php require 'navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Daftar Rencana</h1>
<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> rencana</i></button><br>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar rencana</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Jenis</th>
                      <th>Nominal</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tanggal</th>
                      <th>Jenis</th>
                      <th>Nominal</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM rencana");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data['tanggal']?></td>
                      <td><?=$data['jenis_rencana']?></td>
                      <td><?=$data['nominal']?></td>
                      <td><?=$data['deskripsi']?></td>
					  <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_rencana']; ?>"></a>
</td>
</tr>

<div class="modal fade" id="myModal<?php echo $data['id_rencana']; ?>" role="dialog">
<div class="modal-dialog">


<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data rencana</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-rencana.php" method="get">

<?php
$id = $data['id_rencana']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM rencana WHERE id_rencana='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_rencana" value="<?php echo $row['id_rencana']; ?>">

<div class="form-group">
<label>Tanggal</label>
<input type="text" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>">      
</div>

<div class="form-group">
<label>Jenis</label>
<input type="text" name="jenis_rencana" class="form-control" value="<?php echo $row['jenis_rencana']; ?>">      
</div>

<div class="form-group">
<label>Nominal</label>
<input type="text" name="nominal" class="form-control" value="<?php echo $row['nominal']; ?>">      
</div>

<div class="form-group">
<label>Deskripsi</label>
<input type="text" name="deskripsi" class="form-control" value="<?php echo $row['deskripsi']; ?>">      
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
<a href="hapus-rencana.php?id_rencana=<?=$row['id_rencana'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



 <!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Rencana</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-rencana.php" method="get">
        <div class="modal-body">
		Tanggal : 
         <input type="text" class="form-control" name="tanggal">
		Jenis : 
         <input type="text" class="form-control" name="jenis_rencana">
		Nominal : 
         <input type="text" class="form-control" name="nominal">
		Deskripsi : 
         <input type="text" class="form-control" name="deskripsi">
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
		<button type="submit" class="btn btn-success" >Tambah</button>
		</form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>

    </div>
  </div>


<?php               
} 
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
		  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
