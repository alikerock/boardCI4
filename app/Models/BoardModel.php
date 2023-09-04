<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model
{
    protected $table      = 'board'; //사용할 테이블
    protected $primaryKey = 'bid';
    protected $returnType     = 'object';

    protected $allowedFields = ['userid', 'subject', 'content', 'regdate'];

}