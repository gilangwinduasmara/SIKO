<div class="empty-state h-100">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none kt_app_chat_toggle" id="">
                        <span class="svg-icon svg-icon-lg">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Adress-book2.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
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
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Adress-book2.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
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
                    <div class="col-lg-4 mb-4">
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
