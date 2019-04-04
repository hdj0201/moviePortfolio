        <?php
        require __DIR__ . '/Header.php';

        //session_start();

        $db = new PDO("mysql:host=localhost;dbname=myhomepage; charset=utf8;", "root", "");

        $idx = $_GET['idx'];

        if(isset($_POST['delete']))
        {
            $st=$db->prepare("DELETE FROM board WHERE idx = ?");
            $st->execute([$idx]);

            echo "<script>alert('글이 삭제되었습니다'); location.href = '/';</script>";
        }

        $st = $db->prepare("SELECT * FROM board WHERE idx = ?");
        $st->execute([$idx]);

        $content = $st->fetchObject();

        ?>

    <div id = "Content-Box">
        <div class = "view-box">
            <div class = "subject-line line">
                <div class = "left-section section">제목</div>
                <div class = "right-section section"><?php echo $content->subject; ?></div>
            </div>
            <div class = "user-line line">
                <div class = "left-section section">글쓴이</div>
                <div class = "right-section section"><?php echo $content->users; ?></div>
            </div>
            <div class = "content-line line">
            <div class = "right-section section"><?php echo $content->content; ?></div>
            </div>

            <div class = "btn-row">
                <button type ="button" onclick="location.href = '/'">목록</button>
                <button type ="button" onclick="location.href = '/update.php?idx=<?php echo $idx;?>'">수정</button>

                <form action="/view.php?idx=<?php echo $idx; ?>" method ="POST">
                <input type="hidden" name="delete">
                <button type ="submit">삭제</button>
                </form>
            </div>
        </div>
    </div>

        <?php
        require __DIR__ .'/Footer.php';
        ?>