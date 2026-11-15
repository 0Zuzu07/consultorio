<?php
namespace App;
use PDO;
class Funcionario extends Pessoa{
    public $cro;
    public $especialidade;
    public $senha;
    public $perfil;
    public function cadastrar(){
        $db = new DataBase('funcionario');
        $this->id = $db->insert([
            'nome' => $this->nome,
            'cpf'  => $this->cpf,
            'data_nascimento' =>$this->data_nascimento,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'cro' => $this->cro,
            'especialidade' => $this->especialidade,
            'senha' => $this->senha,
            'perfil' => $this->perfil
        ]);    
        

    }
    public function alterar(){
        return (new DataBase('funcionario'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'cpf'  => $this->cpf,
            'data_nascimento' =>$this->data_nascimento,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'cro' => $this->cro,
            'especialidade' => $this->especialidade,
            'senha' => $this->senha,
            'perfil' => $this->perfil
        ]);
    }
    public function excluir(){
        return (new DataBase('funcionario'))->delete('id = '.$this->id);
    }
    public static function listar($where = null, $order = null, $limit = null, $fields = '*'){
        return (new DataBase('funcionario'))->select($where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function buscarPorId($id){
        return (new DataBase('funcionario'))->select('id ='.$id)->fetchObject(self::class);
    }

}