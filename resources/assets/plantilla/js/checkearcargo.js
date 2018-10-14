let admin = document.getElementById('admin');
let mantenimiento = document.getElementById('mantenimiento');
let personal = document.getElementById('personal');
let inventario = document.getElementById('inventario');
let operaciones = document.getElementById('operaciones');

function adminFunction(){
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
}

function mantenimientoFunction(){
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
}

function personalFunction(){
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
}

function inventarioFunction(){
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
}

function operacionesFunction(){
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
}

//llamamos la funcion para apenas cargue la pagina se ejecute la validacion
    if (admin.checked) {adminFunction()}
    if (mantenimiento.checked) {mantenimientoFunction()}
    if (personal.checked) {personalFunction()}
    if (inventario.checked) {inventarioFunction()}
    if (operaciones.checked) {operacionesFunction()}




    //aqui ejecutamos las mismas funciones pero cada vez que se haga click en cada checkbox
    admin.addEventListener('click', function(){
        adminFunction()
    })

    mantenimiento.addEventListener('click', function(){
       mantenimientoFunction()
    })

    personal.addEventListener('click', function(){
       personalFunction()
    })
    inventario.addEventListener('click', function(){
      inventarioFunction() 
    })
    operaciones.addEventListener('click', function(){
       operacionesFunction() 
    })
