<main class="container">
        <hr /> 
        <?php foreach ($mensagens as $mensagem): ?>
            <div class="card px-3 pt-3">
                            <div class="row mb-4 border-bottom pb-2">
                                    <div class="col-3">
                                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava4-bg.png" alt="avatar 1"
                style="width: 45px; height: 100%;">
                                    </div>

                                    <div class="col-9">
                                            <h4><?php echo $mensagem['conteudo']; ?></h4>
                                            <p><?php echo $mensagem['datahora']; ?></p>
                                    </div>
                            </div>
            </div>
        <?php endforeach; 
            if($mensagens == null){ ?>
                <div class="container-fluid text-lg-center text-muted">
                        <p>:(</p>
                        <p><?php echo $this->lang->line('Not_my_animals')?><a href="<?php echo site_url('animais/register'); ?>"><?php echo $this->lang->line('Here'); ?></a></p>
            </div>
        <?php } ?>        
</main>