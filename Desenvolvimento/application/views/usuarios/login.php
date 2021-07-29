<?php echo validation_errors(); ?>

<?php echo form_open('usuarios/login'); ?>
    <label for="email"><?php echo $this->lang->line('Email'); ?></label><br>
    <input type="email" name="email" id="email" placeholder="<?php echo $this->lang->line('Email'); ?>" required><br>

    <label for="senha"><?php echo $this->lang->line('Password'); ?></label><br>
    <input type="password" name="senha" id="senha" placeholder="*********" required><br>

    <input type="submit" value="<?php echo $this->lang->line('Login'); ?>">
</form>
<a href=""><?php echo $this->lang->line('FgPasswd'); ?></a><br>