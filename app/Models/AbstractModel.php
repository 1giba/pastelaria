<?php

namespace TrayLabs\Pastelaria\Models;

use TrayLabs\Pastelaria\Datasource\Conexao;
use TrayLabs\Pastelaria\Traits\Hydrator;

abstract class AbstractModel
{
    use Hydrator;

    /**
     * @var \PDO
     */
    protected $datasource;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->datasource = Conexao::getPdo();
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
        $query = $this->datasource->query(sprintf('SELECT %s FROM %s',
            implode(',', $fields),
            $this->getTableName()
        ));
        return $query->fetchAll();
    }

    /**
     * Método all em objetos
     *
     * @param array $fields Campos a serem exibidos
     * @return array
     */
    public function toObjects($fields = ['*'])
    {
        $rows = $this->all($fields);
        return $this->hydrateAll($rows);
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
        return $this->datasource->query(sprintf('SELECT %s FROM %s WHERE id = %s', [
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
        return $this->datasource->query($sql);
    }

    /**
     * Cria um novo registro
     *
     * @param array $data Campos para serem adicionados
     * @return bool
     */
    public function create(array $data)
    {
        return $this->datasource->query(sprintf('INSERT INTO %s (%s) VALUES (\'%s\')', [
            $this->getTableName(),
            implode(',', array_keys($data)),
            implode('\', \'', array_values($data)),
        ]));
    }

    /**
     * Atualiza um registro pelo id
     *
     * @param array $data       Campos para serem adicionados
     * @param int   $resourceId Chave primária do registro a ser atualizado
     * @return bool
     */
    public function update(array $data, $resourceId)
    {
        $updatedData;
        foreach ($data as $field => $value) {
            $updatedData[] = $field . ' = \'' . $value . '\'';
        }

        return $this->datasource->query(sprintf('UPDATE %s SET %s WHERE id = %s', [
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
        return $this->datasource->query(sprintf('DELETE FROM %s WHERE id = %s', [
            $this->getTableName(),
            $resourceId,
        ]));
    }
}