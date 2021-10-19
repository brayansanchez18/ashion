<div class="card">
  <div class="card-header">
    <h3 class="card-title">Información de Contacto</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="form-group">
      <label for="usr">Numero de Whatsapp:</label>
      <div class="input-group">
        <span class="input-group-addon ml-2 mr-2 mt-auto mb-auto"><i class="fab fa-whatsapp"></i></span>
        <input type="text" class="form-control cambioInformacionFooter" id="numerow" value="722 126 53 99">
      </div>
    </div>

    <div class="form-group">
      <label for="usr">Correo Electrónico de Contacto:</label>
      <div class="input-group">
        <span class="input-group-addon ml-2 mr-2 mt-auto mb-auto"><i class="far fa-envelope"></i></span>
        <input type="text" class="form-control cambioInformacionFooter" id="correo" value="brayan.sanchez.contacto@gmail.com">
      </div>
    </div>

    <div class="form-group">
      <label for="usr">Direccion del Establecimiento:</label>
      <div class="input-group">
        <span class="input-group-addon ml-2 mr-2 mt-auto mb-auto"><i class="fas fa-map-marker-alt"></i></span>
        <input type="text" class="form-control cambioInformacionFooter" id="direccion" value="Direccion #10">
      </div>
    </div>
<?php $frame = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.7997400631075!2d-99.16632358563756!3d19.421056746083465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff376fa61b41%3A0x5ec2b110aeb2b3f7!2sRec%20M%C3%BAsica%20Centro%20de%20Estudios%20Musicales!5e0!3m2!1ses!2smx!4v1633646586598!5m2!1ses!2smx" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'; ?>
    <div class="form-group">
      <label for="comment">Codigo de Google Maps:</label>
      <textarea class="form-control cambioScript" rows="5" id="frameMaps">
      <?=$frame?>
      </textarea>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="button" id="guardarInformacionFooter" class="btn btn-primary float-right">Guardar</button>
  </div>
</div>
<!-- /.card -->