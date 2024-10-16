<section class="owl-carousel-area">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestproducts as $latestproduct)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="{{ route('viewproductdetails', $latestproduct->_pid) }}"
                                class="text-decoration-none">
                                @if ($latestproduct->images->isNotEmpty())
                                    <img src="{{ asset($latestproduct->images->first()->image_path) }}"
                                        class="img-fluid" alt="{{ $latestproduct->name }}">
                                @else
                                    <img src="https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg"
                                        class="img-fluid" alt="{{ $latestproduct->name }}">
                                @endif
                            </a>
                            <div class="product-details">
                                <h6>{{ $latestproduct->name }}</h6>
                                <div class="price">
                                    <h6>{{ $latestproduct->price }}</h6>
                                    <h6 class="l-through">{{ $latestproduct->price }}</h6>
                                </div>
                                <div class="prd-bottom">

                                    <form action="{{ route('add.to.cart', $latestproduct->_pid) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" style="display: inline">
                                            <span class="ti-bag">
                                                <p class="hover-text">add to bag</p>
                                            </span>
                                        </button>
                                    </form>

                                    <a href="{{ route('viewproductdetails', $latestproduct->_pid) }}"
                                        class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
