<?php
namespace App;
use PDO;
class Paciente extends Pessoa{
    public $convenio;
    public $observacao;
    public function cadastrar(){
        $db = new DataBase('paciente');
        $this->id = $db->insert([
            'nome' => $this->nome,
            'cpf'  => $this->cpf,
            'data_nascimento' =>$this->data_nascimento,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'convenio' => $this->convenio,
            'observacao' => $this->observacao
        ]);    
        

    }
    public function alterar(){
        return (new DataBase('paciente'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'cpf'  => $this->cpf,
            'data_nascimento' =>$this->data_nascimento,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'convenio' => $this->convenio,
            'observacao' => $this->observacao
        ]);
    }
    public function excluir(){
        return (new DataBase('paciente'))->delete('id = '.$this->id);
    }
    public static function listar($where = null, $order = null, $limit = null, $fields = '*'){
        return (new DataBase('paciente'))->select($where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function buscarPorId($id){
        return (new DataBase('paciente'))->select('id ='.$id)->fetchObject(self::class);
    }
}