    $(document).ready( function () {
        // var datatable = $('#kt_datatable').DataTable({
        //     translate: conf.datatable.translate,
        //     data: {
        //         saveState: {cookie: false},
        //     },
        //     search: {
        //         input: $('#kt_datatable_search_query'),
        //         key: 'generalSearch'
        //     },
        //     layout: {
        //         class: 'datatable-bordered',
        //         scroll: true
        //     },
        //     responsive: {
        //         details: false
        //     },
        //     columns: [
        //         {
        //             field: 'No',
        //             title: 'No',
        //             width: 40
        //         },
        //         {
        //             field: 'Id',
        //             title: 'Id',
        //             width: 40
        //         },
        //         {
        //             field: 'Status',
        //             title: 'Status',
        //             template: function(row) {
        //             var status = {
        //                 1: {
        //                     'title': 'All',
        //                     'class': ' label-light-warning'
        //                 },
        //                 2: {
        //                     'title': 'Aktif',
        //                     'class': ' label-light-info'
        //                 },
        //                 3: {
        //                     'title': 'Selesai',
        //                     'class': ' label-light-success'
        //                 }
        //             };
        //             return '<span class="label font-weight-bold label-lg' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
        //             },
        //         },
        //         {
        //             field: 'Keterangan',
        //             title: 'Keterangan',
        //             template: function(row) {
        //             var keterangan = {
        //                 1: {
        //                     'title': 'All',
        //                     'class': ' label-light-warning'
        //                 },
        //                 2: {
        //                     'title': 'Baru',
        //                     'class': ' label-light-info'
        //                 },
        //                 3: {
        //                     'title': 'Referral',
        //                     'class': ' label-light-success'
        //                 },
        //                 4: {
        //                     'title': 'Referred',
        //                     'class': ' label-light-success'
        //                 },
        //                 5: {
        //                     'title': 'Close Case',
        //                     'class': ' label-light-success'
        //                 },
        //                 6: {
        //                     'title': 'Expired',
        //                     'class': ' label-light-success'
        //                 }
        //             };
        //             return '<span class="label font-weight-bold label-lg' + keterangan[row.Keterangan].class + ' label-inline">' + keterangan[row.Keterangan].title + '</span>';
        //             },
        //         }
        //     ]
        // });
    var datatable = $('#kt_datatable').DataTable({
        columnDefs: [
            {
                targets: 1,
                render: function(data){
                    return data
                }
            }
        ],
        initComplete: function(){
            $('#kt_datatable').show();
        },
        pageLength: 5,
    })
    $('#kt_datatable_filter').hide();
    $('#kt_datatable_length').hide();


    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min  = $('#datepicker_dari').val();
            var max  = $('#datepicker_sampai').val();
            console.log(min, max);
            var createdAt = data[1] || 0; // Our date column in the table
            if  (
                    ( min == "" || max == "" )
                    ||
                    ( moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max) )
                )
            {
                return true;
            }
            return false;
        }
    );



    $('#kt_datatable_search_query').keyup(function(){
        console.log($(this).val())
        datatable.search($(this).val()).draw();
    })
    $('#kt_datatable_search_status').on('change', function() {
        if($(this).val() == ""){
            datatable.search("", 'Status')
        }else{
            if($(this).val() == "Selesai"){
                $('#keterangan-1').hide();
                $('#keterangan-2').show();
            }else if($(this).val() == "Aktif"){
                $('#keterangan-1').show();
                $('#keterangan-2').hide();
            }
            console.log($(this).val())
            if(detail){
                datatable.columns(6).search($(this).val()).draw();
            }else{
                datatable.columns(3).search($(this).val()).draw();
            }
        }
    });

    $('.datepicker-search').change(function(){
        datatable.draw();
    })

    $('#kt_datatable_search_keterangan').on('change', function() {
        console.log($(this).val())
        datatable.columns(4).search($(this).val()).draw();
    });
    $('#kt_datatable_search_keterangan2').on('change', function() {
        console.log($(this).val())
        datatable.columns(4).search($(this).val()).draw();
    });
    $('#kt_datatable_search_fakultas').on('change', function() {
        datatable.columns(2).search($(this).val()).draw();
    });

    $('#kt_datatable_search_status, #kt_datatable_search_keterangan').selectpicker();

    });
