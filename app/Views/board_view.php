<h2>게시판 글보기</h2>


    <div class="mb-3">
      <h3>제목 : <?= $view ->  subject; ?></h3>
      <p>
        작성일 : <?= $view ->  regdate; ?> / 작성자: <?= $view ->  userid; ?>
      </p>
    </div>
    <div class="mb-3">
      내용: <?= $view ->  content; ?>
    </div>

<hr>
<a href="/board">목록</a> / <a href="/">홈</a>
