<script type="text/javascript">
    function columnWiseFeeTitle() {
        $(".feeTitleShow").html('');
        let class_id = $("#class_id").val();
        let year = $("#year").val();
        let type = 1;
        let url = 'column-Fee-Title-Class-Wise';
        if (class_id && year) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                data: {class_id: class_id, year: year, type: type},
                cache: false,
                success: function (response) {
                    $(".feeTitleShow").html(response.view)
                },
                error: function (xhr) {
                    toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                }
            });
        } else {
            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
        }
    }

    function ShowcolumnWiseFeeTitle() {
        $(".feeTitleShow").html('');
        let class_id = $("#class_id").val();
        let year = $("#year").val();
        let type = 2;
        let url = 'column-Fee-Title-Class-Wise';
        if (class_id && year) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                data: {class_id: class_id, year: year, type: type},
                cache: false,
                success: function (response) {
                    $(".feeTitleShow").html(response.view)
                },
                error: function (xhr) {
                    toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                }
            });
        } else {
            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
        }
    }

    function deleteColumnFeeTitle(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: "@lang('common.are_you_sure')",
            text: "@lang('common.will_find_in_deleted_list')",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "@lang('common.yes_delete')",
            cancelButtonText: "@lang('common.no_cancel')",
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                let url = "{{ url('columnwisefee-delete') }}";
                if (id) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'JSON',
                        data: {id: id},
                        cache: false,
                        success: function (response) {
                            if (response.status_code == 100) {

                                ShowcolumnWiseFeeTitle();
                            }
                        },
                        error: function (xhr) {
                            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                        }
                    });
                } else {
                    toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                }
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                toastr["error"]("@lang('common.safe')", "@lang('common.cancelled')");
            }
        })
    }

    function ShowStudentWiseFeeTitle(type = 1) {
        $(".feeTitleShow").html('');
        let class_id = $("#class_id").val();
        let year = $("#year").val();
        let student_id = $("#student_id").val();
        let url = 'show-Fee-Title-Student-Wise';
        if (class_id && year && student_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                data: {class_id: class_id, year: year, student_id: student_id, type: type},
                cache: false,
                success: function (response) {
                    $(".studentFeeTitleShow").html(response.view)
                },
                error: function (xhr) {
                    toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                }
            });
        } else {
            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
        }
    }

    function deleteStudentFeeTitle(id) {
        $(".feeTitleShow").html('');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: "@lang('common.are_you_sure')",
            text: "@lang('common.will_find_in_deleted_list')",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "@lang('common.yes_delete')",
            cancelButtonText: "@lang('common.no_cancel')",
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                let url = "{{ url('studentWisefee-delete') }}";
                if (id) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'JSON',
                        data: {id: id},
                        cache: false,
                        success: function (response) {
                            if (response.status_code == 100) {

                                ShowStudentWiseFeeTitle(2);
                            }
                        },
                        error: function (xhr) {
                            toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                        }
                    });
                } else {
                    toastr["error"]("@lang('common.no data')", "@lang('common.sorry')");
                }
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                toastr["error"]("@lang('common.safe')", "@lang('common.cancelled')");
            }
        })
    }

</script>
