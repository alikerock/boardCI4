<?php

namespace App\Controllers;
use App\Models\BoardModel; //사용할 모델을 로드
use CodeIgniter\I18n\Time;

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
    public function write()
    {
        if(!isset($_SESSION['userid'])){
            //echo "<script>alert('로그인하세요'); location.href='/login/'</script>";
            return redirect()->to('/login')->with('alert','로그인하세요');           
        }
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
    public function save()
    {
        // $db = db_connect();
        // $subject = $this->request->getVar('subject');
        // $content = $this->request->getVar('content');
        // $myTime = new Time('now', 'Asia/Seoul');
        // $myTime ->modify('+9 hours');
        // $formattedTime = $myTime -> toDateTimeString();

        // $sql = "INSERT INTO board (userid, subject, content, regdate) VALUES('test', ?,?,?)";
        // $result = $db -> query($sql,[$subject, $content, $formattedTime]);   
        $boardModel = new BoardModel();

        $myTime = new Time('now', 'Asia/Seoul');
        $myTime ->modify('+9 hours');     

        $data = [
            'userid' => $_SESSION['userid'],
            'subject' => $this->request->getVar('subject'),
            'content' => $this->request->getVar('content'),
            'regdate' => $myTime -> toDateTimeString()
        ];

        $bid = $this->request->getVar('bid'); 
        if($bid){
            $boardModel ->update($bid,$data);
            return $this->response ->redirect(site_url('/boardview/'.$bid)); //쿼리성공후 board 페이지로 이동
        }else{
            $boardModel ->insert($data);
            return $this->response ->redirect(site_url('/board')); //쿼리성공후 board 페이지로 이동
        }        
    } 
    public function modify($bid = null)
    {
        /*
        $db = db_connect();
        $sql = "SELECT * FROM board WHERE bid={$bid}";
        $result = $db->query($sql);
        if($_SESSION['userid'] == $result ->getRow()->userid){
            $data['view']= $result ->getRow();
            return render('board_write',$data);
        } else {
            echo "<script>
                alert('본인글만 수정할 수 있습니다.');
                location.href='/board';
            </script>";
        }*/
        $boardModel = new BoardModel();
        $board = $boardModel->find($bid);

        if($_SESSION['userid'] == $board->userid){
            $data['view']= $board;
            return render('board_write',$data);
        } else {
            return redirect()->to('/board')->with('alert','본인글만 수정할 수 있습니다.');  
        }

    }   

}
