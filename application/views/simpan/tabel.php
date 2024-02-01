<section class="scroll-section" id="labels">
  <div class="card mb-2 bg-transparent no-shadow d-none d-md-block sh-3">
    <div class="card-body pt-0 pb-0 h-100">
      <div class="row g-0 h-100 align-content-center">
        <div class="col-6 col-md-2 d-flex align-items-center mb-2 mb-md-0 text-muted text-small">Jabatan</div>
        <div class="col-6 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">
          Departemen
        </div>
        <div class="col-6 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">Plant</div>
        <div class="col-6 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">Status</div>
        <div class="col-6 col-md-4 d-flex align-items-center text-alternate text-medium justify-content-end text-muted text-small"></div>
      </div>
    </div>
  </div>
  <div class="scroll-out">
    <div class="scroll-by-count" data-count="5">
      <?php if (count($data)>0): ?>
        <?php foreach ($data as $key): ?>
          <div class="card mb-2 sh-25 sh-md-12">
            <div class="card-body pt-0 pb-0 h-100">
              <div class="row g-0 h-100 align-content-center">
                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-1 mb-md-0">
                  <div class="text-muted text-small d-md-none">Jabatan</div>
                  <div class="text-alternate"><?=$key->jabatan?></div>
                </div>
                <div class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                  <div class="text-muted text-small d-md-none">Departemen</div>
                  <div class="text-alternate"><?=$key->departemen?></div>
                </div>
                <div class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                  <div class="text-muted text-small d-md-none">Plant</div>
                  <div class="text-alternate"><?=$key->plant?></div>
                </div>
                <div class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                  <div class="text-muted text-small d-md-none">Status</div>
                  <div class="text-alternate"><?=$key->status?></div>
                </div>
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-end mt-3 mt-md-0">
                  <a href="javascript:;" class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 hapus" data="<?=$key->id?>">
                    <i class="bi bi-trash"></i>
                    <span class="d-none d-xxl-inline-block">Hapus</span>
                  </a>
                </div>
              </div>
            </div>
          </div>    
        <?php endforeach ?>
      <?php else: ?>
          <div class="d-flex justify-content-center text-primary mt-4">
            <i class="cs-warning-hexagon"></i> &nbsp;&nbsp;&nbsp;Data Tidak Tersedia
          </div>
      <?php endif ?>
    </div>
  </div>
</section>