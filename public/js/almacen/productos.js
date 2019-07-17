$.fn.formatter.addInptType('T', /[2,4]/);
$.fn.formatter.addInptType('L', /[A-Za-z ]/);
$.fn.formatter.addInptType('X', /[A-Za-z]/);

$('#cantidad').formatter({
  "pattern": '{{999999}}'
});

$("#limite").formatter({
  "pattern": '{{999999}}'
});

$("#nombre_producto").focusout(function () {
  // alert( "Handler for .change() called." );
  $.get("/api/almacen/productos", function (data) {
    // console.log(data)
    let $nombre_producto = document.getElementById('nombre_producto')
    let $button = document.getElementById('registrar')
    for (let i = 0; i < data.length; i++) {
      let producto = data[i].nombre_producto;
      // console.log($nombre_producto.value.toLowerCase().replace(/ /g, ""))
      // console.log(producto.toLowerCase().replace(/ /g, ""));

      if ($nombre_producto.value.toLowerCase().replace(/ /g, "") == producto.toLowerCase().replace(/ /g, "")) {
        swal(
          'Advertencia!',
          `El producto <strong style="font-weight: bold;">${$nombre_producto.value}</strong> ya existe`,
          'warning'
        )
        $nombre_producto.value = '';

        break
      }

    }
  })

});