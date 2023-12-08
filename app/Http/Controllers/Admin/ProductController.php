<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Brand\BrandServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $productService;
    private $brandService;
    private $productCategoryService;

    public function __construct(ProductServiceInterface $productService, BrandServiceInterface $brandService, ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->productCategoryService = $productCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->productService->searchAndPaginate('name', $request->get('search'));

        return view('admin.product.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $featured = $request->get('featured');
        $data['featured'] = $featured ? '1' : 0;

        $product = $this->productService->create($data);

        return redirect('product/' . $product->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $brands = $this->brandService->all();
        $productCategories = $this->productCategoryService->all();

        return view('admin.product.create', compact('brands', 'productCategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productService->find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productService->find($id);

        $brands = $this->brandService->all();
        $productCategories = $this->productCategoryService->all();

        return view('admin.product.edit', compact('product', 'brands', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $featured = $request->get('featured');
        $data['featured'] = $featured ? '1' : 0;
        $this->productService->update($data, $id);

        return redirect('product/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productService->delete($id);

        return redirect('/product');
    }
}
