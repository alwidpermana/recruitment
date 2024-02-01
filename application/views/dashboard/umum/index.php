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
              <div class="row">
                <div class="col-12 col-xl-4 col-xxl-3 col-lg-4 col-md-4 col-sm-12">
                  <!-- Biography Start -->
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="d-flex align-items-center flex-column mt-3 mb-4">
                        <div class="d-flex align-items-center flex-column">
                          <div class="sw-15 sh-15 me-1 mb-5 d-inline-block bg-separator d-flex justify-content-center align-items-center rounded-md">
                            <img src="<?=base_url()?><?=$data->foto?>" class="img-fluid rounded-md" alt="thumb" />
                          </div>
                          <br>
                          <div class="h5 mb-0"><?=$data->nama?></div>
                          <div class="text-muted"><?=$data->no_ktp?></div>
                        </div>
                      </div>
                      <div class="nav flex-column" role="tablist">
                        <div class="nav-link px-0 border-bottom border-separator-light">
                           <i data-acorn-icon="email" class="me-2" data-acorn-size="17"></i>
                          <span class="align-middle"><?=$data->email?></span> 
                        </div>
                        <div class="nav-link px-0 border-bottom border-separator-light">
                           <i data-acorn-icon="phone" class="me-2" data-acorn-size="17"></i>
                          <span class="align-middle"><?=$data->no_hp?></span> 
                        </div>
                        <div class="nav-link px-0 border-bottom border-separator-light">
                           <i data-acorn-icon="birthday" class="me-2" data-acorn-size="17"></i>
                          <span class="align-middle"><?=date("d F Y", strtotime($data->tgl_lahir))?></span> 
                        </div>
                        <div class="nav-link px-0 border-bottom border-separator-light">
                           <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                          <span class="align-middle"><?=$nip?></span> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Biography End -->
                </div>
                <div class="col-12 col-xl-8 col-xxl-9 col-lg-8 col-md-8 col-sm-12">
                  <div class="row">
                    <div class="col-12 text-center">
                      <?php if ($data->cv == null): ?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload CV Anda Sekarang!</div>  
                      <?php elseif($data->ijazah_terakhir == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload Ijazah Terakhir Anda Sekarang!</div>
                      <?php elseif($data->surat_lamaran == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload Surat Lamaran Anda Sekarang!</div>
                      <?php elseif($data->skck == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload SKCK Anda Sekarang!</div>
                      <?php elseif($data->ktp == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload KTP Anda Sekarang!</div>
                      <?php elseif($data->surat_keterangan_sehat == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload Surat Keterangan Sehat Anda Sekarang!</div>
                      <?php elseif($data->surat_ijin == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload Surat Ijin Orangtua/Istri/Suami Anda Sekarang!</div>
                      <?php elseif($data->kartu_keluarga == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload Kartu Keluarga Anda Sekarang!</div>
                      <?php elseif($data->sertifikat_vaksin == null):?>
                        <div class="alert alert-primary" role="alert">Attachment Belum Lengkap! Upload Sertifikat Vaksin Anda Sekarang!</div>
                      <?php endif ?>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex justify-content-between">
                        <h2 class="small-title">Lamaran</h2>
                        <a href="<?=base_url()?>lowongan" class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small">
                          <!-- <span class="align-bottom">Lihat Lebih Banyak</span> -->
                          <!-- <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i> -->
                        </a>
                      </div>
                      <div class="col-12 mb-5">
                        <section class="scroll-section" id="labels">
                          <div class="card mb-2 bg-transparent no-shadow d-none d-md-block sh-3">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <div class="col-12 col-md-2 d-flex flex-column justify-content-center text-muted mb-1 mb-md-0">NIP</div>
                                <div class="col-12 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">
                                  Tanggal Melamar
                                </div>
                                <div class="col-4 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">No Recruitment</div>
                                <div class="col-4 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">Jabatan</div>
                                <div class="col-4 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">Departemen</div>
                                <div class="col-4 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">Status</div>
                              </div>
                            </div>
                          </div>
                          <div class="scroll-out">
                            <div class="scroll-by-count" data-count="5">
                              <?php if (count($lamaran)==0): ?>
                                <div class="d-flex justify-content-center text-primary mt-4">
                                  <i class="cs-warning-hexagon"></i> &nbsp;&nbsp;&nbsp;Data Tidak Tersedia
                                </div>
                              <?php else: ?>
                                <?php foreach ($lamaran as $key): ?>
                                  <div class="card mb-2 sh-25 sh-md-12">
                                    <div class="card-body pt-0 pb-0 h-100">
                                      <div class="row g-0 h-100 align-content-center">
                                        <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                          <div class="text-muted text-small d-md-none">NIP</div>
                                          <a href="javascript:;" class="text-truncate"><?=$key->nip?></a>
                                        </div>
                                        <div class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                          <div class="text-muted text-small d-md-none">Tanggal Melamar</div>
                                          <div class="text-alternate"><?=$key->tgl?></div>
                                        </div>
                                        <div class="col-12 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                          <div class="text-muted text-small d-md-none">No Recruitment</div>
                                          <div class="text-alternate"><?=$key->no_recruitment?></div>
                                        </div>
                                        <div class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                          <div class="text-muted text-small d-md-none">Jabatan</div>
                                          <div class="text-alternate"><?=$key->jabatan?></div>
                                        </div>
                                        <div class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                          <div class="text-muted text-small d-md-none">Departemen</div>
                                          <div class="text-alternate"><?=$key->departemen?></div>
                                        </div>
                                        <div class="col-12 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                          <div class="text-muted text-small d-md-none">Status</div>
                                          <div class="text-alternate"><?=$key->status?></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>    
                                <?php endforeach ?>      
                              <?php endif ?>
                            </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                  <?php if (count($lamaran)>0): ?>
                    <div class="row">
                      <div class="col-12">
                        <!-- Timeline Start -->
                          <h2 class="small-title"><?=$nip == '' ? '' : 'Linimasa NIP '.$nip?></h2>
                          <div class="card mb-5">
                            <div class="card-body">
                              <?php foreach ($linimasa as $lm): ?>
                                <div class="row g-0">
                                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                                    </div>
                                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                    </div>
                                  </div>
                                  <div class="col mb-4">
                                    <div class="h-100">
                                      <div class="d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column">
                                          <span class="text-primary heading stretched-link pt-0"><?=$lm->tahapan?></span>
                                          <div class="text-alternate"><?=date("d F Y",strtotime($lm->tgl))?></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>    
                              <?php endforeach ?>
                            </div>
                          </div>
                  <!-- Timeline End -->
                      </div>
                    </div>  
                  <?php endif ?>
                  
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
  </body>
</html>
