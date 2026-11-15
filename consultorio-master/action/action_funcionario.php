<?php
use App\Funcionario;
include('../vendor/autoload.php');
$action = $_GET['action'];
$funcionario = new Funcionario();
switch($action){
    case 'cadastrar':
        $funcionario->nome = $_POST['nome'];
        $funcionario->cpf = $_POST['cpf'];
        $funcionario->data_nascimento = $_POST['data_nascimento'];
        $funcionario->telefone = $_POST['telefone'];
        $funcionario->email = $_POST['email'];
        $funcionario->endereco = $_POST['endereco'];
        $funcionario->cro = $_POST['cro'];
        $funcionario->especialidade = $_POST['especialidade'];
        $funcionario->senha = $_POST['senha'];
        $funcionario->perfil = $_POST['perfil'];
        $funcionario->cadastrar();
        
        header('location: /consultorio/view/funcionario/listar.php');
    break;
    case 'alterar':
        $funcionario = Funcionario::buscarPorId($_GET['id']);
        $funcionario->nome = $_POST['nome'];
        $funcionario->cpf = $_POST['cpf'];
        $funcionario->data_nascimento = $_POST['data_nascimento'];
        $funcionario->telefone = $_POST['telefone'];
        $funcionario->email = $_POST['email'];
        $funcionario->endereco = $_POST['endereco'];
        $funcionario->cro = $_POST['cro'];
        $funcionario->especialidade = $_POST['especialidade'];
        $funcionario->senha = $_POST['senha'];
        $funcionario->perfil = $_POST['perfil'];
        $funcionario->alterar();
        header('location: /consultorio/view/funcionario/listar.php');
    break;
    case 'excluir':
        $funcionario->id = $_GET['id'];
        $funcionario->excluir();
        header('location: /consultorio/view/funcionario/listar.php');
    break;
}
?>