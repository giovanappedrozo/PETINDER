    <script>
    function load_messages(){
      $.ajax({
        url:"<?php echo site_url('mensagens/load_messages'); ?>",
        method:"POST",
        data: {action: 'true'},
        dataType: 'json',
        success:messages
      }) 
    }

    function messages(data)
    {
      var output = '';
      if(data.length > 0)
      {
        for(var count = 0; count < data.length; count++)
        {
          nome = data[count].nome;
          nome = nome.split(" ", 1);
          output += '<a href="<?php echo site_url(); ?>/mensagens/'+data[count].id_animal+'/'+data[count].id_usuario+'">'+
                    '<li class="dropdown-item notification"> <div class="row">'+
                    '<div class="col-4"><p class="font-weight-bold msg">'+nome+' - '+data[count].animal+'</p>'+
                    '<p class="text-sm-left msg">'+data[count].conteudo+'</p></div>'+
                    '</div></li></a>';
        }
      }
      else
      {
        output += '<div align="center"><b><?php echo $this->lang->line('No_message'); ?></b></div>';
      }

      $('#message_area').html(output);
    }    

    function matches(){
      $.ajax({
        url:"<?php echo site_url('mensagens/load_messages'); ?>",
        method:"POST",
        data: {action: 'true'},
        dataType: 'json',
        success:messages
      }) 
    }

    $('#chat_area').animate({
      scrollTop: $(this).height() 
    }, 300);
    </script>
  </body>
</html>