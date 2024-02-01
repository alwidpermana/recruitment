<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"color": "light-red","placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
    
  </head>

  <body>
    <div id="root">
      <?php $this->load->view("_partial/sidebar");?>
      <style type="text/css">
        th.dt-center, td.dt-center { text-align: center; }
        th.dt-head-center{text-align: center;}
        thead, th {text-align: center;}
        tbody, td {text-align: center;}
      </style>
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
                    <a href="<?=base_url()?>pelamar/add" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                      <i data-acorn-icon="plus"></i>
                      <span>Add New</span>
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
                  <table id="pelamarTabel" class="data-table nowrap hover">
                    <thead>
                      <tr>
                        <th class="text-muted text-small text-uppercase">No</th>
                        <th class="empty">&nbsp;</th>
                        <th class="text-muted text-small text-uppercase">Foto</th>
                        <th class="text-muted text-small text-uppercase ">Nama Lengkap</th>
                        <th class="text-muted text-small text-uppercase w-100">No HP</th>
                        <th class="text-muted text-small text-uppercase">Email</th>
                        <th class="text-muted text-small text-uppercase w-100">Tempat Lahir</th>
                        <th class="text-muted text-small text-uppercase">Tanggal Lahir</th>
                        <th class="text-muted text-small text-uppercase">Jenis Kelamin</th>
                        <th class="text-muted text-small text-uppercase">Status Pernikahan</th>
                        <th class="text-muted text-small text-uppercase">Jumlah Anak</th>
                        <th class="text-muted text-small text-uppercase">Golongan Darah</th>
                        <th class="text-muted text-small text-uppercase">Agama</th>
                        <th class="text-muted text-small text-uppercase">No KTP</th>
                        <th class="text-muted text-small text-uppercase">Kode POS</th>
                        <th class="text-muted text-small text-uppercase">Alamat KTP</th>
                        <th class="text-muted text-small text-uppercase">Alamat Domisili</th>
                        <th class="text-muted text-small text-uppercase">CV</th>
                        <th class="text-muted text-small text-uppercase">Ijazah</th>
                        <th class="text-muted text-small text-uppercase">Surat Lamaran</th>
                        <th class="text-muted text-small text-uppercase">SKCK</th>
                        <th class="text-muted text-small text-uppercase">KTP</th>
                        <th class="text-muted text-small text-uppercase">Surat Keterangan Sehat</th>
                        <th class="text-muted text-small text-uppercase">Surat Ijin Orang Tua/Suami/Istri</th>
                        <th class="text-muted text-small text-uppercase">Kartu Keluarga</th>
                        <th class="text-muted text-small text-uppercase">Sertifikat Vaksin</th>
                        <th class="text-muted text-small text-uppercase">Surat Bebas Narkoba</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- Table End -->
              </div>
              <!-- Content End -->
              <!-- Content End -->
            </div>
          </div>
        </div>
      </main>
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- <script src="<?=base_url()?>assets/js/cs/datatable.extend.js"></script> -->

      <!-- <script src="<?=base_url()?>assets/js/plugins/datatable.editableboxed.js"></script> -->
      <!-- <script src="<?=base_url()?>assets/js/plugins/datatable.editablerows.js"></script> -->
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script type="text/javascript">
      $(document).ready(function(){
        var tableData =  $('#pelamarTabel').DataTable({
          "pageLength": 10,
          "serverSide": true,
          sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>',
          "order": [[0, "asc"]],
          "ajax": {
              url: base_url + 'pelamar/getDataPelamar',
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
          order: [[3, 'asc']],
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
      })
    </script>
  </body>
</html>
