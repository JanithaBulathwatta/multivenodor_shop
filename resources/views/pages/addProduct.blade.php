@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card mb-3">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Add New Product</h4>
            </div>
            <div class="card-body">

                <form id="frmAddProduct" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="txtProductName" id="txtProductName" class="form-control" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Category</label>
                            <select name="cmbCategoryId" id="cmbCategoryId" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->categori_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Price (LKR)</label>
                            <input type="string" name="textPrice" id="textPrice" step="0.01" class="form-control"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stock Quantity</label>
                            <input type="string" name="txtStockQuantity" id="txtStockQuantity" class="form-control"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="product_image" id="product_image" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-success px-4" id="btnAddProduct">Save Product</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Products</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered mt-5" id="tblProdutDetails"
                    style="border-top: 1px solid #dee2e6 !important;border-collapse: collapse !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>product name</th>
                            <th>description</th>
                            <th>price</th>
                            <th>stock</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table content will be added dynamically -->
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/addProduct.js') }}?v={{ filemtime(public_path('controllers/addProduct.js')) }}"></script>
@endsection
