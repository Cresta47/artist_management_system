@extends('master')

@section('title') Profile @endsection

@section('content')

<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card  ">
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <div class="row">
                        <div class="col-3">
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2 ">
                                    <span class="font-weight-bold mr-2">Name:</span>
                                    <span class="font-weight-bold mr-2">
                                        {{ $user->full_name }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Email:</span>
                                    <span class="font-weight-bold mr-2">
                                        {{ $user->email }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Role:</span>
                                    <span class="font-weight-bold mr-2">
                                        {{ $user->role_text }}
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <span class="btn btn-primary btn-sm show-password-change" id="">Change Password</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="change_password" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>Change Password</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y m-5">
                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" id="change_password_form">
                    <input type="hidden" name="user_id" id="user-id" value="{{ auth()->user()->id }}">
                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">New Password</span>
                        </label>
                        <input type="password" class="form-control form-control-lg form-control-solid" name="new_password" id="new_password">
                        <div class="fv-plugins-message-container invalid-feedback password-error"></div>
                    </div>
                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Confirm Password</span>
                        </label>
                        <input type="password" class="form-control form-control-lg form-control-solid" name="confirm_password" id="confirm_password">
                        <div class="fv-plugins-message-container invalid-feedback confirm-password-error"></div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-lg btn-primary change-password">
                            <span class="indicator-label">Change Password</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection

@section("scripts")
    <script>
        $(document).on('click', '.show-password-change', function (e) {

			$('#change_password').modal('show');
		});

        $(".change-password").on("click", function(e){
			e.preventDefault();
			var userId = $("#user-id").val();
			var newPassword = $("#new_password").val();
			var confirmPassword = $("#confirm_password").val();
			var url = "{{ route("user.profile.change_password") }}";

			$.ajax({
					url: url,
					method: 'POST',
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
						"Content-Type": "application/json"
					},
					data: JSON.stringify({
						"password": newPassword,
						"confirm_password": confirmPassword
					})
				}).then(function(response) {
					if(response.status){
						$('#change_password').modal('hide');
						Swal.fire({
	                    text: response.message,
	                    icon: "success",
	                    buttonsStyling: !1,
	                    confirmButtonText: "Ok",
	                    customClass: {
	                        confirmButton: "btn fw-bold btn-primary"
	                    }
	                }).then(function(e) {
                        $("#signout-button").trigger("click");
                    });
					}
				})
		});
    </script>

@endsection
