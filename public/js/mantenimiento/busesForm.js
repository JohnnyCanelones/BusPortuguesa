  $(document).ready(function() {

    $('.js-example-basic-single').select2(); 
    $('.js-example-basic-single2').select2(); 
    
    $('#date').bootstrapMaterialDatePicker({
	    weekStart : 0,
	    format : 'YYYY/M/D ', 
	    lang: 'es',
	    time: false,
	});


});

let motivoinactividad = document.getElementById('motivo_inactividad');
let fechaInactivo = document.getElementById('fecha_inactivo');
let observacion = document.getElementById('observacion');
let activeBusChecked =document.getElementById("active_bus_check").checked;
if (activeBusChecked == true) {
	console.log('esta activo');
	motivoinactividad.classList.toggle("d-none")
	fechaInactivo.classList.toggle("d-none")
	observacion.classList.toggle("d-none")
}
document.getElementById("active_bus").addEventListener("click", function(){


let motivoinactividad = document.getElementById('motivo_inactividad');
let fechaInactivo = document.getElementById('fecha_inactivo');
let observacion = document.getElementById('observacion');
let activeBusChecked =document.getElementById("active_bus_check").checked;
	if (activeBusChecked == false) {
		console.log('esta inactivo');
		motivoinactividad.classList.toggle("d-none")
		fechaInactivo.classList.toggle("d-none")
		observacion.classList.toggle("d-none")
	}
})

