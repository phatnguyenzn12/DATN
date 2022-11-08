@foreach ($discounts as $discount)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </a>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::Desc-->
                <a class="text-dark text-hover-primary" href="">{{$discount->title}}</a> 
                <!--end::Desc-->
                <!--begin::Info-->
                <div class="mb-7">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Nội dung</span>
                        <span class="text-dark font-weight-bolder text-hover-primary">{{$discount->content}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 mr-2">Mã giảm giá</span>
                        <span class="text-dark font-weight-bolder text-hover-primary">{{$discount->code}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Giảm bao nhiêu %</span>
                        <span class="text-dark font-weight-bolder font-weight-bold">{{$discount->discount}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Ngày bắt đầu</span>
                        <span class="text-dark font-weight-bolder font-weight-bold">{{$discount->start_time}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 mr-2">Ngày kết thúc</span>
                        <span class="text-dark font-weight-bolder font-weight-bold">{{$discount->end_time}}</span>
                    </div>
                </div>
                <!--end::Info-->
            </div>
            <!--end::Body-->
        </div>
        <!--end:: Card-->
    </div>
@endforeach