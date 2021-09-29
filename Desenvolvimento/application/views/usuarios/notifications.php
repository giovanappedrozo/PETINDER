<main class="container">
        <hr />
        <div id="matches"></div> 
        <?php 
            if($likes == null && $matches == null){ ?>
                <div class="container-fluid text-lg-center text-muted">
                        <p>:(</p>
                        <p><?php echo $this->lang->line('No_notification')?></p>
                </div>
        <?php } else{
            if($matches){ ?>
                <h4 class='text-center red'>Matches</h4><hr/>

                <?php foreach($matches as $match){ ?>
                    <div class="card px-3 pt-3">
                        <div class="row mb-4 border-bottom pb-2">
                            <div class="col-9">
                                <h5 class=""><?php echo $match['nome']; ?> - 
                                <?php echo $match['animal']; ?>
                                </h5>
                            <a href="<?php echo site_url('mensagens/'.$match['id_animal'].'/'.$match['id_usuario']); ?>" class="red"><?php echo $this->lang->line('Start_chat'); ?></a>
                            </div>
                        </div>
                    </div>
        <?php }}
        if($likes){ ?>
            <h4 class='text-center red'>Mi-au-doreis</h4><hr/>

            <?php foreach ($likes as $like): ?>
                <div class="card px-3 pt-3">
                    <div class="row mb-4 border-bottom pb-2">
                        <div class="col-9">
                            <h5 class=""><?php echo $like['nome']; ?> - 
                            <?php echo $like['animal']; ?>
                            </h5>
                            <a href="<?php echo site_url('usuarios/'.$like['id_usuario'].'/'.$like['id_animal']); ?>" class="red"><?php echo $this->lang->line('See_more'); ?></a>
                        </div>
                    </div>
                </div>

        <?php endforeach; }} ?>
                    
</main>
<script>
        function confirm(){
            bootbox.confirm({ 
            size: "small",
            message: "<?php echo $this->lang->line('Confirm_delete_account'); ?>",
            callback: function(result){
                if(result == true){
                window.location = '<?php echo site_url('usuarios/delete/'.$this->session->userdata('id')); ?>'
                }
            }
            })
        }
</script>