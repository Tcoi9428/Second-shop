<?php


namespace App\Model;

use App\Db\IModel;

class Model implements IModel

{
    public function getProperty(string $value) {
        return $this->$value;
    }
}