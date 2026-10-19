<?php
use App\Paciente;
include('../vendor/autoload.php');
$action = $_GET['action'];
$paciente = new Paciente();
switch($action){
    case 'cadastrar':
        $paciente->nome = $_POST['nome'];
        $paciente->cpf = $_POST['cpf'];
        $paciente->data_nascimento = $_POST['data_nascimento'];
        $paciente->telefone = $_POST['telefone'];
        $paciente->email = $_POST['email'];
        $paciente->endereco = $_POST['endereco'];
        $paciente->convenio = $_POST['convenio'];
        $paciente->observacao = $_POST['observacao'];
        $paciente->cadastrar();
        
        //header('location: /consultorio/view/paciente/listar.php');
    break;
    case 'alterar':
        
    break;
    case 'excluir':

    break;
}
?>