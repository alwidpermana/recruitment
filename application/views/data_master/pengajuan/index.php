<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"color": "light-red","placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/vendor/datatables.min.css" />
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
                <div class="card mb-5">
                  <form id="setup">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel filter" id="filJenis" name="filJenis">
                                  <option value="Operator" <?=$this->input->get("jenis") == 'Operator' || $this->input->get("jenis") == '' ? 'selected':''?>>Operator</option>
                                    <option value="Non Operator" <?=$this->input->get("jenis") == 'Non Operator' ? 'selected':''?>>Non Operator</option>
                                </select>
                                <span>Jenis</span>
                              </label>
                            </div>
                            <div class="col-md-2 col-sm-6">
                              <label class="mb-3 top-label w-100">
                                <select class="select2TopLabel filter" id="filStatus" name="filStatus">
                                  <option value="OPEN" <?=$this->input->get("status") == 'OPEN' || $this->input->get("status") == '' ? 'selected':''?>>Open</option>
                                  <option value="CLOSE" <?=$this->input->get("status") == 'CLOSE' ? 'selected':''?>>Close</option>
                                </select>
                                <span>Status Recruitment</span>
                              </label>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-2 col-sm-6">
                                <label>Jumlah :</label><br> <span id="showJml">0</span>
                            </div>
                            <div class="d-grid gap-2 col-md-2 col-sm-6 mx-auto mb-3">
                              <button type="submit" class="btn btn-primary mb-1 active-scale-down" id="btn-add">Setup</button> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="scroll-vertical-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input class="form-check-input rounded-circle" type="checkbox" id="allCheck" name="allCheck">
                                                <label class="form-check-label" for="allCheck"> &nbsp;All</label>
                                            </th>
                                            <th>No Pengajuan</th>
                                            <th>Jenis Pengajuan</th>
                                            <th>Pria</th>
                                            <th>Wanita</th>
                                            <th>Status</th>
                                            <th>No Recruitment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($data as $key): ?>
                                           <tr>
                                               <td>
                                                   <?php if ($key->status == 'OPEN'): ?>
                                                        <input class="form-check-input rounded-circle pengajuan inputPengajuan" type="checkbox" value="<?=$key->id?>" id="<?=$key->id?>" name="inputPengajuan[]" jml="<?=$key->pria+$key->wanita?>">
                                                        <label class="form-check-label" for="inputPengajuan"></label>
                                                   <?php endif ?>
                                               </td>
                                               <td><?=$key->no_pengajuan?></td>
                                               <td><?=$key->jenis_pengajuan?></td>
                                               <td><?=$key->pria?></td>
                                               <td><?=$key->wanita?></td>
                                               <td><?=$key->status?></td>
                                               <td><?=$key->recruitment_id?></td>
                                           </tr>
                                       <?php endforeach ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>            
                </form>
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
    <script src="<?=base_url()?>assets/js/vendor/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#scroll-vertical-datatable").DataTable({
            scrollY:"350px",
            scrollCollapse:!0,
            paging:!1,
            language:
            {
                paginate:
                {
                    previous:"<i class='mdi mdi-chevron-left'>",
                    next:"<i class='mdi mdi-chevron-right'>"
                }
            },
            columnDefs: [
              { orderable: false, targets: 0 }
            ],
            order: [[1, 'asc']],  
                
            drawCallback:function(){
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
        $('#allCheck').on('click', function(){
          var cek= $(this).is(":checked");
          if (cek == true) {
              $('.pengajuan').attr("checked",true);
          }else{
              $('.pengajuan').attr("checked",false);
          }

          var jml = 0;
          
          $.each($('.inputPengajuan:checked'), function(){
              jml +=parseInt($(this).attr("jml"))
          })

          $('#showJml').html(jml)
      })
      $('.inputPengajuan').on('click', function(){
          var jml = 0;
          
          $.each($('.inputPengajuan:checked'), function(){
              jml +=parseInt($(this).attr("jml"))
          })
          console.log(jml)
          $('#showJml').html(jml)
      })
      $('#setup').submit(function(e){
          e.preventDefault();
          var filJenis = $('#filJenis').val();
          $.ajax({
              url:base_url+'data_master/prasetup',
              type:"post",
              dataType:'json',
              data:new FormData(this), //this is formData
              processData:false,
              contentType:false,
              cache:false,
              async:true,
              beforeSend:function(data){
                $('#btn-add').attr("disabled",true);
              },
              success: function(data){
                if (data.status == 'success') {
                  window.location.href = base_url+'data_master/setup/'+data.id+'?jenis='+filJenis;
                }else{

                }
                Swal.fire(data.message,data.sub_message,data.status);
              },
              complete:function(data){
                $('#btn-add').attr("disabled",false);
              },
              error: function(data){
                Swal.fire("Gagal Menyimpan Data","Cek Jaringan Perangkat Anda","error")
              }
           });
      })
      $('.filter').on('change', function(){
          var filJenis = $('#filJenis').val();
          var filStatus = $('#filStatus').val();
          window.location.href = base_url+'data_master/pengajuan?jenis='+filJenis+'&status='+filStatus;
      })   
      })
    </script>
  </body>
</html>
