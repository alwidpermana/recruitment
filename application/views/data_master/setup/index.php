<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"color": "light-red","placement": "vertical","navcolor": "default","layout": "fluid","radius": "rounded"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
  </head>

  <body>
    <div id="root">
      <?php $this->load->view("_partial/sidebar");?>

      <main>
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title Start -->
              <div class="page-title-container">
                <div class="row">
                  <!-- Title Start -->
                  <?php $this->load->view("_partial/content-header");?>
                  <!-- Title End -->
                </div>
              </div>
              <!-- Title End -->

              <!-- Content Start -->
              <div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label class="form-label">No Recruitment</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        : <?=$no_recruitment?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Jenis</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        : <?=$filJenis?>
                                        <input type="hidden" id="filJenis" value="<?=$filJenis?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Tahun</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        : <?=date("Y")?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Bulan</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        : <?=date("F")?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th colspan="3"></th>
                                                        <th>Pria</th>
                                                        <th>Wanita</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td colspan="3">Stok Pelamar Umum</td>
                                                        <td><input type="number" class="form-control" id="inputStokPria" readonly></td>
                                                        <td><input type="number" class="form-control" id="inputStokWanita" readonly></td>
                                                        <td><input type="number" class="form-control" id="inputStok" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td colspan="3">Kebutuhan</td>
                                                        <td><input type="number" class="form-control hitungSisa" id="inputKebutuhanPria" value="<?=$priaP?>" readonly></td>
                                                        <td><input type="number" class="form-control hitungSisa" id="inputKebutuhanWanita" value="<?=$wanitaP?>" readonly></td>
                                                        <td><input type="number" class="form-control" id="inputKebutuhan"  value="<?=$jumlahP?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="3">3</td>
                                                        <td rowspan="3">Alokasi</td>
                                                        <td>Referensi</td>
                                                        <td>Internal</td>
                                                        <td><input type="number" class="form-control hitungSisa hitungReferensi" id="inputReferensiPria" autofocus></td>
                                                        <td><input type="number" class="form-control hitungSisa hitungReferensi" id="inputReferensiWanita"></td>
                                                        <td><input type="number" class="form-control" id="inputReferensi" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">Reguler</td>
                                                        <td>Log In Eksternal</td>
                                                        <td><input type="number" class="form-control hitungSisa hitungEksternal" id="inputEksternalPria"></td>
                                                        <td><input type="number" class="form-control hitungSisa hitungEksternal" id="inputEksternalWanita"></td>
                                                        <td><input type="number" class="form-control" id="inputEksternal" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Umum</td>
                                                        <td><input type="number" class="form-control hitungSisa hitungUmum" id="inputUmumPria"></td>
                                                        <td><input type="number" class="form-control hitungSisa hitungUmum" id="inputUmumWanita"></td>
                                                        <td><input type="number" class="form-control" id="inputUmum" readonly></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="text-center">
                                                    <tr>
                                                        <th colspan="4" class="text-right">Sisa:</th>
                                                        <th><span id="sisaPria"></span></th>
                                                        <th><span id="sisaWanita"></span></th>
                                                        <th>
                                                            <!-- <span id="sisaJml"></span> -->
                                                            <input type="hidden" id="inputJmlSisa">
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <input type="hidden" id="inputSisaPria">
                                            <input type="hidden" id="inputSisaWanita">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <div id="getNotif"></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="d-grid gap-2 col-md-4 col-sm-12 mx-auto mb-3">
                                        <button type="button" class="btn btn-primary mb-1 active-scale-down" id="btn-save">Save Setup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Help Text End -->
              </div>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <input type="hidden" id="inputId" value="<?=$inputId?>">
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script type="text/javascript">
      $(document).ready(function(){
          $('.hitungSisa').on('keyup', function(){
              var inputKebutuhanPria = $('#inputKebutuhanPria').val() == ''? 0 : parseInt($('#inputKebutuhanPria').val());
              var inputKebutuhanWanita = $('#inputKebutuhanWanita').val() == ''? 0 : parseInt($('#inputKebutuhanWanita').val());
              var inputKebutuhan = $('#inputKebutuhan').val() == ''? 0 : parseInt($('#inputKebutuhan').val());
              var inputReferensiPria = $('#inputReferensiPria').val() == ''? 0 : parseInt($('#inputReferensiPria').val());
              var inputReferensiWanita = $('#inputReferensiWanita').val() == ''? 0 : parseInt($('#inputReferensiWanita').val());
              var inputReferensi = $('#inputReferensi').val() == ''? 0 : parseInt($('#inputReferensi').val());
              var inputEksternalPria = $('#inputEksternalPria').val() == ''? 0 : parseInt($('#inputEksternalPria').val());
              var inputEksternalWanita = $('#inputEksternalWanita').val() == ''? 0 : parseInt($('#inputEksternalWanita').val());
              var inputEksternal = $('#inputEksternal').val() == ''? 0 : parseInt($('#inputEksternal').val());
              var inputUmumPria = $('#inputUmumPria').val() == ''? 0 : parseInt($('#inputUmumPria').val());
              var inputUmumWanita = $('#inputUmumWanita').val() == ''? 0 : parseInt($('#inputUmumWanita').val());
              var inputUmum = $('#inputUmum').val() == ''? 0 : parseInt($('#inputUmum').val());
              var sisaPria = inputKebutuhanPria - (inputReferensiPria+inputEksternalPria+inputUmumPria);
              var sisaWanita = inputKebutuhanWanita - (inputReferensiWanita+inputEksternalWanita+inputUmumWanita);
              var sisa = inputKebutuhan - (sisaPria + sisaWanita)
              $('#sisaPria').html(sisaPria)
              $('#sisaWanita').html(sisaWanita)
              $('#inputSisaPria').val(sisaPria);
              $('#inputSisaWanita').val();
              $('#sisaJml').html(sisa)
              $('#inputJmlSisa').val(sisa)
              if (sisaPria <0 || sisaWanita <0) {
                  $('#btn-save').attr("disabled",true)
                  $('#getNotif').html('<div class="alert alert-danger" role="alert"><i class="mdi mdi-block-helper me-2"></i> Sisa Tidak Boleh Kurang Dari 0 !</div>')
              }else{
                  $('#btn-save').attr("disabled",false)
                  $('#getNotif').html("")
              }
          })
          $('.hitungReferensi').on('keyup', function(){
               var inputReferensiPria = $('#inputReferensiPria').val() == ''? 0 : parseInt($('#inputReferensiPria').val());
               var inputReferensiWanita = $('#inputReferensiWanita').val() == ''? 0 : parseInt($('#inputReferensiWanita').val());
               var jumlahReferensi = inputReferensiPria + inputReferensiWanita;
               $('#inputReferensi').val(jumlahReferensi)
          })

          $('.hitungEksternal').on('keyup', function(){
               var inputEksternalPria = $('#inputEksternalPria').val() == ''? 0 : parseInt($('#inputEksternalPria').val());
               var inputEksternalWanita = $('#inputEksternalWanita').val() == ''? 0 : parseInt($('#inputEksternalWanita').val());
               var jumlahEksternal = inputEksternalPria + inputEksternalWanita;
               $('#inputEksternal').val(jumlahEksternal)
          })
          $('.hitungUmum').on('keyup', function(){
               var inputUmumPria = $('#inputUmumPria').val() == ''? 0 : parseInt($('#inputUmumPria').val());
               var inputUmumWanita = $('#inputUmumWanita').val() == ''? 0 : parseInt($('#inputUmumWanita').val());
               var jumlahUmum = inputUmumPria + inputUmumWanita;
               $('#inputUmum').val(jumlahUmum)
          })
      })

      $('#btn-save').on('click', function(){
          console.log("kontol")
          var inputSisaPria = $('#inputSisaPria').val();
          var inputSisaWanita = $('#inputSisaWanita').val();
          if (inputSisaPria == '' && inputSisaWanita == '') {
              Swal.fire("Isi Setup Terlebih Dahulu","","warning")
          }else if (parseInt(inputSisaPria)>0 || parseInt(inputSisaWanita)>0) {
              Swal.fire({
                title: 'Masih Terdapat Sisa Yang Belum Di Setup',
                text: "Tetap Menyimpan Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B22222',
                cancelButtonColor: '#CD5C5C',
                confirmButtonText: 'Ya, Simpan!'
              }).then((result) => {
                if (result.isConfirmed) {
                  saveSetup();
                }
              })
          }else{
              saveSetup();
          }
          
      })

      function saveSetup(argument) {
          var inputReferensiPria = $('#inputReferensiPria').val();
          var inputReferensiWanita = $('#inputReferensiWanita').val();
          var inputEksternalPria = $('#inputEksternalPria').val();
          var inputEksternalWanita = $('#inputEksternalWanita').val();
          var inputUmumPria = $('#inputUmumPria').val();
          var inputUmumWanita = $('#inputUmumWanita').val();
          var inputId = $('#inputId').val();
          var filJenis = $('#filJenis').val();
          $.ajax({
              type:'post',
              data:{inputReferensiPria,inputReferensiWanita, inputEksternalPria, inputEksternalWanita, inputUmumPria, inputUmumWanita, inputId, filJenis},
              dataType:'json',
              cache:false,
              async:true,
              url:base_url+'data_master/saveSetup',
              beforeSend:function(data){
                  $('#btn-save').attr("disabled",true)
              },
              success:function(data){
                  if (data.status == 'success') {
                      window.location.href = base_url+'monitoring/recruitment'
                  }
                  Swal.fire(data.message, data.sub_message, data.status)
              },
              complete:function(data){
                  $('#btn-save').attr("disabled",false)
              },
              error:function(data){
                  Swal.fire("Gagal Menyimpan Data","Periksa Jaringan Anda!","error")
              }
          })
      }
  </script>
  </body>
</html>
