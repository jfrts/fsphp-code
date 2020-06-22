<?php

namespace Source\Models;

class UserModel extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];

    protected static string $entity = "users";

    public function bootstrap()
    {

    }

    public function load(int $id, string $columns = "*"): ?UserModel
    {
        $load = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " WHERE id = :id",
            "id={$id}"
        );

        if ($this->fail() || !$load->rowCount()) {
            $this->message = "Usuário não encontrado para o id informado";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * @param string $email
     * @param string $columns
     * @return UserModel|null
     */
    public function find(string $email, string $columns = "*"): ?UserModel
    {
        $find = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " WHERE email = :email",
            "email={$email}"
        );

        if ($this->fail() || !$find->rowCount()) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     * @return UserModel[]|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset",
            "limit={$limit}&offset={$offset}"
        );

        if ($this->fail() || !$all->rowCount()) {
            $this->message = "Sua consulta não retornou usuários.";
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function save()
    {

    }

    public function destroy()
    {

    }

    private function required()
    {

    }
}