<link rel="stylesheet" href="{{asset("plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}">
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
<form action="/mantenimiento/cronograma/fechas" method="post" class="m-0">
  <div class="card-footer">
    {{ csrf_field() }}
    <div class="row">
      {{-- formulario --}}
      <div class="col-lg-5 col-md-12 " id="fecha_inactivo">
          <div class="form-group">
              <strong><label for="fecha"  class="bmd-label-floating">Desde</label></strong>
          <input required  class="form-control "  name="desde" id="date" value="{{$desde}}">
                
          </div>
      </div>

      <div class="col-lg-5 col-md-12 " id="fecha_inactivo">
          <div class="form-group">
              <strong><label for="fecha"  class="bmd-label-floating">Hasta</label></strong>
          <input required  class="form-control "  name="hasta" id="date2" value="{{$hasta}}">
                
          </div>
      </div>

      
      <div class="col-sm-2 mt-4">
        <button class="btn btn-primary btn-raised mx-auto d-block header" type="submit" id="buttonSubmit"> Buscar</button>

      </div>
    </div>
  </div>
</form>

  <script type="text/javascript" src="{{ asset('plugins/momentjs/moment.js') }}"></script> 
  <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
  <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>

<script>
  $('#date').bootstrapMaterialDatePicker({
    weekStart : 0,
    format : 'YYYY-M-D ', 
    lang: 'es',
    time: false,
  });
  $('#date2').bootstrapMaterialDatePicker({
    weekStart : 0,
    format : 'YYYY-M-D ', 
    lang: 'es',
    time: false,
  });


  let submit = document.getElementById('buttonSubmit')
  submit.addEventListener('click', function (ev) {
    let desde = new Date(document.getElementById('date').value)
    let hasta = new Date(document.getElementById('date2').value)
    if (hasta < desde) {
      ev.preventDefault()
      swal(
      'Advertencia!',
      'La segunda fecha no puede ser menor a la primera' ,
      'warning'
      )
    }else{
      
      console.log(ev)

    }
    


  })


          
</script>