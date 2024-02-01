<!-- Vendor Scripts Start -->
<script src="<?=base_url()?>assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="<?=base_url()?>assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/js/vendor/OverlayScrollbars.min.js"></script>
<script src="<?=base_url()?>assets/js/vendor/autoComplete.min.js"></script>
<script src="<?=base_url()?>assets/js/vendor/clamp.min.js"></script>

<script src="<?=base_url()?>assets/icon/acorn-icons.js"></script>
<script src="<?=base_url()?>assets/icon/acorn-icons-interface.js"></script>
<script src="<?=base_url()?>assets/icon/acorn-icons-learning.js"></script>

<script src="<?=base_url()?>assets/js/cs/scrollspy.js"></script>
<script src="<?=base_url()?>assets/js/vendor/imask.js"></script>
<script src="<?=base_url()?>assets/js/vendor/select2.full.min.js"></script>

<script src="<?=base_url()?>assets/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>

<script src="<?=base_url()?>assets/js/vendor/tagify.min.js"></script>
<script src="<?=base_url()?>assets/js/vendor/sweetalert2.min.js"></script>
<script src="<?=base_url()?>assets/js/vendor/datatables.min.js"></script>
<script src="<?=base_url()?>assets/js/cs/datatable.extend.js"></script>
<!-- Vendor Scripts End -->

<!-- Template Base Scripts Start -->
<script src="<?=base_url()?>assets/js/base/helpers.js"></script>
<script src="<?=base_url()?>assets/js/base/globals.js"></script>
<script src="<?=base_url()?>assets/js/base/nav.js"></script>
<!-- <script src="<?=base_url()?>assets/js/base/search.js"></script> -->
<script src="<?=base_url()?>assets/js/base/settings.js"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->

<script src="<?=base_url()?>assets/js/forms/layouts.js"></script>

<script src="<?=base_url()?>assets/js/common.js"></script>
<script src="<?=base_url()?>assets/js/scripts.js"></script>
<!-- Page Specific Scripts End -->
<script type="text/javascript">
    const base_url = '<?=base_url()?>'
    $(document).ready(function(){
        $('.btnSetting').on('click', function(){
            $('#modal-pass').modal("show")
        })

        $('#submitSetting').submit(function(e){
            e.preventDefault();
            $.ajax({
                url:base_url+'dashboard/updatePassword',
                type:"post",
                dataType:'json',
                data:new FormData(this), //this is formData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                beforeSend:function(data){
                  $('#btnUpdatePassword').attr("disabled",true);
                },
                success: function(data){
                  Swal.fire(data.message,data.sub_message,data.status)
                },
                complete:function(data){
                  $('#btnUpdatePassword').attr("disabled",false);
                },
                error: function(data){
                  Swal.fire("Gagal Menyimpan Data","Cek Jaringan Perangkat Anda","error")
                }
            });
        })
    })
</script>