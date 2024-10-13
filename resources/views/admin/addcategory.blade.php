@extends('admin.layouts.layout')
@section('adminindex')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.viewallcategory') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body p-4">
                <form id="myForm" class="row g-3" method="POST" action="{{ route('admin.addnewcategory') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="input1"
                            placeholder="Category name...">
                    </div>

                    <div class="col-md-6">
                        <label for="input2" class="form-label">Category Slug</label>
                        <input type="text" class="form-control" name="category_slug" id="input2"
                            placeholder="Category Slug...">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Category Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('jsfunction')
    <script src="{{asset('backend/assets/js/validate.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category_name: {
                        required: true,
                    },

                },
                messages: {
                    category_name: {
                        required: 'Please Enter Category name',
                    }, 
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
