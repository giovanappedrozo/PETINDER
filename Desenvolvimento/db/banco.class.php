<?php
class Banco {

    private $conexao, $sql, $db;
    public $qry;
    private $host = "b39-c80-e55-f72-gg14.postgres.database.azure.com";
    private $user = "bcefgg92837584@b39-c80-e55-f72-gg14";
    private $pass = "aZ2277petBCEfgg0809123ya";
    private $banco = "postgres";
    private $porta = "5432";

    public function setHost($ip){
        $this->host = $ip;
    }

    public function setUser($usr){
        $this->user = $usr;
    }

    public function setPass($pwd){
        $this->pass = $pwd;
    }

    public function setBanco($db){
        $this->banco = $db;
    }

    public function Conectar(){         
        try{
        $this->conexao = new PDO('pgsql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco.';user='.$this->user.';password='.$this->pass);
        }
        catch(exception $e){
            echo $e->getMessage();
        }
    }

    public function Prova($sql){
        $this->sql = (string) $sql;
        self::Conectar();

        $this->qry = $this->conexao->prepare($sql);
        $this->qry->execute();  
        $raca='';

        while ($row = $this->qry->fetch(PDO::FETCH_ASSOC)) {
            $raca.= $row["nome"]."<br>" . $row["senha"]."<br>" . $row["localizacao"]."<br><br>";
        }
        echo $raca;
    }

    public function Selecionar($sql, $id, $nome){
        $this->sql = (string) $sql;
        self::Conectar();

        $this->qry = $this->conexao->prepare($sql);
        $this->qry->execute();  
        $raca='';

        while ($row = $this->qry->fetch(PDO::FETCH_ASSOC)) {
            $raca.= "<option value='" . $row[$id] . "'>" . $row[$nome] . "</option>";
        }
        echo $raca;
    }

    public function Executar($sql){
        $this->sql = (string) $sql;
        self::Conectar();

        $this->qry = $this->conexao->prepare($sql);
        $this->qry->execute();  
    }

    private function Desconectar(){
        return pg_close($this->conexao);
    }
}
?>
