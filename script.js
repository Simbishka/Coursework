
$(document).on('click', '.card', function(){
  if($('.other').css('display') == 'none'){
    $('.other').css('display', 'flex');
    $('.target').css('display', 'none');
  }else{
    $('.other').css('display', 'none');
    $('.target').css('display', 'flex');
  }
  
});
var position = 0;

function move_next(){
  position = position - 100;
 $("#slider figure").css('left', position + '%');
};
function move_back(){
  position = position + 100;
 $("#slider figure").css('left', position + '%');
};
$(document).on('click', '.next', function test(){
//  sliderMove = setTimeout(move, 2000); 
  if(position>=-300){
    move_next();
  }
    
});
$(document).on('click', '.prev', function test(){
  //  sliderMove = setTimeout(move, 2000); 
  if(position < 0){
    move_back();
  }
  });



document.getElementById("trigger").onclick = function() {
    open()
  };
  
  function open() {
    document.getElementById("menu").classList.toggle("show");
  }
  
  