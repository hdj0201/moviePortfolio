<?php
require __DIR__ . '/Header.php';

session_start();

$db = new PDO("mysql:host=localhost;dbname=myhomepage; charset=utf8;", "root", "");

if(isset($_POST['user_delete']))
{
    $user_idx = $_SESSION['user']->idx;

    $st=$db->prepare("DELETE FROM users WHERE idx =?");
    $st->execute([$user_idx]);

    $_SESSION['user'] = null;
    echo "<script>alert('성공적으로 회원 탈퇴가 완료 되었습니다.'); location.href='/';</script>";
}

if (isset($_POST['logout']))
{
    $_SESSION['user'] = null;

    echo "<script>alert('로그아웃 되었습니다.'); location.href = '/';</script>";
}
    if (isset($_POST['user_id']) && isset($_POST['user_pw'])) 
    {
        $user_id = $_POST['user_id'];
        $user_pw = $_POST['user_pw'];
        
        $st = $db->prepare("SELECT * FROM users WHERE user_id = ? and user_pw = ?");
        $st ->execute([$user_id, $user_pw]);

        $user = $st->fetchObject();

        if ($user) {
            $_SESSION['user'] = $user;
            echo "<script>alert('로그인이 완료되었습니다.'); location.href = '/'; </script>";
        }

        else 
        {
            echo "<script>alert('존재하지 않은 유저입니다'); location.href = '/';</script>";
        }
    }
?>

<div id = "Content-Box">
    <div id = "Login-Box">
    <?php
        if(isset($_SESSION['user']) && $_SESSION['user']) {
    ?>
    <h3>정보</h3>
    <div class = "login-text">환영합니다. <span id="login-user-id"><?php echo $_SESSION['user']->user_id ?></span>님.</div>
    <form class = "btn-form" action="/" method = "POST">
        <input type="hidden" name = "logout">
        <button type = "submit">로그아웃 </button>   
        <input type="hidden" name="user_delete">
        <button type="submit">회원 탈퇴</button>
    </form>
        <?php
        }   else {

    ?>
        <h3>로그인</h3>
        <form id = "login-form" action = "/" method="POST">
        <div>아이디</div>
        <input type= "Text" name = "user_id">
        <div>비밀번호</div>
        <input type= "Password" name = "user_pw">
        <div id = "Login-Box-button-row">
        <button type = "submit">로그인</button>
        <button type = "button" onclick = "location.href = '/join.php'">회원가입</button>
        </div>
        </form>
        <?php
        }
        ?>
    </div>
    <div id = "Board-Box">
        <h3>게시판</h3>
        <table id = "table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $st = $db->prepare("SELECT * FROM board");
                    $st->execute();

                    while($content = $st->fetch())
                    {
                ?>
                <tr>
                    
                    <td class ="center"><?php echo $content['idx']; ?></td>
                    <td class = "center"><a href="/view.php?idx=<?php echo $content['idx'];?>"><?php echo $content['subject']?></a></td>
                    <td class ="center"><?php echo $content['users']?></td> 
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <div id = "table-button-row">
        <button type = "button" onclick="location.href = '/add.php'">글쓰기</button>
        </div>
    </div>
</div>

<?php
require __DIR__ .'/Footer.php';
?>