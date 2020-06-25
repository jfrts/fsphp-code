<?php

namespace Source\Models;

/**
 * Class UserModel
 * @package Source\Models
 */
class UserModel extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];

    protected static string $entity = "users";

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string|null $document
     * @return $this|null
     */
    public function bootstrap(string $firstName, string $lastName, string $email, string $document = null): ?UserModel
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->document = $document;

        return $this;
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

    /**
     * @return $this|null
     */
    public function save(): ?UserModel
    {
        if (!$this->required()) {
            return null;
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            $email = $this->read(
                "SELECT id FROM users WHERE email = :email AND id != :id",
                "email={$this->email}&id={$userId}"
            );

            if ($email->rowCount()) {
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }

            $this->update(
                self::$entity,
                $this->safe(),
                "id = :id",
                "id={$userId}"
            );

            if ($this->fail()) {
                $this->message = "Erro ao atualizar, verifique os dados";
            } else {
                $this->message = "Atualização realizada com sucesso";
            }
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->find($this->email)) {
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());

            if ($this->fail()) {
                $this->message = "Erro ao cadastrar, verifique os dados";
            } else {
                $this->message = "Cadastro realizado com sucesso";
            }
        }

        $this->data = $this->read("SELECT * from users WHERE id = :id", "id={$userId}")->fetch();
        return $this;
    }

    public function destroy()
    {

    }

    /**
     * @return bool
     */
    private function required(): bool
    {
        if (empty($this->first_name) || empty($this->last_name) || empty($this->email)) {
            $this->message = "Nome, sobrenome e email são obrigatórios";
            return false;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "O email informado não parece válido";
            return false;
        }

        return true;
    }
}