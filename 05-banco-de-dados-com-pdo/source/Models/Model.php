<?php

namespace Source\Models;

use PDOException;
use Source\Database\Connect;

/**
 * Class Model
 * @package Source\Models
 */
abstract class Model
{
    /**
     * @var object|null
     */
    protected ?object $data;

    /**
     * @var PDOException|null
     */
    protected ?PDOException $fail = null;

    /**
     * @var string|null
     */
    protected ?string $message;

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @return object|null
     */
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * @return PDOException|null
     */
    public function fail(): ?PDOException
    {
        return $this->fail;
    }

    /**
     * @return string|null
     */
    public function message(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $entity
     * @param array $data
     * @return int|null
     */
    protected function create(string $entity, array $data): ?int
    {
        try {
            $colums = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $query = "INSERT INTO {$entity} ({$colums}) VALUES ({$values})";

            $stmt = Connect::getInstance()->prepare($query);
            $stmt->execute($data);

            return Connect::getInstance()->lastInsertId();
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    /**
     * @param string $select
     * @param string|null $params
     * @return \PDOStatement|null
     */
    protected function read(string $select, string $params = null): ?\PDOStatement
    {
        try {

            $stmt = Connect::getInstance()->prepare($select);

            if ($params) {
                parse_str($params, $params);

                /**
                 * @var array $params
                 * @var string $key
                 * @var string $value
                 */
                foreach ($params as $key => $value) {
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;

        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    protected function update()
    {
    }

    protected function delete()
    {
    }

    /**
     * @return array|null
     */
    protected function safe(): ?array
    {
        $safe = (array)$this->data;

        foreach (static::$safe as $unset) {
            unset($safe[$unset]);
        }

        return $safe;
    }

    /**
     * @param array $data
     * @return array|null
     */
    private function filter(array $data): ?array
    {
        $filter = [];

        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
        }

        return $filter;
    }
}