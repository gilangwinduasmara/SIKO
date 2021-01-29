<div class="empty-state h-100">
    <div class="card card-custom h-100">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none kt_app_chat_toggle" id="">
                        <span class="svg-icon svg-icon-lg">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                    </button>
                </span>
                <h3 class="card-label">Informasi Case Conference </h3>
            </div>

        </div>
        <div class="card-body h-100">

        </div>
    </div>
</div>
<div class="card card-custom" id="conference-information-container" style="display: none">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none kt_app_chat_toggle" id="">
                    <span class="svg-icon svg-icon-lg">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                </button>
            </span>
            <h3 class="card-label">Informasi Case Conference </h3>
        </div>

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 d-flex align-items-center">
                <span>
                    Judul Conference
                </span>
                <span id="judul-conference">

                </span>
            </div>
            <div class="col-sm-12">
                <div class="row mt-8">
                    <div class="col-lg-4">
                        <button id="button__lihat_profile" class="btn btn-primary">Lihat Profile Konseli</button>
                    </div>
                    <div class="col-lg-4">
                        <button id="button__masuk_conference" class="btn btn-primary">Masuk Conference</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-fluid mt-8">
            <div class="card card-custom bg-light gutter-b card-stretch card-shadowless">
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-primary">Anggota Conference</h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <button id="button__tambahkonselor" class="btn btn-primary btn-sm btn-icon" >
                                <span class="ki ki-plus text-white"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2" id="list-detail-conference">
                </div>
            </div>
        </div>

    </div>
</div>




<div class="modal fade" id="modal__profile_konseli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Konseli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <div class="spinner spinner-modal-profile"></div>
                </div>
                <div class="card card-custom card-stretch gutter-b card-shadowless bg-light mt-8 profile-konseli" >
                    <div class="card-body py-3">
                        <div class="card-body">
                            <div class="d-flex mb-9 justify-content-center">
                                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                    <div class="symbol symbol-50 symbol-lg-120">
                                        <img src={{"/avatars/default.jpg"}} alt="image" id="popup__avatar">
                                    </div>
                                    <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                        <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="d-flex justify-content-between flex-wrap mt-1">
                                        <div class="d-flex mr-3">
                                            <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3" id="popup__nama"></a>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-between mt-1">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-3 col-lg-3 mt-4">
                                                    <div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold" id="popup__nim"></div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold" id="popup__progdi"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-lg-3 mt-4">
                                                    <div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold" id="popup__jenis_kelamin"></div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold" id="popup__tgl_lahir"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-lg-3 mt-4">
                                                    <div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold" id="popup__agama"></div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold" id="popup__suku"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-lg-3 mt-4">
                                                    <div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold">{{'Alamat: '}}</div>
                                                        <div href="#" class="text-dark-50 text-hover-primary font-weight-bold" id="popup__alamat"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal__tambahkonselor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Konselor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-custom card-stretch gutter-b card-shadowless bg-light mt-8">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                <thead>
                                    <tr class="text-left">
                                        <th class="pl-0" style="width: 20px">
                                            <label class="checkbox checkbox-lg checkbox-inline">
                                                <input type="checkbox" value="0">
                                                <span></span>
                                            </label>
                                        </th>
                                        <th class="pr-0" style="width: 50px">Konselor</th>
                                        <th style="min-width: 200px"></th>
                                        <th style="min-width: 150px">Profesi</th>
                                    </tr>
                                </thead>
                                <tbody id="list__tambahkonselor">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button id="button__tambahkonselor_submit" type="button" class="btn btn-primary font-weight-bold">Tambahkan Konselor</button>
            </div>
        </div>
    </div>
</div>
