$(document).ready(function(){
        document.getElementById("search_price").style.display = "none";
        document.getElementById("danhmuc").style.display ="none";
        document.getElementById("footer-site").style.display ="none";
        document.getElementById("footer-site1").style.display ="none";
        $('a[href=#top]').click(function(){
            $('html, body').animate({scrollTop:0}, 'slow');
        });
    });