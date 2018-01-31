@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Fundraisers
                        <div class="pull-right">
                            <a class="btn-sm btn-primary" href="/fundraiser/create">Add Fundraiser</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Funndraiser Name</th>
                                <th width="20%" class="text-center">Average Rating</th>
                            </tr>
                            @foreach($fundraisers as $fundraiser)
                                <tr>
                                    <td><a href="/fundraiser/{{$fundraiser->name}}">{{$fundraiser->name}}</a> <span
                                                class="small">({{$fundraiser->count}} reviews)</span></td>
                                    <td align="center">{{number_format($fundraiser->average,1)}} out of 5</td>

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
