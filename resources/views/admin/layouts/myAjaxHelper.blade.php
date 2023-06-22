<script>
    var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;


    // Show Data Using YAJRA
    /**
     *
     * @param routeOfShow
     * @param columns
     * @returns {Promise<void>}
     */
    async function showData(routeOfShow, columns) {
        /**
         *
         * @type {*|jQuery}
         */
      var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: routeOfShow,
            columns: columns,
            order: [
                [0, "DESC"]
            ],
            "language": {
                "sProcessing": "@lang('admin.Loading') ..",
                "sLengthMenu": "اظهار _MENU_ سجل",
                "sZeroRecords": "@lang('admin.No results')",
                "sInfo": "@lang('admin.register') _START_ @lang('admin.from')  _END_ @lang('admin.to') _TOTAL_ @lang('admin.show')",
                "sInfoEmpty": "@lang('admin.No results')",
                "sInfoFiltered": "@lang('admin.Search')",
                "sSearch": "@lang('admin.research') :    ",
                "oPaginate": {
                    "sPrevious": "<",
                    "sNext": ">",
                },
                buttons: {
                    copyTitle: 'تم النسخ للحافظة <i class="fa fa-check-circle text-success"></i>',
                    copySuccess: {
                        1: "تم نسخ صف واحد",
                        _: "تم نسخ %d صفوف بنجاح"
                    },
                }
            },

            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    text: '@lang('admin.copy')',
                    className: 'btn-primary'
                },
                {
                    extend: 'print',
                    text: '@lang('admin.Print')',
                    className: 'btn-primary'
                },
                {
                    extend: 'excel',
                    text: '@lang('admin.Excel')',
                    className: 'btn-primary'
                },
                // {
                //     extend: 'pdf',
                //     text: 'PDF',
                //     className: 'btn-primary'
                // },
                {
                    extend: 'colvis',
                    text: '@lang('admin.show')',
                    className: 'btn-primary'
                },
            ]
        });

        $('#type').on('click',function(){
            table.draw();
        });
    }

    /**
     *
     * @param routeOfDelete
     */
    // Delete Using Ajax
    function deleteScript(routeOfDelete) {
        $(document).ready(function() {
            //Show data in the delete form
            $('#delete_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var title = button.data('title')
                var modal = $(this)
                modal.find('.modal-body #delete_id').val(id);
                modal.find('.modal-body #title').text(title);
            });
        });
        $(document).on('click', '#delete_btn', function(event) {
            var id = $("#delete_id").val();
            $.ajax({
                type: 'POST',
                url: routeOfDelete,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id,
                },
                success: function(data) {
                    if (data.status === 200) {
                        $("#dismiss_delete_modal")[0].click();
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success(data.message)
                    } else {
                        $("#dismiss_delete_modal")[0].click();
                        toastr.error(data.message)
                    }
                }
            });
        });
    }

    // show Add Modal
    function showAddModal(routeOfShow) {
        $(document).on('click', '.addBtn', function() {
            $('#modal-body').html(loader)
            $('#editOrCreate').modal('show')
            setTimeout(function() {
                $('#modal-body').load(routeOfShow)
            }, 250)
        });
    }

    function addScript() {
        $(document).on('submit', 'Form#addForm', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#addButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">{{ trans('admin.wait') }} ..</span>').attr(
                        'disabled', true);
                },
                success: function(data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success(' {{ trans('admin.added_successfully') }} ');
                    } else if (data.status == 405) {
                        toastr.error(data.mymessage);
                    } else
                        toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                    $('#addButton').html(`{{ trans('admin.add') }}`).attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },
                error: function(data) {
                    if (data.status === 500) {
                        toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function(key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function(key, value) {
                                    toastr.error(value, '{{ trans('admin.wrong') }}');
                                });
                            }
                        });
                    } else
                        toastr.error('{{ trans('admin.something_went_wrong') }} ..');
                    $('#addButton').html(`{{ trans('admin.add') }}`).attr('disabled', false);
                }, //end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    }

    function showEdit(routeOfEdit) {
        $(document).on('click', '.editBtnAnswer', function() {
            var id = $(this).data('id')
            var url = routeOfEdit;
            url = url.replace(':id', id)
            $('#modal-body').html(loader)
            $('#editOrCreate').modal('show')

            setTimeout(function() {
                $('#modal-body').load(url)
            }, 500)
        })
    }

    function showReply(routeOfEdit) {
        $(document).on('click', '.replys', function() {
            var id = $(this).data('id')
            var url = routeOfEdit;
            url = url.replace(':id', id)
            $('#modal-body-replys').html(loader)
            $('#addReplsyModal').modal('show')

            setTimeout(function() {
                $('#modal-body-replys').load(url)
            }, 500)
        })
    }

    function showAddReply(routeOfEdit) {
        $(document).on('click', '.addReply', function() {
            var id = $(this).data('id')
            var url = routeOfEdit;
            url = url.replace(':id', id)
            $('#modal-body-reply').html(loader)
            $('#addReplyModal').modal('show')

            setTimeout(function() {
                $('#modal-body-reply').load(url)
            }, 500)
        })
    }

    function addReplyComment() {
        $(document).on('submit', 'Form#addFormReply', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addFormReply').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#addReply').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">انتظر ..</span>').attr(
                        'disabled', true);
                },
                success: function(data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('تم اضافة رد');
                    } else if (data.status == 405) {
                        toastr.error(data.mymessage);
                    } else
                        toastr.error('هناك خطأ ما ..');
                    $('#addReply').html(`اضافة`).attr('disabled', false);
                    $('#addReplyModal').modal('hide')
                },
                error: function(data) {
                    if (data.status === 500) {
                        toastr.error('هناك خطأ ما ..');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function(key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function(key, value) {
                                    toastr.error(value, 'خطأ');
                                });
                            }
                        });
                    } else
                        toastr.error('هناك خطأ ما ..');
                    $('#addReply').html(`اضافة`).attr('disabled', false);
                }, //end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    }

    function edit2() {
        $(document).on('submit', 'Form#update_renwal', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#update_renwal').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#update2').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">انتظر ..</span>').attr(
                        'disabled', true);
                },
                success: function(data) {
                    $('#update2').html(`تعديل`).attr('disabled', false);
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('تم التعديل بنجاح');
                    } else
                        toastr.error('هناك خطأ ما ..');

                    $('#editOrCreate').modal('hide')
                },
                error: function(data) {
                    if (data.status === 500) {
                        toastr.error('هناك خطأ ما ..');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function(key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function(key, value) {
                                    toastr.error(value, 'خطأ');
                                });
                            }
                        });
                    } else
                        toastr.error('هناك خطأ ما ..');
                    $('#update2').html(`تعديل`).attr('disabled', false);
                }, //end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    }

    function showEdit1(routeOfEdit) {
        $(document).on('click', '.renew', function() {
            var id = $(this).data('id')
            var url = routeOfEdit;
            url = url.replace(':id', id)
            $('#modal-renew').html(loader)
            $('#renew').modal('show')

            setTimeout(function() {
                $('#modal-renew').load(url)
            }, 500)
        })
    }

    function showEditModal(routeOfEdit) {
        $(document).on('click', '.editBtn', function() {
            var id = $(this).data('id')
            var url = routeOfEdit;
            url = url.replace(':id', id)
            $('#modal-body').html(loader)
            $('#editOrCreate').modal('show')

            setTimeout(function() {
                $('#modal-body').load(url)
            }, 500)
        })
    }

    function editScript() {
        $(document).on('submit', 'Form#updateForm', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#updateForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#updateButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">{{ trans('admin.wait') }} ..</span>').attr(
                        'disabled', true);
                },
                success: function(data) {
                    $('#updateButton').html(`{{ trans('admin.update') }}`).attr('disabled', false);
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.updated_successfully') }}');
                    } else
                        toastr.error(' {{ trans('admin.something_went_wrong') }} ..');

                    $('#editOrCreate').modal('hide')
                },
                error: function(data) {
                    if (data.status === 500) {
                        toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function(key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function(key, value) {
                                    toastr.error(value, '{{ trans('admin.wrong') }}');
                                });
                            }
                        });
                    } else
                        toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                    $('#updateButton').html(`تعديل`).attr('disabled', false);
                }, //end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    }

    function destroyScript(routeOfDelete) {
        $(document).ready(function() {
            //Show data in the delete form
            $('#delete_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var title = button.data('title')
                var modal = $(this)
                modal.find('.modal-body #delete_id').val(id);
                modal.find('.modal-body #title').text(title);
            });
        });
        $(document).on('click', '#delete_btn', function(event) {
            var id = $("#delete_id").val();
            $.ajax({
                type: 'DELETE',
                url: routeOfDelete,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id,
                },
                success: function(data) {
                    if (data.status === 200) {
                        $("#dismiss_delete_modal")[0].click();
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.deleted_successfully') }}')
                    } else {
                        $("#dismiss_delete_modal")[0].click();
                        toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                    }
                }
            });
        });
    }
</script>
