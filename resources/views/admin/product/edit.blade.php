@extends('admin.layout.master')

@section('title', 'Edit Product')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="product/{{$product->id}}" enctype="multipart/form-data">

                            <div class="position-relative row form-group">
                                <label for=""
                                       class="col-md-3 text-md-right col-form-label">Product Images</label>
                                <div class="col-md-9 col-xl-8">
                                    <a href="/product/{{$product->id}}/image">Manage images</a>
                                </div>
                            </div>

                            @csrf
                            @method('PUT')
                            <div class="position-relative row form-group">
                                <label for="brand_id"
                                    class="col-md-3 text-md-right col-form-label">Brand</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="brand_id" id="brand_id" class="form-control">
                                        <option value="">-- Brand --</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" @if($brand->id == $product->brand->id) {{'selected'}} @endif>
                                                {{$brand->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="product_category_id"
                                    class="col-md-3 text-md-right col-form-label">Category</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="product_category_id" id="product_category_id" class="form-control">
                                        <option value="">-- Category --</option>
                                        @foreach($productCategories as $productCategory)
                                            <option value='{{$productCategory->id}}' @if($productCategory->id == $product->product_category_id) {{'selected'}} @endif>
                                                {{$productCategory->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="{{$product->name}}">
                                </div>
                            </div>

{{--                            <div class="position-relative row form-group">--}}
{{--                                <label for="content"--}}
{{--                                    class="col-md-3 text-md-right col-form-label">Content</label>--}}
{{--                                <div class="col-md-9 col-xl-8">--}}
{{--                                    <input required name="content" id="content"--}}
{{--                                        placeholder="Content" type="text" class="form-control" value="{{$product->content}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="position-relative row form-group">
                                <label for="price"
                                    class="col-md-3 text-md-right col-form-label">Price</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="price" id="price"
                                        placeholder="Price" type="text" class="form-control" value="{{$product->price}}">
                                </div>
                            </div>

{{--                            <div class="position-relative row form-group">--}}
{{--                                <label for="discount"--}}
{{--                                    class="col-md-3 text-md-right col-form-label">Discount</label>--}}
{{--                                <div class="col-md-9 col-xl-8">--}}
{{--                                    <input required name="discount" id="discount"--}}
{{--                                        placeholder="Discount" type="text" class="form-control" value="{{$product->discount}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="position-relative row form-group">
                                <label for="weight"
                                    class="col-md-3 text-md-right col-form-label">Weight</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="weight" id="weight"
                                        placeholder="Weight" type="text" class="form-control" value="{{$product->weight}}">
                                </div>
                            </div>

{{--                            <div class="position-relative row form-group">--}}
{{--                                <label for="sku"--}}
{{--                                    class="col-md-3 text-md-right col-form-label">SKU</label>--}}
{{--                                <div class="col-md-9 col-xl-8">--}}
{{--                                    <input required name="sku" id="sku"--}}
{{--                                        placeholder="SKU" type="text" class="form-control" value="{{$product->sku}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="position-relative row form-group">--}}
{{--                                <label for="tag"--}}
{{--                                    class="col-md-3 text-md-right col-form-label">Tag</label>--}}
{{--                                <div class="col-md-9 col-xl-8">--}}
{{--                                    <input required name="tag" id="tag"--}}
{{--                                        placeholder="Tag" type="text" class="form-control" value="{{$product->tag}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="position-relative row form-group">
                                <label for="featured"
                                    class="col-md-3 text-md-right col-form-label">Featured</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="position-relative form-check pt-sm-2">
                                        <input name="featured" id="featured" type="checkbox" @if($product->featured){{'value=1 checked'}}@else{{'value="0"'}}@endif class="form-check-input">
                                        <label for="featured" class="form-check-label">Featured</label>
                                        <script>
                                            // Lấy tham chiếu đến checkbox
                                            const checkbox = document.getElementById('featured');
                                            // Thêm sự kiện onchange để theo dõi sự thay đổi của checkbox
                                            checkbox.addEventListener('change', function() {
                                                // Nếu checkbox được chọn (checked), gán giá trị 1
                                                // Ngược lại, nếu checkbox không được chọn (unchecked), gán giá trị 0
                                                checkbox.value = this.checked ? '1' : '0';
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description"
                                    class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="description" id="description" placeholder="Description">{{$product->description}}</textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">

                                    <a href="/product" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
    {{--CK Editor--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    {{--    import CKEDITOR from "lodash";--}}
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                editor: {
                    rows: 5 // Set the number of rows
                }
            })
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
