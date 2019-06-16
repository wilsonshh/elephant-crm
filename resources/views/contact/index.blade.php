@extends('layouts.master')
@section('pageTitle', 'Project')
@section('content')

<div class="container-fluid">
    <div id="ui-view">
        <div>

            <div class="row align-items-center mb-3 mb-xl-5">
                <div class="col-md mb-2 mb-md-0">
                    <h1 class="h3 mb-0">Contacts</h1>
                </div>

                <div class="col-md ml-md-auto text-md-right">
                    <a class="btn btn-primary" href="{{ route('contact.create') }}">Create New Contact</a>
                </div>
            </div>

            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i> Contacts</div>

                            <div class="card-body">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">







                                    <script type="text/javascript">
                                        var path = "{{ route('project.autocomplete') }}";
                                        $('input.typeahead').typeahead({
                                            source: function (query, process) {
                                                return $.get(path, { query: query }, function (data) {
                                                    return process(data);
                                                });
                                            }
                                        });
                                    </script>




                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Occupation</th>
                                                <th>Action</th>
                                            </tr>
                                            {{ csrf_field() }}

                                        </thead>
                                        <tbody>

                                            @foreach ($contacts as $contact)

                                            <tr class="item{{$contact->id}}">
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                </td>
                                                <td>{{ $contact->job_title }}</td>
                                                <td class="sorting_1">



                                                    <a class="btn btn-info"
                                                        href="{{ route('contact.edit', $contact->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <button class="delete-modal btn btn-danger"
                                                        data-id="{{$contact->id}}" data-title="{{$contact->name}}"
                                                        data-content="{{$contact->desc}}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach




                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-danger" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete</h4>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete?</p>
                                                        </div>

                                                        <form class="form-horizontal" role="form">
                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" class="form-control"
                                                                        id="id_delete" disabled>
                                                                </div>
                                                            </div>

                                                        </form>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger delete"
                                                                data-dismiss="modal">
                                                                <span id="" class='glyphicon glyphicon-trash'></span>
                                                                Delete
                                                            </button>
                                                            <button type="button" class="btn btn-warning"
                                                                data-dismiss="modal">
                                                                <span class='glyphicon glyphicon-remove'></span> Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tbody>
                                    </table>

                                    <ul class="pagination">
                                        {{ $contacts->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
