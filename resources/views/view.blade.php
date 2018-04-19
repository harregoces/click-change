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
                    <table class="table">
                        <tbody>
                            <tr>
                                <th> Name :</th>
                                <td>{{$link->name}}</td>
                            </tr>
                            <tr>
                                <th> Original Link :</th>
                                <td>{{$link->original_link}}</td>
                            </tr>
                            <tr>
                                <th> Redirect Link :</th>
                                <td>
                                    <a class="btn btn-default btn-xs js-emaillink" target="_blank" href="{{route('links',array('link'=>$link->redirect_link))}}"> {{route('links',array('links'=>$link->redirect_link))}} </a>
                                </td>
                            </tr>
                            <tr>
                                <td> <a href="{{route('delete',array('id'=>$link->id))}}" type="button" class="btn btn-danger">Delete</a> </td>
                                <td> <a href="{{route('home')}}" type="button" class="btn btn-default">Back</a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
