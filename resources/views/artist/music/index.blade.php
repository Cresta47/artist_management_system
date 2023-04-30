@extends('master')

@section('title') Songs @endsection

@section('content')
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<!--begin::Toolbar container-->
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<!--begin::Title-->
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">List Of Songs ({{ $artist->name }})</h1>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="{{url('/')}}" class="text-muted text-hover-primary">Artist</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="{{url('/')}}" class="text-muted text-hover-primary">Songs</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Song</li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
                <a href="{{route('artist.music.create', $artist->id)}}" class="btn btn-sm fw-bold btn-primary">
                    Create
                </a>

			</div>
			<!--end::Toolbar container-->
		</div>
		<!--end::Toolbar-->
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card">
					<div class="card-body pt-0">
						@include('layouts.notification')

						<table class="table align-middle table-row-dashed fs-6 gy-5" id="users-table">
							<thead>
								<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
									<th>Title</th>
									<th>Album Name</th>
									<th>Genre</th>
									<th class="text-end">Actions</th>
								</tr>
							</thead>
							<tbody class="fw-semibold text-gray-600">
								@forelse($songs as $song)
									<tr>
										<td>{{ $song->title }}</td>
										<td>{{ $song->album_name }}</td>
										<td>{{ isset($song->genre) ? $song->genre_text : "" }}</td>

										<td class="text-end">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
												<span class="svg-icon svg-icon-5 m-0">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
													</svg>
												</span>
												</a>
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
														<div class="menu-item px-3">
															<a href="{{ route('artist.music.edit', [$artist->id, $song->id]) }}" class="menu-link px-3" target="_blank">Edit</a>
														</div>


														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3 delete_row"
                                                                data-delete-url="{{ route('artist.music.destroy', [$artist->id, $song->id]) }}"
                                                                data-artist-id={{ $artist->id }} data-id="{{$song->id}}">Delete</a>
														</div>

												</div>
										</td>
									</tr>
								@empty
									<tr class="text-center">
										<td colspan="6">No Data Available</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">

		$(document).ready(function(){
			$("#users-table").DataTable({});

            $(document).on('click', '.delete_row', function(e) {
                e.preventDefault();
                const url = $(this).data('delete-url');

                console.log(url);

                Swal.fire({
                    text: "Are you sure you want to delete User ?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function(e) {
                    if (e.value) {
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                "Content-Type": "application/json"
                            }
                        }).then(function(response) {
                            if (response.status) {
                                Swal.fire({
                                    text: "You have deleted selected User!.",
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary"
                                    }
                                }).then(function(e) {
                                    location.reload();
                                })
                            } else {
                                Swal.fire({
                                    text: response.error,
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary"
                                    }
                                })
                            }
                        })
                    }
                }))
            });
		});



	</script>
@endsection
