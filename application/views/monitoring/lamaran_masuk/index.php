<?php
  $bulan = [1=>'January', 2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'];
  $tanggal = date("Y-m-d");
  $i = 1;
  $kurang = 10;
  $tahun = [];
  for ($i=0; $i <$kurang ; $i++) { 
    $penguranTahun = date('Y', strtotime('-'.$i.' year', strtotime( $tanggal )));
    array_push($tahun, $penguranTahun); 
  }
  date_default_timezone_set('Asia/Jakarta');
  $jamDefault = date('H:i');
?>
<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded", "color": "light-red"}}' data-scrollspy="true">
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
                <div class="col-md-6">
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel" id="filTahun" name="filTahun">
                                   <?php foreach ($tahun as $value): ?>
                                      <option value="<?=$value?>"><?=$value?></option>
                                    <?php endforeach ?>
                                </select>
                                <span>Tahun</span>
                              </label>
                            </div>  
                          </div>
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel filter" id="filBulan" name="filBulan">
                                    <option value="ALL">ALL</option>
                                  <?php foreach ($bulan as $angka => $bulan): ?>
                                    <option value="<?=$angka?>"><?=$bulan?></option>
                                  <?php endforeach ?>
                                </select>
                                <span>Bulan</span>
                              </label>
                            </div>  
                          </div>
                          <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel filter" id="filNoRecruitment" name="filNoRecruitment">
                                    <option value="ALL">ALL</option>
                                </select>
                                <span>No Recruitment</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                          <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel filter" id="filJenis" name="filJenis">
                                  <option value="ALL">ALL</option>
                                  <option value="Operator">Operator</option>
                                  <option value="Non Operator">Non Operator</option>
                                </select>
                                <span>Jenis</span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel filter" id="filSub" name="filSub">
                                  <option value="ALL">ALL</option>
                                  <option value="Eksternal">Eksternal</option>
                                  <option value="Umum">Umum</option>
                                  <option value="Referensi">Referensi</option>
                                </select>
                                <span>Sub</span>
                              </label>
                            </div>  
                          </div>
                          <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel filter" id="filType" name="filType">
                                  <option value="ALL">ALL</option>
                                  <option value="Pelamar Baru">Pelamar Baru</option>
                                  <option value="Ex-KPS">Ex-KPS</option>
                                </select>
                                <span>Sub</span>
                              </label>
                            </div> 
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Pria</th>
                          <th>Wanita</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody id="getTotal">
                        
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                <!-- Help Text End -->
              </div>
              <!-- Content Start -->
              <div class="row mt-5">
                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-6 col-xxl-4 mb-1">
                  <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control" placeholder="Cari Data" value="" id="filSearch" />
                    <span class="search-magnifier-icon">
                      <i data-acorn-icon="search"></i>
                    </span>
                    <span class="search-delete-icon d-none">
                      <i data-acorn-icon="close"></i>
                    </span>
                  </div>
                </div>
                <!-- Search End -->

                <div class="col-sm-12 col-md-7 col-lg-6 col-xxl-8 text-end mb-1">
                  <div class="d-inline-block">
                    <!-- Length Start -->
                    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows" data-childSelector="span">
                      <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                        <span
                          class="btn btn-foreground-alternate dropdown-toggle"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          data-bs-delay="0"
                          title="Item Count"
                        >
                          10 Items
                        </span>
                      </button>
                      <div class="dropdown-menu shadow dropdown-menu-end">
                        <a class="dropdown-item selectLimit active" href="javascript:;" data="10">10 Items</a>
                        <a class="dropdown-item selectLimit" href="javascript:;" data="15">15 Items</a>
                        <a class="dropdown-item selectLimit" href="javascript:;" data="20">20 Items</a>
                      </div>
                      <input type="hidden" id="filLimit" value="10">
                    </div>
                    <!-- Length End -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card" id="cardTabel">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <div id="getTabel"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <div class="d-flex justify-content-center">
                    <div id="paging"></div>
                  </div>
                </div>
              </div>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <div class="modal fade" id="lExample" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script>
      $(document).ready(function(){
        getNoRecruitment();
        paging(0)
        getTotal();
        $('#paging').on('click','.paging', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        });
        $('.filter').on('change', function(){
            paging(0);
            getTotal();
        })
        $('#filTahun').on('change', function(){
          getNoRecruitment();
          $("select#filNoRecruitment option[value='']").prop("selected","selected");
          $("select#filNoRecruitment").trigger("change");
        })
        $('#search').submit(function(e){
          e.preventDefault();
          paging(0);
        })
        $('#filSearch').on("keyup", function(){
          paging(0)
        })
        $('#paging').on('click','.btnStep', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        })
        $('.selectLimit').on('change', function(){
          var limit = $(this).attr("data")
          $('#filLimit').val(limit);
        })
      })
      function paging(offset) {
        var filTahun = $('#filTahun').val()
        var filBulan = $('#filBulan').val()
        var filNoRecruitment = $('#filNoRecruitment').val()
        var filJenis = $('#filJenis').val()
        var filSub = $('#filSub').val()
        var filType = $('#filType').val()
        var filSearch = $('#filSearch').val();
        var limit = $('#filLimit').val();
        $.ajax({
          type:'get',
          data:{filTahun, filBulan, filNoRecruitment, filJenis, filSub, filType, limit,offset, filSearch},
          cache:true,
          async:true,
          url:base_url+'monitoring/getPagingLamaranMasuk',
          beforeSend:function(data){
            $('#cardTabel').addClass("overlay-spinner");
          },
          success:function(data){
            $('#paging').html(data)
            getTabel(offset, limit,filSearch, filTahun, filBulan, filNoRecruitment, filJenis, filSub, filType)
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function getTabel(offset, limit,filSearch, filTahun, filBulan, filNoRecruitment, filJenis, filSub, filType) {
        $.ajax({
          type:'get',
          data:{offset, limit,filSearch, filTahun, filBulan, filNoRecruitment, filJenis, filSub, filType},
          cache:true,
          false:true,
          url:base_url+'monitoring/getTabelLamaranMasuk',
          success:function(data){
            $('#getTabel').html(data)
          },
          complete:function(data){
            $('#cardTabel').removeClass("overlay-spinner");
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function getNoRecruitment() {
        var filBulan = $('#filBulan').val();
        var filTahun = $('#filTahun').val();
        paging(0)
        $.ajax({
          type:'get',
          data:{filBulan, filTahun},
          cache:false,
          async:true,
          url:base_url+'monitoring/getNoRecruitmentByBulanTahun',
          dataType:'json',
          success:function(data){
            $('#filNoRecruitment').html(data)
          },
          error:function(data){
            $('#filNoRecruitment').html("")
          }
        })
      }
      function getTotal() {
        var filBulan = $('#filBulan').val();
        var filTahun = $('#filTahun').val();
        var filNoRecruitment = $('#filNoRecruitment').val()
        $.ajax({
          type:'get',
          data:{filBulan, filTahun, filNoRecruitment},
          cache:false,
          async:true,
          url:base_url+'monitoring/getTotal',
          dataType:'json',
          success:function(data){
            $('#getTotal').html(data)
          },
          error:function(data){
            $('#getTotal').html("")
          }
        })
      }
    </script>
  </body>
</html>
