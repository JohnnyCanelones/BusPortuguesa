@include('layouts.staff_base')

<body>
    

<div class="container">
    <div class=" col-sm-12 mt-5 " >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="" class='card card2'>
                <table id="example" class="p-3 table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                  <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Office</th>
                            <th scope="col">Age</th>
                            <th scope="col">Start date</th>
                            <th scope="col">Salary</th>
                        </tr>

                    </thead>
                    <tbody>
                            <tr>
                                <td scope="row">Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('plugins/jquery-3.2.1.slim.min.js') }}" ></script>

    
 <script type="text/javascript"  src="{{ asset('homepage/lib/jquery datatables/jquery.dataTables.js') }}"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
    
    } );
} );
</script>
</body>