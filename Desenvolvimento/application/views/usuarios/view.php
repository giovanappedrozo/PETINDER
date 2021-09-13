<main class="container">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">
        <div class="card">
          <div class="card-body text-center">
            
            <!--Se nao for o perfil do usuario logado !--> 
            <?php if($usuario['id_usuario'] != $this->session->userdata('id')){ ?>
            <p class="text-muted mb-4">
            <?php $dataNascimento = new DateTime($usuario['datanasci']);
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
              echo $idade; ?>

              <?php 
              if($distance){
              foreach($distance as $d): ?>
                <span class="mx-2">|</span><i class="bi bi-geo-alt-fill"></i>&nbsp;
                <?php $l = (pi() * 6371 * $d) / 180; echo round($l, 1).'km';?>
              <?php endforeach; } ?></p>

            <div class="mb-4 pb-2">
              <?php echo form_open_multipart('usuarios/review');?>
                <input type="hidden" name="id_usuario" value='<?php echo $usuario['id_usuario']; ?>'>
                <button type="submit" class="btn btn-primary btn-rounded btn-lg" name='avaliacao' value='TRUE'>
                  <i class="bi bi-heart-fill"></i> MI-AU-DOREI
                </button>
                <button type="submit" class="btn btn-primary btn-rounded btn-lg" name='avaliacao' value='FALSE'>
                  <i class="bi bi-x-circle-fill"></i> DES-AU-GOSTEI
                </button>
              </form>
            </div>
            <div class="d-flex justify-content-between text-center mt-5 mb-2">
              <div>
                <p class="mb-2 h5">8471</p>
                <p class="text-muted mb-0">Wallets Balance</p>
              </div>
              <div class="px-3">
                <p class="mb-2 h5">8512</p>
                <p class="text-muted mb-0">Income amounts</p>
              </div>
              <div>
                <p class="mb-2 h5">4751</p>
                <p class="text-muted mb-0">Total Transactions</p>
              </div>
            </div>

            <?php } else {?>

              <!--Se for o perfil do usuario logado !--> 
              <?php echo validation_errors(); ?> 
              <?php echo form_open('usuarios/edit/'.$this->session->userdata('id')); ?>

              <p class="text-muted mb-4"><?php $dataNascimento = new DateTime($usuario['datanasci']);
              echo $dataNascimento->format('d/m/Y');?>
              <span class="mx-2">|</span>
              <a class='icones' href="<?php echo site_url('usuarios/delete/'.$this->session->userdata('id')); ?>"><i class="bi bi-trash-fill"></i> <?php echo $this->lang->line('Delete_account'); ?></a>
              <?php if($usuario['localizacao'] == NULL){ ?>
              <span class="mx-2">|</span>
              <a class='icones' onclick="getLocation();"><i class="bi bi-geo-alt-fill"></i> <?php echo $this->lang->line('Add_Location'); ?></a>
              <?php } else {?>
              <span class="mx-2">|</span>
              <a class='icones' onclick="getLocation();"><i class="bi bi-geo-alt-fill"></i> <?php echo $this->lang->line('Change_Location'); ?></a>
              <?php } ?>
              <button class="btn-hidden" id="submit"></button>
              </p>

              <div class="d-flex justify-content-between text-center mb-2">
                <div>
                  <div class="form-floating mb-4">
                    <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $usuario['nome'];?>" disabled>
                    <label for="nome"><?php echo $this->lang->line('Name'); ?></label>
                  </div>
                </div>
                <div class="px-3">
                  <div class="form-floating mb-4">
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>">
                    <label for="email"><?php echo $this->lang->line('Email'); ?></label>
                  </div>
                </div>
                <div>
                  <div class="form-floating mb-4">
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="********" minlength="6">
                    <label for="senha"><?php echo $this->lang->line('New_password'); ?></label>
                  </div>
                </div>
                <div>
                  <div class="form-floating mb-4 select">
                    <select name="genero" id="genero" class="form-select" placeholder="<?php echo $this->lang->line('Gender'); ?>" disabled>
                      <?php foreach ($generos as $genero): 
                          if($genero['id_genero'] == $usuario['id_genero']){?>
                              <option value="<?php echo $genero['id_genero']; ?>"><?php echo $genero['genero']; ?></option>
                      <?php } endforeach; ?>
                    </select>
                    <label for="senha"><?php echo $this->lang->line('Gender'); ?></label>
                  </div>
                </div>
              </div>     
              <input type="hidden" name="latitude" id="latitude">
              <input type="hidden" name="longitude" id="longitude">      
              <input type="submit" id="submit" class="btn btn-primary btn-block mb-4" name="submit" value="<?php echo $this->lang->line('Submit'); ?>">
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>              
</main>