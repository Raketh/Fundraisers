@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$fundraiser->name}}
                        <div class="pull-right">
                            <a class="btn-sm btn-primary" href="/fundraiser/{{$fundraiser->name}}/writeReview">Write
                                Review</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($reviews as $review)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-7"><b>{{$review->reviewer->name}}</b>
                                            on {{$review->created_at->toFormattedDateString()}}</div>
                                        <div class="mb-2 text-muted col-md-2">
                                            @for($x = 0; $x < $review->rating; $x++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for($x = 0; $x < (5 - $review->rating); $x++)
                                                <span class="fa fa-star-o"></span>
                                            @endfor
                                        </div>
                                        <div class="text-muted col-md-3">{{$review->rating}} out of 5
                                            stars
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">{{$review->review}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
