<?php

namespace App\Controllers;
use App\Models\BoardModel; //사용할 모델을 로드

class Board extends BaseController
{
    public function list(): string
    {
        // return view('board_list');
        // $db = db_connect();
        // $sql = "SELECT * from board order by bid desc";
        // $result = $db -> query($sql);
        // $data['list'] = $result->getResult(); //fetch_object 글 결과 배열에 담기
        $boardModel = new BoardModel();
        $data['list'] = $boardModel -> orderBy('bid', 'desc')->findAll();

        return render('board_list' ,$data);
    }
    public function write(): string
    {
        // return view('board_write');
        return render('board_write');
    }
    public function view($bid = null)
    {
        // $db = db_connect();
        // $sql = "SELECT * from board where bid={$bid}";
        // $result = $db -> query($sql);
        // $data['view'] = $result->getRow();
        $boardModel = new BoardModel();
        $data['view'] = $boardModel -> where('bid', $bid)->first();
        return render('board_view', $data);
    }



}
