<?php
use App\Funcionario;
include('../includes/cabecalho.php');
include('../includes/menu.php');
include('../includes/rodape.php');
$funcionarios = Funcionario::listar();
?>
<main class="container">
    <h1 class="text-center">Lista de Funcionarios</h1>
    <div class="text-end my-2">
        <a href="/consultorio/view/funcionario/cadastrar.php">
            <button class="btn btn-success">Novo Funcionario</button>
        </a>
    </div>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereco</th>
                <th>CRO</th>
                <th>Especialidade</th>
                <th>Perfil</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($funcionarios as $funcionario) {
                echo "<tr>
        <td>" . $funcionario->nome . "</td>
        <td>" . $funcionario->cpf . "</td>
        <td>" . date("d/m/Y", strtotime($funcionario->data_nascimento)) . "</td>
        <td>" . $funcionario->telefone . "</td>
        <td>" . $funcionario->email . "</td>
        <td>" . $funcionario->endereco . "</td>
        <td>" . $funcionario->cro . "</td>
        <td>" . $funcionario->especialidade . "</td>
        <td>" . $funcionario->perfil . "</td>
        <td><a href='editar.php?id=" . $funcionario->id . "'>
            <button class='btn btn-primary'>Editar</button></a></td>
        <td><a href='/consultorio/action/action_funcionario.php?action=excluir&id=" . $funcionario->id . "'>
            <button class='btn btn-danger'>Excluir</button></a></td>
        </tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="pb-5"></div>
</main>