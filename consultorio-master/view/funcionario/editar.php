<?php

use App\Funcionario;
include('../includes/cabecalho.php');
include('../includes/menu.php');
include('../includes/rodape.php');
$id = $_GET['id'];
$funcionario = Funcionario::buscarPorId($id);
echo "<pre>";
print_r($funcionario);
echo "</pre>";

?>
<main class="container">
    <h1>Editar Funcionario</h1>
    <form method="POST" action="/consultorio/action/action_funcionario.php?action=alterar&id=<?= $id ?>">
        Nome * : <input name="nome" type="text" value="<?= $funcionario->nome ?>" class="form-control" required>
        CPF * : <input name="cpf" type="text" value="<?= $funcionario->cpf ?>" class="form-control" required>
        Data de Nascimento *: <input name="data_nascimento" type="date" value="<?= $funcionario->data_nascimento ?>" class="form-control" required>
        Telefone *: <input name="telefone" type="text" class="form-control" value="<?= $funcionario->telefone ?>" required>
        Email * : <input name="email" type="email" class="form-control" value="<?= $funcionario->email ?>" required>
        Endereço * : <input name="endereco" type="text" class="form-control" value="<?= $funcionario->endereco ?>" required>
        CRO : <input name="cro" type="text" class="form-control" value="<?= $funcionario->convenio ?>">
        Especialidade : <input name="especialidade" type="text" class="form-control" value="<?= $funcionario->observacao ?>">
        Senha : <input name="senha" type="password" class="form-control" value="<?= $funcionario->convenio ?>">
        Perfil *: <select name="perfil" class="form-select">
            <option value="<?= $funcionario->perfil ?>"><?= $funcionario->perfil ?></option>
            <option value="dentista">Dentista</option>
            <option value="secretaria">Secretaria</option>
                </select>
        <input type="submit" value="Editar" class="btn btn-primary">
    </form>
    <div class="pb-5"></div>
</main>
