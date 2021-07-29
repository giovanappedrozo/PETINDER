<?php echo validation_errors(); ?>

<?php echo form_open_multipart('animais/register');?>

<label for="img"><?php echo $this->lang->line('Add_photo'); ?>: </label>
<input type="file" name="img" id="img" required><br>

<label for="nome"><?php echo $this->lang->line('Name'); ?></label><br>
<input type="text" name="nome" id="nome" placeholder="<?php echo $this->lang->line('Name_pet'); ?>" required><br>

<label for="genero"><?php echo $this->lang->line('Sex'); ?></label></label><br>
<select name="genero" id="genero">
<?php foreach ($generos as $genero): ?>
        <option value="<?php echo $genero['id_genero']; ?>"><?php echo $genero['genero']; ?></option>
<?php endforeach; ?>
</select><br>

<label for="data"><?php echo $this->lang->line('BirthDate'); ?></label></label><br>
<input type="date" name="data" id="data" required
min="<?php $data = new DateTime('now'); $data->modify('-35 years'); echo $data->format('Y-m-d');?>"
max="<?php $data = new DateTime('now'); echo $data->format('Y-m-d');?>"><br>

<label for="especie"><?php echo $this->lang->line('Species'); ?></label></label><br>
<select name="especie" id="especie" onchange="changeBreed();">
<?php foreach ($especies as $especie): ?>
        <option value="<?php echo $especie['id_especies']; ?>"><?php echo $especie['especie']; ?></option>
<?php endforeach; ?>
</select><br>

<label for="raca"><?php echo $this->lang->line('Breed'); ?></label></label><br>
<select name="raca" id="raca">
<?php foreach ($racas as $raca): ?>
        <option value="<?php echo $raca['id_raca']; ?>"><?php echo $raca['raca']; ?></option>
<?php endforeach; ?>
</select><br>

<label for="porte"><?php echo $this->lang->line('Size'); ?> &#10067;</label><br>
<select name="porte" id="porte">
<?php foreach ($portes as $porte): ?>
        <option value="<?php echo $porte['id_porte']; ?>"><?php echo $porte['porte']; ?></option>
<?php endforeach; ?>
</select><br>

<label for="pelagem" ><?php echo $this->lang->line('Coat'); ?></label><br>
<select name="pelagem" id="pelagem">
<?php foreach ($pelagens as $pelagem): ?>
        <option value="<?php echo $pelagem['id_pelagem']; ?>"><?php echo $pelagem['pelagem']; ?></option>
<?php endforeach; ?>
</select><br>

<label for="especial"><?php echo $this->lang->line('Special'); ?></label><br>
<label><input type="radio" name="especial" id="especial" value="TRUE" required><?php echo $this->lang->line('Yes'); ?></label><br>
<label><input type="radio" name="especial" value="FALSE"><?php echo $this->lang->line('No'); ?></label><br>

<label for="temperamento"><?php echo $this->lang->line('Temperament'); ?></label><br>
<select name="temperamento" id="temperamento">
<?php foreach ($temperamentos as $temperamento): ?>
        <option value="<?php echo $temperamento['id_temperamento']; ?>"><?php echo $temperamento['temperamento']; ?></option>
<?php endforeach; ?>
</select><br>

<label><input type="checkbox" name="castrado" id="castrado" value="castrado"><?php echo $this->lang->line('Castrated'); ?></label><br>

<label for="info"><?php echo $this->lang->line('AddInfo'); ?></label><br>
<input type="text" name="info" id="info" placeholder="<?php echo $this->lang->line('More_info'); ?>"><br>

<input type="submit" name="submit" value="<?php echo $this->lang->line('Submit'); ?>">

</form>