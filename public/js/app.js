window.onload=function(){


    document.getElementById('toggle-menu').addEventListener("click", function(){
        document.getElementById('sidebar1997').classList.toggle("toggled");
        // document.getElementById('content').classList.toggle("overlay");
        // document.getElementById('content2').classList.toggle("overlay");

    });

    function toggleSubMenu($button){
        document.querySelector($button +' #dropdown').classList.toggle("trans");
        document.querySelector($button +' #minimize').classList.toggle("trans");
    }
    
    document.querySelector('.cambio').addEventListener("click", function(){toggleSubMenu('.cambio')});
    document.querySelector('#button3').addEventListener("click", function(){toggleSubMenu('#button3')});
    document.querySelector('#button4').addEventListener("click", function(){toggleSubMenu('#button4')});

  


}
