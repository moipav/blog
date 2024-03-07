<?php

namespace P\Blog;

use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder
{
    private PDO $pdo;
    private QueryFactory $queryFactory;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost:3307;dbname=valhala','root','',[PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8']);
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function getAll($table)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $table, array $data)
    {
        $insert = $this->queryFactory->newInsert();

        $insert
            ->into($table)                   // INTO this table
            ->cols($data);
        $sth = $this->pdo->prepare($insert->getStatement());
//        var_dump($stmt);die;
        $sth->execute($insert->getBindValues());

        $name = $insert->getLastInsertIdName('id');
        $id = $this->pdo->lastInsertId($name);

    }

    public function update(string $table, int $id, array $data)
    {
        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)
            ->cols($data)
            ->where('id = :id', ['id' => $id]);// bind this value to the condition


        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }

    public function delete($table, $id)
    {
        $delete = $this->queryFactory->newDelete();

        $delete->from($table)->where('id = :id')->bindValue('id', $id);
//        var_dump($delete->getStatement());die;
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute(($delete->getBindValues()));
    }

}