    <?php
    get_header();
    ?>
    <div class="preloader-wrapper">
        <div class="preloader"></div>
    </div>

    <div
        class="offcanvas offcanvas-end"
        data-bs-scroll="true"
        tabindex="-1"
        id="offcanvasCart">
        <div class="offcanvas-header justify-content-center">
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Growers cider</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Fresh grapes</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Heinz tomato ketchup</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>

                <button class="w-100 btn btn-primary btn-lg" type="submit">
                    Continue to checkout
                </button>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header justify-content-between">
            <h4 class="fw-normal text-uppercase fs-6">Menu</h4>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <?php
            $all_categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => true
            ]);
            ?>
            <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                <?php foreach ($all_categories as $category): ?>
                    <li class="nav-item border-dashed active">
                        <a
                            href="<?php echo home_url('/'); ?>?category=<?php echo esc_attr($category->slug); ?>"
                            class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                            <svg width="24" height="24" viewBox="0 0 24 24">

                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#<?php echo esc_attr($category->slug); ?>"></use>
                            </svg>
                            <span><?php echo esc_html($category->name); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>

    <header>
        <div class="container-fluid">
            <div class="row py-3 border-bottom">
                <div
                    class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
                    <div class="d-flex align-items-center my-3 my-sm-0">
                        <a href="">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo" class="img-fluid" />
                        </a>
                    </div>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#menu"></use>
                        </svg>
                    </button>
                </div>

                <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-4">
                    <div class="search-bar row bg-light p-2 rounded-4">
                        <div class="col-md-4 d-none d-md-block">
                            <select class="form-select border-0 bg-transparent">
                                <option>All Categories</option>
                                <option>Groceries</option>
                                <option>Drinks</option>
                                <option>Chocolates</option>
                            </select>
                        </div>
                        <div class="col-11 col-md-7">
                            <form
                                id="search-form"
                                class="text-center"
                                action=""
                                method="post">
                                <input
                                    type="text"
                                    class="form-control border-0 bg-transparent"
                                    placeholder="Search for more than 20,000 products" />
                            </form>
                        </div>
                        <div class="col-1">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24">
                                <path
                                    fill="currentColor"
                                    d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <ul
                        class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
                        <li class="nav-item active">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle pe-3"
                                role="button"
                                id="pages"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">Pages</a>
                            <ul
                                class="dropdown-menu border-0 p-3 rounded-0 shadow"
                                aria-labelledby="pages">
                                <li>
                                    <a href="" class="dropdown-item">About Us </a>
                                </li>
                                <li><a href="" class="dropdown-item">Shop </a></li>
                                <li>
                                    <a href="" class="dropdown-item">Single Product
                                    </a>
                                </li>
                                <li><a href="" class="dropdown-item">Cart </a></li>
                                <li>
                                    <a href="" class="dropdown-item">Checkout </a>
                                </li>
                                <li><a href="" class="dropdown-item">Blog </a></li>
                                <li>
                                    <a href="" class="dropdown-item">Single Post </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">Styles </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">Contact </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">Thank You </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">My Account </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">404 Error </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div
                    class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
                    <ul class="d-flex justify-content-end list-unstyled m-0">
                        <li>
                            <a href="#" class="p-2 mx-1">
                                <svg width="24" height="24">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#user"></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="p-2 mx-1">
                                <svg width="24" height="24">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#wishlist"></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="p-2 mx-1"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasCart"
                                aria-controls="offcanvasCart">
                                <svg width="24" height="24">
                                    <use
                                        xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#shopping-bag"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section
        style="
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner-1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
      ">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-6 pt-5 mt-5">
                    <h2 class="display-1 ls-1">
                        <span class="fw-bold text-primary">Organic</span> Foods at your
                        <span class="fw-bold">Doorsteps</span>
                    </h2>
                    <p class="fs-4">Dignissim massa diam elementum.</p>
                    <div class="d-flex gap-3">
                        <a
                            href="#"
                            class="btn btn-primary text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Start Shopping</a>
                        <a
                            href="#"
                            class="btn btn-dark text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Join Now</a>
                    </div>
                    <div class="row my-5">
                        <div class="col">
                            <div class="row text-dark">
                                <div class="col-auto">
                                    <p class="fs-1 fw-bold lh-sm mb-0">14k+</p>
                                </div>
                                <div class="col">
                                    <p class="text-uppercase lh-sm mb-0">Product Varieties</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row text-dark">
                                <div class="col-auto">
                                    <p class="fs-1 fw-bold lh-sm mb-0">50k+</p>
                                </div>
                                <div class="col">
                                    <p class="text-uppercase lh-sm mb-0">Happy Customers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row text-dark">
                                <div class="col-auto">
                                    <p class="fs-1 fw-bold lh-sm mb-0">10+</p>
                                </div>
                                <div class="col">
                                    <p class="text-uppercase lh-sm mb-0">Store Locations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
                <div class="col">
                    <div class="card border-0 bg-primary rounded-0 p-4 text-light">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <svg width="60" height="60">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#fresh"></use>
                                </svg>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body p-0">
                                    <h5 class="text-light">Fresh from farm</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipi elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 bg-secondary rounded-0 p-4 text-light">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <svg width="60" height="60">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#organic"></use>
                                </svg>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body p-0">
                                    <h5 class="text-light">100% Organic</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipi elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 bg-danger rounded-0 p-4 text-light">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <svg width="60" height="60">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#delivery"></use>
                                </svg>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body p-0">
                                    <h5 class="text-light">Free delivery</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipi elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 overflow-hidden">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Category</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">View All</a>
                            <div class="swiper-buttons">
                                <button
                                    class="swiper-prev category-carousel-prev btn btn-yellow">
                                    ❮
                                </button>
                                <button
                                    class="swiper-next category-carousel-next btn btn-yellow">
                                    ❯
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-1.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Fruits & Veges
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-2.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Breads & Sweets
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-3.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Fruits & Veges
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-4.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">Beverages</h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-5.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Meat Products
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-6.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">Breads</h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-7.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Fruits & Veges
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-8.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Breads & Sweets
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-1.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Fruits & Veges
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-1.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">Beverages</h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-1.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">
                                    Meat Products
                                </h4>
                            </a>
                            <a
                                href="category.html"
                                class="nav-link swiper-slide text-center">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/category-thumb-1.jpg"
                                    class="rounded-circle"
                                    alt="Category Thumbnail" />
                                <h4 class="fs-6 mt-3 fw-normal category-title">Breads</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="section-header d-flex flex-wrap justify-content-between my-4">
                        <h2 class="section-title">Best selling products</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary rounded-1">View All</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div
                        class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-1.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Whole Wheat Sandwich Bread</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-2.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Whole Grain Oatmeal</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(41)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$54.00</del>
                                        <span class="text-dark fw-semibold">$50.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-3.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Sharp Cheddar Cheese Block</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(32)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$14.00</del>
                                        <span class="text-dark fw-semibold">$12.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-4.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Organic Baby Spinach</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-5.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">
                                        Organic Spinach Leaves (Fresh Produce)
                                    </h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-6.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Fresh Salmon</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-7.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">
                                        Imported Italian Spaghetti Pasta
                                    </h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-8.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Granny Smith Apples</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-9.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Organic 2% Reduced Fat Milk</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-item">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-10.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Greek Style Plain Yogurt</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / product-grid -->
                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-blocks">
                        <div
                            class="banner-ad d-flex align-items-center large bg-info block-1"
                            style="
                  background: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner-ad-1.jpg') no-repeat;
                  background-size: cover;
                ">
                            <div class="banner-content p-5">
                                <div class="content-wrapper text-light">
                                    <h3 class="banner-title text-light">Items on SALE</h3>
                                    <p>Discounts up to 30%</p>
                                    <a href="#" class="btn-link text-white">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div
                            class="banner-ad bg-success-subtle block-2"
                            style="
                  background: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner-ad-2.jpg') no-repeat;
                  background-size: cover;
                ">
                            <div class="banner-content align-items-center p-5">
                                <div class="content-wrapper text-light">
                                    <h3 class="banner-title text-light">Combo offers</h3>
                                    <p>Discounts up to 50%</p>
                                    <a href="#" class="btn-link text-white">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div
                            class="banner-ad bg-danger block-3"
                            style="
                  background: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner-ad-3.jpg') no-repeat;
                  background-size: cover;
                ">
                            <div class="banner-content align-items-center p-5">
                                <div class="content-wrapper text-light">
                                    <h3 class="banner-title text-light">Discount Coupons</h3>
                                    <p>Discounts up to 40%</p>
                                    <a href="#" class="btn-link text-white">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Banner Blocks -->
                </div>
            </div>
        </div>
    </section>

    <section id="featured-products" class="products-carousel">
        <div class="container-lg overflow-hidden py-5">
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="section-header d-flex flex-wrap justify-content-between my-4">
                        <h2 class="section-title">Featured products</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">View All</a>
                            <div class="swiper-buttons">
                                <button
                                    class="swiper-prev products-carousel-prev btn btn-primary">
                                    ❮
                                </button>
                                <button
                                    class="swiper-next products-carousel-next btn btn-primary">
                                    ❯
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-10.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Greek Style Plain Yogurt</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-11.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">
                                        Pure Squeezed No Pulp Orange Juice
                                    </h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-12.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Fresh Oranges</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-13.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Gourmet Dark Chocolate Bars</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-14.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Fresh Green Celery</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-15.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Sandwich Bread</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-16.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Honeycrisp Apples</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-17.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Whole Wheat Sandwich Bread</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-18.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Honeycrisp Apples</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / products-carousel -->
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-lg">
            <div
                class="bg-secondary text-light py-5 my-5"
                style="
            background: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner-newsletter.jpg') no-repeat;
            background-size: cover;
          ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-5 p-3">
                            <div class="section-header">
                                <h2 class="section-title display-5 text-light">
                                    Get 25% Discount on your first purchase
                                </h2>
                            </div>
                            <p>Just Sign Up & Register it now to become member.</p>
                        </div>
                        <div class="col-md-5 p-3">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-none">Name</label>
                                    <input
                                        type="text"
                                        class="form-control form-control-md rounded-0"
                                        name="name"
                                        id="name"
                                        placeholder="Name" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label d-none">Email</label>
                                    <input
                                        type="email"
                                        class="form-control form-control-md rounded-0"
                                        name="email"
                                        id="email"
                                        placeholder="Email Address" />
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-dark btn-md rounded-0">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="popular-products" class="products-carousel">
        <div class="container-lg overflow-hidden py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex justify-content-between my-4">
                        <h2 class="section-title">Most popular products</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">View All</a>
                            <div class="swiper-buttons">
                                <button
                                    class="swiper-prev products-carousel-prev btn btn-primary">
                                    ❮
                                </button>
                                <button
                                    class="swiper-next products-carousel-next btn btn-primary">
                                    ❯
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-15.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Sandwich Bread</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-16.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Honeycrisp Apples</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-17.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Whole Wheat Sandwich Bread</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-18.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Honeycrisp Apples</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-19.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Sunstar Fresh Melon Juice</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-10.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Greek Style Plain Yogurt</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-11.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">
                                        Pure Squeezed No Pulp Orange Juice
                                    </h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-12.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Fresh Oranges</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-13.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Gourmet Dark Chocolate Bars</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / products-carousel -->
                </div>
            </div>
        </div>
    </section>

    <section id="latest-products" class="products-carousel">
        <div class="container-lg overflow-hidden pb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex justify-content-between my-4">
                        <h2 class="section-title">Just arrived</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">View All</a>
                            <div class="swiper-buttons">
                                <button
                                    class="swiper-prev products-carousel-prev btn btn-primary">
                                    ❮
                                </button>
                                <button
                                    class="swiper-next products-carousel-next btn btn-primary">
                                    ❯
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-20.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Sunstar Fresh Melon Juice</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-1.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Whole Wheat Sandwich Bread</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-21.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Sunstar Fresh Melon Juice</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-22.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Gourmet Dark Chocolate</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-23.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Sunstar Fresh Melon Juice</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-10.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Greek Style Plain Yogurt</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-11.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">
                                        Pure Squeezed No Pulp Orange Juice
                                    </h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-12.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Fresh Oranges</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <figure>
                                    <a href="" title="Product Title">
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-thumb-13.png"
                                            alt="Product Thumbnail"
                                            class="tab-image" />
                                    </a>
                                </figure>
                                <div class="d-flex flex-column text-center">
                                    <h3 class="fs-6 fw-normal">Gourmet Dark Chocolate Bars</h3>
                                    <div>
                                        <span class="rating">
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-full"></use>
                                            </svg>
                                            <svg width="18" height="18" class="text-warning">
                                                <use
                                                    xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#star-half"></use>
                                            </svg>
                                        </span>
                                        <span>(222)</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-center align-items-center gap-2">
                                        <del>$24.00</del>
                                        <span class="text-dark fw-semibold">$18.00</span>
                                        <span
                                            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10% OFF</span>
                                    </div>
                                    <div class="button-area p-3 pt-0">
                                        <div class="row g-1 mt-2">
                                            <div class="col-3">
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control border-dark-subtle input-number quantity"
                                                    value="1" />
                                            </div>
                                            <div class="col-7">
                                                <a
                                                    href="#"
                                                    class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
                                                    </svg>
                                                    Add to Cart</a>
                                            </div>
                                            <div class="col-2">
                                                <a
                                                    href="#"
                                                    class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18">
                                                        <use
                                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#heart"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / products-carousel -->
                </div>
            </div>
        </div>
    </section>

    <section id="latest-blog" class="pb-4">
        <div class="container-lg">
            <div class="row">
                <div
                    class="section-header d-flex align-items-center justify-content-between my-4">
                    <h2 class="section-title">Our Recent Blog</h2>
                    <a href="#" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail-1.jpg"
                                    alt="post"
                                    class="card-img-top" />
                            </a>
                        </div>
                        <div class="card-body">
                            <div
                                class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date">
                                    <svg width="16" height="16">
                                        <use
                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#calendar"></use>
                                    </svg>22 Aug 2021
                                </div>
                                <div class="meta-categories">
                                    <svg width="16" height="16">
                                        <use
                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#category"></use>
                                    </svg>tips & tricks
                                </div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">Top 10 casual look ideas to dress up your kids</a>
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet
                                    eleifend viverra enim tincidunt donec quam. A in arcu,
                                    hendrerit neque dolor morbi...
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail-2.jpg"
                                    alt="post"
                                    class="card-img-top" />
                            </a>
                        </div>
                        <div class="card-body">
                            <div
                                class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date">
                                    <svg width="16" height="16">
                                        <use
                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#calendar"></use>
                                    </svg>25 Aug 2021
                                </div>
                                <div class="meta-categories">
                                    <svg width="16" height="16">
                                        <use
                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#category"></use>
                                    </svg>trending
                                </div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">Latest trends of wearing street wears supremely</a>
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet
                                    eleifend viverra enim tincidunt donec quam. A in arcu,
                                    hendrerit neque dolor morbi...
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail-3.jpg"
                                    alt="post"
                                    class="card-img-top" />
                            </a>
                        </div>
                        <div class="card-body">
                            <div
                                class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date">
                                    <svg width="16" height="16">
                                        <use
                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#calendar"></use>
                                    </svg>28 Aug 2021
                                </div>
                                <div class="meta-categories">
                                    <svg width="16" height="16">
                                        <use
                                            xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#category"></use>
                                    </svg>inspiration
                                </div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">10 Different Types of comfortable clothes ideas for
                                        women</a>
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet
                                    eleifend viverra enim tincidunt donec quam. A in arcu,
                                    hendrerit neque dolor morbi...
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-4 my-4">
        <div class="container-lg">
            <div class="bg-warning pt-5 rounded-5">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-4">
                            <h2 class="mt-5">Download Organic App</h2>
                            <p>Online Orders made easy, fast and reliable</p>
                            <div class="d-flex gap-2 flex-wrap mb-5">
                                <a href="#" title="App store"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-app-store.png" alt="app-store" /></a>
                                <a href="#" title="Google Play"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-google-play.png" alt="google-play" /></a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-onlineapp.png"
                                alt="phone"
                                class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container-lg">
            <h2 class="my-4">People are also looking for</h2>
            <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
        </div>
    </section>

    <section class="py-5">
        <div class="container-lg">
            <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#package"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Free delivery</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipi elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#secure"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>100% secure payment</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipi elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#quality"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Quality guarantee</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipi elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#savings"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>guaranteed savings</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipi elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#offers"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Daily offers</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipi elit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    get_footer();
    ?>