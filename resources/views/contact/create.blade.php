@extends('layouts.master')
@section('pageTitle', 'Create Contact')

@section('content')
<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Create Contact</strong>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('contact.store') }}">
                                {{ csrf_field() }}


                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="company">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id="company"
                                            name="name" type="text" placeholder="Enter contact name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="company">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="company"
                                            name="email" type="text" placeholder="Enter email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="company">Job Title</label>
                                        <input class="form-control @error('job_title') is-invalid @enderror" id="company"
                                            name="job_title" type="text" placeholder="Enter job title">
                                        @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" id="company"
                                            name="phone" type="text" placeholder="Enter phone number">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="company">Gender</label>
                                        <select name="gender" class="form-control @error('gender') is-invalid @enderror"
                                            id="select1" name="select1">
                                            <option value="0">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>


                                    <div class="form-group">
                                        <label for="file-input">Profile Image</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="@error('profile_image') is-invalid @enderror" id="profile_image"
                                                    type="file" name="profile_image">
                                                @error('profile_image')
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
