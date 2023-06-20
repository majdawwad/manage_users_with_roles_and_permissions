@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div style="margin-bottom:30px;" class="pull-left">
            <h2> Show Product</h2>
        </div>
        <div class="pull-right" style="margin-bottom:30px;">
            <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $product->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Details:</strong>
            {{ $product->detail }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong><br><br>
            <img src="/images/{{ $product->image }}" width="100px" height="100px">
        </div>
    </div>
</div>
<p class="text-center text-primary"><small>Roles and Permissions</small></p>
@endsection
