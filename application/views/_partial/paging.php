<section class="scroll-section" id="default">
  <nav>
    <ul class="pagination">
      <li class="page-item <?=$offset == 0 || $offset == '' ? 'disabled':''?>">
        <a class="page-link shadow prev btnStep" href="javascript:;" tabindex="-1" aria-disabled="true" offset="<?=$offset-1?>">
          <i class="cs-chevron-left"></i>
        </a>
      </li>
      <?php if ($offset == '' || $offset == '0'): ?>
        <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
        <?=ceil($data/$limit)>=2?'<li class="page-item"><a class="page-link paging shadow" href="javascript:;" offset="2">2</a></li>':''?>
        <?=ceil($data/$limit)>=3?'<li class="page-item"><a class="page-link paging shadow" href="javascript:;" offset="3">3</a></li>':''?>
      <?php else: ?>
        <li class="page-item"><a class="page-link paging shadow" href="javascript:;" offset="<?=$offset-1?>"><?=$offset-1?></a></li>
        <li class="page-item"><a class="page-link active shadow" href="javascript:;" offset="<?=$offset?>"><?=$offset?></a></li>
        <?php if (ceil($data/$limit)>=$offset+1): ?>
          <li class="page-item"><a class="page-link paging shadow" href="javascript:;" offset="<?=$offset+1?>"><?=$offset+1?></a></li>
        <?php endif ?>
      <?php endif ?>
      <li class="page-item <?=$offset == floor($data/$limit)?'disabled':''?>">
        <a class="page-link next btnStep shadow" href="javascript:;" offset="<?=$offset+1?>">
          <i class="cs-chevron-right"></i>
        </a>
      </li>
    </ul>
  </nav>
</section>