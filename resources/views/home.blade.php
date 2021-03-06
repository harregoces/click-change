@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Links</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Original Link</th>
                                <th>Redirect Link</th>
                                <th>View</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($links as $link)
                            <tr>
                                <td>{{ $link->name }}</td>
                                <td>{{ $link->original_link }}</td>
                                <td>
                                    <a class="btn btn-default btn-xs js-emaillink" target="_blank" href="{{route('links',array('link'=>$link->redirect_link))}}"> {{route('links',array('links'=>$link->redirect_link))}} </a>
                                </td>
                                <td><a href="{{route('view',array('id'=>$link->id))}}">view</a></td>
                                <td><a href="{{route('delete',array('id'=>$link->id))}}">delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
