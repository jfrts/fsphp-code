<?php

namespace Source\Models;

class UserModel extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];

    protected static string $entity = "users";

    public function bootstrap()
    {

    }

    public function load(int $id)
    {

    }

    public function find(string $email)
    {

    }

    public function all(int $limit = 30, int $offset = 0)
    {

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