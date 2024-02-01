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
              <div class="row">
                <div class="col-md-9">
                  <section class="scroll-section" id="jenisData">
                    <h2 class="small-title">Jenis Data</h2>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="card mb-5">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="mb-3 row">
                                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Jenis</label>
                                  <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="<?=$data->jenis?>" readonly/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Sub</label>
                                  <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="<?=$data->sub?>" readonly/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Type</label>
                                  <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="<?=$data->type?>" readonly/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">NIP</label>
                                  <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="<?=$data->nip?>" readonly/>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>      
                      </div>
                      <div class="col-md-4 mb-5">
                        <div class="d-flex justify-content-center">
                          <?php if ($data->foto == null): ?>
                            <img src="<?=base_url()?>assets/img/profile/profile-11.webp" alt="alternate text" class="img-fluid rounded mb-1 me-1 sw-35 sh-35" />  
                          <?php else: ?>
                            <img src="http://localhost/recruitment/<?=$data->foto?>" alt="alternate text" class="img-fluid rounded mb-1 me-1 sw-35 sh-35" />
                          <?php endif ?>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section class="scroll-section" id="personalData">
                    <h2 class="small-title">Personal Data</h2>
                    <div class="card mb-5">
                      <div class="card-body">
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->nama?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">No HP</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->no_hp?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">E-mail</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->email?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->tempat_lahir?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control date-picker-close" id="birthday" value="<?=date("d F Y", strtotime($data->tgl_lahir))?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->jenis_kelamin?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Status Pernikahan</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->status_pernikahan == 'Y' ? 'Menikah':'Belum Menikah'?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Jumlah Anak</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->jml_anak?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Golongan Darah</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->golongan_darah?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Agama</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->agama?>" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section class="scroll-section" id="identitasAlamat">
                    <h2 class="small-title">Identitas & Alamat</h2>
                    <div class="card mb-5">
                      <div class="card-body">
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">No KTP</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$data->no_ktp?>" readonly/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Alamat KTP</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <textarea class="form-control" rows="3" readonly><?=$data->alamat_ktp?></textarea>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Alamat Domisili</label>
                          <div class="col-sm-8 col-md-9 col-lg-10">
                            <textarea class="form-control" rows="3" readonly><?=$data->alamat_domisili?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section class="scroll-section" id="attachment">
                    <h2 class="small-title">Attachment</h2>
                    <div class="card mb-5">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div id="getListAttachment"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <?php if ($data->test_id != null): ?>
                    <section class="scroll-section" id="penilaianTes1">
                      <h2 class="small-title">Tahap 1 - Tes Basic</h2>
                      <div class="card mb-5">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <table class="table" width="100%">
                                <tr>
                                  <th rowspan="3">Jadwal Tes</th>
                                  <th>Tanggal</th>
                                  <th>:</th>
                                  <th>
                                    <?php
                                      if ($tahap1->tgl_tes == null && $tahap1->rencana_tes != null) {
                                        echo date("d F Y", strtotime($tahap1->rencana_tes));
                                      }elseif ($tahap1->tgl_tes != null) {
                                        echo date("d F Y", strtotime($tahap1->tgl_tes));
                                      }else{
                                        echo "Tidak Diketahui";
                                      }

                                    ?>
                                  </th>
                                </tr>
                                <tr>
                                  <th>Kehadiran</th>
                                  <th>:</th>
                                  <th><?=$tahap1->kehadiran?></th>
                                </tr>
                                <tr>
                                  <th>No Rekaman Tes</th>
                                  <th>:</th>
                                  <th><?=$tahap1->no_rek?></th>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <div class="row mt-5">
                            <div class="col-md-12 table-responsive">
                              <table width="100%" class="table table-border">
                                <thead class="text-center">
                                  <tr>
                                    <th colspan="2">Tes</th>
                                    <th>Nilai</th>
                                    <th>Standar</th>
                                    <th>Hasil</th>
                                    <th>Keterangan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $i=0;
                                    foreach ($setting1 as $key) {
                                      $row[$i] = $key;
                                      $i++;
                                    }
                                    foreach ($row as $cell) {
                                            if (isset($total[$cell->objek]['jml'])) {
                                                $total[$cell->objek]['jml']++;
                                            } else{
                                                $total[$cell->objek]['jml']=1;
                                            }
                                        }
                                        $n=count($row);
                                        $cekID="";
                                        $no = 1;
                                        $field = '';
                                        for ($i=0; $i <$n ; $i++) { 
                                          $cell=$row[$i];
                                          $field = $cell->field == 'komitmen_ttd_pernyataan'?$cell->field:'nilai_'.$cell->field;
                                          $keterangan = 'keterangan_'.$cell->field;
                                          if ($tahap1->$field == null) {
                                            $hasil = 'Belum Tes';
                                          } else {
                                            $hasil =$tahap1->$field >=$cell->nilai ? 'Lulus':"Tidak Lulus";   
                                          }
                                          
                                          
                                          echo '<tr class="text-center">';
                                          if($cekID!=$cell->objek){
                                            echo '<td' .($total[$cell->objek]['jml']>1?' rowspan="' .($total[$cell->objek]['jml']).'">':'>') .$cell->objek.'</td>';
                                            $cekID=$cell->objek;
                                          }
                                          echo "<td>$cell->tes</td>";
                                          echo '<td>'.$tahap1->$field.'</td>';
                                          echo "<td>$cell->nilai</td>";
                                          echo '<td>'.$hasil.'</td>';
                                          echo '<td>'.$tahap1->$keterangan.'</td>';
                                          echo '</tr>';

                                        $no++;
                                        }
                                  ?>
                                </tbody>
                                <tfoot class="text-center">
                                  <tr>
                                    <th colspan="2" class="text-end">Jumlah</th>
                                    <th>100</th>
                                    <th colspan="3"></th>
                                  </tr>
                                  <tr>
                                    <th colspan="2" class="text-end">Grade</th>
                                    <th>A</th>
                                    <th colspan="3"></th>
                                  </tr>
                                  <tr class="bg-muted text-light">
                                    <th colspan="2" class="text-start">HASIL TES Tahap 1 - Tes Basic</th>
                                    <th colspan="3"><?=$tahap1->hasil_tes == NULL ? 'Belum Tes':strtoupper($tahap1->hasil_tes)?></th>
                                    <th></th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>  
                  <?php endif ?>
                  <?php if ($data->test_id_2!= null): ?>
                    <section class="scroll-section" id="penilaianTes2">
                    <h2 class="small-title">Tahap 2 - Penilaian Lapangan & Evaluasi</h2>
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <table class="table" width="100%">
                              <tr>
                                <th rowspan="3">Jadwal Tes</th>
                                <th>Tanggal</th>
                                <th>:</th>
                                <th>
                                  <?php
                                    if ($tahap2->tgl_h1 == null && $tahap2->rencana_tes_1 != null) {
                                      echo date("d F Y", strtotime($tahap2->rencana_tes_1));
                                    }elseif ($tahap2->tgl_h1 != null) {
                                      echo date("d F Y", strtotime($tahap2->tgl_h1));
                                    }else{
                                      echo "Tidak Diketahui";
                                    }

                                  ?>
                                </th>
                                <th>
                                  <?php
                                    if ($tahap2->tgl_h2 == null && $tahap2->rencana_tes_2 != null) {
                                      echo date("d F Y", strtotime($tahap2->rencana_tes_2));
                                    }elseif ($tahap2->tgl_h2 != null) {
                                      echo date("d F Y", strtotime($tahap2->tgl_h2));
                                    }else{
                                      echo "Tidak Diketahui";
                                    }

                                  ?>
                                </th>
                                <th>
                                  <?php
                                    if ($tahap2->tgl_h3 == null && $tahap2->rencana_tes_3 != null) {
                                      echo date("d F Y", strtotime($tahap2->rencana_tes_3));
                                    }elseif ($tahap2->tgl_h3 != null) {
                                      echo date("d F Y", strtotime($tahap2->tgl_h3));
                                    }else{
                                      echo "Tidak Diketahui";
                                    }

                                  ?>
                                </th>
                              </tr>
                              <tr>
                                <th>Kehadiran</th>
                                <th>:</th>
                                <th><?=$tahap2->jadwal_h1_kehadiran?></th>
                                <th><?=$tahap2->jadwal_h2_kehadiran?></th>
                                <th><?=$tahap2->jadwal_h3_kehadiran?></th>
                              </tr>
                              <tr>
                                <th>No Rekaman Tes</th>
                                <th>:</th>
                                <th colspan="3"><?=$tahap2->no_rek?></th>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="row mt-5">
                          <div class="col-md-12">
                            <table class="table w-100">
                              <thead class="text-center">
                                  <tr>
                                    <th colspan="2">Tes</th>
                                    <th>Nilai</th>
                                    <th>Standar</th>
                                    <th>Hasil</th>
                                    <th>Keterangan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $i2=0;
                                    foreach ($setting2 as $key2) {
                                      $row2[$i2] = $key2;
                                      $i2++;
                                    }
                                    foreach ($row2 as $cell2) {
                                            if (isset($total2[$cell2->objek]['jml'])) {
                                                $total2[$cell2->objek]['jml']++;
                                            } else{
                                                $total2[$cell2->objek]['jml']=1;
                                            }
                                        }
                                        $n2=count($row2);
                                        $cekID2="";
                                        $no2 = 1;
                                        $field2 = '';
                                        for ($i2=0; $i2 <$n2 ; $i2++) { 
                                          $cell2=$row2[$i2];
                                          $field2 = $cell2->field == 'komitmen_ttd_pernyataan'?$cell2->field:'nilai_'.$cell2->field;
                                          $keterangan = 'keterangan_'.$cell2->field;
                                          if ($tahap2->$field2 == null) {
                                            $hasil2 = 'Belum Tes';
                                          }else{
                                            $hasil2 =$tahap2->$field2 >=$cell2->nilai ? 'Lulus':"Tidak Lulus";  
                                          }
                                          
                                          echo '<tr class="text-center">';
                                          if($cekID2!=$cell2->objek){
                                            echo '<td' .($total2[$cell2->objek]['jml']>1?' rowspan="' .($total2[$cell2->objek]['jml']).'">':'>') .$cell2->objek.'</td>';
                                            $cekID2=$cell2->objek;
                                          }
                                          echo "<td>$cell2->tes</td>";
                                          echo '<td>'.$tahap2->$field2.'</td>';
                                          echo "<td>$cell2->nilai</td>";
                                          echo '<td>'.$hasil2.'</td>';
                                          echo '<td>'.$tahap2->$keterangan.'</td>';
                                          echo '</tr>';

                                        $no2++;
                                        }
                                  ?>
                                </tbody>
                                <tfoot class="text-center">
                                <tr>
                                  <th colspan="2" class="text-end">Jumlah</th>
                                  <th>100</th>
                                  <th colspan="3"></th>
                                </tr>
                                <tr>
                                  <th colspan="2" class="text-end">Grade</th>
                                  <th>A</th>
                                  <th colspan="3"></th>
                                </tr>
                                <tr class="bg-muted text-light">
                                  <th colspan="2" class="text-start">HASIL TES Tahap 2 - Penilaian Lapangan & Evaluasi</th>
                                  <th colspan="3"><?=$tahap2->hasil_tes==null?'Belum Tes':strtoupper($tahap2->hasil_tes)?></th>
                                  <th></th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>  
                  <?php endif ?>
                  <?php if ($data->test_id != null && $data->test_id_2 != null): ?>
                    <section class="scroll-section" id="overall">
                      <div class="row g-2 mt-5">
                        <div class="col-12 col-xl-3 col-lg-3 col-md-3 mb-5">
                          
                        </div>
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6 mb-5">
                          <div class="card bg-gradient-light">
                            <div class="h-100 row g-0 card-body align-items-center">
                              <div class="col-auto">
                                <div class="border border-foreground sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                  <i data-acorn-icon="badge" class="text-white"></i>
                                </div>
                              </div>
                              <div class="col">
                                <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3 text-white">Overall Status:</div>
                              </div>
                              <div class="col-auto ps-3">
                                <div class="display-5 text-white">
                                  <?php if ($tahap1->hasil_tes != null || $tahap2->hasil_tes != null): ?>
                                    <?=$tahap1->hasil_tes == 'Lulus' && $tahap2->hasil_tes == 'Lulus' ? 'LULUS' : 'TIDAK LULUS'?>  
                                  <?php endif ?>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>    
                  <?php endif ?>
                </div>
                <div class="col-md-3 d-none d-lg-block" id="scrollSpyMenu">
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
                    <li>
                      <a class="nav-link" href="#attachment">
                        <i data-acorn-icon="chevron-right"></i>
                        <span>Attachment</span>
                      </a>
                    </li>
                    <?php if ($data->test_id != null): ?>
                      <li>
                        <a class="nav-link" href="#penilaianTes1">
                          <i data-acorn-icon="chevron-right"></i>
                          <span>Tahap 1 - Tes Basic</span>
                        </a>
                      </li>
                    <?php endif ?>
                    <?php if ($data->test_id_2 != null): ?>
                      <li>
                        <a class="nav-link" href="#penilaianTes2">
                          <i data-acorn-icon="chevron-right"></i>
                          <span>Tahap 2 - Penilaian Lapangan & Evaluasi</span>
                        </a>
                      </li>  
                    <?php endif ?>
                    <?php if ($data->test_id != null && $data->test_id_2 != null): ?>
                      <li>
                        <a class="nav-link" href="#overall">
                          <i data-acorn-icon="chevron-right"></i>
                          <span>Overall Status</span>
                        </a>
                      </li>    
                    <?php endif ?>
                  </ul>
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
    <script>
      $(document).ready(function(){
        getListAttachment();
        $('.btnStatus').on('click', function(){
          var id = $(this).attr("data")
          var status = $(this).attr("status")
          $.ajax({
            type:'post',
            data:{id,status},
            dataType:'json',
            cache:true,
            async:true,
            url:base_url+'monitoring/changeStatusLamaran',
            success:function(data){
              Swal.fire("Berhasil mengubah status menjadi "+status,"","success");
              location.reload()
            },
            error:function(data){
              Swal.fire("gagal mengubah status","Cek Jaringan Perangkat Anda","error")
            }
          })
        })
      })
      function getListAttachment() {
        var inputIdPelamar = '<?=$this->uri->segment("3")?>';
        $.ajax({
          type:'get',
          data:{inputIdPelamar},
          url:base_url+'profile/getListAttachment',
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
