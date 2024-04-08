<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($title) ? Str::upper($title) : "" }} | E-COMMERCE</title>

  <link rel="icon" href="{{ url('public/assets/dist/img/AdminLTELogo.png')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    @yield('content')
    @include('admin.layouts.footer')

</div>

<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('public/assets/dist/js/adminlte.js') }}"></script>
<script src="{{ url('public/assets/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('public/assets/dist/js/pages/dashboard3.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ url('public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ url('public/assets/dist/js/adminlte.min.js') }}"></script>

<script>

$(document).ready(function () {

    var i = 0;
    $('body').delegate('.addSize', 'click', function(e){
        var html = '<tr id="deleteSize'+i+'">'+
                        '<td><input type="text" name="name" placeholder="Enter name" class="form-control"></td>'+
                        '<td><input type="number" min="0" name="price" placeholder="Enter price" class="form-control"></td>'+
                        '<td>'+
                            '<div class="btn-group">'+
                            '<button type="button" title="Delete" id="'+i+'"  class="btn btn-sm btn-danger deleteSize"><i class="fas fa-trash"></i></button>'+
                            '</div>'+
                        '</td>'+
                    '</tr>';
        i++;
        $('#appendSize').append(html);
    })


    $('body').delegate('.deleteSize','click', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $('#deleteSize'+id).remove();
    });

    $('body').delegate('#category','change', function(e){
        e.preventDefault();
        var id = $(this).val();

        $.ajax({
            type: "POST",
            url: "{{ url('admin/get_subCategory') }}",
            data: {
                "id" : id,
                "_token" : "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                $('#sub_category').html(data.html);
            },
            error:function(data){
            }
        });
    });


});
</script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>






