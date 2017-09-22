<?php

namespace App\core;


interface QueryInterface
{
    /**
     * "SELECT" operator
     * Query looks like "SELECT $select FROM $from"
     * @param $select
     * @param $from
     * @return mixed
     */
    public function select($select, $from);

    /**
     * "WHERE" operator
     * Connect WHERE with data to query
     * @param array $data
     * @return mixed
     */
    public function where(array $data);

    /**
     * "ORDER BY" operator
     * @param $by
     * @param $type
     * @return mixed
     */
    public function order($by, $type);

    /**
     * Updating data
     * @param string $into
     * @param array $data
     * @return mixed
     */
    public function update($into, array $data);

    /** INSERT INTO data
     * @param string $into
     * @param array $data
     * @return mixed
     */
    public function insert($into, array $data);

    /**
     * Connect LIMIT to query with one number
     * @param $number
     * @return mixed
     */
    public function limit($number);

    /**
     * Method for query execution.
     * Contains mix of fetch methods.
     * @return mixed
     */
    public function send();

    /**
     * Request only
     * @param $sql
     * @param bool $bind
     * @return mixed
     */
    public function request($sql, $bind = false);

    /**
     * Method for binding values in request
     * Calling after request()
     * @param array $param
     * @return mixed
     */
    public function bind(array $param);
}