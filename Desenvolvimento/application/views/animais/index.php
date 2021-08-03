<main>
        <?php foreach ($animais as $animal): ?>
                <h3><?php echo $animal['imagem']; ?></h3>
                <main>
                        <?php echo $animal['nome']; ?>
                </main>
                <p><a href="<?php echo $animal['id_animal']; ?>">Ver mais</a></p>
        <?php endforeach; ?>
</main>