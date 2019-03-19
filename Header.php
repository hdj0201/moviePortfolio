    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>오하이연의 영화 갤러리</title>
        <link rel="stylesheet" href="/common.css">
        <link rel="stylesheet" href="/slide.css">
        <style>
        </style>
    </head>
    <body>
    <div id = "Header-Box">
        <div id = "Header-box-text"><a href="/"><img src ="Home.jpg"></a></div>
    </div>
    <div id = "menu-box">
    <button id = "Login-move-btn"><a href = "/join.php">로그인</a></button>
            <ul id = "menu">
                <li class = "main-menu">1번
                    <ul>
                        <li><a href= "/test.php">미완성</a></li>
                        <li>2번.2번</li>
                        <li>3번.3번</li>
                    </ul>
                </li>
                <li class = "main-menu">2번
                     <ul>
                        <li>1번.1번</li>
                        <li>2번.2번</li>
                        <li>3번.3번</li>
                    </ul>
                </li>
                <li class = "main-menu">3번
                    <ul>
                        <li>1번.1번</li>
                        <li>2번.2번</li>
                        <li>3번.3번</li>
                    </ul>
                </li>
            </ul>
    </div>
    <div id="slide-box-wrap">
        <div id="slide-box">
            <img src="die.jpg" onclick = "location.href ='/join.php'" title = "다이버전트" style = "cursor:pointer">
            <img src="Alita.jpg" title = "알리타" style = "cursor:pointer">
            <img src="Applemusic.png" style = "cursor:pointer">
        </div>
        <button type ="button" id = "slide-left-btn" class = "slide-btn" onclick="backSlide()">이전</button>
        <button type ="button" id = "slide-right-btn" class = "slide-btn" onclick="nextSlide()">다음</button>

        <div id="slide-pos-box">
        <button class = "slide-box-btn" type = "button"  onclick="ChangeSlidePos(0)">1</button>
        <button class = "slide-box-btn" type = "button"  onclick="ChangeSlidePos(1)">2</button>
        <button class = "slide-box-btn" type = "button"  onclick="ChangeSlidePos(2)">3</button>
        </div>
    </div>