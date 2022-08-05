<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){  //cek koneksi
     die("tidak bisa terkoneksi ke database");
}
$Nama         ="";
$Alamat        ="";
$NoTelepon  ="";
$Stiker    ="";
$success     ="";
$error       ="";

if(isset($_POST['simpan'])){
    $Nama             = $_POST['Nama'];
    $Alamat          = $_POST['Alamat'];
    $NoTelepon          = $_POST['NoTelepon'];
    $Stiker        = $_POST['Stiker'];

    if($Nama && $Alamat && $NoTelepon && $Stiker){
        $sql1   = "insert into mahasiswa(Nama,Alamat,NoTelepon,Stiker) value ('$Nama','$Alamat','$NoTelepon','$Stiker')";
        $q1     = mysqli_query($koneksi,$sql1);
        if($q1){
            $success     ="Berhasil memasukkan data baru";
        }else{
            $error      ="Gagal memasukkan data";
        } 
    } else{
        $error = "silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto { width:800px }
        .card {margin-top: 10px;}
    </style>
</head>
<body>
    <div class="mx-auto">
        <!  untuk memasukkan data  >
    <div class="card">
        <div class="card-header">
            Data Pesanan Stiker
        </div>
        <div class="card-body">
            <?php
            if($error){
                ?>
            <div class = "alert alert-danger" role = "alert" > <?php echo $error ?> </div>
                <?php
            }
            ?>

<?php
            if($success){
                ?>
            <div class = "alert alert-success" role = "alert" > <?php echo $success ?> </div>
                <?php
            }
            ?>
            <form action="" method ="POST">
                <div class="mb-3 row">
                    <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $Nama?>">
        </div>
    </div>

    <div class="mb-3 row">
                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?php echo $Alamat?>">
        </div>
    </div>

    <div class="mb-3 row">
                    <label for="NoTelepon" class="col-sm-2 col-form-label">NoTelepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="NoTelepon" name="NoTelepon" value="<?php echo $NoTelepon?>">
        </div>
    </div>

    <div class="mb-3 row">
                    <label for="Stiker" class="col-sm-2 col-form-label">Stiker</label>
                    <div class="col-sm-10">
                       <select class="form-control" name="Stiker" id="Stiker">
                           <option value="">- Pilih Stiker -</option>
                           <option value="saintek" <?php if($Stiker == "saintek") echo "selected"?>>Print</option>
                           <option value="soshum" <?php if($Stiker == "soshum") echo "selected"?>>Cutting</option>
                       </select>
        </div>
    </div>
    <div class="col-12">
        <input type="submit"name="simpan" value="Simpan Data" class="btn btn-primary"/>
    </div>
            </form>
        </div>
    </div>

    
</div>
</body>
</html>