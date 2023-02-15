<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-lg-4 mb-4">
            <div class="card h-100 shadow card-span rounded-3">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="Profileimage/{{$product->user->image}}" class="rounded-circle shadow-4-strong" width="60" height="60" alt="User-Profile-Image">
                            <div class="ml-2">
                                <p> <strong>{{$product->user->name}} </strong> <br> {{$product->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5> {{$product->category->label}}
                    </h5>
                    <p class="mb-3 tx-14"> {{$product->description}}</p>
                    <!-- create a bootstrap card in a container-->
                    <div class="container">
                        <div class="col-lg-3">
                            <!--Bootstrap card with slider class-->
                            <div id="carouselExampleControls-{{$product->id}}" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-items="1">
                                <div class="carousel-inner">
                                    @foreach($product->images as $key => $image)
                                    @if($key<=3) <div class="carousel-item active">
                                        <div class="card-wrapper container-sm d-flex  justify-content-around">
                                            <div class="card  ">
                                                <img src="Productimage/{{$image->path}}" class="card-img-top" width="240" height="240" alt="...">
                                            </div>
                                        </div>
                                </div>
                                @else
                                <div class="carousel-item">
                                    <div class="card-wrapper container-sm d-flex  justify-content-around">
                                        <div class="card ">
                                            <img src="Productimage/{{$image->path}}" class="card-img-top" width="240" height="240" alt="...">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls-{{$product->id}}" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls-{{$product->id}}" role="button" data--bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>

                    
                </div>
                <br>
                <div>
                <button class="btn btn-sm btn-outline-warning"> $ {{$product->price}}</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</div>