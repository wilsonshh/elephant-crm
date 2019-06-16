@extends('layouts.master') @section('pageTitle', 'Create Lead') @section('content')


<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Create Lead</strong>
                            </div>
                            <form method="POST" action="{{ route('lead.store') }}">
                                {{ csrf_field() }}


                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="company">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id="company" name="name" type="text" placeholder="Enter project name"> @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Value</label>
                                        <input class="form-control @error('value') is-invalid @enderror" id="company" name="value" type="text" placeholder="£"> @error('value')

                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span> @enderror
                                    </div>

                                    <fieldset class="form-group">
                                        <label>Project</label>
                                        <select name="project_id" class="form-control select2-single select2-hidden-accessible" id="select2-1" data-select2-id="select2-1" tabindex="-1" aria-hidden="true">
                                                    @foreach ($projects as $project)

                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                    @endforeach

                                                    </select><span class="select2 select2-container select2-container--bootstrap select2-container--focus" dir="ltr" data-select2-id="1" style="width: 353px;">
                                                        <span class="selection">
                                                            <!-- <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-select2-1-container"> -->
                                                                <span class="select2-selection__rendered" id="select2-select2-1-container" role="textbox" aria-readonly="true" title="Option 1"></span>
                                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                        </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Contact</label>
                                        <select name="contact_id" class="form-control select2-single select2-hidden-accessible" id="select3-1" data-select2-id="select3-1" tabindex="-1" aria-hidden="true">
                                                @foreach ($contacts as $contact)
                                                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                                @endforeach
                                                    </select><span class="select2 select2-container select2-container--bootstrap select2-container--focus" dir="ltr" data-select2-id="1" style="width: 353px;">
                                                        <span class="selection">
                                                            <!-- <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-select2-1-container"> -->
                                                                <span class="select2-selection__rendered" id="select2-select2-1-container" role="textbox" aria-readonly="true" title="Option 1"></span>
                                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                        </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </fieldset>


                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        <i class="fa fa-dot-circle-o"></i> Create</button>

                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>





@endsection('content')