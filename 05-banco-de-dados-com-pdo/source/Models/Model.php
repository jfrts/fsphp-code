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

    protected function create()
    {

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

    protected function safe(): ?array
    {
    }

    private function filter()
    {
    }
}