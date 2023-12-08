@extends('admin.layout.master')

@section('title', 'Product Details')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="/product" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-backward fa-w-20"></i>
                                        </span>
                                    <span>BACK TO LIST</span>
                                </a>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="" class="col-md-4 text-md-right col-form-label">Images</label>
                            <div class="col-md-8 col-xl-7">
                                <ul class="text-nowrap overflow-auto" id="images">

                                    @if(count($product->productImages) > 0)
                                        @foreach($product->productImages as $productImage)
                                        <li class="d-inline-block mr-1" style="position: relative;">
                                            <img style="max-height: 350px;" src="./dashboard/assets/images/{{$productImage->path ?? '_default-product.png'}}"
                                                alt="Image">
                                        </li>
                                        @endforeach
                                    @else
                                        <li class="d-inline-block mr-1" style="position: relative;">
                                            <img style="height: 150px;" src="./dashboard/assets/images/_default-product.png"
                                                 alt="Image">
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id"
                                class="col-md-4 text-md-right col-form-label">Brand</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->brand->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="product_category_id"
                                class="col-md-4 text-md-right col-form-label">Category</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->ProductCategory->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-4 text-md-right col-form-label">Name</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price"
                                class="col-md-4 text-md-right col-form-label">Price</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{  $product->price }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="weight"
                                class="col-md-4 text-md-right col-form-label">Weight</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{{$product->weight}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="featured"
                                class="col-md-4 text-md-right col-form-label">Featured</label>
                            <div class="col-md-8 col-xl-7">
                                @if($product->featured)
                                    <div class="badge badge-success mt-2">
                                        Yes
                                    </div>
                                @else
                                    <div class="badge badge-danger mt-2">
                                        No
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                class="col-md-4 text-md-right col-form-label">Description</label>
                            <div class="col-md-8 col-xl-7">
                                <p>{!!$product->description!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
