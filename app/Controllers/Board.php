<?php

namespace App\Controllers;

class Board extends BaseController
{
    public function list(): string
    {
        // return view('board_list');
        $db = db_connect();
        $sql = "SELECT * from board order by bid desc";
        $result = $db -> query($sql);
        $data['list'] = $result->getResult(); //fetch_object 글 결과 배열에 담기
        return render('board_list' ,$data);
    }
    public function write(): string
    {
        // return view('board_write');
        return render('board_write');
    }
}
