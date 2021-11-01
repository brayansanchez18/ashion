<?php $slide = ControladorSlide::ctrMostrarSlide();?>
<section class="categories">
  <div class="container-fluid">
    <div class="row">

      <?php foreach($slide as $key => $value): ?>
        <div class="col-lg-12 p-0">
          <div class="categories__item categories__large__item set-bg" data-setbg="<?=$backend.$value['imgFondo']?>">
            <div class="categories__text">
              <h1><?=$value['titulo']?></h1>
              <?php if ($value['texto'] != ''): ?>
                <?=$value['texto']?>
              <?php endif ?>

              <?php if ($value['boton'] != ''): ?>
                <a href="<?=$value['ruta']?>"><?=$value['boton']?></a>
              <?php endif ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>