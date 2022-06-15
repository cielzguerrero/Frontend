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

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,

    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
// Remove Insufficient Points 
$(window).ready(function(){
    $( ".claimAlert" ).fadeOut(3000);
});


// Claim Alert
function ClaimClicked(){
    return confirm('Are you sure ?')
};