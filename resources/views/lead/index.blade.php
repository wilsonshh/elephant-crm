@extends('layouts.master') @section('pageTitle', 'lead') @section('content')

<div class="container-fluid">
    <div id="ui-view">
        <div>

            <div class="row align-items-center mb-3 mb-xl-5">
                <div class="col-md mb-2 mb-md-0">
                    <h1 class="h3 mb-0">Leads</h1>
                </div>

                <div class="col-md ml-md-auto text-md-right">
                    <a class="btn btn-primary" href="{{ route('lead.create') }}">Create New lead</a>
                </div>
            </div>

            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i> Leads</div>


                            <div class="card-body">


                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Value</th>
                                            <th>Email</th>
                                            <th>Project</th>
                                            <th>Created</th>
                                        </tr>
                                        {{ csrf_field() }}
                                    </thead>
                                    <tbody>

                                        @foreach ($leads as $lead)
                                        <tr class="item{{$lead->id}}" onclick=''>

                                            <td>{{ $lead->name }}</td>

                                            <td>
                                                {{ str_limit($lead->contact->name, $limit = 50, $end = '...') }}
                                            </td>
                                            <td>£{{ $lead->value }}</td>
                                            <td>{{ $lead->contact->email }}</td>
                                            <td>{{ $lead->project->name }}</td>
                                            <td>{{ $lead->created_at }}</td>

                                        </tr>
                                        </a>
                                        @endforeach




                                    </tbody>
                                </table>

                                <ul class="pagination">
                                        {{ $leads->links() }}
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>



@endsection
