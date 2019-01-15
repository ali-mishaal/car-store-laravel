$(document).ready(function(){
  $(".point-move ul li:nth-child(1)").css("box-shadow",'0 0 0 3px rgba(0,0,0,1),0 0 0 5px rgb(182, 95, 32)');

  $('#c2').click(function(){
    $(".point-move ul li:nth-child(1)").css('box-shadow','none');
    $(".point-move ul li:nth-child(3)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(4)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(2)").css("box-shadow",'0 0 0 3px rgba(0,0,0,1),0 0 0 5px rgb(182, 95, 32)');
    setTimeout(function(){
      showCar(2);},700);

   slideMove();

  });

  $('#c3').click(function(){
    $(".point-move ul li:nth-child(1)").css('box-shadow','none');
    $(".point-move ul li:nth-child(2)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(4)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(3)").css("box-shadow",'0 0 0 3px rgba(0,0,0,1),0 0 0 5px rgb(182, 95, 32)');
    setTimeout(function(){
      showCar(3);},700);

    slideMove();
  });

  $('#c4').click(function(){
    $(".point-move ul li:nth-child(1)").css('box-shadow','none');
    $(".point-move ul li:nth-child(2)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(3)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(4)").css("box-shadow",'0 0 0 3px rgba(0,0,0,1),0 0 0 5px rgb(182, 95, 32)');
    setTimeout(function(){
      showCar(4);},700);

    slideMove();

  });

  $('#c1').click(function(){
    $(".point-move ul li:nth-child(2)").css('box-shadow','none');
    $(".point-move ul li:nth-child(3)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(4)").css("box-shadow",'none');
    $(".point-move ul li:nth-child(1)").css("box-shadow",'0 0 0 3px rgba(0,0,0,1),0 0 0 5px rgb(182, 95, 32)');

    setTimeout(function(){
      showCar(1);},700);

    slideMove();

  });







function showCar($n){

     $('.car-header').attr('src','images/car'+$n+'.png');
}

function slideMove(){
     $('#brwonLayer').animate({left:'-150%'},1300,'swing',function(){
         $('#brwonLayer').css('left','100%');
     });

     $('#redLayer').animate({left:'-170%'},1400,'swing',function(){
         $('#redLayer').css('left','100%');
     });
}















});
