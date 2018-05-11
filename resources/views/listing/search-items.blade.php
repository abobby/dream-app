@extends('layout.default')
@section('title', 'Search Items')
@section('content')
    <div class="container">
        <form class="form"  method="post" action="/item-search-result">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control" name="type" required>
                            <option value="">--Select Type</option>
                            @if($types)
                                @foreach($types AS $type)
                                    <option value="{{$type->id}}">{{$type->category_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Keyword for search">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control" name="minprice" placeholder="Min Price">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control" name="maxprice" placeholder="Max Price">
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
            {{csrf_field()}}

        </form>
        <hr>
        @if(!empty($searchlist))
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            @if($searchlist)
                @foreach($searchlist AS $item)
                    <tr>
                        <td width="15%">@if(!empty($item->images))<img src="/listings/images/{{$item->id}}/{{$item->images->thumb_image}}" class="img-thumbnail img-responsive" width="100"/> @endif</td>
                        <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->title}}</a></td>
                        <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->lyear}}</a></td>
                        <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->lmake}}</a></td>
                        <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->lmodel}}</a></td>
                        <td><a href="/item-detail/{{$item->id}}" class="btn btn-info btn-sm" target="_blank">Details</a> </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        @else
            <h4 class="text-center">Oh! sorry no items to display.</h4>
        @endif
    </div>
@endsection