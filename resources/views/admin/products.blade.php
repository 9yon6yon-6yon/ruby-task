@extends('admin.layouts.layout')
@section('adminindex')
    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="{{ route('admin.viewaddproduct') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                        class='bx bxs-plus-square'></i>New Product</a>
                            </div>
                            <div class="col-lg-9 col-xl-10">
                                <form class="float-lg-end">
                                    <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                        <div class="col">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5"
                                                    placeholder="Search Product..."> <span
                                                    class="position-absolute top-50 product-show translate-middle-y"><i
                                                        class="bx bx-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group"
                                                aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Sort By</button>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class='bx bx-chevron-down'></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group"
                                                aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Collection Type</button>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class='bx bxs-category'></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-white">Price Range</button>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class='bx bx-slider'></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-start"
                                                        aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
            @foreach ($products as $product)
                <div class="col">
                    <a href="{{ route('admin.product.details', $product->_pid) }}" class="text-decoration-none">
                        <div class="card">
                            @if ($product->images->isNotEmpty())
                                <img src="{{ asset($product->images->first()->image_path) }}" class="card-img-top"
                                    alt="{{ $product->name }}">
                            @else
                                <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg"
                                    class="card-img-top" alt="{{ $product->name }}">
                            @endif
                    </a>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">{{ $product->name }}</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start">
                                <strong>{{ optional($product->inventory)->available_quantity ?? 0 }}</strong>Available</p>
                            <p class="mb-0 float-end fw-bold"><span
                                    class="me-2 text-decoration-line-through text-secondary">{{ $product->price }}</span><span>{{ $product->price }}</span>
                            </p>
                        </div>
                        
                        <div class="d-flex align-items-center mt-3 fs-6">
                            <form action="{{ route('admin.product.delete', $product->_pid) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <span class="text">Remove</span> <i class='lni lni-close'></i>
                                </button>
                            </form>
                            <p class="mb-0 ms-auto">{{ $product->status }} </p>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div><!--end row-->
    </div>
@endsection
