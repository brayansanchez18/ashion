<?php $slide = ControladorSlide::ctrMostrarSlide(); var_dump($slide);?>
<section class="categories">
  <div class="container-fluid">
    <div class="row">

      <?php foreach($slide as $key => $value): ?>
        <div class="col-lg-12 p-0">
          <div class="categories__item categories__large__item set-bg" data-setbg="<?=$backend.$value["imgFondo"]?>">
            <div class="categories__text">
              <h1><?=$value['titulo']?></h1>
              <p><?=$value['texto']?></p>

              <?php if ($value['boton'] != ''): ?>
                <a href="<?=$value["url"]?>"><?=$value["boton"]?></a>
              <?php endif ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>