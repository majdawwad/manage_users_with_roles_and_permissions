@extends('layouts.app')

@if(auth()->user()->can('product-list'))
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div style="margin-bottom:30px;" class="pull-left">
            <h2>The Products</h2>
        </div>
        <div class="pull-right" style="margin-bottom:30px;">
                @if(auth()->user()->can('product-create'))
                <a style="width: 150px;" class="btn btn-success" href="{{ url('create') }}"> Create New Product</a>
                @endif


        </div>

    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td><img src="/images/{{ $product->image }}" width="100px"></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            <form action="{{ route('destroy',$product->id) }}" method="POST">

                @if(auth()->user()->can('product-list'))
                <a class="btn btn-info" href="{{ route('show',$product->id) }}">Show</a>
                @endif

                @if(auth()->user()->can('product-edit'))
                <a class="btn btn-primary" href="{{ route('edit',$product->id) }}">Edit</a>
                @endif

                @csrf
                @method('DELETE')

                @if(auth()->user()->can('product-delete'))
                <button type="submit" class="btn btn-danger">Delete</button>
                @endif


            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
<p class="text-center text-primary"><small>Roles and Permissions</small></p>
@endsection
@endif
