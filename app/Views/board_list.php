<?php if ($alert = session('alert')):?>
  <div class="alert alert-warning"><?= $alert ?></div>
<?php endif ?>

    <h2>게시판 목록</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">글쓴이</th>
                <th scope="col">제목</th>
                <th scope="col">등록일</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($list as $ls){
            ?>
            <tr>
                <th scope="row"><?= $ls -> bid;?></th>
                <td><?= $ls -> userid;?></td>
                <td><a href="/boardview/<?= $ls -> bid;?>"><?= $ls -> subject;?></a></td>
                <td><?= $ls -> regdate;?></td>
            </tr>
            <?php 
               }
            ?>            
           
        </tbody>
    </table>
    <hr>
    <div class="pager-links">
        <?= $pager_links ?>
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
                <a href="/board/write" class="btn btn-primary">글쓰기</a>
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

