<?php

class Model {
    public $id, $item1, $item2;

    // Salvando os dados solicitados pelo usuário do Controller para o Model
    public function save()
    {
        include "dao.php";
        $dao = new DAO();

        if(empty($this->id))
            $dao->insert($this);  
    }

    public function getAllRows() {
        include "dao.php";
        $dao = new DAO();

        $this->rows = $dao->select();
    }
}