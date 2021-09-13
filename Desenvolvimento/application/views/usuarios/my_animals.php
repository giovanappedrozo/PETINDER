<main class="container">
        <hr /> 
        <?php foreach ($animais as $animal): ?>
            <div class="card px-3 pt-3">
                            <div class="row mb-4 border-bottom pb-2">
                                    <div class="col-3">
                                            <img src="<?php echo base_url('assets/fotos/'.$animal['imagem']); ?>"
                                            class="img-fluid shadow-1-strong rounded img-feed" alt=""/>
                                    </div>

                                    <div class="col-9">
                                            <h4><?php echo $animal['nome']; ?></h4>
                                            <br><a class="icones" href="<?php echo site_url('animais/delete/'.$animal['id_animal']); ?>"><i class="bi bi-trash-fill"></i></a>&nbsp;
                                            <a class="icones" href="<?php echo site_url('animais/edit/'.$animal['id_animal']); ?>"><i class="bi bi-pencil-fill"></i></a>&nbsp;&nbsp;
                                            <a class="icones" href="<?php echo site_url('animais/view/'.$animal['id_animal']); ?>"><i class="bi bi-plus-lg"></i></a>
                                    </div>
                            </div>
            </div>
        <?php endforeach; 
            if($animais == null){ ?>
                <p class="text-lg-center text-muted">:(</p>
                <p class="text-lg-center text-muted"><?php echo $this->lang->line('Not_my_animals')?><a href="<?php echo site_url('animais/register'); ?>"><?php echo $this->lang->line('Here'); ?></a></p>
        <?php } ?>        
</main>