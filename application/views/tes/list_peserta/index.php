<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "vertical","navcolor": "default","layout": "fluid","radius": "rounded", "color": "light-red"}}' data-scrollspy="true">
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
                <div class="col-md-4">
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tahap</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTahap" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tanggal</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTanggal" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">No Rekaman Tes</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              id="inputNoRek"
                              readonly

                            />
                            <button class="btn btn-outline-primary btn-sm btn-icon" type="button" data-bs-toggle="modal" data-bs-target="#modal-list"><i data-acorn-icon="search"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tanggal Tes</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTglTes" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Jenis</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputJenis" readonly />
                        </div>
                      </div>
                      <div class="row">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tempat</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTempat" readonly />
                        </div>
                      </div>
                      <input type="hidden" id="inputId">
                    </div>
                  </div>  
                </div>
                <div class="col-md-8">
                  <section class="scroll-section" id="vertical">
                    <div class="row g-2 d-flex justify-content-end ">
                      <div class="col-auto ">
                        <div class="card hover-border-primary sw-19 sh-30">
                          <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center">
                              <i data-acorn-icon="user" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-8 d-flex align-items-center lh-1-25">Jumlah Peserta</div>
                            <div class="display-5 text-primary">25</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="card hover-border-primary sw-19 sh-30">
                          <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center">
                              <i data-acorn-icon="check" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-8 d-flex align-items-center lh-1-25">Lulus</div>
                            <div class="display-5 text-primary">25</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="card hover-border-primary sw-19 sh-30">
                          <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center">
                              <i data-acorn-icon="close" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-8 d-flex align-items-center lh-1-25">Tidak Lulus</div>
                            <div class="display-5 text-primary">25</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <!-- Help Text End -->
              </div>
              <div class="data-table-rows slim">
                <!-- Controls Start -->
                <div class="row">
                  <!-- Search Start -->
                  <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                    <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                      <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" id="searchPeserta" />
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
                  <table id="listPeserta" class="data-table nowrap hover text-center">
                    <thead>
                      <tr>
                        <th class="text-muted text-small text-uppercase" rowspan="2">No</th>
                        <th class="text-muted text-small text-uppercase" rowspan="2">View</th>
                        <th class="text-muted text-small text-uppercase" colspan="6">Identitas</th>
                        <th class="text-muted text-small text-uppercase" colspan="3">Klasifikasi</th>
                        <th class="text-muted text-small text-uppercase" rowspan="2">Hasil Tes</th>
                      </tr>
                      <tr>
                        <th class="text-muted text-small text-uppercase">NIP</th>
                        <th class="text-muted text-small text-uppercase">Nama Lengkap</th>
                        <th class="text-muted text-small text-uppercase">No KTP</th>
                        <th class="text-muted text-small text-uppercase">Alamat KTP</th>
                        <th class="text-muted text-small text-uppercase">Tanggal Lahir</th>
                        <th class="text-muted text-small text-uppercase">Jenis Kelamin</th>
                        <th class="text-muted text-small text-uppercase">Jenis</th>
                        <th class="text-muted text-small text-uppercase">Sub</th>
                        <th class="text-muted text-small text-uppercase">Type</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- Table End -->
              </div>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <div class="modal fade" id="modal-list" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">List Rekaman Tes</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                  <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100">
                    <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" id="searchJadwal" />
                    <span class="search-magnifier-icon">
                      <i data-acorn-icon="search"></i>
                    </span>
                    <span class="search-delete-icon d-none">
                      <i data-acorn-icon="close"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <table id="jadwalTabel" class="data-table nowrap hover w-100 text-center">
                    <thead class="">
                      <tr>
                        <th class="empty">&nbsp;</th>
                        <th class="text-muted text-small text-uppercase ">Tanggal Input</th>
                        <th class="text-muted text-small text-uppercase">Tahap</th>
                        <th class="text-muted text-small text-uppercase">No Rekaman Tes</th>
                        <th class="text-muted text-small text-uppercase">Jenis</th>
                        <th class="text-muted text-small text-uppercase">Tanggal Tes</th>
                        <th class="text-muted text-small text-uppercase">Tempat Tes</th>
                      </tr>
                    </thead>
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
        var tabelJadwal =  $('#jadwalTabel').DataTable({
          "pageLength": 10,
          "serverSide": true,
          sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>',
          "ajax": {
              url: base_url + 'tes/getListJadwal',
              type: 'POST',
              "data": function(d){
                d.inputSearch = $('#searchJadwal').val();
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
        $('#searchJadwal').on('keyup', function(){
          tabelJadwal.search( this.value ).draw();
        }) 
        $('#jadwalTabel').on('click', '.btnPilih', function(){
          var id = $(this).attr("data")
          var tahap = $(this).attr("tahap")
          var norek = $(this).attr("norek")
          var jenis = $(this).attr("jenis")
          var tempat = $(this).attr("tempat")
          var tglTes = $(this).attr("tglTes")
          var tgl = $(this).attr("tgl")
          $('#inputId').val(id)
          $('#inputTahap').val(tahap)
          $('#inputNoRek').val(norek)
          $('#inputJenis').val(jenis)
          $('#inputTempat').val(tempat)
          $('#inputTglTes').val(tglTes)
          $('#inputTanggal').val(tgl)
          $('#modal-list').modal("hide")
        })
        var tabelPeserta =  $('#listPeserta').DataTable({
          "pageLength": 10,
          "serverSide": true,
          sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>',
          "ajax": {
              url: base_url + 'tes/getListPeserta',
              type: 'POST',
              "data": function(d){
                d.inputId = $('#inputId').val();
                d.inputSearch = $('#searchPeserta').val();
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
      })
    </script>
  </body>
</html>
