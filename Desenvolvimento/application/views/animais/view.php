<main class="container">
<div class="card px-3 pt-3">
  <!-- News block -->
  <div>
    <!-- Featured image -->
    <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4">
      <img src="<?php echo base_url('assets/fotos/'.$animal['imagem']); ?>" class="img-fluid" id="img-view"/>
    </div>

    <!-- Article data -->
    <div class="row mb-3">
      <div class="col-6">
        <button type="submit" class="text-info" id="like-link" "<?php base_url('usuarios/avaliacao'); ?>" onmouseover="filledHeart()" onmouseout="emptyHeart()">
        <i class="bi bi-heart" id="like"></i>
        MI-AU-DOREI
        </a>&nbsp;&nbsp;
        <a class="text-info" id="like-link" href="" onmouseover="filledXCircle()" onmouseout="emptyXCircle()">
        <i class="bi bi-x-circle" id="deslike"></i>
        DES-AU-GOSTEI
        </a>
      </div>

      <div class="col-6 text-end">
        <u> 15.07.2020</u>
      </div>
    </div>

    <!-- Article title and description -->
    <a href="" class="text-dark">
      <h5>This is title of the news</h5>

      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, iste aliquid. Sed
        id nihil magni, sint vero provident esse numquam perferendis ducimus dicta
        adipisci iusto nam temporibus modi animi laboriosam?
      </p>
    </a>
</main>