<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

        $this->middleware('auth');
    }

    /**
     * get list task success.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProducts(Request $request)
    {
        $limit = (int) $request->query->get('limit', config('app.default.pagination'));

        $products = $this->productRepository->selectAll()->paginate($limit);

        return view('home', compact('products'));
    }
}
