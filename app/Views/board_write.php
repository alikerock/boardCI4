<h2>게시판 <?php echo isset($view->subject)? '글수정':'글쓰기'; ?></h2>

<form action="<?= site_url('/writesave')?><?php echo isset($view->bid)? '/?bid='.$view->bid:''; ?>" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="username" class="form-label">이름</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="제목을 입력하세요" readonly value="<?= $_SESSION['username']; ?>">
    </div>
    <div class="mb-3">
      <label for="subject" class="form-label">제목</label>
      <input type="text" class="form-control" id="subject" name="subject" placeholder="제목을 입력하세요" value="<?php echo isset($view->subject)? $view->subject:''; ?>">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">내용</label>
      <textarea class="form-control" id="content" name="content" rows="3" ><?php echo isset($view->content)? $view->content:''; ?></textarea>
    </div>
    <div class="mb-3">
      <label for="file" class="form-label">첨부파일</label>
      <input type="file" class="form-control" id="file" name="upfile[]" multiple >
    </div>
    <?php
    $btntitle = isset($view->subject)? '수정':'등록';
    ?>
    <button class="btn btn-primary"><?= $btntitle; ?></button>
</form>



<hr>
<a href="/board">목록</a> / <a href="/">홈</a>
