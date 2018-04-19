@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Link</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('new') }}" method="POST" class="form-inline">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" name="name" class="form-control" placeholder="my link" required />
                        </div>
                        <div class="form-group">
                            <label for="original_link">Link :</label>
                            <input type="url" name="original_link" class="form-control" placeholder="http://www.google.com" required/>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
