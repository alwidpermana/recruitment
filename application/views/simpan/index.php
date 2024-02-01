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
                    <div class=" d-inline-block ms-1" data-childSelector="span">
                      <button class="btn btn-outline-primary mb-1 active-scale-down w-100" type="button" id="btnAdd">Tambah Data Lamaran</button>
                    </div>
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
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="submit">
              <div class="modal-body">
                <div class="form-floating mb-2 w-100">
                  <select class="select2FloatingLabel" id="inputJabatan" name="inputJabatan">
                    <?php foreach ($jabatan as $jb): ?>
                      <option value="<?=$jb->nama_jabatan?>"><?=$jb->nama_jabatan?></option>
                    <?php endforeach ?>
                  </select>
                  <label>Jabatan</label>
                </div>
                <div class="form-floating mb-2 w-100">
                  <select class="select2FloatingLabel" id="inputDepartemen" name="inputDepartemen">
                    <?php foreach ($departemen as $dp): ?>
                      <option value="<?=$dp->nama_departemen?>"><?=$dp->nama_departemen?></option>
                    <?php endforeach ?>
                  </select>
                  <label>Departemen</label>
                </div>
                <div class="form-floating mb-2 w-100">
                  <select class="select2FloatingLabel" id="inputPlant" name="inputPlant">
                    <?php foreach ($plant as $pt): ?>
                      <option value="<?=$pt->plant.' - '.$pt->tempat?>"><?=$pt->plant.' - '.$pt->tempat?></option>
                    <?php endforeach ?>
                  </select>
                  <label>Plant</label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
              </div>    
            </form>
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
        $('#btnAdd').on('click', function(){
          $('#modal-form').modal("show")
        })
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
        $('#submit').submit(function(e){
          e.preventDefault();
           $.ajax({
            url:base_url+'simpan/save',
            type:"post",
            dataType:'json',
            data:new FormData(this), //this is formData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend:function(data){
              $('#btnAdd').attr("disabled",true);
            },
            success: function(data){
              if (data.status == 'success') {
                $('#modal-form').modal("hide");
                paging(0)
              }
              Swal.fire(data.message,data.sub_message,data.status)
            },
            complete:function(data){
              $('#btnAdd').attr("disabled",false);
            },
            error: function(data){
              Swal.fire("Gagal Menyimpan Data","Cek Jaringan Perangkat Anda","error")
            }
          });
        })
        $('#getData').on('click','.hapus', function(){
          var id = $(this).attr("data");
          $.ajax({
            type:'post',
            data:{id},
            dataType:'json',
            cache:false,
            async:true,
            url:base_url+'simpan/hapus',
            success:function(data){
              Swal.fire("Berhasil Menghapus Lamaran","","success");
              paging(0)
            },
            error:function(data){
              Swal.fire("Gagal Menghapus Lamaran","Cek Jaringan Perangkat Anda","error")
            }
          })
        })
      })
      function paging(offset) {
          var limit = 10;
          var search = $('#filSearch').val();
          $.ajax({
            type:'get',
            data:{search, limit, offset},
            url:base_url+'simpan/getPaging',
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
              url:base_url+'simpan/getTabel',
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
