<?php
include('layout.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title><?php $pagetitle = getLanguageString("Title_reg", $lang); echo $pagetitle; ?> | PETINDER</title>
    </head>
    <body>
        <header>
            <a href="login"><?php $account = getLanguageString("Registered", $lang); echo $account; ?></a>
        </header>
        <main>
            <h1><?php echo $pagetitle; ?></h1>
            <form action="db/main-user-register.php" method="POST">
                <label for="funome"><?php $name = getLanguageString("Name", $lang); echo $name; ?></label><br>
                <input type="text" id="funome" name="funome" placeholder="<?php $name = getLanguageString("Name", $lang); echo $name; ?>" required><br>

                <label for="fuemail"><?php $email = getLanguageString("Email", $lang); echo $email; ?></label><br>
                <input type="email" name="fuemail" id="fuemail" placeholder="<?php $email = getLanguageString("Email", $lang); echo $email; ?>" required><br>

                <label for="fusenha"><?php $password = getLanguageString("Password", $lang); echo $password; ?></label><br>
                <input type="password" name="fusenha" id="fusenha" placeholder="*********" required><br>

                <label for="fuconfirmacao"><?php $conf_passwd = getLanguageString("Conf_passwd", $lang); echo $conf_passwd; ?></label><br>
                <input type="password" name="fuconfirmacao" id="fuconfirmacao" placeholder="*********" required><br>

                <label for="fugenero"><?php $gender = getLanguageString("Gender", $lang); echo $gender; ?></label><br>
                <select name="fugenero" id="fugenero">
                <?php                     
                $sql = "SELECT id_genero, genero FROM genero WHERE lang = '$lang'";
                $id = 'id_genero';
                $nome = 'genero';
                $banco->Selecionar($sql, $id, $nome);
                ?>
                </select><br>

                <label for="fudata"><?php $birth_date = getLanguageString("BirthDate", $lang); echo $birth_date; ?></label><br>
                <input type="date" name="fudata" id="fudata"><br>

                <label onclick="getLocation()">
                    <input type="checkbox" name="facastrado" id="facastrado" value="Habilitado">
                        <?php $location = getLanguageString("Location", $lang); echo $location; ?>
                </label><br>
                <p id="demo"></p>
                
                <input type="hidden" name="latitude" id="latitude" value="0">
                <input type="hidden" name="longitude" id="longitude" value="0">

                <input type="submit" value="<?php echo $pagetitle; ?>">
            </form>
        </main>
    </body>
</html>