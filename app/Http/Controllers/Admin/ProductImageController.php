<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Services\Product\ProductServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product = $this->productService->find($product_id);
        $productImages = $product->productImages;

        return view('admin.product.image.index', compact('product', 'productImages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();

        //Xử lý file
        if ($request->hasFile('image')) {
            $data['path'] = Common::uploadFile($request->file('image'), 'dashboard/assets/images');
            unset($data['image']);

            ProductImage::create($data);
        }

        return redirect('product/' . $product_id . '/image');
    }

    /**
     * Remove the specified resource from storage.
     *`
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $product_image_id)
    {
        //Xoá file
        $filePath = ProductImage::find($product_image_id)->path;
        if ($filePath != '') {
            unlink('dashboard/assets/images/' . $filePath);
        }

        //Xoá bản ghi trong database
        ProductImage::find($product_image_id)->delete();

        return redirect('product/' . $product_id . '/image');
    }
}
