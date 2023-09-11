<?php

namespace App\Controllers;
use App\Models\BoardModel; //사용할 모델을 로드
use CodeIgniter\I18n\Time;

class MemberController extends BaseController
{
  public function login(){
    return render('login');
  }
  public function logout(){
    $this->$session->destroy();
    return redirect()->to('/board');
  }
  public function loginok(){
    $userid= $this->request->getVar('userid');
    $passwd= hash('sha512', $this->request->getVar('passwd'));

    $db = db_connect();
    $sql = "SELECT * FROM members WHERE userid=? AND passwd=?";
    $result = $db -> query($sql,[$userid,$passwd]);  
    if($result->getResultID()->num_rows > 0){
       $user = $result->getRow();
       $ses_data = [
        'userid' => $user->userid,
        'username' => $user->username,
        'email' => $user->email
       ];
       $this->session->set($ses_data);
       return redirect()->to('/board');
    } else{
      return redirect()->to('/login');
    }
  }
}