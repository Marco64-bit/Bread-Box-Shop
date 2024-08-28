<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>

        <form action="{{ url('search_product') }}" method="GET">
            <h3>Search</h3>
            <input class="w-75" type="search" name="search">
            <input type="submit" class="btn btn-secondary ms-4" value="Search">
        </form>

        <div class="row mb-4">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">

                        <div class="img-box">
                            <img width="200" height="200" src="products/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{ $product->title }}
                            </h6>
                            <h6>Price
                                <span>{{ $product->price }} EGP</span>
                            </h6>
                        </div>

                        <div style="padding: 10px;">
                            <a class="btn btn-info" href="{{ url('product_details', $product->id) }}">Details</a>
                            <a class="btn btn-primary" href="{{ url('add_cart', $product->id) }}">Add to Cart</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="div_deg">
            {{ $products->onEachSide(1)->links() }}
        </div>

    </div>
</section>
