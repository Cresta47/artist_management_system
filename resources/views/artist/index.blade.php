@extends('master')

@section('title')
    Artist
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Artist
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/') }}" class="text-muted text-hover-primary">Artist</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Artist</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                @if(auth()->user()->role == "artist_manager")
                    <a href="{{ route('artist.create') }}" class="btn btn-sm fw-bold btn-primary">
                        Create
                    </a>
                @endif

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

                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="artist-table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>First Release Year</th>
                                    <th>No Of Album Released</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @forelse($artists as $artist)
                                    <tr>
                                        <td>{{ $artist->name }}</td>
                                        <td>{{ $artist->dob }}</td>
                                        <td>{{ isset($artist->gender) ? $artist->gender_text : "" }}</td>
                                        <td>{{ $artist->address }}</td>
                                        <td>{{ $artist->first_release_year }}</td>
                                        <td>{{ $artist->no_of_albums_released }}</td>

                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                                data-kt-menu="true">

                                                @if(auth()->user()->role == "artist_manager")
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('artist.edit', $artist->id) }}" class="menu-link px-3"
                                                            target="_blank">Edit</a>
                                                    </div>

                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 delete_row"
                                                            data-id="{{ $artist->id }}">Delete</a>
                                                    </div>

                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('artist.music.import', $artist->id) }}" class="menu-link px-3"
                                                            target="_blank">Import Music</a>
                                                    </div>

                                                @endif

                                                @if(auth()->user()->role == "artist_manager" || auth()->user()->role == "super_admin")
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('artist.music.index', $artist->id) }}" class="menu-link px-3"
                                                            target="_blank">Songs List</a>
                                                    </div>
                                                @endif

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
                        @include('layouts.pagination', ['paginator' => $artists])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '.delete_row', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                Swal.fire({
                    text: "Are you sure you want to delete Artist ?",
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
                            url: "{{ route('artist.index') }}/" + id,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                "Content-Type": "application/json"
                            }
                        }).then(function(response) {
                            if (response.status) {
                                Swal.fire({
                                    text: "You have deleted selected Artist!.",
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
