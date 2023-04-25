<html lang="en">

<head>
    <title>Register | Artist Management System</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .error {
            color: var(--kt-danger);
        }
    </style>
</head>

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="row">
                        <!--begin::Form-->
                        @include('layouts.notification')

                        {!! Form::open([
                            'route' => 'register',
                            'method' => 'POST',
                            'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework',
                        ]) !!}
                        <div class="row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">First Name</label>
                                {{ Form::text('first_name', null, ['class' => 'form-control form-control-solid', 'required']) }}

                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                                {{ Form::text('last_name', null, ['class' => 'form-control form-control-solid', 'required']) }}

                            </div>
                        </div>
                        <div class="row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Email</label>
                                {{ Form::email('email', null, ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>

                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Role</label>
                                {{ Form::select('role', ["" => "Select Role", "super_admin" => "Super Admin", "artist_manager" => "Artist Manager", "artist" => "Artist"], null, ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>
                        </div>

                        <div class="row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                {{ Form::text('phone', null, ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>

                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Date Of Birth</label>
                                {{ Form::date('dob', null, ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>
                        </div>

                        <div class="row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Gender</label>
                                {{ Form::select('gender', ["" => "Select Gender", "m" => "Male", "f" => "Female", "o" => "Other"], null, ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>

                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Address</label>
                                {{ Form::text('address', null, ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>
                        </div>

                        <div class="row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Password</label>
                                {{ Form::password('password', ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-6">
                                <label class="required fs-6 fw-semibold mb-2">Confirm Password</label>

                                {{ Form::password('confirm_password', ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>

                        </div>



                        <div class="modal-footer flex-center">
                            <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                <span class="indicator-label">Register</span>
                            </button>
                        </div>
                        {!! Form::close() !!}

                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">

                            <span>
                                Dont Have a account
                                <a href="{{ route('register') }}">Register Here</a>
                            </span>
                        </div>
                    </div>
                </div>

                <!--end::Footer-->
            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url({{ asset('media/misc/auth-bg.png') }}">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">

                    <!--end::Logo-->
                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                        src="{{ asset('media/misc/auth-screens.png') }}" alt="" />
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and
                        Productive</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces
                        a person they’ve interviewed
                        <br />and provides some background information about
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and
                        their
                        <br />work following this is a transcript of the interview.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script type="text/javascript">
        $('#kt_sign_in_form').validate();
        $(document).on('click', '#kt_sign_in_submit', function(e) {
            e.preventDefault();
            if ($('#kt_sign_in_form').valid()) {
                $('.indicator-label').hide();
                $('.indicator-progress').show();
                $('#kt_sign_in_form').submit();
            }
        })
    </script>
</body>

</html>
