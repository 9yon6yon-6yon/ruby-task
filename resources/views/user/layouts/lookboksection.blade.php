<section class="exclusive-deal-area">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding exclusive-left">
                <div class="row clock_sec clockdiv" id="clockdiv">
                    <div class="col-lg-12">
                        <h1>Exclusive Hot Deal Ends Soon!</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="row clock-wrap">
                            <div class="col clockinner1 clockinner">
                                <h1 class="days">150</h1>
                                <span class="smalltext">Days</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="hours">23</h1>
                                <span class="smalltext">Hours</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="minutes">47</h1>
                                <span class="smalltext">Mins</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="seconds">59</h1>
                                <span class="smalltext">Secs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('showproducts') }}" class="primary-btn">Shop Now</a>
            </div>
            <div class="col-lg-6 no-padding exclusive-right">
                <div class="active-exclusive-product-slider">
                    <!-- single exclusive carousel -->
                    @foreach ($latestproducts as $latestproduct)
                    <div class="single-exclusive-slider">
                        <img class="img-fluid" src="img/product/e-p1.png" alt="">
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
                            <div class="price">
                                <h6>{{ $latestproduct->price }}</h6>
                            </div>
                            <h4>{{ $latestproduct->name }}</h4>
                            <div class="add-bag d-flex align-items-center justify-content-center">
                                <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                <span class="add-text text-uppercase">Add to Bag</span>
                            </div>
                        </div>
                    </div>
                  @endforeach 
                </div>
            </div>
        </div>
    </div>
</section>