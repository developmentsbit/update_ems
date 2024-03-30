
<script type="text/javascript">
    function columnWiseFeeTitle() {
        $(".feeTitleShow").html('');
        let class_id    = $("#class_id").val();
        let year        = $("#year").val();
        let type        = 1;
        let url = 'column-Fee-Title-Class-Wise';
        if(class_id && year){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'JSON',
                    data:{class_id:class_id,year:year,type:type},
                    cache: false,
                    success: function(response) {
                        $(".feeTitleShow").html(response.view)
                    },
                    error: function(xhr) {
                        toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                    }
                });
        }else{
            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
        }
    }

    function ShowcolumnWiseFeeTitle() {
        $(".feeTitleShow").html('');
        let class_id    = $("#class_id").val();
        let year        = $("#year").val();
        let type        = 2;
        let url = 'column-Fee-Title-Class-Wise';
        if(class_id && year){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                data:{class_id:class_id,year:year,type:type},
                cache: false,
                success: function(response) {
                    $(".feeTitleShow").html(response.view)
                },
                error: function(xhr) {
                    toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                }
            });
        }else{
            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
        }
    }
    function deleteColumnFeeTitle(id) {
        let url = "{{ url('columnwisefee-delete') }}";
        if(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                data:{id:id},
                cache: false,
                success: function(response) {
                    if(response.status_code == 100){

                        ShowcolumnWiseFeeTitle();
                    }
                },
                error: function(xhr) {
                    toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                }
            });
        }else{
            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
        }
    }

</script>
