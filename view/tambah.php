<?php
include '../controller/Pegawai.php';
error_reporting(0);
$ctrl = new Pegawai();
//$id = $_GET['id'];
//$isi = $ctrl->getData($id);
//$posisi = $ctrl->getJenisData(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Data Pegawai</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  </head>
  <body>
    <div class="container">
        <row>
            <div class="card">
            <h2 align="center">Tambah Data Pegawai</h2>
            <div class="card-body">
                <form class="row g-3" method="POST" action="<?php echo $ctrl->simpanPegawai();?>">
  <div class="col-md-6">
    <label for="inputid" class="form-label">NIP</label>
    <input type="text" class="form-control" id="inputid" name="kdPegawai" placeholder="PGW-00-0-000">
  </div>
  <div class="col-md-5">
    <label for="inputPosisi" class="form-label">Posisi Pegawai</label>
     <select id="posisiPegawai" class="form-select" name="posisiPegawai">
      <option selected value="" disabled ="">Silahkan Pilih...</option>
    </select>
  </div>
  <div class="col-md-1">
    <label for="inputPosisi" class="form-label">Tambah</label>
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPosisi" title=""><i class="bi bi-plus-square-dotted"></i></a>
  </div>
  <div class="col-6">
    <label for="inputNama" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="inputNama" name="namaPegawai">
  </div>

  <div class="col-6">
    <label for="inputAlamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="inputAlamat" name="alamatPegawai">
  </div>
  <div class="col-md-6">
    <label for="inputTelepon" class="form-label">No Telp</label>
    <input type="text" class="form-control" id="inputTelepon" name="noTelp">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="simpan">Add</button>
    <a href = "content.php" class="btn btn-danger">Cancel</a>
  </div>
</form>
  </div>  
  </div>
  </row>
</body>
 <div class="example-modal">
                <div id="ModalPosisi" class="modal fade" role="dialog" style="display: none;">
                <div class = "modal-dialog">
                <div class="modal-content">
                <form class="row g-3" id="formPosisiPegawai">
                <div class="modal-header">
                    <h3 class="modal-tittle">Add Posisi Pegawai</h3>
                    </div>
                    <div class="modal-body">
                      <label for="posisiPegawai" class="form-label">Posisi Pegawai</label>
                      <input type="text" class="form-control" id="posisiPegawai" name="posisiPegawai" placeholder="Posisi...">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" id="btnSimpan">Simpan</button>
                    <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                    </div>
                 </form>
                </div>
                </div>
        </div>
    </div>
<script type="text/javascript">
  $(document).ready(function(){
    //alert('test');
    show_jenis();//memanggil function yang ada di bawah
    //
    function show_jenis(){ //untuk menampilkan data product
      $.ajax({
        type  : 'GET',
        url   : 'api.php',//memanggil controller/function
        async : false,
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          var no;
          html += '<option selected value="" disabled ="">Silahkan Pilih...</option>';
          for(i=0; i<data.length; i++){ //looping atau pengulangan
            no = i + 1;
            html +=
              '<option value="'+data[i].posisi_pegawai+'">'+data[i].posisi_pegawai+'</option>';
          }//akhir dari looping
          $('#posisiPegawai').html(html);//mengirim data
        },
        error:function(data){
          console.log(data)
        }
      });

    }
  });
  $('#btnSimpan').click(function(){
    // alert('button');
      $('#ModalJenis').modal('hide');
    var dataForm = $('#formPosisiPegawai').serialize();
    $.ajax({
    type  : 'POST',
    url   : 'api.php',//Memanggil Controller/Function
    async : false,
    dataType : 'json',
    data : dataForm, 
    success:function(response){
            if (response == 200) {
          Swal.fire({
          type: 'success',
          title: 'Berhasil di simpan!',
          text: 'Tunggu sejenak',
          timer: 1000,
          showCancelButton: false,
          showConfirmButton: false
          })
          .then (function() {
            show_jenis();
          });

            } else {

                Swal.fire({
                type: 'error',
                title: 'Gagal menyimpan',
                text: 'silahkan coba lagi!'
              });

            }

            console.log(response);

          },

          error:function(response){

              Swal.fire({
                type: 'error',
                title: 'Opps!',
                text: 'server error!'
              });

              console.log(response);

          }
    });

  });  
     
</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
