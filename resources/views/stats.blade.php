@extends('layouts.app')
@section('content')
    <div ng-controller="StatsController">
        <table>
            <tr>
                <th>Url</th>
                <th>No of visitors</th>
            </tr>
            <tr ng-repeat="item in data">
                <td><% item.url %></td>
                <td><% item.visitor_count %></td>
            </tr>
        </table>
    </div>
@endsection