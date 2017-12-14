@if(session()->has('message'))
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: '{{ session()->get('icon') }}',
                message: '{{ session()->get('message') }}'

            },{
                type: '{{ session()->get('type') }}',
                timer: 4000
            });
        });
    </script>
@endif