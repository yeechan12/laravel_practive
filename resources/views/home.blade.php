@extends('layouts.app')

@section('content')        
@if($products && $products->count())
    <div class="container mt-100">
        <div class="row">
            @for ($i = 0; $i < $products->count() - 3; $i += 3)
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30"><a class="card-img-tiles" href="#" data-abc="true">
                            <div class="inner">
                                <div class="main-img"><img src="https://i.imgur.com/O0GMYuw.jpg" alt="Category"></div>
                                <div class="thumblist"><img src="https://i.imgur.com/ILEU18M.jpg" alt="Category">
                                    <img src="https://i.imgur.com/2kePJmX.jpg" alt="Category">
                                </div>
                            </div>
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $products[$i]->name }}</h4>
                            <p class="text-muted">Starting from ${{ $products[$i]->regular_price }}</p>
                            <a class="btn btn-outline-primary btn-sm" href="#" data-abc="true">View Products</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30"><a class="card-img-tiles" href="#" data-abc="true">
                            <div class="inner">
                                <div class="main-img"><img src="https://i.imgur.com/uRgdVY1.jpg" alt="Category"></div>
                                <div class="thumblist"><img src="https://i.imgur.com/VwSKS7A.jpg" alt="Category">
                                    <img src="https://i.imgur.com/gTvZ2H5.jpg" alt="Category">
                                </div>
                            </div>
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $products[$i + 1]->name }}</h4>
                            <p class="text-muted">Starting from ${{ $products[$i + 1]->regular_price }}</p><a class="btn btn-outline-primary btn-sm" href="#" data-abc="true">View Products</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30"><a class="card-img-tiles" href="#" data-abc="true">
                            <div class="inner">
                                <div class="main-img"><img src="https://i.imgur.com/0jO40CF.jpg" alt="Category"></div>
                                <div class="thumblist"><img src="https://i.imgur.com/dWYAg41.jpg" alt="Category">
                                    <img src="https://i.imgur.com/5oQEZSC.jpg" alt="Category">
                                </div>
                            </div>
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $products[$i + 2]->name }}</h4>
                            <p class="text-muted">Starting from ${{ $products[$i + 2]->regular_price }}</p><a class="btn btn-outline-primary btn-sm" href="#" data-abc="true">View Products</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="pagination justify-content-center">
            {{ $products->links() }}
    </div>
@else
    <div class="text-center">No data</div>
@endif
@endsection
