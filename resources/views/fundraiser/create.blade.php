@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Fundraiser</div>
                    <div class="panel-body">
                        <form method="POST" action="/fundraiser" enctype="multipart/form-data">
                            @include('layouts.errors')
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Fundraiser Name:</label>
                                    <input type="text" class="form-control" name="fundraiserName"
                                           id="fundraiserName"
                                           placeholder="name" value="{{old('fundraiserName')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Enter a Review</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="reviewerName" id="reviewerName"
                                           placeholder="name" value="{{old('reviewerName')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">e-mail:</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email"
                                           value="{{old('email')}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Review:</label>
                                    <textarea class="form-control form-input-style" rows="3" name="review"
                                              id="review">{{old('review')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 col-sm-4 selectStar">
                                    <input type="radio" name="starRating" id="radio-5" value="5"/><label
                                            for="radio-5"></label>
                                    <input type="radio" name="starRating" id="radio-4" value="4"/><label
                                            for="radio-4"></label>
                                    <input type="radio" name="starRating" id="radio-3" value="3"/><label
                                            for="radio-3"></label>
                                    <input type="radio" name="starRating" id="radio-2" value="2"/><label
                                            for="radio-2"></label>
                                    <input type="radio" name="starRating" id="radio-1" value="1"/><label
                                            for="radio-1"></label>
                                    {{--<input type="radio" name="starRating" class="fa fa-star fa-2x selectStar">--}}
                                </div>
                                <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 ">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
