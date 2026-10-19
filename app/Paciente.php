<?php
namespace App;
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

    }
    public function excluir(){

    }
    public static function listar(){
        
        return null;
    }
}