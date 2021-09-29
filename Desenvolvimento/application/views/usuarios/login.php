<main class="container">
    <?php echo validation_errors(); ?>

    <?php if($this->session->flashdata("danger")) { ?>
        <p class="alert alert-danger"><?=  $this->session->flashdata("danger") ?></p>
        <?php } unset($_SESSION['danger']);?>

    <?php echo form_open('usuarios/login'); ?>

    <div class="form-floating mb-4">
    <input type="email" id="email" class="form-control" required name="email" placeholder="email@exemplo.com"/>
    <label for="email"><?php echo $this->lang->line('Email'); ?></label>
  </div>

    <!-- Password input -->
    <div class="form-floating mb-4">
        <input type="password" id="senha" class="form-control" required name="senha" placeholder="********"/>
        <label for="senha"><?php echo $this->lang->line('Password'); ?></label>
    </div>


        <!-- Simple link -->
        <a class="col" href="#!"><?php echo $this->lang->line('FgPasswd'); ?></a>
 
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4 submit"><?php echo $this->lang->line('Login'); ?></button>

            <div class="text-center">
                <p><?php echo $this->lang->line('Wo_register'); ?> <a class="col" href="<?php echo site_url("usuarios/register"); ?>"><?php echo $this->lang->line('Title_reg'); ?></a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-github"></i>
                </button>
            </div>
    </form>
</main>