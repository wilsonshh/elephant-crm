@extends('layouts.master') @section('pageTitle', 'Project') @section('content')

<div class="container-fluid">
    <div id="ui-view">
        <div>

            <div class="row align-items-center mb-3 mb-xl-5">
                <div class="col-md mb-2 mb-md-0">
                    <h1 class="h3 mb-0">Projects</h1>
                </div>

                <div class="col-md ml-md-auto text-md-right">
                    <a class="btn btn-primary" href="{{ route('project.create') }}">Create New Project</a>
                </div>
            </div>

            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i> Projects</div>


                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <form id="search" action="{{ route('project.search') }}">


                                                <div class="input-group input-group-alt">
                                                    <!-- .input-group -->
                                                    <div class="input-group has-clearable">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span class="fa fa-search"></span></span>
                                                        </div>
                                                        <input name="query" type="search" class="typeahead form-control"></label>
                                                    </div>
                                                    <!-- /.input-group -->

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Date created</th>
                                            <th>Action</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>

                                        @foreach ($projects as $project)
                                        <tr class="item{{$project->id}}" onclick=''>

                                            <td>{{ $project->name }}</td>

                                            <td>{{ str_limit($project->desc, $limit = 50, $end = '...') }}
                                            </td>
                                            <td>{{ $project->created_at }}</td>
                                            <td class="sorting_1 ">

                                                <a class="btn btn-success" href="{{ route( 'project.show', $project->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a class="btn btn-info " href="{{ route( 'project.edit', $project->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <button class="delete-modal btn btn-danger" data-id="{{$project->id}}" data-title="{{$project->name}}" data-content="{{$project->desc}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </a>
                                        @endforeach


                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-danger" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete</h4>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete?</p>
                                                    </div>

                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <div class="col-sm-10">
                                                                <input type="hidden" class="form-control" id="id_delete" disabled>
                                                            </div>
                                                        </div>

                                                    </form>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                                            <span id="" class='glyphicon glyphicon-trash'></span>
                                                            Delete
                                                        </button>
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                            <span class='glyphicon glyphicon-remove'></span> Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

 <!-- Autocomplete -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var path = "{{ route('project.autocomplete') }}";
    $('input.typeahead').typeahead({
        source: function(query, process) {
            return $.get(path, {
                query: query
            }, function(data) {
                return process(data);
            });
        }
    });
</script>


@endsection
