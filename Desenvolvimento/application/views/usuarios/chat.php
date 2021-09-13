<main class="container">
    <div class="card-body">
        <?php if(!$this->session->flashdata('danger')){
          foreach($mensagens as $mensagem){ 
            $hora = explode(" ",$mensagem['datahora']);
            $hora = explode(":",$hora[1]);
            $mensagem['datahora'] = $hora[0].":".$hora[1];
            if($mensagem['id_remetente'] != $this->session->userdata('id')){?>
        <div class="d-flex flex-row justify-content-start">
              <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3-bg.png" alt="avatar 1"
                style="width: 45px; height: 100%;">
              <div>
                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;"><?php echo $mensagem['conteudo']; ?></p>
                <p class="small ms-3 mb-3 rounded-3 text-muted"><?php echo $mensagem['datahora']; ?></p>
              </div>
            </div>
        <?php } 
        else{ ?>
        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
              <div>
                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary"><?php echo $mensagem['conteudo']; ?></p>
                <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end"><?php echo $mensagem['datahora']; ?></p>
              </div>
              <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava4-bg.png" alt="avatar 1"
                style="width: 45px; height: 100%;">
            </div>
        <?php }} ?>

        <?php echo validation_errors(); ?>
        <?php echo form_open('mensagens/addMessage'); ?>

        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
            <textarea class="form-control form-control-lg" name="mensagem" rows="1" placeholder="Type message"></textarea>
            <input type="hidden" name="animal" value="<?php echo $animal['id_animal']; ?>">
            <button type="submit" class="ms-3 btn btn-info btn-rounded float-end">Ok</button>        
        </div>

        <?php } else{ ?>
          <p class="text-lg-center text-muted">:(</p>
          <p class="text-lg-center text-muted"><?php echo $this->lang->line('Animal_deleted')?><a href="<?php echo site_url('animais'); ?>"><?php echo $this->lang->line('Here'); ?></a></p>
          <?php } ?>
</main>