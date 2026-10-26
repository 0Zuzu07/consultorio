<?php
use App\Paciente;
include('../includes/cabecalho.php');
include('../includes/menu.php');
include('../includes/rodape.php');
$pacientes = Paciente::listar();
?>
    <button class="btn btn-sucess">Novo Paciente</button>
<main class="container">
    <h1>Lista de Pacientes</h1>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereco</th>
                <th>Convênio</th>
                <th>Observação</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($pacientes as $paciente){
        echo "<tr>
        <td>".$paciente->nome."</td>
        <td>".$paciente->cpf."</td>
        <td>".date("dd/m/Y",strtotime($paciente->data_nascimento))."</td>
        <td>".$paciente->telefone."</td>
        <td>".$paciente->email."</td>
        <td>".$paciente->endereco."</td>
        <td>".$paciente->convenio."</td>
        <td>".$paciente->observacao."</td>
        <td>
        <td> <a href='editar.php?id=".$paciente->id."'><
        <button class='btn-primary'>Editar</button></a></td>
        <a href='/consultorio/action/action_paciente.php?
        action=excluir&id=".$paciente->id."'>Excluir</a>
        <button class='btn-danger'>Excluir</button></a></td>
        </tr>";
    }
?>
        </tbody>
    </table>
    <div class="pb-5"></div>
</main>    