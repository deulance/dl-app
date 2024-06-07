@extends('admin.layouts.index')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row w-100">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Roles</h4>
                                <button class="btn btn-primary" onclick="$('#addItem').modal('show')">Add Role</button>
                            </div>
                            <div class="card-body">
                                @include('admin.layouts.flash-messages')
                                <div class="table-responsive">
                                    <table class="table table-striped" id="data_table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Permissions</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                    @foreach ($item->permissions as $permission)
                                                        {{ $permission->name }} <br>
                                                    @endforeach
                                                    </td>
                                                    
                                                    <td>
                                                        <div class="d-flex">
                                                           

                                                            <button class="btn btn-primary btn-sm mr-2" onclick="$('#editItem-{{ $item->id }}').modal('show')"><i class="fa fa-edit"></i></button>
                                                            <form action="{{ route('admin.roles.destroy', $item->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" onclick="$('#deleteModel-'+{{ $item->id }}).modal('show')" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                                                        aria-hidden="true"></i></button>
                                                                        <div
                                                                        class="modal fade"
                                                                        id="deleteModel-{{ $item->id }}"
                                                                        tabindex="-1"
                                                                        role="dialog"
                                                                        aria-labelledby="deleteModelLabel"
                                                                        aria-hidden="true"
                                                                    >
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <h4>Are you sure?</h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button
                                                                                        type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal"
                                                                                    >
                                                                                        Close
                                                                                    </button>
                                                                                    <button
                                                                                        class="btn btn-primary ml-2"
                                                                                        type="submit"
                                                                                    >
                                                                                        Confirm
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.roles.add')
    @include('admin.roles.edit')
@endsection
