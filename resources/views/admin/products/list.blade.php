@extends('admin.layout.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products ({{ $products->total()}})</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add Product</a>
                            @if(session()->has('message'))<p class="flash message">{{ session()->get('message') }}</p> @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Favourite</th>
                                        <th style="width: 15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ number_format($product->price, 2) }}</td>
                                        <td><img src="{{ asset("storage/images/".$product->image) }}" width="100" alt="{{ $product->name }}"></td>
                                        <td>{{ $product->status_text }}</td>
                                        <td>{{ $product->is_favorite_text }}</td>
                                        <td>
                                            <a href="{{route('admin.product.edit', encrypt($product->id))}}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{route('admin.product.delete', encrypt($product->id))}}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
