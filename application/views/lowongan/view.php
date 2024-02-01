<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"color": "light-red","placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded"}}' data-scrollspy="true">
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
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12 text-center">
                  <h1 class="text-primary">Operator</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-12">
                  <div class="d-flex justify-content-center">
                    <div class="row g-0">
                      <div class="col-auto pe-3">
                        <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                        <span class="align-middle"><?=$recruitment->shift?></span>
                      </div>

                      <div class="col-auto pe-3">
                        <i data-acorn-icon="pin" class="text-primary me-1" data-acorn-size="15"></i>
                        <span class="align-middle"><?=$recruitment->tempat?></span>
                      </div>

                      <div class="col-auto pe-3">
                        <i data-acorn-icon="building" class="text-primary me-1" data-acorn-size="15"></i>
                        <span class="align-middle"><?=$recruitment->departemen?></span>
                      </div>
                      <div class="col-auto pe-3">
                        <i data-acorn-icon="hourglass" class="text-primary me-1" data-acorn-size="15"></i>
                        <span class="align-middle"><?=date("d F Y", strtotime($recruitment->last_apply_date))?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-12 col-md-10">
                  <div class="card">
                    <div class="card-body">
                      <div class="col-12">
                        <h4 class="mb-3"><b>Deskripsi</b></h4>
                        <div>
                         <?=$recruitment->deskripsi?>
                          <h4 class="mb-3 mt-5"><b>Requirement</b></h4>
                          <p>
                            <ol class="ps-4 mb-0">
                              <?php foreach ($requirement as $req): ?>
                                <li>
                                  <p class="fw-normal">
                                    <?=$req->requirement?>
                                  </p>
                                </li>
                              <?php endforeach ?>
                              <li>
                                <p class="fw-normal">Fruitcake chocolate chocolate cake. Marzipan wafer macaroon cookie candy canes fruitcake.</p>
                              </li>
                              <li>
                                <p class="fw-normal">Sugar plum gummi bears jujubes cookie jelly-o tootsie roll chocolate bar.</p>
                              </li>
                              <li>
                                <p class="fw-normal">Gingerbread pudding chocolate cake cake.</p>
                              </li>
                            </ol>
                          </p>
                          <?php if ($this->session->userdata("jenis") == 'Umum' && $recruitment->last_apply_date>date("Y-m-d")): ?>
                            <div class="mt-5">
                              <a href="javascript:;" class="btn btn-lg btn-gradient-primary active-scale-down <?=$lowongan==0?'':'d-none'?>" id="btnApply">Apply</a>
                              <a href="javascript:;" class="btn btn-lg btn-gradient-secondary active-scale-down <?=$lowongan == 1 && $status_lowongan == 'Aktif'?'':'d-none'?>" id="btnCancel" recruitmentId = "<?=$this->uri->segment("3")?>">Cancel</a>
                              <div id="showButtonApply"></div>
                            </div>
                          <?php endif ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($this->session->userdata("jenis") == 'Eksternal'): ?>
                <div class="row mt-3">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="card">
                      <div class="card-body">
                        <?php if ($recruitment->last_apply_date>date("Y-m-d")): ?>
                          <div class="row">
                            <div class="col-4 col-md-2">
                              <button type="button" class="btn btn btn-lg btn-primary active-scale-down" id="btnPelamar">
                                Pilih Pelamar
                              </button>
                            </div>
                          </div>   
                        <?php endif ?>
                        <div class="row mt-5">
                          <div class="col-12 table-responsive">
                            <table class="table table-hover" width="100%">
                              <thead>
                                <tr>
                                  <th>Foto</th>
                                  <th>Nama</th>
                                  <th>No KTP</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody id="resultPelamar">
                                <?=$data?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              <?php endif ?>
              
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <div
        class="modal fade modal-close-out"
        id="modalPelamar"
        tabindex="-1"
        role="dialog"
        aria-labelledby="verticallyCenteredLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="verticallyCenteredLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-4 col-md-6 col-lg-6 col-xxl-6"></div>
                <div class="col-8 col-sm-12 col-md-6 col-lg-6 col-xxl-6 mb-1">
                  <input class="form-control" placeholder="Cari Pelamar" id="inputSearch" onkeyup="getDataPelamar()"/>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 table-responsive">
                  <table class="table table-hover text-center" width="100%">
                    <thead>
                      <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>No KTP</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="getDataPelamar">
                      
                    </tbody>
                  </table>    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.select2').select2({
          'width': '100%',
        })
        $('#btnPelamar').on('click', function(){
          getDataPelamar();
          $('#modalPelamar').modal("show");
        })
        $('#getDataPelamar').on('click','.pilihPelamar', function(){
          var pelamarId = $(this).attr("pelamarId")
          var foto = $(this).attr("foto")
          var nama = $(this).attr("nama")
          var no = $(this).attr("no")
          var id = '<?=$this->uri->segment("3")?>';
          $.ajax({
            type:'post',
            data:{pelamarId, id},
            cache:true,
            async:true,
            dataType:'json',
            url:base_url+'lowongan/saveLowongan',
            beforeSend:function(data){

            },
            success:function(data){
              Swal.fire(data.message, data.sub_message, data.status)
              if (data.status == 'success') {
                var html='<tr><td><div class="sw-10 sh-10 me-1 mb-1 d-inline-block"><img src="'+base_url+''+foto+'" class="img-fluid img-fluid-height rounded-md" alt="thumb" /></td><td>'+nama+'</td><td>'+no+'</td><td><button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary align-top float-end hapusResult" type="button" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" data="'+pelamarId+'"><i class="bi bi-trash"></i></button></td>';
                $('#resultPelamar').append(html);
                $('#modalPelamar').modal("hide")
                Swal.fire({
                  position: 'top-end',
                  toast : true,
                  icon: data.status,
                  title: data.message,
                  showConfirmButton: false,
                  timer: 3000
                })
              }
            },
            complete:function(data){
              
            },
            error:function(data){
              Swal.fire("Gagal Menyimpan Data","Periksa Jaringan Perangkat Anda","error")
            }
          })
        })
        $('#resultPelamar').on('click', '.hapusResult', function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
            var pelamarId = $(this).attr("data");
            var id = '<?=$this->uri->segment("3")?>';
            $.ajax({
              type:'post',
              data:{id, pelamarId},
              dataType:'json',
              cache:false,
              async:true,
              url:base_url+'lowongan/hapusLamaran',
              success:function(data){
                
                Swal.fire({
                  position: 'top-end',
                  toast : true,
                  icon: 'success',
                  title: 'Berhasil Hapus Data!',
                  showConfirmButton: false,
                  timer: 3000
                })
              },
              error:function(data){
                Swal.fire("Gagal Menghapus Data","Cek Jaringan Perangkat Anda","error");
              }
            }) 
        });
        $('#btnApply').on('click', function(){
          var id = '<?=$this->uri->segment("3")?>';
          $.ajax({
            type:'get',
            data:{id},
            dataType:'json',
            cache:false,
            async:true,
            url:base_url+'lowongan/apply_lamaran',
            beforeSend:function(data){
              $('#btnApply').attr("disabled",true)
            },
            success:function(data){
              if (data.status == 'success') {
                $('#btnApply').addClass("d-none")
                $('#btnCancel').removeClass("d-none")
              }
              Swal.fire(data.message, data.sub_message, data.status)
            },
            complete:function(data){
              $('#btnApply').attr("disabled", false)
            },
            error:function(data){
              Swal.fire("Gagal Meng-apply Lamaran","Cek Jaringan Perangkat Anda","error")
            }
          })
        })
      $('#btnCancel').on('click', function(){
          var id = $(this).attr("recruitmentId");
          $.ajax({
            type:'post',
            data:{id},
            dataType:'json',
            cache:false,
            async:false,
            url:base_url+'lowongan/cancelLamaran',
            success:function(data){
            if (data.status == 'success') {
                $('#btnCancel').addClass("d-none")
                $('#btnApply').removeClass("d-none")
              }
              Swal.fire(data.message, data.sub_message, data.status)
            },
            error:function(data){
              Swal.fire("Gagal membatalkan pengajuan lamaran","Cek Jaringan Perangkat Anda","error")
            }
          })
        })

      })
      function getDataPelamar() {
        var id = '<?=$this->uri->segment("3")?>';
        var inputSearch = $('#inputSearch').val();
        $.ajax({
          type:'get',
          data:{id, inputSearch},
          dataType:'json',
          cache:true,
          async:true,
          url:base_url+'lowongan/getDataPelamar',
          success:function(data){
            if (data.status == 'success') {
              $('#getDataPelamar').html(data.html)
            }else{
              $('#modalPelamar').modal("hide")
              $('#getDataPelamar').html("")
              Swal.fire(data.message, data.sub_message, data.status)
            }
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
    </script>
  </body>
</html>
