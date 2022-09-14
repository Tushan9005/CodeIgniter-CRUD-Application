<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model{
    protected $table = 'books';
    protected $allowedFields = ['title','author','isbn_no'];

    public function getRecords(){
        return $this->orderBy('id','DESC')->findAll();
    }

    public function getRow($id){
        //SELECT * FROM BOOKS WHERE id = $id
       return $this->where('id',$id)->first();
    }
}


?>