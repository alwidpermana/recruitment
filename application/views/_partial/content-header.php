<div class="col-12 col-md-7">
  <h1 class="mb-0 pb-0 display-4"><?=$page?></h1>
    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
      <ul class="breadcrumb pt-0">
        <li class="breadcrumb-item"><a href="<?=$link1?>"><?=ucfirst(str_replace('_', ' ', $menu))?></a></li>
        <?php if ($sub_menu1!= ''): ?>
          <li class="breadcrumb-item"><a href="<?=$link2?>"><?=ucfirst(str_replace('_', ' ', $sub_menu1))?></a></li>
          <?php if ($sub_menu2!= ''): ?>
            <li class="breadcrumb-item"><a href="<?=$link3?>"><?=ucfirst(str_replace('_', ' ', $sub_menu2))?></a></li>
          <?php endif ?>
        <?php endif ?>
      </ul>
    </nav>
</div>