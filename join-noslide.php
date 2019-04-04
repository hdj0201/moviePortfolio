<?php

    require __DIR__ .'/Header-noslide.php';

        if (isset($_POST['user_id']) && isset($_POST['user_pw'])) 
        {
            $user_id = $_POST['user_id'];
            $user_pw = $_POST['user_pw'];

            $db = new PDO("mysql:host=localhost;dbname=myhomepage", "root", "");

            $st = $db->prepare("INSERT INTO users (user_id, user_pw) values (?, ?)");
            $st->execute([$user_id, $user_pw]);

            echo "<script>alert('회원가입이 완료되었습니다.'); location.href = '/'; </script>";
        }
    ?>

        <div id = "join-box">
          <form action="/join-noslide.php" method="POST">
            <h3>환영합니다</h3>
            <img src="icon.png" class = "join-icon">
        <div id = "join-info-box">
                <input id = "user-id" type="text" name = "user_id" placeholder = "아이디"><br>
                <input id = "user-pw" type="password" name = "user_pw" placeholder = "비밀번호"><br>
            <div id = "join-btn">
                <button id = "submit-btn" type = "submit">회원가입</button>
            </div>
        </div>
          </form>
        </div>
    
    <?php
    require __DIR__ .'/Footer-noslide.php';
    ?>