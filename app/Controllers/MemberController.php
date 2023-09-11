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
}