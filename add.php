<?php
require __DIR__ . '/Header.php';

session_start();

if(!isset($_SESSION['user'])){
    echo"<script>alert('로그인이 필요합니다');location.href='/';</script>";
}

    if (isset($_POST['subject']) && isset($_POST['content'])) 
    {
        $subject = $_POST['subject'];
        $content = $_POST['content'];

        $db = new PDO("mysql:host=localhost;dbname=myhomepage;charset=utf8", "root", "");

        $st = $db->prepare("INSERT INTO board (subject, content, users) values (?, ?, ?)");
        $st->execute([$subject, $content, $_SESSION['user']->user_id]);

        echo "<script>alert('글쓰기가 완료되었습니다.'); location.href = '/'; </script>";
    }
?>

    <div id = "Content-Box">
    <form action = "/add.php" method="POST">
    <h3>글쓰기</h3>
    <div class = "view-box">
        <div class = "line">
            <div class = "left section section">제목</div>
            <div class = "right section section"><input type="text" name = "subject"></div>
        </div>
            <div>내용</div>
            <div>
            <textarea name="content" cols="30" rows="10"></textarea>
            </div>
            <div>
            <button type = "reset">초기화</button>
            <button type = "submit">글쓰기</button>
            <button type ="button" onclick="location.href = '/'">목록</button>
            </div>
            </form>
            </div>
    </div>

    <?php
    require __DIR__ .'/Footer.php';
    ?>