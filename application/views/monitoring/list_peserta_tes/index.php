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
                        <div class="col-lg-2 col-md-2 col-sm-6 col-12">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel" id="filTahap" name="filTahap">
                              <option value="1">Tahap 1</option>
                              <option value="2">Tahap 2</option>
                            </select>
                            <span>Tahap</span>
                          </label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-12">
                          <div class="form-floating mb-2">
                            <input type="text" class="date-picker form-control datePickerFloatingLabel" placeholder="mm/dd/yyyy" id="filTgl" value="<?=date("m/d/Y")?>" />
                            <label>Tanggal Tes</label>
                          </div> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel" id="filNoRekaman" name="filNoRekaman">
                              <option value="Pilih Tahap atau Tanggal Terlebih Dahulu">Pilih Tahap atau Tanggal Terlebih Dahulu</option>
                            </select>
                            <span>No Rekaman Tes</span>
                          </label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-12">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filType" name="filType">
                              <option value="ALL">ALL</option>
                              <option value="Pelamar Baru">Pelamar Baru</option>
                              <option value="Ex-KPS">Ex-KPS</option>
                            </select>
                            <span>Type</span>
                          </label>
                        </div>
                        <div class="col-ld-2 col-md-2 col-sm-6 col-12 table-responsive">
                          <div id="tabelTotal"></div>
                        </div>
                      </div>
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
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script type="text/javascript">
      $(document).ready(function(){
        getNoRecruitment();
        $('#filTgl').on('change', function(){
          getNoRecruitment(1);
        })
        $('#filTahap').on('change', function(){
          getNoRecruitment(1);
        })
        $('#filNoRekaman').on('change', function(){
          getNoRecruitment(2);
        })
        $('#paging').on('click','.paging', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        });
        $('.filter').on('change', function(){
            var filTgl = $('#filTgl').val();
            var filTahap = $('#filTahap').val();
            var filNoRekaman = $('#filNoRekaman').val();
            paging(0, filNoRekaman, filTgl, filTahap);
            // getTotal();
        })
        $('#search').submit(function(e){
          e.preventDefault();
          var filTgl = $('#filTgl').val();
          var filTahap = $('#filTahap').val();
          var filNoRekaman = $('#filNoRekaman').val();
          paging(0, filNoRekaman, filTgl, filTahap);
        })
        $('#filSearch').on("keyup", function(){
          var filTgl = $('#filTgl').val();
          var filTahap = $('#filTahap').val();
          var filNoRekaman = $('#filNoRekaman').val();
          paging(0, filNoRekaman, filTgl, filTahap);
        })
        $('#paging').on('click','.btnStep', function(){
          var offset = $(this).attr("offset");
          var filTgl = $('#filTgl').val();
          var filTahap = $('#filTahap').val();
          var filNoRekaman = $('#filNoRekaman').val();
          paging(offset, filNoRekaman, filTgl, filTahap);
          $('#inputOffset').val(offset)
        })
        $('.selectLimit').on('change', function(){
          var limit = $(this).attr("data")
          $('#filLimit').val(limit);
        })
      })
      function getNoRecruitment(as) {
        var filTgl = $('#filTgl').val();
        var filTahap = $('#filTahap').val();
        var filNoRekaman = $('#filNoRekaman').val();
        $.ajax({
          type:'get',
          data:{filTgl, filTahap, filNoRekaman, as},
          cache:false,
          async:true,
          url:base_url+'monitoring/getNoTesByBulanTahun',
          dataType:'json',
          success:function(data){
            $('#filNoRekaman').html(data.html)
            paging(0, data.first, filTgl, filTahap)
          },
          error:function(data){
            $('#filNoRekaman').html("")
          }
        })
      }

      function paging(offset, filNoRekaman, filTgl, filTahap) {
        var filType = $('#filType').val();
        var limit = $('#filLimit').val();
        var filSearch = $('#filSearch').val();
        $.ajax({
          type:'get',
          data:{filSearch, filNoRekaman, filTgl, filTahap, filType},
          url:base_url+'monitoring/dataListPeserta',
          cache:true,
          async:true,
          success:function(data){
            $('#getTabel').html(data)
            dataTotal(filNoRekaman, filSearch, filType)
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function dataTotal(noRekaman, search, filType) {
        $.ajax({
          type:'get',
          data:{noRekaman, search, filType},
          dataType:'json',
          cache:false,
          async:true,
          url:base_url+'/monitoring/dataTotalListPersertaByNoRekaman',
          success:function(data){
            $('#tabelTotal').html(data);
          },
          error:function(data){
            $('#tabelTotal').html("")
          }
        })
      }
    </script>
  </body>
</html>
