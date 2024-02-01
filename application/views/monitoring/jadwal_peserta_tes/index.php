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
              <!-- Content Start -->
              <div class="row">
                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                  <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" id="inputSearch" />
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
                          title="Tahun"
                        >
                          <?=date("Y")?>
                        </span>
                      </button>
                      <div class="dropdown-menu shadow dropdown-menu-end">
                        <?php foreach ($tahun as $value): ?>
                          <a class="dropdown-item filterTahun" href="javascript:;" data="<?=$value?>"><?=$value?></a>
                        <?php endforeach ?>
                      </div>
                      <input type="hidden" id="filTahun" value="<?=date("Y")?>">
                    </div>
                    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows" data-childSelector="span">
                      <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                        <span
                          class="btn btn-foreground-alternate dropdown-toggle"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          data-bs-delay="0"
                          title="Status"
                        >
                          Status All
                        </span>
                      </button>
                      <div class="dropdown-menu shadow dropdown-menu-end">
                        <a class="dropdown-item filterStatus active" href="javascript:;" data="">All</a>
                        <a class="dropdown-item filterStatus" href="javascript:;" data="Open">Open</a>
                        <a class="dropdown-item filterStatus" href="javascript:;" data="Close">Close</a>
                      </div>
                      <input type="hidden" id="filStatus" value="">
                    </div>
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
                <!-- Controls End -->

                <!-- Table Start -->
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
                <!-- Table End -->
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
        paging(0)
        $('#paging').on('click','.paging', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        });
        $('.filterStatus').on('click', function(){
            var status = $(this).attr("data")
            console.log(status)
            $('#filStatus').val(status);
            paging(0)
        })
        $('.filterTahun').on('click', function(){
            var tahun = $(this).attr("data")
            console.log(tahun)
            $('#filTahun').val(tahun);
            paging(0)
        })
        $('#search').submit(function(e){
          e.preventDefault();
          paging(0);
        })
        $('#inputSearch').on("keyup", function(){
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
      function paging(offset) {
        var filTahun = $('#filTahun').val()
        var filStatus = $('#filStatus').val()
        var filSearch = $('#inputSearch').val();
        var limit = $('#filLimit').val();
        $.ajax({
          type:'get',
          data:{filTahun, filStatus, limit,offset, filSearch},
          cache:true,
          async:true,
          url:base_url+'monitoring/getPagingJadwalPesertaTes',
          success:function(data){
            $('#paging').html(data)
            getTabel(filTahun, filStatus, limit,offset, filSearch)
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function getTabel(filTahun, filStatus, limit,offset, filSearch) {
        $.ajax({
          type:'get',
          data:{filTahun, filStatus, limit,offset, filSearch},
          cache:true,
          false:true,
          url:base_url+'monitoring/getDataJadwalPesertaTes',
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
