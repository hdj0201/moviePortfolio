 //0번 부터 시작되는 슬라이드 위치 저장
 var timer;
 var min_position = 0;
 var max_position = 2;
 var slide_position = 0;

     //slide-box 라는 아이디를 가진 태그의 스타일 left 값을 내가 원하는 값으로 변경.
        function ChangeSlideStyle(left_px, pos){
        var slide_box = document.getElementById('slide-box');
        slide_box.style.left = left_px;

        var slide_btns = document.getElementById('slide-pos-box').getElementsByClassName('slide-box-btn');

        for(var i = 0; i < slide_btns.length; i ++){
            slide_btns[i].classList.remove('active');
        }
        
        var current_slide_btn = slide_btns[pos];

        current_slide_btn.classList.add('active');
    }   

     function ChangeSlidePos(pos){
         var position = pos; //다음 슬라이드 번호

 if(pos > max_position){ //만약 다음 슬라이드 번호가 4번이면.
     pos = min_position;
 } else if(pos < min_position){
     pos = max_position;
 }

var left_px = pos * -1000;

 ChangeSlideStyle(left_px + 'px' , pos);

 slide_position = pos;

 createTimer();
}

function nextSlide() {
 ChangeSlidePos(slide_position +1); //다음 슬라이드 번호SS
}

function backSlide() {
 ChangeSlidePos(slide_position -1); //이전 슬라이드 번호
}

function createTimer(){
 if(timer){
     clearInterval(timer);
     timer = null;
 }
 
 timer = setInterval(function(){
     nextSlide();
 },3000);
}