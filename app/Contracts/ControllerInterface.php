<?php

namespace TrayLabs\Pastelaria\Contracts;

interface ControllerInterface
{
    /**
     * Lista os registros
     *
     * @param  array $request
     * @return mixed
     */
    public function index(array $request = []);

    /**
     * Exibe o formulario para um novo registro
     *
     * @return mixed
     */
    public function new();

    /**
     * Cria o novo registro
     *
     * @param  array $request
     * @return mixed
     */
    public function create(array $request);

    /**
     * Exibe o formulario para atualizar o registro
     *
     * @param  int $resourceId
     * @return mixed
     */
    public function show($resourceId);

    /**
     * Cria o novo registro
     *
     * @param  array $request
     * @param  int   $resourceId
     * @return mixed
     */
    public function update(array $request, $resourceId);

    /**
     * Exclui o registro
     *
     * @param  int $resourceId
     * @return mixed
     */
    public function delete($resourceId);
}