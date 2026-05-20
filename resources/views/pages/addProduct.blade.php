@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card mb-3">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Add New Product</h4>
            </div>
            <div class="card-body">

                <form id="frmAddProduct" enctype="multipart/form-data">
                    <input type="hidden" name="hdnProductId" id="hdnProductId">
                    <input type="hidden" name="hdnOldDescription" id="hdnOldDescription">
                    <input type="hidden" name="hdnOldStockQuantity" id="hdnOldStockQuantity">
                    <input type="hidden" name="hdnOldPrice" id="hdnOldPrice">
                    <input type="hidden" name="hdnOldCategory" id="hdnOldCategory">
                    <input type="hidden" name="hdnOldPname" id="hdnOldPname">
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
                            <th style="display: none">image</th>
                            <th style="display: none">categoryid</th>
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

        <div class="modal" tabindex="-1" id="divModalUpdate" style="display: none">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white">update product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white; !important"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frmAddProductUpdate" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="txtProductUpdateName" id="txtProductUpdateName"
                                        class="form-control" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="cmbUpdateCategoryId" id="cmbUpdateCategoryId" class="form-control"
                                        required>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->categori_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Price (LKR)</label>
                                    <input type="string" name="txtUpdatePrice" id="txtUpdatePrice" step="0.01"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Stock Quantity</label>
                                    <input type="string" name="txtUpdateStockQuantity" id="txtUpdateStockQuantity"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="txtUpdateDescription" id="txtUpdateDescription" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center">
                                <label class="form-label d-block fw-bold" id="lblImgTitile">Current Product Image</label>

                                <img id="update_image_preview" src="" alt="Product Preview"
                                    style="width: 400px; height: 200px; object-fit: cover; border-radius: 8px; border: 2px solid #ddd; display: none;">
                            </div>

                            <div class="form-group mb-3 col-md-4">
                                <label for="update_product_image" class="form-label fw-bold">Upload New Image
                                    (Optional)</label>
                                <input type="file" id="update_product_image" name="update_product_image" class="form-control">
                                <small class="text-muted"></small>
                            </div>

                            <input type="hidden" id="hidden_old_image_path">


                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-success px-4"
                                        id="btnUpdateProduct">update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/addProduct.js') }}?v={{ filemtime(public_path('controllers/addProduct.js')) }}">
    </script>
@endsection
