<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"color": "light-red","placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/vendor/dropzone.min.css" />
  </head>

  <body>
    <div id="root">
      <?php $this->load->view("_partial/sidebar");?>

      <main>
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title Start -->
              <?php $this->load->view("_partial/content-header");?>
              <!-- Title End -->

              <!-- Content Start -->
              <div>
                <div class="row">
                  
                    <div class="col-md-9">
                      <div class="row">
                        <form id="submitData">
                          <div class="col-md-12">
                            <section class="scroll-section" id="personalData">
                              <div class="card mb-5">
                                <div class="card-header">
                                  <div class="card-title">Personal Data</div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-4 mb-3">
                                      <section class="scroll-section mb-1" id="singleImageUpload">
                                        <form>
                                          <div class="position-relative d-inline-block" id="singleImageUploadExample">
                                            <img src="<?=base_url()?>assets/img/profile/profile-11.webp" alt="alternate text" class="rounded-xl border border-separator-light border-4 sw-30 sh-30" />
                                            
                                            <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light rounded-xl position-absolute e-0 b-0" type="button">
                                              <i data-acorn-icon="upload"></i>
                                            </button>
                                            <input class="file-upload d-none" type="file" accept="image/*" name="inputFoto" id="inputFoto" />
                                            <input type="hidden" name="hiddenPhoto" value="">
                                            <input type="hidden" name="inputIdPelamar" id="inputIdPelamar" value="<?=$uuid?>">
                                          </div>
                                        </form>
                                      </section>
                                      <span class="text-primary" style="font-size: 10px;">* Ekstensi File : jpg, jpeg, png</span><br>
                                      <span class="text-primary" style="font-size: 10px;">* Ukuran File maksimal 1 Mb</span><br>
                                      <span class="text-primary" style="font-size: 10px;">* Pastikan foto wajah terlihat jelas</span>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-floating mb-2">
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" value="" name="inputNama"/>
                                            <label>Nama Lengkap <span class="text-primary">*</span></label>
                                          </div>
                                          <div class="form-floating mb-2">
                                            <input type="email" class="form-control" placeholder="Email" name="inputEmail" value="" />
                                            <label>Email <span class="text-primary">*</span></label>
                                          </div>
                                          <div class="form-floating mb-2">
                                            <input type="text" class="form-control" placeholder="No HP" name="inputNoHP" value="" />
                                            <label>No HP <span class="text-primary">*</span></label>
                                          </div>
                                          <div class="form-floating mb-2">
                                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="inputTempatLahir" value="" />
                                            <label>Tempat Lahir <span class="text-primary">*</span></label>
                                          </div>
                                          <div class="form-floating mb-2">
                                            <input type="text" class="date-picker form-control datePickerFloatingLabel" placeholder="mm/dd/yyyy" name="inputTglLahir"/>
                                            <label>Tanggal Lahir<span class="text-primary">*</span></label>
                                          </div> 
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-floating mb-2 w-100">
                                              <select class="select2FloatingLabel" id="inputJenisKelamin" name="inputJenisKelamin">
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                              </select>
                                              <label>Jenis Kelamin<span class="text-primary">*</span></label>
                                            </div>
                                            <div class="form-floating mb-2 w-100">
                                              <select class="select2FloatingLabel" id="inputStatusMenikah" name="inputStatusMenikah">
                                                <option value="Y">Menikah</option>
                                                <option value="N">Belum Menikah</option>
                                              </select>
                                              <label>Status Menikah <span class="text-primary">*</span></label>
                                            </div>
                                            <div class="form-floating mb-2">
                                              <input type="number" class="form-control" placeholder="Jumlah Anak" name="inputJumlahAnak" id="inputJumlahAnak" value="0"/>
                                              <label>Jumlah Anak</label>
                                            </div>
                                            <div class="form-floating mb-2 w-100">
                                              <select class="select2FloatingLabel" id="inputGolonganDarah" name="inputGolonganDarah">
                                                <option value="A">A</option>
                                                <option value="A&plus;">A+</option>
                                                <option value="A&minus;">A-</option>
                                                <option value="B">B</option>
                                                <option value="B&plus;">B+</option>
                                                <option value="B&minus;">B-</option>
                                                <option value="AB">AB</option>
                                                <option value="AB&plus;">AB+</option>
                                                <option value="AB&minus;">AB-</option>
                                                <option value="O">O</option>
                                                <option value="O&plus;">O+</option>
                                                <option value="O&minus;">O-</option>
                                                <option value="Rh-null">Rh-null</option>
                                              </select>
                                              <label>Golongan Darah</label>
                                            </div>
                                            <div class="form-floating mb-2 w-100">
                                              <select class="select2FloatingLabel" id="inputAgama" name="inputAgama">
                                                <option value="Islam">Islam</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Khonghucu">Khonghucu</option>
                                              </select>
                                              <label>Agama</label>
                                            </div> 
                                        </div>
                                      </div>
                                    </div>
                                  </div>  
                                </div>
                              </div> 
                            </section>
                            <section class="scroll-section" id="identitasAlamat">
                              <div class="card mb-5">
                                <div class="card-header">
                                  <div class="card-title">
                                    Identitas & Alamat
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-floating mb-2">
                                        <input type="text" class="form-control" placeholder="No KTP" name="inputNoKTP" id="inputNoKTP"  value="" />
                                        <label>No KTP<span class="text-primary">*</span></label>
                                      </div>
                                      <div class="form-floating mb-2">
                                        <textarea class="form-control" placeholder="Alamat KTP" id="inputAlamatKTP" name="inputAlamatKTP" rows="3"></textarea>
                                        <label>Alamat KTP</label>
                                      </div>
                                      <div class="form-floating mb-2">
                                        <textarea class="form-control" placeholder="Alamat Domisili" id="inputAlamatDomisili" name="inputAlamatDomisili" rows="3"></textarea>
                                        <label>Alamat Domisili</label>
                                      </div>
                                      <div class="form-floating mb-2">
                                        <input type="text" class="form-control" placeholder="Kode POS" name="inputKodePOS" id="inputKodePOS" value="" />
                                        <label>Kode POS</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <div class="row mt-3">
                              <div class="d-grid gap-2 col-md-6 col-sm-6 mx-auto mb-3">
                                <input type="hidden" id="size_file" name="size_file">
                                <button type="submit" class="btn btn-primary mb-1 active-scale-down" id="btn-save">Save</button> 
                              </div>
                            </div>  
                          </div>
                          
                        </form>
                      </div>
                      <div class="row mt-3 cardAttachment d-none">
                        <div class="col-md-12">
                          <section class="scroll-section" id="attachment">
                            <div class="card">
                              <div class="card-header">
                                <div class="card-title">
                                  Attachment
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div id="getListAttachment"></div>
                                  </div>
                                </div>
                                <div class="row mt-5">
                                  <div class="col-md-12 mb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">CV</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="CV">
                                              <input type="file" class="form-control " id="fileCV" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">Ijazah Terakhir</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="Ijazah">
                                              <input type="file" class="form-control" id="fileIjazah" name="fileAttachment"/>
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">Surat Lamaran</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="Lamaran">
                                              <input type="file" class="form-control" id="fileSuratLamaran" name="fileAttachment"/>
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div> 
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">KTP</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="KTP">
                                              <input type="file" class="form-control" id="fileKTP" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">SKCK</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="SKCK">
                                              <input type="file" class="form-control" id="fileSKCK" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">Surat Keterangan Sehat</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="Surat Keterangan Sehat">
                                              <input type="file" class="form-control" id="fileSuratKeteranganSehat" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">Surat Ijin</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="Surat Ijin">
                                              <input type="file" class="form-control" id="fileSuratIjin" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div> 
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">Kartu Keluarga</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="Kartu Keluarga">
                                              <input type="file" class="form-control" id="Kartu Keluarga" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div> 
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">Sertifikat Vaksin</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="Sertifikat Vaksin">
                                              <input type="file" class="form-control" id="fileSertifikatVaksin" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div>  
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <form class="submitAttachment">
                                          <label class="mb-3">Surat Bebas Narkoba</label>
                                            <div class="input-group mb-1">
                                              <input type="hidden" name="jenis" value="Surat Bebas Narkoba">
                                              <input type="file" class="form-control" id="fileSuratBebasNarkoba" name="fileAttachment" />
                                              <button class="btn btn-outline-primary" type="submit">Upload</button>
                                            </div>
                                            <span class="text-primary" style="font-size: 10px;">*Max Size 1 Mb</span>
                                        </form>
                                      </div>
                                    </div>             
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>  
                  
                  <div class="col-md-auto d-none d-lg-block" id="scrollSpyMenu">
                    <ul class="nav flex-column">
                      <li>
                        <a class="nav-link" href="#personalData">
                          <i data-acorn-icon="chevron-right"></i>
                          <span>Personal Data</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#identitasAlamat">
                          <i data-acorn-icon="chevron-right"></i>
                          <span>Identitas Karyawan</span>
                        </a>
                      </li>
                      <li class="d-none cardAttachment">
                        <a class="nav-link" href="#attachment">
                          <i data-acorn-icon="chevron-right"></i>
                          <span>Attachment</span>
                        </a>
                      </li>
                    </ul>
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
    <script src="<?=base_url()?>assets/js/vendor/dropzone.min.js"></script>
    <script src="<?=base_url()?>assets/js/vendor/singleimageupload.js"></script>
    <script src="<?=base_url()?>assets/js/cs/dropzone.templates.js"></script>
    <script src="<?=base_url()?>assets/js/forms/controls.dropzone.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        getListAttachment();
        $('#inputFoto').on('change', function(){
            var file = $('#inputFoto')[0];  
            var info_file = file.files[0];
            var ukuran = info_file.size;
            console.log("wey")
            $('#size_file').val(ukuran);
          })
        $('#submitData').submit(function(e){
          e.preventDefault();
          $.ajax({
            url:base_url+'profile/addData',
            type:"post",
            dataType:'json',
            data:new FormData(this), //this is formData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend:function(data){
              $('#btn-save').attr("disabled",true);
            },
            success: function(data){
              Swal.fire(data.message,data.sub_message,data.status)
              if (data.status == 'success') {
                $('.cardAttachment').removeClass("d-none")
              }
            },
            complete:function(data){
              $('#btn-save').attr("disabled",false);
            },
            error: function(data){
              Swal.fire("Gagal Menyimpan Data","Cek Jaringan Perangkat Anda","error")
            }
          });
        })
        $('.submitAttachment').submit(function(e){
          e.preventDefault();
          var inputIdPelamar = $('#inputIdPelamar').val();
          $.ajax({
            url:base_url+'profile/saveAttachment/'+inputIdPelamar,
            type:'post',
            type:"post",
            dataType:'json',
            data:new FormData(this), //this is formData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(data){
              Swal.fire(data.message,data.sub_message,data.status);
              if (data.status == 'success') {
                getListAttachment();
              }
            },
            error:function(data){
              Swal.fire("Gagal Upload Attachment","Periksa Jaringan Perangkat Anda","error")
            }
          })
        })
      })
      function getListAttachment() {
        var inputIdPelamar = $('#inputIdPelamar').val();
        $.ajax({
          type:'get',
          url:base_url+'profile/getListAttachment',
          data:{inputIdPelamar},
          cache:true,
          async:true,
          success:function(data){
            $('#getListAttachment').html(data)
          },
          error:function(data){
            $('#getListAttachment').html('');
          }
        })
      }
    </script>
  </body>
</html>
