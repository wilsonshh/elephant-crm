@extends('layouts.master')
@section('pageTitle', 'Edit')

@section('content')


<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Project</strong>
                            </div>
                            <form action="{{ route('project.update', $project->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}


                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="company">Name</label>
                                        <input value="{{ $project->name }}" class="form-control @error('name') is-invalid @enderror" id="company"
                                            name="name" type="text" placeholder="Enter project name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="vat">Description</label>
                                        <textarea value="adsfjiasdjfsdfsadf" rows="5" class="form-control @error('desc') is-invalid @enderror"
                                            id="vat" name="desc" type="text"
                                            placeholder="Enter description for your project">{{ $project->desc }}</textarea>
                                        @error('desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="file-input">Image</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="@error('image') is-invalid @enderror" id="image"
                                                    type="file" name="image">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        <i class="fa fa-dot-circle-o"></i> Submit</button>

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
