<?php
include('layout.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title><?php $pagetitle = getLanguageString("Title_pet_register", $lang); echo $pagetitle; ?> | PETINDER</title>
    </head>
    <body>
        <main>
            <h1><?php $pagetitle = getLanguageString("Title_pet_register", $lang); echo $pagetitle; ?> &#128062;</h1>
            <form action="db/main-pet-register.php" enctype="multipart/form-data" method="POST">
                <label for="faimg"><?php $addphoto = getLanguageString("Add_photo", $lang); echo $addphoto; ?>: </label>
                <input type="file" name="faimg" id="faimg" accept=”image/*” required><br>

                <label for="fanome"><?php $name = getLanguageString("Name", $lang); echo $name; ?></label><br>
                <input type="text" name="fanome" id="fanome" placeholder="<?php $name = getLanguageString("Name_pet", $lang); echo $name; ?>" required><br>

                <label for="fasexo"><?php $gender = getLanguageString("Sex", $lang); echo $gender; ?></label></label><br>
                <select name="fasexo" id="fasexo">
                <?php                     
                $sql = "SELECT id_genero, genero FROM genero WHERE lang = '$lang'";
                $id = 'id_genero';
                $nome = 'genero';
                $banco->Selecionar($sql, $id, $nome);
                ?>
                </select><br>

                <label for="fadata"><?php $bdate = getLanguageString("BirthDate", $lang); echo $bdate; ?></label></label><br>
                <input type="date" name="fadata" id="fadata" required><br>

                <label for="faespecie"><?php $species = getLanguageString("Species", $lang); echo $species; ?></label></label><br>
                <select name="faespecie" id="faespecie">
                <?php                     
                $sql = "SELECT id_especies, especie FROM especie WHERE lang = '$lang'";
                $id = 'id_especie';
                $nome = 'especie';
                $banco->Selecionar($sql, $id, $nome);
                ?>
                </select><br>

                <label for="faraca"><?php $breed = getLanguageString("Breed", $lang); echo $breed; ?></label></label><br>
                <select name="faraca" id="faraca">
                <?php  
                $id = 'id_raca';
                $nome = 'raca';                   
                $sql = "SELECT id_raca, raca FROM raca WHERE id_especies = 1 ORDER BY raca ASC";
                $banco->Selecionar($sql, $id, $nome);
                ?>
                </select><br>

                <label for="faporte" id="porteref"><?php $size = getLanguageString("Size", $lang); echo $size; ?> &#10067;</label><br>
                <select name="faporte" id="faporte">
                <?php                     
                $sql = "SELECT id_porte, porte FROM porte WHERE lang = '$lang'";
                $id = 'id_porte';
                $nome = 'porte';
                $banco->Selecionar($sql, $id, $nome);
                ?>
                </select><br>

                <label><input type="checkbox" name="facastrado" id="facastrado" value="castrado"><?php $castrated = getLanguageString("Castrated", $lang); echo $castrated; ?></label><br>

                <label for="fainfo"><?php $addinfo = getLanguageString("AddInfo", $lang); echo $addinfo; ?></label><br>
                <input type="text" name="fainfo" id="fainfo"><br>

                <input type="hidden" name="lang" value="<?php echo $lang; ?>">

                <input type="submit" value="<?php $submit = getLanguageString("Title_reg", $lang); echo $submit; ?>">
            </form>
        </main>
    </body>
</html>