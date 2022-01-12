<?php
error_reporting(0);
include '../controller/Pegawai.php';

//var_dump($hasil);
$ctrl = new Pegawai();

$hasil= $ctrl->index();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>List Data Pegawai</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>
                    ?>
        	<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white text-uppercase">
                            <div class="h3 text-center">Data Pegawai</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped w-100">
                                    <thead>
                                            <th>NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Posisi</th>
                                            <th>Gaji</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($hasil as $isi) { ?>
                                            <?php
                                            $gaji = 0;
                                            if ($isi['posisi_pegawai'] == 'Staff') {
                                                $gaji = 2000;
                                            } else if ($isi['posisi_pegawai'] == 'Manajer') {
                                                $gaji = 10000;
                                            } else if ($isi['posisi_pegawai'] == 'Supervisor') {
                                                $gaji = 4000;

                                            } else {
                                                $js = 'Kode Bermasalah';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $isi['kd_pegawai'] ?></td>
                                                <td><?php echo $isi['nama_pegawai'] ?></td>
                                                <td><?php echo $isi['posisi_pegawai'] ?></td>
                                                <td><?php echo $gaji ?></td>
                                                <td><?php echo $isi['alamat_pegawai'] ?></td>
                                                <td><?php echo $isi['no_telp'] ?></td>
                                            </tr>
                                    </div>
                                    <?php }?>
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</body>
  

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

