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
              <div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-lg-2 col-md-2 col-sm-6">
                                    <label class="mb-3 top-label w-100">
                                      <select class="select2TopLabel filter" id="filTahun" name="filTahun">
                                         <?php foreach ($tahun as $value): ?>
                                            <option value="<?=$value?>"><?=$value?></option>
                                          <?php endforeach ?>
                                      </select>
                                      <span>Tahun</span>
                                    </label>
                                  </div>
                                  <div class="col-lg-2 col-md-2 col-sm-6">
                                    <label class="mb-3 top-label w-100">
                                      <select class="select2TopLabel filter" id="filStatus" name="filStatus">
                                         <option value="ALL">ALL</option>
                                          <option value="OPEN">OPEN</option>
                                          <option value="CLOSE">CLOSE</option>
                                      </select>
                                      <span>Status</span>
                                    </label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="float-end">
                                        <div class="form-group filled">
                                          <i data-acorn-icon="search"></i>
                                          <input class="form-control" placeholder="Cari No Recruitment" id="filSearch"/>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row mt-3">
                                  <div class="col-md-12 table-responsive text-center">
                                      <div id="getData"></div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="float-sm-end mt-3 mt-sm-0">
                                          <div id="paging"></div>
                                      </div>
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
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script>
      $(document).ready(function(){
          $('.select2').select2({
              'width': '100%',
          });
          paging(0)
          $('#paging').on('click','.paging', function(){
            var offset = $(this).attr("offset");
            console.log(offset)
            paging(offset)
            $('#inputOffset').val(offset)
          });
          $('.filter').on('change', function(){
              paging(0);
          })
          $('#search').submit(function(e){
            e.preventDefault();
            paging(0);
          })
          $('#paging').on('click','.btnStep', function(){
            var offset = $(this).attr("offset");
            console.log(offset)
            paging(offset)
            $('#inputOffset').val(offset)
          })
          $('#filSearch').on('keyup', function(){
            paging(0)
          })
      })

      function paging(offset) {
          var limit = 10;
          var filTahun = $('#filTahun').val();
          var filStatus = $('#filStatus').val();
          var filSearch = $('#filSearch').val();
          $.ajax({
            type:'get',
            data:{filTahun, filStatus, filSearch, limit, offset},
            url:base_url+'monitoring/getPagingRecruitment',
            cache:false,
            async:true,
            beforeSend:function(data){
                // $('.preloader').show();
            },
            success:function(data){
                $('#paging').html(data);
                getData(offset, limit, filTahun, filStatus, filSearch)
                // getInfoTabel(endOffset, limit, filSearch, filJenis, filSanksi, filDepartemen)
            },
            error:function(data){

            }
          })
      }
      function getData(offset, limit, filTahun, filStatus, filSearch) {
          $.ajax({
              type:'get',
              data:{filTahun, filStatus, filSearch, limit, offset},
              cache:false,
              async:true,
              url:base_url+'monitoring/getTabelRecruitment',
              success:function(data){
                  $('#getData').html(data)
              },
              complete:function(data){

              },
              error:function(data){
                  $('#getData').html("");
              }
          })
      }
  </script>
  </body>
</html>
