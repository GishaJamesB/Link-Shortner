@extends('layouts.app')
@section('content')
    <div ng-controller="HomeController">
        <form class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label for="name" class="col-sm-5 control-label">Please enter the Url</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <input ng-model="url" type="text" class="form-control" id="url" name="url" placeholder="Enter Url" value="">
                        <span class="input-group-btn">
                            <button id="submit" class="btn btn-primary" ng-click="shortenUrl()"><% submitBtnText %></button>

                        </span>
                    </div>
                    <span class="<% status %>" ng-if="msg !=''"><% msg %></span>
                </div
            </div>
        </form>
        <div class="row" ng-if="status == 'success'">
            <div class="col-sm-7 col-sm-offset-2">
                <h3>Shortenend Url is <% msg %></h3>
            </div>
        </div>
    </div>
@endsection