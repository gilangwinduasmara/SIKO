<div class="card card-custom border">

    <div class="card-body">
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query"/>
                                <span>
                                                                <i class="flaticon2-search-1 text-muted"></i>
                                                            </span>
                            </div>
                        </div>
                        <div class="col-md-2 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <select class="form-control" id="kt_datatable_search_status">
                                    <option value="">Status</option>
                                    <option value="2">Aktif</option>
                                    <option value="3">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 my-2 my-md-0" id="keterangan-1">
                            <div class="d-flex align-items-center">
                                <select class="form-control" id="kt_datatable_search_keterangan">
                                    <option value="">Keterangan</option>
                                    <option value="2">Baru</option>
                                    <option value="3">Referral</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 my-2 my-md-0" id="keterangan-2" style="display: none">
                            <div class="d-flex align-items-center">
                                <select class="form-control" id="kt_datatable_search_keterangan2">
                                    <option value="">Keterangan</option>
                                    <option value="4">Refered</option>
                                    <option value="5">Close Case</option>
                                    <option value="6">Expired</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 my-2 my-md-0">
                            <div class="input-group date" >
                                <input type="text" class="form-control" readonly  id="datepicker_dari" placeholder="Dari"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 my-2 my-md-0">
                            <div class="input-group date" >
                                <input type="text" class="form-control" readonly  id="datepicker_sampai" placeholder="Sampai"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{json_encode($presensis)}} --}}
        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" pageLength=5>
            <thead>
            <tr>
                <th title="Field #1">No</th>
                <th title="Field #2">Tanggal</th>
                <th title="Field #3">Nama Konselor</th>
                <th title="Field #4">Status</th>
                <th title="Field #5">Keterangan</th>
                <th title="Field #6">Topik</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($presensis as $key=>$presensi)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$presensi->tgl_konseling}}</td>
                        <td>{{$presensi->konseling->konselor->nama_konselor}}</td>
                        <td>
                            @php
                            $status = 3;
                            $keterangan = 2;
                            $status_selesai = $presensi->konseling->status_selesai;
                            $status_konseling = $presensi->konseling->status_konseling;
                            // status
                            // 2: aktif
                            // 3: selesai
                            // keterangan
                            // 2: baru
                            // 3: referal
                            // 4: referred
                            // 5: close case
                            // 6: expired
                            //     $status = 3;
                            //     $status_selesai = $presensi->konseling->status_selesai;
                            //   if($status_selesai == "E" || $status_selesai == "expired"){
                            //       $status = 2;
                            //   }else{
                            //     $status = 3;
                            //     if($presensi->konseling->refered == "ya"){
                            //         $status = 2;
                            //     }
                            //   }
                            //   echo $status;
                                if($status_selesai == "C"){
                                    $status = 2;
                                    if($status_konseling == "ref"){
                                        $keterangan = 3;
                                    }else{
                                        $keterangan = 2;
                                    }
                                    if($presensi->konseling->refered == "ya"){
                                        $keterangan = 4;
                                        $status = 3;
                                    }
                                }else{
                                    $keterangan = 5;
                                    $status = 3;
                                }
                                if($status_selesai == "expired"){
                                    $status = 3;
                                    $keterangan = 6;
                                }
                                echo $status;
                            @endphp


                            {{-- {{$presensi->konseling->status_selesai == "C" ? 2: 3}} --}}
                        </td>
                        <td>
                            @php
                                echo $keterangan;
                            @endphp
                            {{-- {{$presensi->konseling->status_konseling == "ref"? 3: 2}} --}}
                        </td>
                        <td>
                            <button name="toggle-detail" data-value="{{$presensi->isi_rekam_konseling}}" class="btn btn-link text-truncate text-warning">
                                {{$presensi->isi_rekam_konseling}}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal__detail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="rk__detail">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>

</script>
