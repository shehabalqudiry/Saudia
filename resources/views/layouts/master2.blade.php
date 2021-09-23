@include('layouts.head')
@yield('content')

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->
<script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.min.js?v=2.1.2') }}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/demo/demo.js') }}"></script>
<script>
    $('#qualHead').on('click', '.addRowQ',function(){
        var tr1 = '<tr>'+
            '<td>'+
                '<input class="form-control" type="text" name="qualification_name[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="spec[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="address[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="schoole[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="years_count[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="gradution_year[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="degree[]">'+
            '</td>'+
            '<th>'+
                '<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteRowQ">-</a>'+
            '</th>'+
        '</tr>';
        $('#qualBody').append(tr1);
        $('#qualBody').on('click', '.deleteRowQ', function(){
            $(this).parent().parent().remove();
        });
    });
    $('#e_head').on('click', '.addRow',function(){
    var tr2 = '<tr>'+
        '<td>'+
            '<input class="form-control" type="text" name="job_title[]">'+
        '</td>'+
        '<td>'+
            '<input class="form-control" type="text" name="company_name[]">'+
        '</td>'+
        '<td>'+
            '<input class="form-control" type="text" name="job_start[]">'+
        '</td>'+
        '<td>'+
            '<input class="form-control" type="text" name="job_end[]">'+
        '</td>'+
        '<td>'+
            '<input class="form-control" type="text" name="contract_termination[]">'+
        '</td>'+
        '<th>'+
            '<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteRow">-</a>'+
        '</th>'+
    '</tr>';
    $('#e_body').append(tr2);
    $('#e_body').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
    });
    });
    $('#e_head').on('click', '.addRow',function(){
        var tr3 = '<tr>'+
            '<td>'+
                '<input class="form-control" type="text" name="company_name[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="work_address[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="job_title[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="contract_termination[]">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="job_start">'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="job_end">'+
            '</td>'+
            '<th>'+
                '<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteRow">-</a>'+
            '</th>'+
        '</tr>';
        $('#e_body').append(tr2);
        $('#e_body').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
        });
        });

</script>
<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="nationality_id"]').on('change', function(){
            var nationality_id = $(this).val();
            if (nationality_id) {
                $.ajax({
                    url: "{{ URL::to('get-cities') }}/" + nationality_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                        })
                    },
                });
            } else {
                console.log("AJAX Load Not Work");
            };
        });
    });
</script>
@if (session()->has('success'))
<script>
    $.notify({
        icon: "add_alert",
        message: "{{ session()->get('success') }}"
        
        }, {
        type: 'success',
        timer: 3000,
        placement: {
        from: 'top',
        align: 'right'
        }
        });
</script>
@endif
</body>

</html>