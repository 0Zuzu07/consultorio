<?php
namespace App;
use PDO;
class Paciente extends Pessoa{
    public $convenio;
    public $observacao;
    public function cadastrar(){
        $db = new DataBase('paciente');
        $db->insert([
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
        return (new DataBase('paciente')->update('id = '.$this-id, [
            'nome' => $this->nome,
            'cpf'  => $this->cpf,
            'data_nascimento' =>$this->data_nascimento,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'convenio' => $this->convenio,
            'observacao' => $this->observacao
        ]));
        

    }
    public function excluir($where){
        return (new DataBase('paciente')->delete('id = '.$this-id));

    }
    public static function listar(){
        
        return (new DataBase('paciente'))->select()->fetchALL(PDO::FETCH_CLASS, self::class);
    }
}