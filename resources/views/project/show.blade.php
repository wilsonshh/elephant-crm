@extends('layouts.master')

@section('content')


<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Project</strong>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="company">Name</label>
                                    <input value="{{ $project->name }}"
                                        class="form-control @error('name') is-invalid @enderror" id="company"
                                        name="name" type="text" placeholder="Enter project name" disabled>

                                </div>
                                <div class="form-group">
                                    <label for="vat">Description</label>
                                    <textarea value="adsfjiasdjfsdfsadf" rows="5"
                                        class="form-control @error('desc') is-invalid @enderror" id="vat" name="desc"
                                        type="text" placeholder="Enter description for your project"
                                        disabled>{{ $project->desc }}</textarea>

                                </div>


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
