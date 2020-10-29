<?php

require_once "Config/Config.class.php";

class Automovel{

    public function cadastrar(array $dados){

        if($this->existeCadastrado($dados['Placa'])){
            return false;
        }else{
            $pdo = Config::connect();

            $dados['CreateDate'] = date('Y/m/d h:i:s', time());
            $dados['UpdateDate'] = null;

            $sql = "INSERT INTO automovel (TipoVeiculo, Modelo, Fabricante, Ano, Seguro, Placa, DataAquisicao, CreateDate, UpdateDate) 
            VALUES (:TipoAutomovel, :ModeloAutomovel, :Fabricante, :AnoFabricacao, :Seguro, :Placa, :DtAquisicao, :CreateDate, :UpdateDate)";

            $query = $pdo->prepare($sql);

            if($query->execute($dados)){
                return true;
            }

            Config::disconnect();
            return false;

        }
    }

    public function atualizar(array $dados){
        $pdo = Config::connect();

        $dados['UpdateDate'] = date('Y/m/d h:i:s', time());
        
        $sql = "UPDATE automovel 
        SET TipoVeiculo=:TipoVeiculo, Modelo=:Modelo, Fabricante=:Fabricante, Ano=:Ano, Seguro=:Seguro, Placa=:Placa, DataAquisicao=:DataAquisicao, UpdateDate=:UpdateDate 
        WHERE AutoMovelId = :AutoMovelId";

        $query = $pdo->prepare($sql);
        $query->bindParam(":TipoVeiculo", $dados['TipoAutomovel']);
        $query->bindParam(":Modelo", $dados['ModeloAutomovel']);
        $query->bindParam(":Fabricante", $dados['Fabricante']);
        $query->bindParam(":Ano", $dados['AnoFabricacao']);
        $query->bindParam(":Seguro", $dados['Seguro']);
        $query->bindParam(":Placa", $dados['Placa']);
        $query->bindParam(":DataAquisicao", $dados['DtAquisicao']);
        $query->bindParam(":UpdateDate", $dados['UpdateDate']);
        $query->bindValue(":AutoMovelId", $dados['AutoMovelId']);

        if($query->execute()){
            return true;
        }
        
        Config::disconnect();
        return false;
    }

    public function excluir ($automovelId){
        $pdo = Config::connect();
        $sql = "DELETE FROM automovel WHERE AutoMovelId = :AutoMovelId";
        $query = $pdo->prepare($sql);

        if($query->execute(array(":AutoMovelId" => $automovelId))){
            return true;
        }

        Config::disconnect();
        return false;
    }

    public function pegarTodos(){

        $pdo = Config::connect();
        $sql = "SELECT * FROM automovel";
        $query = $pdo->query($sql, PDO::FETCH_ASSOC);
        $result = $query->fetchAll();
        
        Config::disconnect();

        return $result;

    }

    public function pegar($automovelId){

        $pdo = Config::connect();
        $sql = "SELECT * FROM automovel WHERE AutoMovelId = :AutomovelId";
        $query = $pdo->prepare($sql);

        $query->execute(array("AutomovelId" => $automovelId));

        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        Config::disconnect();
        return $result;

    }

    private function existeCadastrado(string $placa){
        $pdo = Config::connect();

        $sql = "SELECT * FROM automovel WHERE Placa = :Placa";
        $query = $pdo->prepare($sql);
        
        $query->execute(array("Placa" => $placa));

        if($query->rowCount() > 0){
            return true;
        }
        
        Config::disconnect();
        return false;

    }

}

?>
