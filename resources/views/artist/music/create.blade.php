@extends('master')

@section('title') Users @endsection

@section('content')
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<!--begin::Toolbar container-->
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create Music</h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<li class="breadcrumb-item text-muted">
							<a href="{{url('/')}}" class="text-muted text-hover-primary">Home</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="#" class="text-muted text-hover-primary">Music</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Create</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card">
					<div class="card-body pt-5">
						@include('layouts.notification')
						{!! Form::open(['route' => ['artist.music.store', $artist->id], 'method' => 'POST', 'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework']) !!}
                        <div class="row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-4">
                                <label class="required fs-6 fw-semibold mb-2">Title</label>
                                {{ Form::text('title', null, ['class' => 'form-control form-control-solid', 'required']) }}

                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-4">
                                <label class="required fs-6 fw-semibold mb-2">Album Name</label>
                                {{ Form::text('album_name', null, ['class' => 'form-control form-control-solid', 'required']) }}

                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-4">
                                <label class="required fs-6 fw-semibold mb-2">Genre</label>
                                {{ Form::select('genre',
                                    ["" => "Select Genre", "rnb" => "R&B", "country" => "Country", "classic" => "Classic", "rock" => "Rock", "jazz" => "Jazz"],
                                    null, ['class' => 'form-control form-control-solid', 'required', 'autocomplete' => 'off']) }}

                            </div>
                        </div>


							<div class="modal-footer flex-center">
								<a href="{{ route('user.index') }}" class="btn btn-danger me-3">Cancel</a>
								<button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
									<span class="indicator-label">Submit</span>
								</button>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
