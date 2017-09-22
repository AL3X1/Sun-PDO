<?php
namespace App;

use App\Config\DB;
use App\Core\QueryInterface;

class QueryBuilder extends DB implements QueryInterface
{

    private $sql;
    private $bind;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . DB::HOST. ";dbname=" . DB::NAME . ";charset=" . DB::DEFAULT_CHARSET;
            $this->pdo = new \PDO($dsn, DB::USER, DB::PASSWORD, DB::DEFAULT_SETTINGS);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function select($select, $from)
    {
        $this->sql = "SELECT $select FROM `$from`";
        return $this;
    }

    public function where(array $data)
    {
        foreach ($data as $key => $value) {
            $this->sql .= " WHERE `$key` = '$value'";
        }

        return $this;
    }

    public function order($by, $type = "")
    {
        if ($type) {
            $this->sql .= " ORDER BY $by $type";
        } else {
            $this->sql .= " ORDER BY $by";
        }

        return $this;
    }

    public function update($into, array $data)
    {
        foreach ($data as $key => $value) {
            $this->sql = "UPDATE `$into` SET `$key` = '$value'";
        }

        return $this;
    }

    public function insert($into, array $data)
    {
        $params = "";
        foreach ($data as $key => $value) {
            $params .= "`$key` = '$value',";
        }

        $this->sql = "INSERT INTO `$into` SET " . mb_substr($params, 0, -1);

        return $this;
    }

    public function limit($number)
    {
        $this->sql .= " LIMIT $number";
        return $this;
    }

    public function send()
    {
        $exec = $this->pdo->prepare($this->sql);
        $exec->execute();

        return $exec;
    }

    public function request($sql, $bind = false)
    {
        if (!$bind) {
            $this->pdo->query($sql);
        } else {
            $this->sql = $sql;
            return $this;
        }
    }

    public function bind(array $param)
    {
        $this->bind = $this->pdo->prepare($this->sql);
        $this->bind->execute($param);
    }

    public function debug($data, $var_dump = false)
    {
        echo "<pre>";
        if ($var_dump) {
            var_dump($data);
        } else {
            print_r($data);
        }
        echo "</pre>";
        die();
    }
}