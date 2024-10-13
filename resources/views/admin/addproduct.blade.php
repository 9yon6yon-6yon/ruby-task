@extends('admin.layouts.layout')

@section('adminindex')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />
                <form id="myForm" class="row g-3" action="{{ route('admin.addnewproduct') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('POST') }}

                    <div class="form-body mt-4">
                        <div class="row">
                            <!-- Product Information Section -->
                            <div class="col-lg-8">


                                <div class="border border-3 p-4 rounded">
                                    <!-- Product Title -->
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Title</label>
                                        <input type="text" class="form-control" name="name" id="inputProductTitle"
                                            placeholder="Enter product title" required>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="inputProductDescription" rows="3"></textarea>
                                    </div>

                                    <!-- Product Images -->
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Product Images</label>
                                        <input type="file" name="images[]" class="form-control" accept="image/*"
                                            multiple>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing and Category Section -->
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">
                                        <!-- Product Price -->
                                        <div class="col-md-6">
                                            <label for="inputPrice" class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price" id="inputPrice"
                                                placeholder="00.00" required>
                                        </div>

                                        <!-- SKU -->
                                        <div class="col-md-6">
                                            <label for="inputSku" class="form-label">SKU</label>
                                            <input type="text" class="form-control" name="sku" id="inputSku"
                                                placeholder="SKU" required>
                                        </div>
                                        <!-- Product Quantity -->
                                        <div class="col-md-6">
                                            <label for="inputQuantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="available_quantity" id="inputQuantity"
                                                placeholder="10" required>
                                        </div>
                                        <!-- Product Category -->
                                        <div class="col-12">
                                            <label for="inputCategory" class="form-label">Category</label>
                                            <select class="form-select" name="category_id" id="inputCategory" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- @section('jsfunction')
    <script src="{{ asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        })
    </script>
@endsection --}}
