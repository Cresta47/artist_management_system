@if(session()->has('error') || session()->has('success') || $errors->any())
    <div class="box box-default pt-5">
        <div class="box-body">
            @if($errors->any())
                <div class="alert alert-danger d-flex" role="alert">
                    {{-- <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i class="bx bx-store fs-6"></i></span> --}}
                    <div class="d-flex flex-column ps-1">
                        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
                        @foreach($errors->all() as $error)
                            <span>{!! $error !!}</span>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger d-flex" role="alert">
                    {{-- <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i class="bx bx-store fs-6"></i></span> --}}
                    <div class="d-flex flex-column ps-1">
                        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
                        <span>{!! session()->get('error') !!}</span>
                    </div>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success d-flex" role="alert">
                    {{-- <span class="badge badge-center rounded-pill bg-success border-label-success p-3 me-2"><i class="bx bx-desktop fs-6"></i></span> --}}
                    <div class="d-flex flex-column ps-1">
                        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Success!</h6>
                        <span>{!! session()->get('success') !!}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif