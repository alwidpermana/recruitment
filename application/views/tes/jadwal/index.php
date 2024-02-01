<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "vertical","navcolor": "default","layout": "fluid","radius": "rounded", "color": "light-red"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
    <style>
      .listTgl{
        padding-left: -10px !important;
      }
    </style>
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

                  <!-- Top Buttons Start -->
                  <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <!-- Add New Button Start -->
                    <a href="javascript:;" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" id="btnTambah">
                      <i data-acorn -icon="plus"></i>
                      <span>Tambah Jadwal Tes</span>
                    </a>
                    <!-- Add New Button End -->
                  </div>
                  <!-- Top Buttons End -->
                </div>
              </div>
              <!-- Title End -->

              <!-- Content Start -->
              <div class="data-table-rows slim">
                <!-- Controls Start -->
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
                          <a class="dropdown-item filLimit active" href="javascript:;" data="10">10 Items</a>
                          <a class="dropdown-item filLimit" href="javascript:;" data="15">15 Items</a>
                          <a class="dropdown-item filLimit" href="javascript:;" data="20">20 Items</a>
                        </div>
                      </div>
                      <!-- Length End -->
                    </div>
                  </div>
                </div>
                <!-- Controls End -->

                <!-- Table Start -->
                <div class="data-table-responsive-wrapper">
                  <table id="jadwalTabel" class="data-table nowrap hover text-center">
                    <thead>
                      <tr>
                        <th class="empty">&nbsp;</th>
                        <th class="text-muted text-small text-uppercase">No</th>
                        <th class="text-muted text-small text-uppercase">Tahap</th>
                        <th class="text-muted text-small text-uppercase ">Tanggal</th>
                        <th class="text-muted text-small text-uppercase">No Rekaman Tes</th>
                        <th class="text-muted text-small text-uppercase">Jenis</th>
                        <th class="text-muted text-small text-uppercase">Tanggal Tes</th>
                        <th class="text-muted text-small text-uppercase">Tempat Tes</th>
                        <th class="text-muted text-small text-uppercase">Pilih Pelamar</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- Table End -->
              </div>
              <div id="cardPelamar" class="d-none">
                <hr>
                <div class="row mt-5">
                  <div class="col-md-12 text-center">
                    <center>
                      <table border="0" class="text-center">
                        <tr>
                          <th colspan="3">
                            <span id="showNoRecruitment"></span>
                          </th>
                        </tr>
                        <tr>
                          <td style="border-right: 1px solid thin black; width: 50%;"><span id="showTahap"></span></td>
                          <td><span id="showJenis"></span></td>
                        </tr>
                      </table>
                    </center>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <div class="card-title">List Pelamar</div>
                      </div>
                      <div class="card-body">
                        <input type="hidden" id="pelamarJenis">
                        <input type="hidden" id="pelamarTahap">
                        <input type="hidden" id="tesId">  
                        <div class="row">
                          <div class="col-12">
                            <input type="text" id="searchPelamar" class="form-control" placeholder="Cari Pelamar">
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="data-table-responsive-wrapper table-responsive">
                              <table id="pelamarTabel" class="data-table nowrap hover">
                                <thead class="text-center">
                                  <tr>
                                    <th class="text-muted text-small text-uppercase">NIP</th>
                                    <th class="text-muted text-small text-uppercase ">Nama</th>
                                    <th class="text-muted text-small text-uppercase">Jenis Kelamin</th>
                                    <th class="text-muted text-small text-uppercase">Sub</th>
                                    <th class="text-muted text-small text-uppercase">Type</th>
                                    <th class="empty">&nbsp;</th>
                                  </tr>
                                </thead>
                              </table>    
                            </div>
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
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <div class="card-title">List Peserta Tes</div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <input type="text" id="searchPelamar2" class="form-control" placeholder="Cari Pelamar">
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-12">
                            <table id="pesertaTabel" class="data-table nowrap hover">
                              <thead class="text-center">
                                <tr>
                                  <th class="empty">&nbsp;</th>
                                  <th class="text-muted text-small text-uppercase">NIP</th>
                                  <th class="text-muted text-small text-uppercase ">Nama</th>
                                  <th class="text-muted text-small text-uppercase">Jenis Kelamin</th>
                                  <th class="text-muted text-small text-uppercase">Sub</th>
                                  <th class="text-muted text-small text-uppercase">Type</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <div
        class="modal fade"
        id="modal-form"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        role="dialog"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="formSave">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="inputId" name="inputId">
                <div class="row">
                  <div class="col-12">
                    <div class="form-floating mb-2 w-100">
                      <select class="select2FloatingLabel" id="inputTahap" name="inputTahap">
                        <option value="1">1</option>
                        <option value="2">2</option>
                      </select>
                      <label>Tahap</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-floating mb-2 w-100">
                      <input type="text" class="form-control" placeholder="No Rekaman" name="inputNoRekaman" id="inputNoRekaman" readonly />
                      <label>No Rekaman</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-floating mb-2 w-100">
                      <select class="select2FloatingLabel" id="inputJenis" name="inputJenis">
                        <option value="Operator">Operator</option>
                        <option value="Non Operator">Non Operator</option>
                      </select>
                      <label>Jenis</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-floating mb-2 w-100">
                      <select class="select2FloatingLabel" id="inputPlant" name="inputPlant">
                        <?php foreach ($plant as $pt): ?>
                          <option value="<?=$pt->plant?>"><?=$pt->plant.' '.$pt->tempat?></option>
                        <?php endforeach ?>
                      </select>
                      <label>Tempat Tes</label>
                    </div>
                  </div>
                </div>
                <div class="row operator">
                  <div class="col-12">
                    <div class="form-floating mb-2">
                      <input type="text" class="date-picker form-control datePickerFloatingLabel" placeholder="Date" name="inputTglTes" id="inputTglTes" />
                      <label>Tanggal Tes</label>
                    </div>
                  </div>
                </div>
                <div class="row nonOperator d-none">
                  <div class="col-12">
                    <div class="form-floating mb-2">
                      <input type="text" class="date-picker form-control datePickerFloatingLabel" placeholder="Date" name="inputTglTes1" id="inputTglTes1" />
                      <label>Tanggal Tes H 1</label>
                    </div>
                  </div>
                </div>
                <div class="row nonOperator d-none">
                  <div class="col-12">
                    <div class="form-floating mb-2">
                      <input type="text" class="date-picker form-control datePickerFloatingLabel" placeholder="Date" name="inputTglTes2" id="inputTglTes2" />
                      <label>Tanggal Tes H 2</label>
                    </div>
                  </div>
                </div>
                <div class="row nonOperator d-none">
                  <div class="col-12">
                    <div class="form-floating mb-2">
                      <input type="text" class="date-picker form-control datePickerFloatingLabel" placeholder="Date" name="inputTglTes3" id="inputTglTes3"/>
                      <label>Tanggal Tes H 3</label>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
        setTglTahap();
        var tableData =  $('#jadwalTabel').DataTable({
          "pageLength": 10,
          "serverSide": true,
          sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>',
          "order": [[0, "asc"]],
          "ajax": {
              url: base_url + 'tes/getDataJadwal',
              type: 'POST',
              "data": function(d){
                d.inputSearch = $('#inputSearch').val();
              }
          },
          responsive: false,
          language: {
            paginate: {
              previous: '<i class="cs-chevron-left"></i>',
              next: '<i class="cs-chevron-right"></i>',
            },
          },
          order: [[3, 'desc']],
          "columnDefs": [ {
            "targets": 0,
            "orderable": false
          } ]
        }); 
        $('#inputSearch').on('keyup', function(){
          tableData.search( this.value ).draw();
        })
        $('.filLimit').on('click', function(){
          var jml = parseInt($(this).attr("data"));
          tableData.page.len( jml ).draw();
        })
        $('#btnTambah').on('click', function(){
          $('#modal-form').modal("show")
          getNoTes();
          $('#inputId').val("");
        })
        $('#inputTahap').on('change', function(){
          setTglTahap();
        })
        $('#formSave').submit(function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            dataType:'json',
            data:new FormData(this), //this is formData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            url:base_url+'tes/saveJadwal',
            beforeSend:function(data){
              $('#btnSave').attr("disabled", true)
            },
            success:function(data){
              if (data.status == 'success') {
               tableData.ajax.reload();
               $('#modal-form').modal("hide")
               $('#inputTglTes').val("")
               $('#inputTglTes1').val("");
               $('#inputTglTes2').val("");
               $('#inputTglTes3').val("");
              }
              Swal.fire(data.message, data.sub_message, data.status);
            },
            complete:function(data){
              $('#btnSave').attr("disabled",false)
            },
            error:function(data){
              Swal.fire("Gagal Menyimpan Data","Mohon Cek Jaringan Perangkat Anda","error")
            }
          })
        })
        $('#jadwalTabel').on('click','.editData', function(){
          var id = $(this).attr("data");
          var norek = $(this).attr("norek")
          var tahap = $(this).attr("tahap")
          var jenis = $(this).attr("jenis")
          var tglTes1 = $(this).attr("tglTes1");
          var tglTes2 = $(this).attr("tglTes2");
          var tglTes3 = $(this).attr("tglTes3");
          $('#modal-form').modal("show")
          $('#inputId').val(id)
          $('#inputNoRekaman').val(norek)
          $("select#inputTahap option[value='" + tahap + "']").prop("selected","selected");
          $("select#inputTahap").trigger("change");
          $("select#inputJenis option[value='" + jenis + "']").prop("selected","selected");
          $("select#inputJenis").trigger("change");
          if (tahap == 1) {
            $('#inputTglTes').val(tglTes1)
          }else{
            $('#inputTglTes1').val(tglTes1)
            $('#inputTglTes2').val(tglTes2)
            $('#inputTglTes3').val(tglTes3);
          }
        })
        $('#jadwalTabel').on('click','.hapusData', function(){
          var id = $(this).attr("data");
          var tahap = $(this).attr("tahap")
          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "menghapus data jadwal",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#eb5858',
              cancelButtonColor: '#ff9773',
              confirmButtonText: 'Ya, Hapus Data Ini!'
          }).then((result) => {
              if (result.isConfirmed) {
              $.ajax({
                  type: "POST",
                  data: {id, tahap},
                  dataType:"JSON",
                  url: base_url+'tes/hapusData',
                  success:function(data){
                    if (data.status == 'success') {
                      tableData.ajax.reload();
                    }
                    Swal.fire(data.message,data.sub_message,data.status);
                      
                  },
                  error:function(data){
                      Swal.fire("Gagal Menghapus Data","Mohon Cek Jaringan Perangkat Anda","error")
                  }
              })
              }
          })
        })
        $('#jadwalTabel').on('click', '.pilihPelamar', function(){
          var id = $(this).attr("data")
          var tahap = $(this).attr("tahap")
          var jenis = $(this).attr("jenis")
          var norek = $(this).attr("norek");
          $('#cardPelamar').removeClass("d-none");
          var pelamarJenis = $('#pelamarJenis').val(jenis)
          var pelamarTahap = $('#pelamarTahap').val(tahap)
          var tesId = $('#tesId').val(id);
          $('#showNoRecruitment').html(norek)
          $('#showTahap').html('Tahap '+tahap)
          $('#showJenis').html(jenis)
          tablePeserta.ajax.reload();
        })
        
         var tablePelamar =  $('#pelamarTabel').DataTable({
          "pageLength": 10,
          "serverSide": true,
          sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>',
          "ajax": {
              url: base_url + 'tes/getDataPelamar',
              type: 'POST',
              "data": function(d){
                d.inputSearch = $('#searchPelamar').val();
              }
          },
          responsive: false,
          language: {
            paginate: {
              previous: '<i class="cs-chevron-left"></i>',
              next: '<i class="cs-chevron-right"></i>',
            },
          },
          order: [[1, 'asc']],
          "columnDefs": [ {
            "targets": 0,
            "orderable": false
          } ]
        }); 
        $('#searchPelamar').on('keyup', function(){
          tablePelamar.search( this.value ).draw();
        }) 
        $('#pelamarTabel').on('click','.addPelamar', function(){
          var lamaran = $(this).attr("lamaran");
          var tesId = $('#tesId').val();
          $.ajax({
            type:'post',
            data:{lamaran,tesId},
            dataType:'json',
            cache:false,
            async:true,
            url:base_url+'tes/addPelamar',
            success:function(data){
              Swal.fire({
                position: 'top-end',
                toast : true,
                icon: data.status,
                title: data.message,
                showConfirmButton: false,
                timer: 3000
              })
              if (data.status == 'success') {
                tablePeserta.ajax.reload();
                tablePelamar.ajax.reload();
              }
            },
            error:function(data){
              Swal.fire("Gagal Menambah Peserta Tes",'Cek Jaringan Perangkat Anda',"error")
            }
          })
        })
        $('#pesertaTabel').on('click','.deletePelamar', function(){
          var lamaran = $(this).attr("lamaran");
          $.ajax({
            type:'post',
            data:{lamaran},
            dataType:'json',
            cache:false,
            async:true,
            url:base_url+'tes/deletePeserta',
            success:function(data){
               Swal.fire({
                position: 'top-end',
                toast : true,
                icon: data.status,
                title: data.message,
                showConfirmButton: false,
                timer: 3000
              })
              if (data.status == 'success') {
                tablePeserta.ajax.reload();
                tablePelamar.ajax.reload();
              }
            },
            error:function(data){
              Swal.fire("Gagal Menghapus Peserta Tes","Cek Jaringan Perangkat Anda","error")
            }
          })
        })

        var tablePeserta =  $('#pesertaTabel').DataTable({
          "pageLength": 10,
          "serverSide": true,
          sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>',
          "order": [[0, "asc"]],
          "ajax": {
              url: base_url + 'tes/getDataPesertaTes',
              type: 'POST',
              "data": function(d){
                d.tesId = $('#tesId').val();
                d.inputSearch = $('#searchPelamar2').val();
              }
          },
          responsive: true,
          language: {
            paginate: {
              previous: '<i class="cs-chevron-left"></i>',
              next: '<i class="cs-chevron-right"></i>',
            },
          },
          order: [[1, 'asc']],
          "columnDefs": [ {
            "targets": 0,
            "orderable": false
          } ]
        }); 
        $('#searchPelamar2').on('keyup', function(){
          tablePeserta.search( this.value ).draw();
        }) 
      })

      function setTglTahap() {
        var inputTahap = $('#inputTahap').val();
        if (inputTahap == '1') {
          $('.operator').removeClass("d-none")
          $('.nonOperator').addClass("d-none")
        }else{
          $('.operator').addClass("d-none")
          $('.nonOperator').removeClass("d-none")
        }
      }
      function getNoTes() {
        var inputPlant = $('#inputPlant').val();
        $.ajax({
          type:'get',
          data:{inputPlant},
          dataType:'json',
          cache:false,
          async:true,
          url:base_url+'tes/getNoTes',
          success:function(data){
            $('#inputNoRekaman').val(data)
          },
          error:function(data){
            $('#inputNoRekaman').val("");
          }
        })
      }
    </script>
  </body>
</html>
