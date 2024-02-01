
<?php foreach ($data as $key):
    $path = pathinfo($key->attachment);
    $extension =  $path['extension'];
    switch ($extension) {
        case 'png':
            $alert = 'alert-dark';
            break;
        case 'xlsx':
            $alert = 'alert-success';
            break;
        case 'docx':
            $alert = 'alert-info';
            break;
        case 'pdf':
            $alert = 'alert-danger';
            break;
        default:
            $alert = 'alert-primary';
            break;
    }
?>
    <div class="card mb-1 shadow-none border">
        <div class="p-2">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-sm">
                        <div class="alert <?=$alert?>" role="alert" style="margin-bottom: 0px;">
                          <?=$extension?>
                        </div>
                    </div>
                </div>
                <div class="col ps-0">
                    <a href="javascript:void(0);" class="text-muted fw-bold"><?=$key->jenis?></a>
                    <p class="mb-0 font-12"><?=number_format(filesize($key->attachment)/1000000, 2)?> MB</p>
                </div>
                <div class="col-auto">
                    <!-- Button -->
                    <a href="<?=base_url().''.$key->attachment?>" class="btn btn-link font-16 text-muted" target="_blank">
                        <i data-acorn-icon="download" class="icon" data-acorn-size="18"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>    
<?php endforeach ?>
