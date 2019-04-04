<?php
require __DIR__ . '/Header-noslide.php';

session_start();

$db = new PDO("mysql:host=localhost;dbname=myhomepage; charset=utf8;", "root", "");

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

    if(isset($_POST['user_delete']))
{
    $user_idx = $_SESSION['user']->idx;

    $st=$db->prepare("DELETE FROM users WHERE idx =?");
    $st->execute([$user_idx]);

    $_SESSION['user'] = null;
    echo "<script>alert('성공적으로 회원 탈퇴가 완료 되었습니다.'); location.href='/';</script>";
}
?>

<div id = "Content-Box">
    <!-- <div id = "Login-Box">
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

    ?> -->
        <div id = "join-box">
          <form action="/login.php" method="POST">
            <h3>로그인</h3>
            <img src="icon.png" class = "join-icon">
        <div id = "join-info-box">
                <input id = "user-id" type="text" name = "user_id" placeholder = "아이디"><br>
                <input id = "user-pw" type="password" name = "user_pw" placeholder = "비밀번호"><br>
            <div id = "join-btn">
                <button id = "submit-btn" type = "submit">로그인</button>
            </div>
        </div>
          </form>
        </div>
        <?php
        }
        ?>
    </div>
    
</div>

<?php
require __DIR__ .'/Footer-noslide.php';
?>