@extends('layouts.app')
@section('menu_items')
    <li>
        <a href="/">Home<span class="sr-only">(current)</span></a>
    </li>
    <li class="active"><a href="/stats">Stats</a></li>
@endsection
@section('content')
    <div ng-controller="StatsController" class="row">
        <div class="col-sm-8 col-sm-offset-2">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Url</th>
                <th>No of visitors</th>
                <th>Shortened URL</th>
                <th>Chrome visitors</th>
                <th>Safari visitors</th>
            </tr>
            <tr ng-repeat="item in data">
                <td><% item.url %></td>
                <td><% item.visitor_count %></td>
                <td><% item.short_code %></td>
                <td><% item.chrome_count %></td>
                <td><% item.safari_count %></td>
            </tr>
        </table>
    </div>
@endsection