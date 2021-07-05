<?php
// função para pegar string do arquivo languages.php
function getLanguageString($string, $lang="en_US", $parameters=null) {
    /*
    / levando em conta como exemplo: 
    / $translationsArray["pt_BR"]["Welcome"]    = "Seja bem-vindo a %s";
    /
    / $string = "ID" da string, seria o "Welcome"
    / $lang = A lingua para pegar a string, no caso pt_BR ou en_US
    / $parameters = uma array de valores para substituir os %s se tiver algum(s)
    */

// incluir o arquivo languages.php ou abortar o script
if (!require("langs.php")) {
    die("ERRO ao carregar arquivo de linguas");
}

    $actualTranslatedString = $translationsArray[$lang][$string];

    if (!empty($parameters)) {
        return vsprintf($actualTranslatedString, $parameters);
    }
    else {
        return $actualTranslatedString;
    }
}
?>