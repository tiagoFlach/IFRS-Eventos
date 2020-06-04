<?php
class Modelo {
    private $debug;
    private $pdo;

    public function __construct($debug = false, $banco = BANCO, $usuario = USUARIO_BANCO, $senha = SENHA_BANCO) {
        $this->debug = $debug;
        
        try {
            $this->pdo = new PDO('mysql:host='.HOST.';dbname='.$banco, $usuario, $senha);
           
            if($debug){
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }
            $this->pdo->query("SET NAMES 'utf8'");
            $this->pdo->query('SET character_set_connection=utf8');
            $this->pdo->query('SET character_set_client=utf8');
            $this->pdo->query('SET character_set_results=utf8');
        } catch (PDOException $e) {
            if($this->debug)
                echo "Ocorreu um erro de conexão: " . $e->getMessage();
        }
    }

    public function __destruct(){
        $this->pdo = null;
    }

    public function inserir($tabela, $dados) {
        try{
            if (is_object($dados)) {
                $dados = $dados->getArrayDados();
            }
            else if(!is_array($dados)){
                return false;
            }
            
            $colunas = $valores = array();
            foreach ($dados as $key => $value) {
                $colunas[] = $key;
                $valores[] = $value;
                $values[] = ':'.$key;
            }
            $colunasStr = implode(', ', $colunas);
            $dadosStr = implode(', ', $values);
            
            $sql = "INSERT INTO ".$tabela." (".$colunasStr.") VALUES (".$dadosStr.")";
            
            $sql = $this->pdo->prepare($sql);
            foreach ($dados as $key => $value) {
                $sql->bindValue(':'.$key, $value);
            }
            return $sql->execute();
        } catch (PDOException $e){
            if($this->debug)
                echo "Ocorreu um erro: " . $e->getMessage();
            return false;
        }
    }

    public function atualizar($tabela, $dados, $condicao) {
        try{
            $sql = "UPDATE ".$tabela." SET ";
            
            if (is_object($dados)) {
                $dados = $dados->getArrayDados();    
            } else if(!is_array($dados)){
                return false;
            }
            foreach($dados as $coluna=>$valor){
                $sql .= $coluna.'=:'.$coluna.', ';
            }
            
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE";
            if(is_array($condicao)){
                foreach($condicao as $coluna=>$valor){
                    $sql .= " ".$coluna."=:".$coluna." AND ";
                }
            }else{
                $sql.= ' '.$condicao;
            }

            $sql = rtrim($sql, ' AND ');
            $sql = $this->pdo->prepare($sql);
            foreach ($dados as $key => $value) {
                $sql->bindValue(':'.$key, $value);
            }
            /**foreach($condicao as $coluna=>$valor){
                $sql->bindValue(':'.$coluna, $valor);
            }**/
            return $sql->execute();
        } catch(PDOException $e){
            if($this->debug)
                echo "Ocorreu um erro: " . $e->getMessage();
            return false;
        }
    }

    public function deletar($tabela, $condicao) {
        $sql = 'DELETE FROM '.$tabela.' WHERE '.$condicao;
        $sql = $this->pdo->prepare($sql);   
        $sql->execute();
    }
    
    public function consultar($tabela, $colunas = '*', $condicao = false, $join = false, $ordenacao = false, $limite = false) {
        if (is_array($colunas)) {
            $colunas = implode(', ', $colunas);
        }

        $sql = "SELECT ".$colunas." FROM ".$tabela;
        
        if($join != false)
            $sql .= " $join";

        if($condicao != false){
            if (is_array($condicao)){
                $cond = ' WHERE ';
                foreach($condicao as $coluna=>$valor){
                    if(strlen($coluna) > 8){
                        if(substr($coluna, 0, 8) == 'conscond'){
                            $cond .= ' '.$valor.' ';
                        }else{
                            $cond .= $coluna.'=:'.$coluna.' ';
                        }
                    }else{
                        $cond .= $coluna.'=:'.$coluna.' ';
                    }
                }
                $sql .= "$cond";
            } else {
                $sql .= " WHERE $condicao";
            }
        }
        
        if($ordenacao != false)
            $sql .= " ORDER BY $ordenacao";
        
        if($limite != false)
            $sql .= " LIMIT $limite";
            
        $sql = $this->pdo->prepare($sql);

        if(is_array($condicao)){
            if($condicao != false){
                foreach($condicao as $coluna=>$valor){
                    if(strlen($coluna) > 8){
                        if(substr($coluna, 0, 8) != 'conscond'){
                            $sql->bindValue(':'.$coluna, $valor);
                        }
                    }else{
                        $sql->bindValue(':'.$coluna, $valor);
                    }
                }
            }
        }

        try {
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $ex) {
            return false;
        }  
    }

    public function query($sql) {
        $sql = $this->pdo->prepare($sql);
        $query = $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function checaExiste($tabela, $chave, $valor){
        $consulta = $this->consultar($tabela, '*', array($chave => $valor));
        if(is_array($consulta) and count($consulta) > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>