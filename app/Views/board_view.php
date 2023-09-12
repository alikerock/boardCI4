<?php
//var_dump($data); echo '<hr>';
// var_dump($view); echo '<hr>';
//var_dump($file_view->filename); echo '<hr>';
?>
<h2>게시판 글보기</h2>


    <div class="mb-3">
      <h3>제목 : <?= $view ->  subject; ?></h3>
      <p>
        작성일 : <?= $view ->  regdate; ?> / 작성자: <?= $view ->  userid; ?>
      </p>
    </div>
    <div class="mb-3">
      내용: <?= $view ->  content; ?>

      <?php
      if(isset($view->filename)){
      ?>
        <img src="<?= base_url('/uploads/'.$view->filename); ?>" class="img-fluid"  alt="" >
      <?php
      }
      ?>
    </div>

<hr>
<div class="d-flex justify-content-between">
        <div class="">            
            <a href="/" class="btn btn-secondary">홈</a>
        </div>
        <div class="">
            <?php
                if(isset($_SESSION['userid'])){
            ?>    
                <a href="/modify/<?= $view ->  bid; ?>" class="btn btn-primary">수정</a>
                <a href="/delete/<?= $view ->  bid; ?>" class="btn btn-danger">삭제</a>                
                <a href="/logout" class="btn btn-warning">로그아웃</a>
            <?php  
                } else {
            ?>  
                <a href="/login" class="btn btn-warning">로그인</a>
            <?php      
                }
            ?>
        </div>
    </div>
