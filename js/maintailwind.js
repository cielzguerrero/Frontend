// UPWARD TOGGLE CHECK SCROLL

$(window).scroll(function(){
    var upward = document.querySelector("#upward")
    if(window.scrollY==0){
        upward.style.opacity = "0";
      }
    else
    {
        upward.style.opacity = "80%";
    }
});

// FILE UPLOAD
$("#cameraPhoto").click(function(){
    $("#uploadPhoto").click();
});

// PROFILE LIGHT BOX
$("#profImage").click(function(){
    $("#lightImage").click();
});