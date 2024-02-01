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
                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                  <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" id="filSearch" />
                    <span class="search-magnifier-icon">
                      <i data-acorn-icon="search"></i>
                    </span>
                    <span class="search-delete-icon d-none">
                      <i data-acorn-icon="close"></i>
                    </span>
                  </div>
                </div>
                <!-- Search End -->
                <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                  
                  <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
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
                        <a class="dropdown-item filLimitActive active" href="javascript:;" data="10">10 Items</a>
                        <a class="dropdown-item filLimitActive" href="javascript:;" data="15">15 Items</a>
                        <a class="dropdown-item filLimitActive" href="javascript:;" data="20">20 Items</a>
                      </div>
                      <input type="hidden" id="filLimit" value="10">
                    </div>
                    <!-- Length End -->
                  </div>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-12">
                  <div class="card" id="cardTabel">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-1">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter filterRecruitment" id="filTahun" name="filTahun">
                              <?php foreach ($tahun as $key => $value): ?>
                                <option value="<?=$value?>"><?=$value?></option>
                              <?php endforeach ?>
                            </select>
                            <span>Tahun</span>
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter filterRecruitment" id="filBulan" name="filBulan">
                                <option value="All">ALL</option>
                              <?php foreach ($bulan as $bulan=>$noB): ?>
                                <option value="<?=$bulan?>"><?=$noB?></option>
                              <?php endforeach ?>
                            </select>
                            <span>Bulan</span>
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filNoRecruitment" name="filNoRecruitment">
                                <option value="All">ALL</option>
                            </select>
                            <span>No Recruitment</span>
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filSub" name="filSub">
                                <option value="All">ALL</option>
                                <option value="Internal">Internal</option>
                                <option value="Eksternal">Eksternal</option>
                                <option value="Umum">Umum</option>
                            </select>
                            <span>Sub</span>
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filType" name="filType">
                                <option value="All">ALL</option>
                                <option value="Pelamar Baru">Pelamar Baru</option>
                                <option value="Ex-KPS">Ex-KPS</option>
                            </select>
                            <span>Type</span>
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filStatus" name="filStatus">
                                <option value="All">ALL</option>
                                <option value="Tes">Tes</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Tidak Lulus">Tidak Lulus</option>
                            </select>
                            <span>Status</span>
                          </label>
                        </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-12">
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
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script type="text/javascript">
      $(document).ready(function(){
        getNoRecruitment();
        $('.filterRecruitment').on('change', function(){
          getNoRecruitment();
        })
        paging(0);
        $('#paging').on('click','.paging', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        });
        $('.filter').on('change', function(){
            paging(0)
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
        $('.filLimitActive').on('click', function(){
          var limit = $(this).attr("data")
          console.log(limit)
          $('#filLimit').val(limit);
          paging(0)
        })
      })
      function getNoRecruitment() {
        var filTahun = $('#filTahun').val();
        var filBulan = $('#filBulan').val();
        $.ajax({
          type:'get',
          data:{filTahun,filBulan},
          dataType:'json',
          cache:true,
          async:true,
          url:base_url+'/monitoring/getNoRecruitmentForFilter',
          success:function(data){
            $('#filNoRecruitment').html(data)
          },
          error:function(data){
            $('#filNoRecruitment').html("")
          }
        })
      }
      function paging(offset) {
        var filTahun = $('#filTahun').val()
        var filBulan = $('#filBulan').val()
        var filSearch = $('#filSearch').val();
        var filNoRecruitment = $('#filNoRecruitment').val();
        var filSub = $('#filSub').val();
        var filType = $('#filType').val();
        var limit = $('#filLimit').val();
        var filStatus = $('#filStatus').val();
        $.ajax({
          type:'get',
          data:{filTahun, filBulan, limit,offset, filSearch, filNoRecruitment, filSub, filType, filStatus},
          cache:true,
          async:true,
          url:base_url+'monitoring/getPagingDetailSchedule',
          success:function(data){
            $('#paging').html(data)
            getTabel(filTahun, filBulan, limit,offset, filSearch, filNoRecruitment, filSub, filType, filStatus)
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function getTabel(filTahun, filBulan, limit,offset, filSearch, filNoRecruitment, filSub, filType, filStatus) {
        $.ajax({
          type:'get',
          data:{filTahun, filBulan, limit,offset, filSearch, filNoRecruitment, filSub, filType, filStatus},
          cache:true,
          false:true,
          url:base_url+'monitoring/getDataDetailSchedule',
          beforeSend:function(data){
            $('#cardTabel').addClass("overlay-spinner");
          },
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
    </script>
  </body>
</html>
