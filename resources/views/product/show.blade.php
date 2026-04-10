@extends('layouts.app')

@section('title', $product->title)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product.category', $product->category->id) }}">{{ $product->category->title }}</a></li>
                    <li><span>{{ $product->title }}</span></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-lg-4 mb-3">
            <div class="bg-white h-100">
                <div id="carouselExampleFade" class="carousel carousel-dark slide carousel-fade">
                    <div class="carousel-inner">

                    	@forelse($all_img as $item)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{ asset('uploads/' . $item) }}" class="d-block w-100" alt="...">
                        </div>
                        @empty
                        	<img src="{{ asset('no-image.jpg') }}" class="d-block w-100" alt="...">
                        @endforelse

                    </div>
                    @if(!empty($all_img) && count($all_img) > 1)
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-7 col-lg-8 mb-3">
            <div class="bg-white product-content p-3 h-100">
                <h1 class="section-title h3"><span>{{ $product->title }}</span></h1>

                <div class="product-rating">
                    @for ($i = 0; $i < 5; $i++)
                        @if($i < $product->stars)
                            <i class="fa-solid fa-star active"></i>
                        @else
                            <i class="fa-solid fa-star"></i>
                        @endif
                    @endfor
                    <span class="count-reviews">{{ count($comments) }} reviews</span> |<span class="count-reviews">{{ $product->view }} views</span>
                </div>

                <div class="product-price">
	                @if($product->old_price)
	                    <small>${{ $product->old_price }}</small>
	                    ${{ $product->price }}
	                @else
	                    ${{ $product->price }}
	                @endif
                </div>

                <p>{{ $product->description }}</p>

                <div class="product-add2cart">
                    <div class="input-group">
                        <form action="{{ route('cart.add.show', $product) }}" method="post">

                            @csrf

                            <input type="number" class="form-control" value="1" min="1" name="qty">
                            <button type="submit" class="btn btn-warning" style="width: 250px;"><i class="fas fa-shopping-cart"></i> Add to
                            cart</button>

                    @if($product->colors || $product->sizes)
                    <div class="options mt-3">
                        @if($product->colors)
                          <div class="form-group" style="width: 200px;">
                            <label for="colors" class="form-label">{{ __('Colors') }}</label>
                            <select class="form-control" name="color">
                            @foreach($product->colors as $color)
                              <option value="{{ $color }}">{{ $color }}</option>
                            @endforeach
                            </select>
                          </div>                        
                        @endif
                        @if($product->sizes)
                          <div class="form-group" style="width: 200px;">
                            <label for="sizes" class="form-label">{{ __('Sizes') }}</label>
                            <select class="form-control" name="size">
                            @foreach($product->sizes as $size)
                              <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                            </select>
                          </div>
                        @endif
                    </div>
                    @endif
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4 mb-2">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa-solid fa-shield-halved"></i> Гарантия
                                </h5>
                                <ul class="list-unstyled">
                                    <li>Гарантия 1 год</li>
                                    <li>Возвращение товара в течение 14 дней</li>
                                    <li>Гарантия качества</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa-solid fa-truck-fast"></i> Доставка</h5>
                                <ul class="list-unstyled">
                                    <li>Доставка по всей стране</li>
                                    <li>Доставка почтой</li>
                                    <li>Самовывоз</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa-regular fa-credit-card"></i> Оплата</h5>
                                <ul class="list-unstyled">
                                    <li>Наличный рассчет</li>
                                    <li>Безналичный рассчет</li>
                                    <li>VISA/MasterCard</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="product-content-details bg-white p-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description-tab-pane" type="button" role="tab"
                            aria-controls="description-tab-pane" aria-selected="true">Description</button>
                    </li>
                    @if(!empty($product->colors) || !empty($product->sizes))
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="features-tab" data-bs-toggle="tab"
                            data-bs-target="#features-tab-pane" type="button" role="tab"
                            aria-controls="features-tab-pane" aria-selected="false">Features</button>
                    </li>
                    @endif
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                            data-bs-target="#reviews-tab-pane" type="button" role="tab"
                            aria-controls="reviews-tab-pane" aria-selected="false">Reviews ({{ count($comments) }})</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="video-tab" data-bs-toggle="tab"
                            data-bs-target="#video-tab-pane" type="button" role="tab"
                            aria-controls="video-tab-pane" aria-selected="false">Video</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                        aria-labelledby="description-tab" tabindex="0">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure numquam ratione
                            voluptatibus reiciendis? Vitae ex nesciunt repudiandae sunt deserunt! Quis
                            numquam cum architecto illum, officia quo possimus! Earum, illo quaerat!</p>
                        <p>Dolores illum sed officia? Assumenda iusto quis exercitationem eligendi, totam
                            laudantium dignissimos quae corrupti soluta quasi ipsum nemo recusandae!
                            Recusandae quibusdam maiores beatae et inventore architecto amet obcaecati vel
                            neque.</p>
                        <p>Obcaecati libero atque, excepturi facere magnam nulla, iure tempora ipsum dolorem
                            autem eius cum exercitationem ad perspiciatis laboriosam rerum! Id, unde
                            recusandae velit quam exercitationem quia minus nihil molestias dolorem?</p>
                    </div>
                    <div class="tab-pane fade" id="features-tab-pane" role="tabpanel"
                        aria-labelledby="features-tab" tabindex="0">
                        <table class="table">
                            <tbody>
                                @if(!empty($product->colors))
                                <tr>
                                    <th scope="row">Colors</th>
                                    <td>{{ implode(', ', $product->colors) }}</td>
                                </tr>
                                @endif
                                @if(!empty($product->sizes))
                                <tr>
                                    <th scope="row">Sizes</th>
                                    <td>{{ implode(', ', $product->sizes) }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel"
                        aria-labelledby="reviews-tab" tabindex="0">

                        @if(auth()->check())
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal"
                            data-bs-target="#reviewModal">
                            Write review
                        </button>
                        @else
                            <a href="{{ route('login') }}">Для добавление коментария, авторизуйтесь.</a>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="reviewModal" tabindex="-1"
                            aria-labelledby="reviewModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="reviewModalLabel">Write review</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('product.comment', $product) }}" method="post">
                                        @csrf

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name"
                                                    class="form-label">Name</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="Your Name">
                                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror 
                                            </div>
                                            <div class="mb-3">
                                                <label for="comment"
                                                    class="form-label">Example textarea</label>
                                                <textarea class="form-control form-control @error('comment') is-invalid @enderror"
                                                    id="comment" name="comment" rows="3"  placeholder="Your Comment"></textarea>
                                                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror 
                                            </div>

                                            <div class="mb-3">
                                                <p>Rate the product:</p>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rate"
                                                        id="rate1" value="1" required>
                                                    <label class="form-check-label" for="rate1">1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rate"
                                                        id="rate2" value="2" required>
                                                    <label class="form-check-label" for="rate2">2</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rate"
                                                        id="rate3" value="3" required>
                                                    <label class="form-check-label" for="rate3">3</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rate"
                                                        id="rate4" value="4" required>
                                                    <label class="form-check-label" for="rate4">4</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rate"
                                                        id="rate5" value="5" required>
                                                    <label class="form-check-label" for="rate5">5</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Send
                                                review</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        @foreach($comments as $comment)
                        <div class="card product-review mb-3">
                            <div class="card-body">
                                <div class="product-review-header">
                                    <h5 class="card-title">{{ $comment->name }}</h5>
                                    <span class="review-date">{{ $comment->created_at->format('d.m.Y') }}</span>
                                </div>

                                <div class="product-rating mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if($i < $comment->rate)
                                            <i class="fa-solid fa-star active"></i>
                                        @else
                                            <i class="fa-solid fa-star"></i>
                                        @endif
                                    @endfor
                                </div>

                                <div class="card-text">
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="tab-pane fade" id="video-tab-pane" role="tabpanel"
                        aria-labelledby="video-tab" tabindex="0">
                        <div class="ratio ratio-16x9">
                            <video src="assets/clothing.mp4" controls></video>
                            <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/I10XB1-IIbA"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="new-products">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">
                    <span>Так же выбирают</span>
                </h2>
            </div>
        </div>

        <div class="owl-carousel owl-theme owl-carousel-full">
            @foreach($products as $product)

                <x-product-card :product="$product" />

            @endforeach
        </div>

    </div>
</section>

@endsection