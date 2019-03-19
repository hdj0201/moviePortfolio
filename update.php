<?php
require __DIR__ . '/Header.php';

session_start();

if(!isset($_SESSION['user'])){
    echo"<script>alert('로그인이 필요합니다');location.href='/';</script>";
}

$idx = $_GET['idx'];

$db = new PDO("mysql:host=localhost;dbname=myhomepage;charset=utf8", "root", "");

$st = $db->prepare("SELECT * FROM board where idx = ?");
$st->execute([$idx]);

$content = $st->fetchObject();

    if (isset($_POST['subject']) && isset($_POST['content'])) 
    {
        $subject = $_POST['subject'];
        $content = $_POST['content'];

        $st = $db->prepare("UPDATE board SET subject =? , content = ? where idx = ?");
        $st->execute([$subject, $content,$idx]);

        echo "<script>alert('글수정이 완료되었습니다.'); location.href = '/view.php?idx=$idx'; </script>";
    }
?>

    <div id = "Content-Box">
    <form action = "/update.php?idx=<?php echo $idx?>" method="POST">
    <h3>글수정</h3>
    <div class = "view-box">
        <div class = "line">
            <div class = "left section section">제목</div>
            <div class = "right section section"><input type="text" name = "subject" value = "<?php echo $content->subject?>"></div>
        </div>
            <div>내용</div>
            <div>
            <textarea name="content" cols="30" rows="10"><?php echo $content->content?></textarea>
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