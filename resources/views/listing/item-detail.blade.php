@extends('layout.default')
@section('title', 'Item Details')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Listing Item Details</h1>
                </div>
                <div class="panel-body">
                    @if(!empty($details))
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Item Details</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p>
                                                <strong>Title :</strong> {{$details->title}}
                                            </p>
                                            <p>
                                                <strong>Category :</strong> {{$details->category->category_name}}
                                            </p>
                                            <p>
                                                <strong>Details :</strong> {{$details->description}}
                                            </p>
                                            <p>
                                                <strong>Year :</strong> {{$details->lyear}} | Make : {{$details->lmake}} | Model : {{$details->lmodel}}
                                            </p>
                                            <p>
                                                <strong>Price :</strong> {{number_format($details->price, 2)}}
                                            </p>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="alert alert-warning">
                                                <h4>Addition Details :</h4>
                                                <hr>
                                                @if($details->meta_data)
                                                <p>
                                                    @php $metas = json_decode($details->meta_data, true) @endphp
                                                    @foreach($metas AS $key=>$meta)
                                                    <strong>{{ucfirst($key)}} : </strong> {{ucfirst($meta)}} <br>
                                                    @endforeach
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @if(count($details->images) > 0)
                                    <h4>Listing Images :</h4>
                                    <p>
                                        @foreach($details->images AS $image)
                                    <div class="col-md-4">
                                        <a href="/listings/images/{{$details->id}}/{{$image->full_image}}" target="_blank"><img src="/listings/images/{{$details->id}}/{{$image->thumb_image}}" class="img-responsive img-thumbnail" /></a>
                                    </div>
                                    @endforeach
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if(count($details->seller) > 0)
                            <div class="panel panel-info">
                                <div class="panel-heading">Seller</div>
                                <div class="panel-body">
                                    <p>Name : {{$details->seller->name}}</p>
                                    <p>Contact : {{$details->seller->phone}}</p>
                                    <p>Email : {{$details->seller->email}}</p>
                                    <p>Type : {{$details->seller->type}}</p>
                                </div>
                            </div>
                            @endif
                            @if(count($details->reviews) > 0)
                            <div class="panel panel-default">
                                <div class="panel-heading">Reviews</div>
                                <div class="panel-body" style="font-size: 80%">
                                    @foreach($details->reviews AS $review)
                                    <h5 class="text-info">"{{$review->comment}}"</h5>
                                    By : <span class="text-info">{{$review->name}}</span> | Email : <span class="text-info">{{$review->email}}</span><br>
                                    On : <span class="text-info">{{\Carbon\Carbon::parse($review->created_at)->format('d/M/Y')}}</span> |
                                    Rating :
                                    @for($i = 1; $i <= $review->rating; $i++)
                                    <span class="text-success text-bold">* </span>
                                    @endfor
                                    <hr>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-warning">
                                <div class="panel-heading">Express Interest Form</div>
                                <div class="panel-body">
                                    <form class="form" action="/interest-submit" method="post">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group{{ $errors->has('byrname') ? ' has-error' : '' }}">
                                                    <input type="text" class="form-control" name="byrname" placeholder="Jane Doe" value="{{ old('byrname') }}">
                                                    @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('byrname') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('byremail') ? ' has-error' : '' }}">
                                                    <input type="email" class="form-control" name="byremail" placeholder="jane.doe@example.com" value="{{ old('byremail') }}">
                                                    @if ($errors->has('byremail'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('byremail') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group{{ $errors->has('byrphone') ? ' has-error' : '' }}">
                                                    <input type="text" class="form-control" name="byrphone" placeholder="909090909" value="{{ old('byrphone') }}">
                                                    @if ($errors->has('byrphone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('byrphone') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <input type="hidden" name="listId" value="{{$details->id}}" />
                                                <input type="hidden" name="listtitle" value="{{$details->title}}" />
                                                <input type="hidden" name="selleremail" value="{{$details->seller->email}}" />
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                        @if (\Session::get('success'))
                                        <div class="alert alert-success text-center">
                                            <p>{{ \Session::get('success') }}</p>
                                        </div>
                                        @endif

                                        @if (\Session::get('error'))
                                        <div class="alert alert-danger text-center">
                                            <p>{{ \Session::get('error') }}</p>
                                        </div>
                                        @endif
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <h2 class="text-center">Sorry! the item you are looking for does not exist</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection