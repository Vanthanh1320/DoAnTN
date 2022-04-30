@extends('layouts.main')

@section('content')

    <div class="wrap">
        <div class="banner banner-home">
            <div class="container">
                <div class="search my-4">
                    <form action="" class="search__form">
                        <div class="search__form-input">
                            <div class="search-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <input
                                name="search"
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Nhập theo kỹ năng, chức vụ, công ty..."
                                required
                            />
                        </div>

                        <div class="search__form-select mx-1">
                            <select class="form-select">
                                <option selected>Chọn cấp bậc</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <button class="btn search__form-btn btn-submit">Tìm kiếm</button>


                        <!-- <div class="search__keys">
                          <div class="search__keys-item">
                            <span>JavaScript</span>
                            <span>PHP</span>
                            <span>Java</span>
                            <span>Android</span>
                            <span>.NET</span>
                            <span>Ruby</span>
                            <span>Python</span>
                          </div>

                          <p class="search__keys-text me-4">
                            Ẩn
                          </p>
                        </div> -->

                    </form>

                </div>
            </div>
        </div>

        <div class="container-lg">

            <div class="content my-4">
                <div class="posts px-3 py-3">
                    <div class="posts-count">
                        <h3 class="posts-number">
                            <span>100</span>
                            Việc làm IT
                        </h3>
                    </div>
                    <div class="row g-2">
                        <div class="col-sm-12 col-md-12 col-xl-6">
                            <a class="posts-item py-3 px-3" href="/">
                                <div class="posts-item-img">
                                    <img src="./img/neolab.png" alt="logo-company">
                                </div>

                                <div class="posts-item-info px-sm-2">
                                    <h2 class="posts-item-info__title">Frontend Dev (Vue.js/ React) - Romove</h2>
                                    <p class="posts-item-info__company">NEOLAB Việt Nam</p>
                                    <div class="posts-item-info__address">
                                        <p>
                                            <i class="fa-solid fa-location-dot"></i>
                                            Quận Hải Châu, Đà Nẵng</p>
                                    </div>
                                    <div class="posts-item-info__salary">
                                        <p>
                                            <i class="fa-solid fa-money-bill-wave"></i>
                                            1,000 - 2,000</p>
                                    </div>
                                    <div class="posts-item-info__kills">
                                        <span>JavaScript</span>
                                        <span>PHP</span>
                                        <span>Java</span>
                                    </div>
                                </div>

                                <div class="posts-item-timer">
                                    <p>4 giờ trước</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-12 col-xl-6">
                            <a class="posts-item py-3 px-3" href="/">
                                <div class="posts-item-img">
                                    <img src="./img/neolab.png" alt="logo-company">
                                </div>

                                <div class="posts-item-info px-sm-2">
                                    <h2 class="posts-item-info__title">Frontend Dev (Vue.js/ React) - Romove</h2>
                                    <p class="posts-item-info__company">NEOLAB Việt Nam</p>
                                    <div class="posts-item-info__address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p>Quận Hải Châu, Đà Nẵng</p>
                                    </div>
                                    <div class="posts-item-info__salary">
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        <p>1,000 - 2,000</p>
                                    </div>
                                    <div class="posts-item-info__kills">
                                        <span>JavaScript</span>
                                        <span>PHP</span>
                                        <span>Java</span>
                                    </div>
                                </div>

                                <div class="posts-item-timer">
                                    <p>4 giờ trước</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-sm-12 col-md-12 col-xl-6 ">
                            <a class="posts-item py-3 px-3" href="/">
                                <div class="posts-item-img">
                                    <img src="./img/neolab.png" alt="logo-company">
                                </div>

                                <div class="posts-item-info">
                                    <h2 class="posts-item-info__title">Frontend Dev (Vue.js/ React) - Romove</h2>
                                    <p class="posts-item-info__company">NEOLAB Việt Nam</p>
                                    <div class="posts-item-info__address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p>Quận Hải Châu, Đà Nẵng</p>
                                    </div>
                                    <div class="posts-item-info__salary">
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        <p>1,000 - 2,000</p>
                                    </div>
                                    <div class="posts-item-info__kills">
                                        <span>JavaScript</span>
                                        <span>PHP</span>
                                        <span>Java</span>
                                    </div>
                                </div>

                                <div class="posts-item-timer">
                                    <p>4 giờ trước</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-12 col-xl-6">
                            <a class="posts-item py-3 px-3" href="/">
                                <div class="posts-item-img">
                                    <img src="./img/neolab.png" alt="logo-company">
                                </div>

                                <div class="posts-item-info">
                                    <h2 class="posts-item-info__title">Frontend Dev (Vue.js/ React) - Romove</h2>
                                    <p class="posts-item-info__company">NEOLAB Việt Nam</p>
                                    <div class="posts-item-info__address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p>Quận Hải Châu, Đà Nẵng</p>
                                    </div>
                                    <div class="posts-item-info__salary">
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        <p>1,000 - 2,000</p>
                                    </div>
                                    <div class="posts-item-info__kills">
                                        <span>JavaScript</span>
                                        <span>PHP</span>
                                        <span>Java</span>
                                    </div>
                                </div>

                                <div class="posts-item-timer">
                                    <p>4 giờ trước</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-sm-12 col-md-12 col-xl-6 ">
                            <a class="posts-item py-3 px-3" href="/">
                                <div class="posts-item-img">
                                    <img src="./img/neolab.png" alt="logo-company">
                                </div>

                                <div class="posts-item-info">
                                    <h2 class="posts-item-info__title">Frontend Dev (Vue.js/ React) - Romove</h2>
                                    <p class="posts-item-info__company">NEOLAB Việt Nam</p>
                                    <div class="posts-item-info__address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p>Quận Hải Châu, Đà Nẵng</p>
                                    </div>
                                    <div class="posts-item-info__salary">
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        <p>1,000 - 2,000</p>
                                    </div>
                                    <div class="posts-item-info__kills">
                                        <span>JavaScript</span>
                                        <span>PHP</span>
                                        <span>Java</span>
                                    </div>
                                </div>

                                <div class="posts-item-timer">
                                    <p>4 giờ trước</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-12 col-xl-6">
                            <a class="posts-item py-3 px-3" href="/">
                                <div class="posts-item-img">
                                    <img src="./img/neolab.png" alt="logo-company">
                                </div>

                                <div class="posts-item-info">
                                    <h2 class="posts-item-info__title">Frontend Dev (Vue.js/ React) - Romove</h2>
                                    <p class="posts-item-info__company">NEOLAB Việt Nam</p>
                                    <div class="posts-item-info__address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p>Quận Hải Châu, Đà Nẵng</p>
                                    </div>
                                    <div class="posts-item-info__salary">
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        <p>1,000 - 2,000</p>
                                    </div>
                                    <div class="posts-item-info__kills">
                                        <span>JavaScript</span>
                                        <span>PHP</span>
                                        <span>Java</span>
                                    </div>
                                </div>

                                <div class="posts-item-timer">
                                    <p>4 giờ trước</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
