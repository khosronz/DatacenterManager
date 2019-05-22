<!-- DataTable Bootstrap -->
<link href="{{asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap.min.css')}}">
<!--Persian date picker-->
<link rel="stylesheet" href="{{asset('assets/css/persian.datepicker.css')}}"/>
<script src="{{asset('assets/persian-date/dist/js/persian.date.js')}}"></script>
<script src="{{asset('assets/persian-datepicker/dist/js/persian.datepicker.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".percal").pDatepicker();
    });
</script>