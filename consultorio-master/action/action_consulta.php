<?php
use App\Consulta;

include('../vendor/autoload.php');

$action = $_GET['action'] ?? '';
$consulta = new Consulta();

switch ($action) {
    case 'cadastrar':
        $consulta->paciente_id = (int) ($_POST['paciente_id'] ?? 0);
        $consulta->dentista_id = (int) ($_POST['dentista_id'] ?? 0);
        $consulta->data_hora = str_replace('T', ' ', $_POST['data_hora'] ?? '');
        $consulta->valor_total = $_POST['valor_total'] ?? 0;
        $consulta->valor_pago = $_POST['valor_pago'] ?? 0;
        $consulta->forma_pagamento = $_POST['forma_pagamento'] ?? '';
        $consulta->procedimentos_realizados = $_POST['procedimentos_realizados'] ?? '';
        $consulta->procedimentos_arealizar = $_POST['procedimentos_arealizar'] ?? '';
        $consulta->descricao = $_POST['descricao'] ?? '';
        $consulta->medicacao = $_POST['medicacao'] ?? '';
        $consulta->cadastrar();
        break;

    case 'alterar':
        $consulta = Consulta::buscarPorId((int) ($_GET['id'] ?? 0));
        if (!$consulta) {
            http_response_code(404);
            exit('Consulta não encontrada.');
        }
        $consulta->paciente_id = (int) ($_POST['paciente_id'] ?? 0);
        $consulta->dentista_id = (int) ($_POST['dentista_id'] ?? 0);
        $consulta->data_hora = str_replace('T', ' ', $_POST['data_hora'] ?? '');
        $consulta->valor_total = $_POST['valor_total'] ?? 0;
        $consulta->valor_pago = $_POST['valor_pago'] ?? 0;
        $consulta->forma_pagamento = $_POST['forma_pagamento'] ?? '';
        $consulta->procedimentos_realizados = $_POST['procedimentos_realizados'] ?? '';
        $consulta->procedimentos_arealizar = $_POST['procedimentos_arealizar'] ?? '';
        $consulta->descricao = $_POST['descricao'] ?? '';
        $consulta->medicacao = $_POST['medicacao'] ?? '';
        $consulta->alterar();
        break;

    case 'excluir':
        $consulta->id = (int) ($_GET['id'] ?? 0);
        $consulta->excluir();
        break;

    default:
        http_response_code(400);
        exit('Ação inválida.');
}

header('Location: /consultorio/view/consulta/listar.php');
exit;
