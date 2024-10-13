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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    @if ($product->images->isNotEmpty())
                        <img src="{{ asset($product->images->first()->image_path) }}" class="img-fluid"
                            alt="{{ $product->name }}">
                    @else
                        <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg"
                            class="img-fluid" alt="{{ $product->name }}">
                    @endif
                    <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                        @foreach ($product->images as $image)
                            <div class="col">
                                <img src="{{ asset($image->image_path) }}" width="70"
                                    class="border rounded cursor-pointer" alt="{{ $product->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <div class="mb-3">
                            <span class="price h4">{{ $product->price }}</span>
                            <span class="text-muted"></span>
                        </div>
                        <p class="card-text fs-6">{{ \Illuminate\Support\Str::words($product->description, 20, '...') }}
                        </p>

                        <hr>
                        <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                            <div class="col">
                                <label class="form-label">Available Quantity</label>
                                <div class="input-group input-spinner">
                                    <button class="btn btn-white" type="button" id="button-plus"> + </button>
                                    <input type="text" class="form-control"
                                        value="{{ optional($product->inventory)->available_quantity ?? 0 }}">
                                    <button class="btn btn-white" type="button" id="button-minus"> − </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-3">
                            <a href="#" class="btn btn-primary"><span class="text">Update</span> <i
                                    class='bx bxs-pencil'></i></a>
                            <a href="#" class="btn btn-outline-danger"><span class="text">Remove</span> <i
                                    class='lni lni-close'></i> </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                            aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                                </div>
                                <div class="tab-title"> Product Description </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        {{ $product->description }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
