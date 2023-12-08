@extends('admin.layout.master')

@section('title', 'Product Details')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card card">

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" value="{{request('search')}}"
                                       placeholder="Search everything" class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>&nbsp;
                                        Search
                                    </button>
                                </span>
                            </div>
                        </form>

                        @if(Auth::user())
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <a href="/product/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                                    Create
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Image</th>
                                <th class="text-left">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Featured</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center text-muted">#{{$product->id}}</td>
                                    <td class="text-center" width="80px">
                                        <img style=""
                                             data-toggle="tooltip" title="Image"
                                             data-placement="bottom"
                                             src="./dashboard/assets/images/{{$product->productImages[0]->path ?? '_default-product.png'}}"
                                             alt="">
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{$product->name}}</div>
                                                    <div class="widget-subheading opacity-7">
                                                        {{$product->brand->name}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$product->price}}</td>
                                    <td class="text-center" style="max-width: 600px">{!! \Illuminate\Support\Str::limit($product->description, 100, '...') !!}</td>
                                    <td class="text-center">
                                        @if($product->featured)
                                            <div class="badge badge-success mt-2">
                                                Yes
                                            </div>
                                        @else
                                            <div class="badge badge-danger mt-2">
                                                No
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="product/{{$product->id}}"
                                           class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Details
                                        </a>
                                        @if(Auth::user())
                                        <a href="/product/{{$product->id}}/edit" data-toggle="tooltip" title="Edit"
                                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-edit fa-w-20"></i>
                                            </span>
                                        </a>
                                        <form class="d-inline" action="/product/{{$product->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Do you really want to delete this item?')">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-trash fa-w-20"></i>
                                                </span>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{$products->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
