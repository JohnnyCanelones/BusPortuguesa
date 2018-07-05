window.onload=function(){
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
    let operaciones = document.getElementById('operaciones');

    admin.addEventListener('click', function(){
        if(admin.checked){
            mantenimiento.disabled = true;
            personal.disabled = true;
            inventario.disabled = true;
            operaciones.disabled = true;
        }else{
            mantenimiento.disabled = false;
            personal.disabled = false;
            inventario.disabled = false;
            operaciones.disabled = false;

        }
    })

    mantenimiento.addEventListener('click', function(){
        if(mantenimiento.checked){
            admin.disabled = true;
            personal.disabled = true;
            inventario.disabled = true;
            operaciones.disabled = true;
        }else{
            admin.disabled = false;
            personal.disabled = false;
            inventario.disabled = false;
            operaciones.disabled = false;

        }
    })

    personal.addEventListener('click', function(){
        if(personal.checked){
            admin.disabled = true;
            mantenimiento.disabled = true;
            inventario.disabled = true;
            operaciones.disabled = true;
        }else{
            admin.disabled = false;
            mantenimiento.disabled = false;
            inventario.disabled = false;
            operaciones.disabled = false;

        }
    })
    inventario.addEventListener('click', function(){
        if(inventario.checked){
            admin.disabled = true;
            personal.disabled = true;
            mantenimiento.disabled = true;
            operaciones.disabled = true;
        }else{
            admin.disabled = false;
            personal.disabled = false;
            mantenimiento.disabled = false;
            operaciones.disabled = false;

        }
    })
    operaciones.addEventListener('click', function(){
        if(operaciones.checked){
            admin.disabled = true;
            personal.disabled = true;
            inventario.disabled = true;
            mantenimiento.disabled = true;
        }else{
            admin.disabled = false;
            personal.disabled = false;
            inventario.disabled = false;
            mantenimiento.disabled = false;

        }
    })

}