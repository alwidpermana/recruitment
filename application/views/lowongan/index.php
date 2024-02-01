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
              <div class="row mb-5">
                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-6 col-xxl-4 mb-1">
                  <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control" placeholder="Cari Posisi" value="" id="filSearch" />
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
                    <div class="dropdown-as-select d-inline-block ms-1" data-childSelector="span">
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
                        <a class="dropdown-item active" href="#">5 Items</a>
                        <a class="dropdown-item" href="#">10 Items</a>
                        <a class="dropdown-item" href="#">20 Items</a>
                      </div>
                    </div>
                    <!-- Length End -->
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Labels Start -->
                <div class="col-12 mb-5">
                  <div id="getData"></div>
                </div>
                <!-- Labels End -->
              </div>
              <div class="row">
                <div class="col-12">
                  <!-- Pagination Start -->
                  <div class="d-flex justify-content-center">
                    <!-- <nav>
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link shadow" href="#" tabindex="-1" aria-disabled="true">
                            <i data-acorn-icon="chevron-left"></i>
                          </a>
                        </li>
                        <li class="page-item active"><a class="page-link shadow" href="#">1</a></li>
                        <li class="page-item"><a class="page-link shadow" href="#">2</a></li>
                        <li class="page-item"><a class="page-link shadow" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link shadow" href="#">
                            <i data-acorn-icon="chevron-right"></i>
                          </a>
                        </li>
                      </ul>
                    </nav> -->
                    <div id="paging"></div>
                  </div>
                  <!-- Pagination End -->
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
        $('#filSearch').on("keyup", function(){
          paging(0)
        })
        $('#paging').on('click','.btnStep', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        })
      })
      function paging(offset) {
          var limit = 10;
          var search = $('#filSearch').val();
          $.ajax({
            type:'get',
            data:{search, limit, offset},
            url:base_url+'lowongan/getPagingLowongan',
            cache:false,
            async:true,
            beforeSend:function(data){
                // $('.preloader').show();
            },
            success:function(data){
                $('#paging').html(data);
                getData(offset, limit, search)
                // getInfoTabel(search, filJenis, filSanksi, filDepartemen)
            },
            error:function(data){

            }
          })
      }
      function getData(offset, limit, search) {
          $.ajax({
              type:'get',
              data:{search, limit, offset},
              cache:false,
              async:true,
              url:base_url+'lowongan/getTabelLowongan',
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
