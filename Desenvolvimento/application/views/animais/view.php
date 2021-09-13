<main class="container vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">
        <div class="card">
          <div class="card-body text-center">
            <div class="mb-4">
              <img src="<?php echo base_url('assets/fotos/'.$animal['imagem']); ?>" class="img-fluid" id="img-view"/>
            </div>

            <h4 class="mb-2">
            <?php $dataNascimento = new DateTime($animal['datanasci']);
              $idade = $dataNascimento->diff(new DateTime(date('Y-m-d')));

              if($idade->format('%Y') != 00){
                if($idade->format('%Y') > 1) $idade = $idade->format('%Y ').$this->lang->line("Age_years"); 
                else $idade = $idade->format('%Y ').$this->lang->line("Age_year");
              }
              elseif($idade->format('%M') != 00){
                if($idade->format('%M') > 1) $idade = $idade->format('%M ').$this->lang->line("Age_months");
                else $idade = $idade->format('%M ').$this->lang->line("Age_month");
              }
              else{
                if($idade->format('%D') > 1) $idade = $idade->format('%D ').$this->lang->line("Age_days");
                else $idade = $idade->format('%D ').$this->lang->line("Age_day");
              }
              echo $animal['nome'].', '.$idade; ?>
            </h4>

            <p class="text-muted mb-4"><?php 
            echo $dataNascimento->format('d/m/Y'); ?>
            <?php 
              if($distance && ($this->session->userdata('id') != $animal['id_doador'])){
              foreach($distance as $d): ?>
                <span class="mx-2">|</span><i class="bi bi-geo-alt-fill"></i>&nbsp;
                <?php $l = (pi() * 6371 * $d) / 180;
                if($this->session->userdata('site_lang') == 'portuguese') echo round($l, 1).' km';
                else { $l = $l / 1.6; echo round($l, 1).' mi'; } ?>
              <?php endforeach; } ?></p>

            <?php if($animal['id_doador'] != $this->session->userdata('id')){ ?>

            <div class="mb-4 pb-2">
              <?php echo form_open_multipart('animais/review');?>
                <input type="hidden" name="id_animal" value='<?php echo $animal['id_animal']; ?>'>
                <button type="submit" class="btn btn-primary btn-rounded btn-lg" name='avaliacao' value='TRUE'>
                  <i class="bi bi-heart-fill"></i> MI-AU-DOREI
                </button>
                <button type="submit" class="btn btn-primary btn-rounded btn-lg" name='avaliacao' value='FALSE'>
                  <i class="bi bi-x-circle-fill"></i> DES-AU-GOSTEI
                </button>
              </form>
            </div>
            <?php } ?>

            <hr />

              <div class="d-flex justify-content-between text-center mb-2">
                <div>
                  <p class="mb-2 h5"><?php echo $this->lang->line('Breed'); ?>:</p>
                  <p class="text-muted mb-0">
                    <?php 
                    foreach($racas as $raca){
                      if($raca['id_raca'] == $animal['id_raca']) echo $raca['raca']; 
                    }
                    ?>
                  </p>
                </div>
                <div class="px-3">
                  <p class="mb-2 h5"><?php echo $this->lang->line('Sex'); ?>:</p>
                  <p class="text-muted mb-0">
                    <?php 
                    foreach($generos as $genero){
                      if($genero['id_genero'] == $animal['id_genero']) echo $genero['genero']; 
                    } ?>
                  </p>
                </div>
                <div>
                  <p class="mb-2 h5"><?php echo $this->lang->line('Size'); ?>:</p>
                  <p class="text-muted mb-0">
                    <?php 
                    foreach($portes as $porte){
                      if($porte['id_porte'] == $animal['id_porte']) echo $porte['porte']; 
                    }
                    ?>
                  </p>
                </div>
                <div>
                  <p class="mb-2 h5"><?php echo $this->lang->line('Coat'); ?>:</p>
                  <p class="text-muted mb-0">
                    <?php 
                    foreach($pelagens as $pelagem){
                      if($pelagem['id_pelagem'] == $animal['id_pelagem']) echo $pelagem['pelagem']; 
                    }
                    ?>
                  </p>
                </div>
              </div>

              <hr/>
              
              <div class="d-flex justify-content-between text-center mb-2">
                <div>
                  <p class="mb-2 h5"><?php echo $this->lang->line('Temper'); ?>:</p>
                  <p class="text-muted mb-0">
                    <?php 
                    foreach($temperamentos as $temperamento){
                      if($temperamento['id_temperamento'] == $animal['id_temperamento']) echo $temperamento['temperamento']; 
                    }
                    ?>
                  </p>
                </div>
                <div>
                  <p class="mb-2 h5"><?php echo $this->lang->line("Castrated"); ?>:</p>
                  <p class="text-muted mb-0">
                    <?php if($animal['castrado'] == TRUE) echo $this->lang->line('Yes');
                          else echo $this->lang->line('No'); ?></p>
                </div>
                <div>
                  <p class="mb-2 h5"><?php echo $this->lang->line("Special_line"); ?>:</p>
                  <p class="text-muted mb-0">
                    <?php if($animal['especial'] == TRUE) echo $this->lang->line('Yes');
                          else echo $this->lang->line('No'); ?></p>
                </div>
                <div>
                  <p class="mb-2 h5"><?php echo $this->lang->line("About_animal"); ?></p>
                  <p class="text-muted mb-0">
                    <?php if($animal['infoadicional']) echo $animal['infoadicional'];
                          else echo "—"; ?></p>
                </div>
              </div>
</main>