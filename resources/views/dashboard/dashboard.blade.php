@extends('master')

@section('title') Dashboard @endsection

@section('content')
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->

		<!--end::Toolbar-->
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card">
					<div class="card-body pt-0">
                        <div class="row">
                            <b>Hello, {{ auth()->user()->full_name }}</b>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">




	</script>
@endsection
