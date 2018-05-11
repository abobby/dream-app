@extends('layout.default')
@section('title', 'Listing Page')
@section('content')
    <div class="container">
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
        @if($allitems)
            @foreach($allitems AS $item)
                <tr>
                    <td width="15%">@if(!empty($item->images))<img src="/listings/images/{{$item->id}}/{{$item->images->thumb_image}}" class="img-thumbnail img-responsive" width="100"/> @endif</td>
                    <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->title}}</a></td>
                    <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->lyear}}</a></td>
                    <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->lmake}}</a></td>
                    <td><a href="/item-detail/{{$item->id}}" target="_blank">{{$item->lmodel}}</a></td>
                    <td><a href="/item-detail/{{$item->id}}" class="btn btn-info btn-sm" target="_blank">Details</a> </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6"><h4 class="text-center">Sorry not items have been listed yet. Please check back later.</h4></td>
            </tr>
        @endif
        </tbody>
    </table>
    </div>
@endsection