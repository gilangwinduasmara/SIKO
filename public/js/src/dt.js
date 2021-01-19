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
    var datatable = $('#kt_datatable').DataTable({})
    $('#kt_datatable_search_query').keyup(function(){
        console.log($(this).val())
        datatable.search($(this).val()).draw();
    })
    $('#kt_datatable_search_status').on('change', function() {
        console.log($(this).val())
        if($(this).val() == 0){
            datatable.search("", 'Status')
        }else{
            if($(this).val() == 3){
                $('#keterangan-1').hide();
                $('#keterangan-2').show();
            }else if($(this).val() == 2){
                $('#keterangan-1').show();
                $('#keterangan-2').hide();
            }
            datatable.search($(this).val().toLowerCase(), 'Status');
        }
    });

    $('#datepicker_dari').change(function(){
        console.log(datatable);
    })

    $('#kt_datatable_search_keterangan').on('change', function() {
        if($(this).val() == 0){
            datatable.search("", 'Keterangan')
        }else{
            datatable.search($(this).val().toLowerCase(), 'Keterangan');
        }
    });
    $('#kt_datatable_search_keterangan2').on('change', function() {
        if($(this).val() == 0){
            datatable.search("", 'Keterangan')
        }else{
            datatable.search($(this).val().toLowerCase(), 'Keterangan');
        }
    });
    $('#kt_datatable_search_fakultas').on('change', function() {
        if($(this).val() == 0){
            datatable.search("", 'Fakultas')
        }else{
            datatable.search($(this).val().toLowerCase(), 'Fakultas');
        }
    });

    $('#kt_datatable_search_status, #kt_datatable_search_keterangan').selectpicker();

    });
