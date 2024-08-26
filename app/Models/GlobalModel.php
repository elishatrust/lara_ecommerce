<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalModel extends Model
{
    use HasFactory;


    public function insertData($table_name, $data)
    {
        $model = $this->setTable($table_name);
        $data->insert($model);
        return $data->id;
    }


    public function updateData($table_name, $data, $conditions)
    {
        $model = $this->setTable($table_name);
        $updated = $model->where($conditions)->update($data);
        return $updated;
    }

    public function deleteData($table_name, $conditions)
    {
        $model = $this->setTable($table_name);
        $deleted = $model->where($conditions)->delete();
        return $deleted;
    }



}
