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

    $.fn.formatter.addInptType('T', /[2,4]/);
    $.fn.formatter.addInptType('L', /[A-Za-z ]/);
    $.fn.formatter.addInptType('X', /[A-Za-z]/);
    $('#cedula').formatter({
        "pattern": '{{99999999}}'
    });

    $("#telefono").formatter({
        "pattern": '(0{{T99}}) - {{999}}-{{9999}}'
    });

    lista = ["#nombres", "#apellidos"]
    for (i=0; i<lista.length; i++){
      $(lista[i]).formatter({
        "pattern":'{{LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL}}'
      });
    }

  let cargo = document.getElementById('cargo');
    let checkbox = document.querySelectorAll('.admin');

    cargo.addEventListener('click', function(){
        console.log('skadjhasd')    
        if (cargo.checked) {
            checkbox.forEach(function(checkbox){
                checkbox.classList.toggle("ocultar-permisos");
            })
        }else{
            checkbox.forEach(function(checkbox){
                checkbox.classList.toggle("ocultar-permisos");
            })
            
        }
    })
 
    let admin = document.getElementById('admin');
    let mantenimiento = document.getElementById('mantenimiento');
    let personal = document.getElementById('personal');
    let inventario = document.getElementById('inventario');

    admin.addEventListener('click', function(){
        if(admin.checked){
            mantenimiento.disabled = true;
            personal.disabled = true;
            inventario.disabled = true;
            
        }else{
            mantenimiento.disabled = false;
            personal.disabled = false;
            inventario.disabled = false;
           

        }
    })

    mantenimiento.addEventListener('click', function(){
        if(mantenimiento.checked){
            admin.disabled = true;
            personal.disabled = true;
            inventario.disabled = true;
            
        }else{
            admin.disabled = false;
            personal.disabled = false;
            inventario.disabled = false;
           

        }
    })

    personal.addEventListener('click', function(){
        if(personal.checked){
            admin.disabled = true;
            mantenimiento.disabled = true;
            inventario.disabled = true;
            
        }else{
            admin.disabled = false;
            mantenimiento.disabled = false;
            inventario.disabled = false;
           

        }
    })
    inventario.addEventListener('click', function(){
        if(inventario.checked){
            admin.disabled = true;
            personal.disabled = true;
            mantenimiento.disabled = true;
            
        }else{
            admin.disabled = false;
            personal.disabled = false;
            mantenimiento.disabled = false;
           

        }
    })
   

}