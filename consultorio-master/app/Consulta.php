<?php
namespace App;

use PDO;

class Consulta
{
    public $id;
    public $paciente_id;
    public $dentista_id;
    public $data_hora;
    public $valor_total;
    public $valor_pago;
    public $forma_pagamento;
    public $procedimentos_realizados;
    public $procedimentos_arealizar;
    public $descricao;
    public $medicacao;
    public $paciente_nome;
    public $dentista_nome;

    public function cadastrar()
    {
        $this->id = (new DataBase('consulta'))->insert([
            'paciente_id' => $this->paciente_id,
            'dentista_id' => $this->dentista_id,
            'data_hora' => $this->data_hora,
            'valor_total' => $this->valor_total,
            'valor_pago' => $this->valor_pago,
            'forma_pagamento' => $this->forma_pagamento,
            'procedimentos_realizados' => $this->procedimentos_realizados,
            'procedimentos_arealizar' => $this->procedimentos_arealizar,
            'descricao' => $this->descricao,
            'medicacao' => $this->medicacao,
        ]);
    }

    public function alterar()
    {
        return (new DataBase('consulta'))->update('id = ' . (int) $this->id, [
            'paciente_id' => $this->paciente_id,
            'dentista_id' => $this->dentista_id,
            'data_hora' => $this->data_hora,
            'valor_total' => $this->valor_total,
            'valor_pago' => $this->valor_pago,
            'forma_pagamento' => $this->forma_pagamento,
            'procedimentos_realizados' => $this->procedimentos_realizados,
            'procedimentos_arealizar' => $this->procedimentos_arealizar,
            'descricao' => $this->descricao,
            'medicacao' => $this->medicacao,
        ]);
    }

    public function excluir()
    {
        return (new DataBase('consulta'))->delete('id = ' . (int) $this->id);
    }

    public static function listar()
    {
        $query = 'select consulta.*, paciente.nome as paciente_nome, '
            . 'funcionario.nome as dentista_nome '
            . 'from consulta '
            . 'inner join paciente on paciente.id = consulta.paciente_id '
            . 'inner join funcionario on funcionario.id = consulta.dentista_id '
            . 'order by consulta.data_hora desc';

        return (new DataBase())->execute($query)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function buscarPorId($id)
    {
        return (new DataBase('consulta'))
            ->select('id = ' . (int) $id)
            ->fetchObject(self::class);
    }
}