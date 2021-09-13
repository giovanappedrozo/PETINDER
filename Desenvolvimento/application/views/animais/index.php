<main class="container">
        
<?php if($this->session->flashdata("danger")) { ?>
        <p class="alert alert-danger"><?=  $this->session->flashdata("danger") ?></p>
        <?php } unset($_SESSION['danger']);?>

<?php if($this->session->flashdata("success")) { ?>
        <p class="alert alert-success"><?=  $this->session->flashdata("success") ?></p>
<?php } unset($_SESSION['success']);?>
        <hr /> 
        <?php foreach ($animais as $animal): 
                if($animal['id_doador'] != $this->session->userdata("id")){?>
        <div class="card px-3 pt-3">
                <a href="<?php echo site_url('animais/view/'.$animal['id_animal']); ?>" class="text-dark">
                        <div class="row mb-4 border-bottom pb-2">
                                <div class="col-3">
                                        <img src="<?php echo base_url('assets/fotos/'.$animal['imagem']); ?>"
                                        class="img-fluid shadow-1-strong rounded img-feed" alt=""/>
                                </div>

                                <div class="col-9">
                                        <h4><?php echo $animal['nome']; ?></h4>
                                        <p class="mb-2">
                                                <?php foreach($racas as $raca){
                                                if($raca['id_raca'] == $animal['id_raca']) echo $raca['raca']; 
                                                }
                                                ?>
                                        </p>
                                        <p> 
                                                <?php 
                                                        $dataNascimento = new DateTime($animal['datanasci']);
                                                        $idade = $dataNascimento->diff(new DateTime(date('Y-m-d')));
                                                        if($idade->format('%Y') != 00){
                                                                if($idade->format('%Y') > 1) echo $idade->format('%Y ').$this->lang->line("Age_years"); 
                                                                else echo $idade->format('%Y ').$this->lang->line("Age_year");
                                                        }
                                                        elseif($idade->format('%M') != 00){
                                                                if($idade->format('%M') > 1) echo $idade->format('%M ').$this->lang->line("Age_months");
                                                                else echo $idade->format('%M ').$this->lang->line("Age_month");
                                                        }
                                                        else{
                                                                if($idade->format('%D') > 1) echo $idade->format('%D ').$this->lang->line("Age_days");
                                                                else echo $idade->format('%D ').$this->lang->line("Age_day");
                                                        }
                                                ?>
                                        </p>
                                </div>
                        </div>
                </a> 
        </div>
        <?php } endforeach; ?>
        <p><?php echo $links; ?></p>
</main>