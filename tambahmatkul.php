<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Learning UNIVERSITAS</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" />
    <link rel="stylesheet" href="assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/styles/styles.css" />
</head>

<body>
    <?php
        require_once 'includes/connection.php';
        session_start();
    ?>
<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
<div class="container">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navigation">
    <div class="padding-nav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                    <i class="fa fa-book"></i> E-Learning UNIVERSITAS
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="clearfix">
    <?php echo $_SESSION['nama'] ?>
    &nbsp;
    <a href="logout.php" class="btn btn-danger navbar-btn right">
        <i class="fa fa-sign-out-alt"> Log Out</i>
    </a>
</div>
</div>
</nav>

<div id="content">
<div class="container mt-4">
<?php
if(isset($_POST['save'])){
$iduser = $_SESSION['iduser'];
$idMatkul = $_POST['idmatkul'];
$namaMatkul = $_POST['namamatkul'];
$idkelas = $_POST['kelas'];
$query = "INSERT INTO matakuliah (kd_matkul, nama_matkul, id_kelas,nip_dosen) " . 
"VALUES ('$idMatkul', '$namaMatkul', '$idkelas', '$iduser');";
mysqli_query($con,$query) or die('Error, query failed : ' . mysqli_error($con));
echo "<div class='alert alert-success col-md-12 mt-3'>Mata Kuliah Berhasil Ditambahkan</div>";
echo "<meta http-equiv='refresh' content='1;url=matakuliah.php'>";
}
?>
<div class="row">
<div class="col-md-9 m-auto " id="cart">
<div class="card">
<div class="card-body">
<h3 class="mb-4">Tambah Mata Kuliah</h3>
<form class="container" method="post" enctype="multipart/form-data">
<div class="form-group row">
    <label class="col-md-3 control-label">Kode Mata Kuliah</label>
    <div class="col-md-9">
        <input type="text" name="idmatkul" class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 control-label">Nama Mata Kuliah</label>
    <div class="col-md-9">
        <input type="text" name="namamatkul" class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 control-label">Pilih Kelas</label>
    <div class="col-md-9">
        <?php
            $sql = "SELECT kd_kelas,nama_kelas FROM kelas";
            $rs = $con->query($sql);
            echo "<select class='form-control' name='kelas'>";
            while($row = $rs->fetch_assoc()){
                echo "<option value='".$row["kd_kelas"]."'>".$row["nama_kelas"]."</option>";
            }
            $rs->close();
            echo "</select>";
            ?>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 control-label"></label>
    <div class="col-md-9">
        <button class="btn btn-primary" name="save">
            <i class="fa fa-save"></i>
            Tambah Mata Kuliah
        </button>
        <a class="btn btn-danger" href="matakuliah.php">
            <i class="fa fa-times"></i>
            Batal
        </a>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>