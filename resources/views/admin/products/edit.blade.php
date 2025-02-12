@extends('admin.layout.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ encrypt($product->id) }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ $product->price }}" id="exampleInputPassword1" placeholder="Price">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select an Option</option>
                                        @foreach($categories as $category)
                                        <option @selected($category->id == $product->category_id) value="{{$category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img src="{{ asset('storage/images/'.$product->image) }}" width="100" alt="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Status</label>
                                    <input type="radio" @checked($product->status==1) value="1" name="status">Active
                                    <input type="radio" @checked($product->status==0) value="0" name="status">Inactive
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Is Favourite</label>
                                    <input type="radio" @checked($product->is_favorite=='1') value="1" name="is_favorite">Yes
                                    <input type="radio" @checked($product->is_favorite=='0') value="0" name="is_favorite">No
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
