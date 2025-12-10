<?php
namespace App\Models;

use App\Db\Db;

class Model {

    protected $table;
    protected $db;

    public function __construct() {
        $this->db = Db::getInstance();
    }

    /** READ */
    public function findAll() {
        $query = $this->query('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }


    protected function query(string $sql, ?array $attributs = null) {
        if ($attributs !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            return $this->db->query($sql);
        }
    }
}
