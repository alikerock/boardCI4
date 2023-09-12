<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table      = 'file_table'; //사용할 테이블
    protected $primaryKey = 'fid';
    protected $returnType     = 'object';

    protected $allowedFields = [
        'bid', 
        'userid', 
        'filename', 
        'regdate',
        'status',
        'memoid',
        'type'
    ];

}