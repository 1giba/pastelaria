<?php

namespace TrayLabs\Pastelaria\Models;

use TrayLabs\Pastelaria\Datasource\Conexao;

abstract class AbstractModel
{
    /**
     * @var \PDO
     */
    protected $data;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->data = Conexao::getPdo();
    }

    /**
     * Retorna o nome da tabela utilizada
     *
     * @return \TrayLabs\Pastelaria\Models\AbstractModel
     */
    abstract public function getTableName();

    /**
     * Busca todos os registros
     *
     * @param array $fields Campos a serem exibidos
     * @return array
     */
    public function all($fields = ['*'])
    {
        return $this->data->query(sprintf('SELECT %s FROM %s', [
            implode(',', $fields),
            $this->getTableName(),
        ]));
    }

    /**
     * Busca o registro pelo ID
     *
     * @param int $resourceId Chave primária da tabela
     * @param array $fields Campos a serem exibidos
     * @return array
     */
    public function find($resourceId, $fields = ['*'])
    {
        return $this->data->query(sprintf('SELECT %s FROM %s WHERE id = %s', [
            implode(',', $fields),
            $this->getTableName(),
            $resourceId,
        ]));
    }

    /**
     * Adicionar sql para consultas mais complexas
     *
     * @param string $sql
     * @return mixed
     */
    public function query($sql)
    {
        return $this->data->query($sql);
    }

    /**
     * Cria um novo registro
     *
     * @param array $data Campos para serem adicionados
     * @return bool
     */
    public function create(array $data)
    {
        return $this->data->query(sprintf('INSERT INTO %s (%s) VALUES (\'%s\')', [
            $this->getTableName(),
            implode(',', array_keys($data)),
            implode('\', \'', array_values($data)),
        ]));
    }

    /**
     * Atualiza um registro pelo id
     *
     * @param int   $resourceId Chave primária do registro a ser atualizado
     * @param array $data Campos para serem adicionados
     * @return bool
     */
    public function update(array $data, $resourceId)
    {
        $updatedData;
        foreach ($data as $field => $value) {
            $updatedData[] = $field . ' = \'' . $value . '\'';
        }

        return $this->data->query(sprintf('UPDATE %s SET %s WHERE id = %s', [
            $this->getTableName(),
            implode(', ', $updatedData),
            $resourceId,
        ]));
    }

    /**
     * Exclui um registro pelo id
     *
     * @param int   $resourceId Chave primária do registro a ser excluído
     * @return bool
     */
    public function destroy($resourceId)
    {
        return $this->data->query(sprintf('DELETE FROM %s WHERE id = %s', [
            $this->getTableName(),
            $resourceId,
        ]));
    }
}