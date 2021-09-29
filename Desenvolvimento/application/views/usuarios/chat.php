<main class="container">
    <div class="card-body">
        <?php if(!$this->session->flashdata('danger')){ ?>
          <div class="chat" id="chat_area"></div>
        <?php echo validation_errors(); ?>
        <?php echo form_open('mensagens/addMessage'); ?>

        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
            <textarea class="form-control form-control-lg" name="mensagem" rows="1" placeholder="Type message" required></textarea>
            <?php if($usuario){ ?>
              <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
            <?php } else {?>
              <input type="hidden" name="usuario" value="<?php echo $animal['id_doador']; ?>">
            <?php } ?>

            <input type="hidden" name="animal" value="<?php echo $animal['id_animal']; ?>">
            <button type="submit" class="ms-3 btn btn-info btn-rounded float-end">Ok</button>        
        </div>
      </div>

        <?php } else{ ?>
          <p class="text-lg-center text-muted">:(</p>
          <p class="text-lg-center text-muted"><?php echo $this->lang->line('Animal_deleted')?><a href="<?php echo site_url('animais'); ?>"><?php echo $this->lang->line('Here'); ?></a></p>
          <?php unset($_SESSION['danger']); } ?>
</main>
<script>
  load_chat_data();

  function load_chat_data(){
      $.ajax({
        url:"<?php echo site_url('mensagens/'.$animal['id_animal'].'/'.$usuario); ?>",
        method:"POST",
        data: {action: 'true'},
        dataType: 'json',
        success:function(data){
          var output = '';
          if(data.length > 0)
          {
            for(var count = 0; count < data.length; count++)
            {
              if(data[count].direcao == 'esquerda')
                output += '<div class="d-flex flex-row justify-content-start">'+
              '<img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3-bg.png" alt="avatar 1"'+
                'style="width: 45px; height: 100%;">'+
              '<div><p class="small p-2 ms-3 mb-1 rounded-3 msg-text-light">'+data[count].conteudo+'</p>'+
                '<p class="small ms-3 mb-3 rounded-3 text-muted">'+data[count].datahora+'</p></div></div>';

              else
                output += '<div class="d-flex flex-row justify-content-end mb-4 pt-1">'+
                '<div><p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">'+data[count].conteudo+'</p>'+
                '<p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">'+data[count].datahora+'</p></div>'+
                '<img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava4-bg.png" alt="avatar 1"'+
                'style="width: 45px; height: 100%;"></div>';
            }
          }
          else
          {
            output += '<div align="center"><b>No Data Found</b></div>';
          }

          $('#chat_area').html(output);
        }
      }) 
    }

    setInterval(function(){
      load_chat_data();
    }, 1000);
</script>