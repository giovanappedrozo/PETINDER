<?php foreach ($usuarios as $usuario): ?>
        <main>
                <?php
                $ar = ["/[^0-9]/", "/[-]/", ];
                $a = preg_replace($ar, "", $usuario['localizacao']);
                echo $a; ?>
        </main>
<?php endforeach; ?>