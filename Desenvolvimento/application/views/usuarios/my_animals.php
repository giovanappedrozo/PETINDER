<main class="container">
        <hr /> 
        <?php if($animais == null){ ?>
                <div class="container-fluid text-lg-center text-muted">
                        
                        <?php if($deslike == FALSE){?>
                                <p>:(</p>
                                <p>
                                        <?php echo $this->lang->line('Not_my_animals'); ?>   
                                        <a href="<?php echo site_url('animais/register'); ?>"><?php echo $this->lang->line('Here'); ?></a>
                                </p>
                        <?php }
                        else{ ?> 
                        <p><?php echo $this->lang->line('No_dislikes');?></p>
                </div>
        <?php }}  else{
        foreach ($animais as $animal): ?>
            <div class="card px-3 pt-3">
                <div class="row mb-4 border-bottom pb-2">
                        <div class="col-3">
                        <a href="<?php echo site_url('animais/view/'.$animal['id_animal']); ?>" class="text-dark">
                                <img src="<?php echo base_url('assets/fotos/'.$animal['imagem']); ?>"
                                class="img-fluid shadow-1-strong rounded img-feed" alt=""/>
                        </a>
                        </div>

                        <div class="col-9">
                                <a href="<?php echo site_url('animais/view/'.$animal['id_animal']); ?>" class="text-dark">
                                        <h4><?php echo $animal['nome']; ?></h4>
                                <?php if($animal['id_doador'] == $this->session->userdata('id')){ ?>
                                        <br><a onclick="confirm(<?php echo $animal['id_animal']; ?>);" class="icones"><i class="bi bi-trash-fill"></i></a>&nbsp;
                                        <a class="icones" href="<?php echo site_url('animais/edit/'.$animal['id_animal']); ?>"><i class="bi bi-pencil-fill"></i></a>&nbsp;&nbsp;
                                        <a class="icones" href="<?php echo site_url('usuarios/notifications/'.$animal['id_animal']); ?>"><i class="bi bi-bell-fill"></i></a>
                                <?php } ?>
                                </a>
                        </div>
                </div>
            </div>

        <?php endforeach; }?>                   
</main>
<script>
        function confirm(animal){
                bootbox.confirm({ 
                        size: "small",
                        message: "<?php echo $this->lang->line('Confirm_delete_animal'); ?>",
                        callback: function(result){
                                if(result == true){
                                        window.location = '<?php echo site_url() ?>'+'/animais/delete/'+animal
                                }
                        }
                })
        }
</script>