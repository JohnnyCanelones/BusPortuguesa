$(document).ready(function () {

	$('.js-example-basic-single').select2();
	$('.js-example-basic-single2').select2();

	$('#date').bootstrapMaterialDatePicker({
		weekStart: 0,
		format: 'YYYY/M/D ',
		lang: 'es',
		time: false,
	});
	$('#date2').bootstrapMaterialDatePicker({
		weekStart: 0,
		format: 'YYYY/M/D ',
		lang: 'es',
		time: false,
	});


});

let motivoinactividad = document.getElementById('motivo_inactividad');
let fechaInactivo = document.getElementById('fecha_inactivo');
let observacion = document.getElementById('observacion');
let activeBusChecked = document.getElementById("active_bus_check").checked;


let activeServicioChecked = document.getElementById("active_servicio_check").checked;
let activeServicio = document.getElementById("active_servicio")

if (activeBusChecked == true) {
	console.log('esta activo');
	motivoinactividad.classList.toggle("d-none")
	fechaInactivo.classList.toggle("d-none")
	observacion.classList.toggle("d-none")
}
document.getElementById("active_bus").addEventListener("click", function () {


	let activeServicioChecked = document.getElementById("active_servicio_check").checked;
	let activeServicio = document.getElementById("active_servicio")
	let motivoinactividad = document.getElementById('motivo_inactividad');
	let fechaInactivo = document.getElementById('fecha_inactivo');
	let observacion = document.getElementById('observacion');
	let activeBusChecked = document.getElementById("active_bus_check").checked;
	if (activeBusChecked == false) {
		console.log('esta inactivo');
		motivoinactividad.classList.toggle("d-none")
		fechaInactivo.classList.toggle("d-none")
		observacion.classList.toggle("d-none")
		document.getElementById("active_servicio_check").disabled = false


	} else {

		if (activeServicioChecked == true) {
			// console.log('hola');

			activeServicio.click()
		}
		activeServicioChecked = false
		activeServicio.disabled = true
		document.getElementById("active_servicio_check").disabled = true
	}
})

document.getElementById("active_servicio").addEventListener("click", function () {


	let fechaInactivo = document.getElementById('fecha_inactivo2');
	let observacion = document.getElementById('observacion2');
	let activeServicioChecked = document.getElementById("active_servicio_check").checked;
	if (activeServicioChecked == true) {
		console.log('servicio');
		// motivoinactividad.classList.toggle("d-none")
		fechaInactivo.classList.toggle("d-none")
		observacion.classList.toggle("d-none")
	}
})

$.fn.formatter.addInptType('T', /[2,4]/);
$.fn.formatter.addInptType('L', /[A-Za-z ]/);
$.fn.formatter.addInptType('X', /[A-Za-z]/);
$('#kilometraje').formatter({
	"pattern": '{{9999999999999999999999999999999}}'
});

$('#id_bus').formatter({
	"pattern": '{{999999}}'
});



$('#name').formatter({
	"pattern": '{{99999}}'
});

$('#vin').formatter({
	"pattern": 'LZY1DGD68F100{{9999}}'
});




// $(document).ready(function() {
$("#conductor").change(function () {
	// alert( "Handler for .change() called." );
	$.get("/api/mantenimiento/buses", function (data) {
		// console.log(data)
		let $conductor = document.getElementById('conductor').value
		let $button = document.getElementById('registrar')
		for (let i = 0; i < data.length; i++) {
			let conductor = data[i].conductor_id;
			// console.log(conductor)
			if ($conductor == 0) {
				console.log("0")
				$button.disabled = false;

			} if ($conductor == conductor) {
				swal(
					'Advertencia!',
					'El conductor que seleccionaste ya esta encargado de otra unidad',
					'warning'
				)
				// console.log($button);
				$button.disabled = true;
				break
			} else {
				$button.disabled = false;

			}

		}
	})

});

$("#id_bus").change(function () {
	// alert( "Handler for .change() called." );
	$.get("/api/mantenimiento/buses", function (data) {
		// console.log(data)
		let $id_bus = document.getElementById('id_bus')
		let $button = document.getElementById('registrar')
		for (let i = 0; i < data.length; i++) {
			let unidad = data[i].id_bus;
			// console.log(conductor)
			if ($id_bus.value == unidad) {
				swal(
					'Advertencia!',
					`La unidad ${$id_bus.value} ya existe`,
					'warning'
				)
				$id_bus.value = '';
				$button.disabled = true;
				break
			} else {
				$button.disabled = false;

			}

		}
	})

});

$("#vin").change(function () {
	// alert( "Handler for .change() called." );
	$.get("/api/mantenimiento/buses", function (data) {
		// console.log(data)
		let $vin = document.getElementById('vin')
		let $button = document.getElementById('registrar')
		for (let i = 0; i < data.length; i++) {
			let unidad = data[i].vin;
			// console.log(conductor)
			if ($vin.value == unidad) {
				swal(
					'Advertencia!',
					`El Vin ${$vin.value} ya existe`,
					'warning'
				)
				$vin.value = '';
				$button.disabled = true;
				break
			} else {
				$button.disabled = false;

			}

		}
	})

});



