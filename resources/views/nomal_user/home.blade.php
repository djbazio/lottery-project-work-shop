
@extends('layouts.normal_user.app')

@section('content')
 <!--
    ========================================
        Hero Section
    ========================================
    -->
    <section id="hero" class="hero-layout-six">
        <div class="container">
            <h1 class="text-center">Best Real Estate Property</h1>
            <div id="search" class="search-layout-two">
                <div class="container">
                    <div class="search-layout">
                        <div class="row short-form">
                            <div class="col-md-3">
                                <div class="select">
                                    <select name="sale-type">
                                        <option value="0">Rent, Sale & Sold</option>
                                        <option value="1">Property Rent</option>
                                        <option value="2">Property Sale</option>
                                        <option value="3">Property Sold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="select">
                                    <select name="apartments">
                                        <option value="0">Apartments</option>
                                        <option value="1">Normal Apartments</option>
                                        <option value="2">Premium Apartments</option>
                                        <option value="3">Luxury Apartments</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-text">
                                    <input type="text" name="search-keyword" placeholder="Keyword Search">
                                </div>
                            </div>
                            <div class="col-md-1 text-center align-self-center">
                                <label class="switch show-switcher">
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <div class="input-submit">
                                    <input type="submit" value="Search Now" class="input-submit">
                                </div>
                            </div>
                        </div>
                        <div class="advance-search">
                            <div class="checkboxes-area mb-50">
                                <h4>Amenities</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <input type="checkbox" id="balcony" name="balcony">
                                            <label for="balcony">Balcony (5)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="hardwood-flows" name="hardwood-flows">
                                            <label for="hardwood-flows">HardWood Flows (6)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="unit-washer" name="unit-washer">
                                            <label for="unit-washer">Unit Washer/Dryer (2)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <input type="checkbox" id="basement" name="basement">
                                            <label for="basement">Basement (3)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="parking" name="parking">
                                            <label for="parking">Onsite Parking (9)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="pets-allowed" name="pets-allowed">
                                            <label for="pets-allowed">Pets Allowd (3)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <input type="checkbox" id="garage" name="garage">
                                            <label for="garage">Car Garage (5)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="dishwasher" name="dishwasher">
                                            <label for="dishwasher">Dishwasher (6)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="unit-washer-two" name="unit-washer">
                                            <label for="unit-washer-two">Unit Washer/Dryer (2)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <input type="checkbox" id="central-heating" name="central-heating">
                                            <label for="central-heating">Central Heating (1)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="cleaning-service" name="cleaning-service">
                                            <label for="cleaning-service">Cleaning Service (6)</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" id="swimming-pool" name="swimming-pool">
                                            <label for="swimming-pool">Swimming Pool (2)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <h6>City</h6>
                                    <div class="select-two select-full">
                                        <select name="city">
                                            <option value="0">Select City</option>
                                            <option value="1">New York</option>
                                            <option value="2">California</option>
                                            <option value="3">New Jersey</option>
                                            <option value="4">Las Vegas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h6>Price</h6>
                                    <div class="select-two select-half">
                                        <select name="from">
                                            <option value="0">From</option>
                                            <option value="1">$10, 000</option>
                                            <option value="2">$30, 000</option>
                                            <option value="3">$50, 000</option>
                                            <option value="4">$10, 0000</option>
                                        </select>
                                    </div>
                                    <div class="select-two select-half">
                                        <select name="to">
                                            <option value="0">To</option>
                                            <option value="1">$10, 000</option>
                                            <option value="2">$30, 000</option>
                                            <option value="3">$50, 000</option>
                                            <option value="4">$10, 0000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h6>Area (sq ft)</h6>
                                    <div class="select-two select-half">
                                        <select name="area">
                                            <option value="0">1 (sq)</option>
                                            <option value="1">30 (sq)</option>
                                            <option value="2">40 (sq)</option>
                                            <option value="3">60 (sq)</option>
                                            <option value="4">100 (sq)</option>
                                        </select>
                                    </div>
                                    <div class="input-half">
                                        <input type="text" placeholder="$500" name="q">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Beds</h6>
                                    <div class="select-two select-full">
                                        <select name="beds">
                                            <option value="0">Select Beds</option>
                                            <option value="1">2 Beds</option>
                                            <option value="2">3 Beds</option>
                                            <option value="3">4 Beds</option>
                                            <option value="4">5 Beds</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h6>Bathrooms</h6>
                                    <div class="select-two select-full">
                                        <select name="bathroom">
                                            <option value="0">Select Bathrooms</option>
                                            <option value="1">1 Bathroom</option>
                                            <option value="2">2 Bathroom</option>
                                            <option value="3">3 Bathroom</option>
                                            <option value="4">4 Bathroom</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h6>Status</h6>
                                    <div class="select-two select-full">
                                        <select name="status">
                                            <option value="0">Select Status</option>
                                            <option value="1">Sale</option>
                                            <option value="2">Rent</option>
                                            <option value="3">Buy</option>
                                            <option value="4">Available</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ========================================
        Feature Section
    ========================================
    -->
    <section id="feature" class="feature-layout-six pa-100">
        <div class="container">
            <div class="row mb-60">
                <div class="col-md-8">
                    <div class="section-head-three">
                        <p>Explore Our Properties</p>
                        <h2 class="mb-0">Featured Properties</h2>
                    </div>
                </div>
                <div class="col-md-4 align-self-end text-right">
                    <a href="#" class="view-more">View All</a>
                </div>
            </div>
            <div class="row mb-30">
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$520.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">The Quest Strom Architects modern house.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Milford, MA 01757</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Bright beautiful beach house with interior.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Circle Pines, MN 55014</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Family house noosa with mod green garden.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Oviedo, FL 32765</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$520.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">The Quest Strom Architects modern house.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Matawan, NJ 07747</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Bright beautiful beach house with interior.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Frederick, MD 21701</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Family house noosa with mod green garden.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Rapid City, SD 57701</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ========================================
        Explore Section
    ========================================
    -->
    <section id="explore" class="explore-layout-two pa-100">
        <div class="container">
            <div class="row mb-60">
                <div class="col-md-8">
                    <div class="section-head-three">
                        <p>Search & Find Yours</p>
                        <h2>Explore New Areas</h2>
                    </div>
                </div>
                <div class="col-md-4 align-self-end text-right">
                    <a href="#" class="view-more">View All</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="explore-carousel">
                <div class="explore-tt">
                    <div class="explore-item">
                        <img src="https://via.placeholder.com/455x360/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <div class="content">
                                <h4>Mission Viejo</h4>
                                <p class="count mb-0">4 Property</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="explore-tt">
                    <div class="explore-item">
                        <img src="https://via.placeholder.com/455x360/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <div class="content">
                                <h4>Newport Beach</h4>
                                <p class="count mb-0">2 Property</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="explore-tt">
                    <div class="explore-item">
                        <img src="https://via.placeholder.com/455x360/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <div class="content">
                                <h4>Beverly Hills</h4>
                                <p class="count mb-0">3 Property</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="explore-tt">
                    <div class="explore-item">
                        <img src="https://via.placeholder.com/455x360/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <div class="content">
                                <h4>Mission Viejo</h4>
                                <p class="count mb-0">4 Property</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="explore-tt">
                    <div class="explore-item">
                        <img src="https://via.placeholder.com/455x360/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <div class="content">
                                <h4>Newport Beach</h4>
                                <p class="count mb-0">2 Property</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="explore-tt">
                    <div class="explore-item">
                        <img src="https://via.placeholder.com/455x360/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <div class="content">
                                <h4>Beverly Hills</h4>
                                <p class="count mb-0">3 Property</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ========================================
        Feature Sale Section
    ========================================
    -->
    <section id="feature-two" class="feature-layout-six pa-100">
        <div class="container">
            <div class="row mb-60">
                <div class="col-md-8">
                    <div class="section-head-three">
                        <p>Our Properties</p>
                        <h2 class="mb-0">Recent Sale Properties</h2>
                    </div>
                </div>
                <div class="col-md-4 align-self-end text-right">
                    <a href="#" class="view-more">View All</a>
                </div>
            </div>
            <div class="feature-carousel-two">
                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$520.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">The Quest Strom Architects modern house.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Hastings, MN 55033</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Featured</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Bright beautiful beach house with interior.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Reston, VA 20191</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Family house noosa with mod green garden.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Clayton, NC 27520</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$520.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">The Quest Strom Architects modern house.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Dallas, GA 30132</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Bright beautiful beach house with interior.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Rowlett, TX 75088</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-blue">For Sale</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Family house noosa with mod green garden.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Fairburn, GA 30213</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ========================================
        Feature Rent Section
    ========================================
    -->
    <section id="feature-three" class="feature-layout-six pb-100">
        <div class="container">
            <div class="row mb-60">
                <div class="col-md-8">
                    <div class="section-head-three">
                        <p>Our Properties</p>
                        <h2 class="mb-0">Recent Rent Properties</h2>
                    </div>
                </div>
                <div class="col-md-4 align-self-end text-right">
                    <a href="#" class="view-more">View All</a>
                </div>
            </div>

            <div class="feature-carousel-two">
                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$520.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">The Quest Strom Architects modern house.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Bradenton, FL 34203</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Featured</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Bright beautiful beach house with interior.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Newton, NJ 07860</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Family house noosa with mod green garden.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Milton, MA 02186</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Featured</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$520.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">The Quest Strom Architects modern house.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Hopkins, MN 55343</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Bright beautiful beach house with interior.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Berwyn, IL 60402</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="feature-tt">
                    <div class="feature-item">
                        <div class="img">
                            <img src="https://via.placeholder.com/390x315/aaa/999/" alt="Behome" class="img-fluid">
                            <div class="hover">
                                <div class="button-group">
                                    <a href="#" class="button-yellow">For Rent</a>
                                    <a href="#" class="tag-primary">Hot Offer</a>
                                </div>
                                <div class="pricing">
                                    <h5 class="mb-0 color-white">$630.00 <span>/Sqft</span></h5>
                                    <a href="#"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-title">
                            <h4><a href="#">Family house noosa with mod green garden.</a></h4>
                            <p><i class="fas fa-map-marker-alt primary-color"></i> Pomona, CA 91768</p>
                        </div>
                        <div class="content-middle">
                            <p class="mb-0 d-inline-block"><i class="flaticon-building pr-1"></i> Rooms: <strong>4</strong> | Bed: <strong>1</strong> | Bath: <strong>2</strong></p>
                            <a href="#" class="favorite-feature"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="footer-content">
                            <div class="author d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/37/ededed/000/" class="rounded-circle" alt="Behome">
                                </div>
                                <p class="mb-0 align-self-center">Lionel Richie</p>
                            </div>
                            <div class="right-content">
                                <a href="#" class="advanced"><span>a</span></a>
                            </div>
                        </div>

                        <div class="house-feature">
                            <ul class="list-feature">
                                <li>CC Camera</li>
                                <li>Wi-Fi</li>
                                <li>Power Connections</li>
                                <li>Weekley Clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--
    ========================================
        Testimonial Section
    ========================================
    -->
    <section id="testimonial" class="testimonial-layout-three pa-100">
        <div class="container">
            <div class="row mb-60">
                <div class="col-md-8">
                    <div class="section-head-three">
                        <p class="color-white">Happy Client</p>
                        <h2 class="mb-0 color-white">What Our Clinet Say ?</h2>
                    </div>
                </div>
                <div class="col-md-4 align-self-end text-right">
                    <a href="#" class="view-more">View All</a>
                </div>
            </div>
            <div class="feature-carousel-two testimonial-items text-center">
                <div class="testimonial-tt">
                    <div class="testimonial-item">
                        <h4>Jessica Thomson</h4>
                        <p>Envato</p>
                        <img src="https://via.placeholder.com/100/ededed/000/" alt="Behome">
                        <ul class="list-inline">
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="quote mb-0">I could see through the great windows of the first floor into the brilliantly ated audience chamber of Than Kosis. The immense hall was crow</p>

                        <span class="tag-line">Seller</span>
                    </div>
                </div>

                <div class="testimonial-tt">
                    <div class="testimonial-item">
                        <h4>Nataliya Portman</h4>
                        <p>Themeforest</p>
                        <img src="https://via.placeholder.com/100/ededed/000/" alt="Behome">
                        <ul class="list-inline">
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="quote mb-0">I could see through the great windows of the first floor into the brilliantly ated audience chamber of Than Kosis. The immense hall was crow</p>
                        <span class="tag-line">Seller</span>
                    </div>
                </div>

                <div class="testimonial-tt">
                    <div class="testimonial-item">
                        <h4>Zakir Hossain</h4>
                        <p>Themeforest</p>
                        <img src="https://via.placeholder.com/100/ededed/000/" alt="Behome">
                        <ul class="list-inline">
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="quote mb-0">I could see through the great windows of the first floor into the brilliantly ated audience chamber of Than Kosis. The immense hall was crow</p>
                        <span class="tag-line">Seller</span>
                    </div>
                </div>

                <div class="testimonial-tt">
                    <div class="testimonial-item">
                        <h4>Jessica Thomson</h4>
                        <p>Envato</p>
                        <img src="https://via.placeholder.com/100/ededed/000/" alt="Behome">
                        <ul class="list-inline">
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="quote mb-0">I could see through the great windows of the first floor into the brilliantly ated audience chamber of Than Kosis. The immense hall was crow</p>

                        <span class="tag-line">Seller</span>
                    </div>
                </div>

                <div class="testimonial-tt">
                    <div class="testimonial-item">
                        <h4>Nataliya Portman</h4>
                        <p>Themeforest</p>
                        <img src="https://via.placeholder.com/100/ededed/000/" alt="Behome">
                        <ul class="list-inline">
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="quote mb-0">I could see through the great windows of the first floor into the brilliantly ated audience chamber of Than Kosis. The immense hall was crow</p>
                        <span class="tag-line">Seller</span>
                    </div>
                </div>

                <div class="testimonial-tt">
                    <div class="testimonial-item">
                        <h4>Zakir Hossain</h4>
                        <p>Themeforest</p>
                        <img src="https://via.placeholder.com/100/ededed/000/" alt="Behome">
                        <ul class="list-inline">
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                            <li class="list-inline-item primary-color"><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="quote mb-0">I could see through the great windows of the first floor into the brilliantly ated audience chamber of Than Kosis. The immense hall was crow</p>
                        <span class="tag-line">Seller</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ========================================
        Portfolio Section
    ========================================
    -->
    <section id="portfolio" class="portfolio-layout-two pa-100">
        <div class="container">
            <div class="row mb-60">
                <div class="col-md-10">
                    <div class="section-head-three">
                        <p>Explore Our Company Project</p>
                        <h2 class="mb-0">We've Been Thriving In 25 Years</h2>
                    </div>
                </div>
                <div class="col-md-2 align-self-end text-right">
                    <a href="#" class="view-more">View All</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="portfolio-carousel">
                <div class="portfolio-tt">
                    <div class="portfolio-item">
                        <img src="https://via.placeholder.com/350x400/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <h4><a href="#">Apartment Title</a></h4>
                            <p class="mb-0">Canada</p>
                            <a href="#" class="button-arrow">
                                <i class="flaticon-right-chevron"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-tt">
                    <div class="portfolio-item">
                        <img src="https://via.placeholder.com/350x400/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <h4><a href="#">Apartment Title</a></h4>
                            <p class="mb-0">Canada</p>
                            <a href="#" class="button-arrow">
                                <i class="flaticon-right-chevron"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-tt">
                    <div class="portfolio-item">
                        <img src="https://via.placeholder.com/350x400/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <h4><a href="#">Apartment Title</a></h4>
                            <p class="mb-0">Canada</p>
                            <a href="#" class="button-arrow">
                                <i class="flaticon-right-chevron"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-tt">
                    <div class="portfolio-item">
                        <img src="https://via.placeholder.com/350x400/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <h4><a href="#">Apartment Title</a></h4>
                            <p class="mb-0">Canada</p>
                            <a href="#" class="button-arrow">
                                <i class="flaticon-right-chevron"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-tt">
                    <div class="portfolio-item">
                        <img src="https://via.placeholder.com/350x400/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <h4><a href="#">Apartment Title</a></h4>
                            <p class="mb-0">Canada</p>
                            <a href="#" class="button-arrow">
                                <i class="flaticon-right-chevron"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-tt">
                    <div class="portfolio-item">
                        <img src="https://via.placeholder.com/350x400/ccc/999/" alt="Behome" class="img-fluid">
                        <div class="hover">
                            <h4><a href="#">Apartment Title</a></h4>
                            <p class="mb-0">Canada</p>
                            <a href="#" class="button-arrow">
                                <i class="flaticon-right-chevron"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ========================================
        Blog Section
    ========================================
    -->
    <section id="blog" class="blog-layout-five pa-100">
        <div class="container">
            <div class="row mb-60">
                <div class="col-md-8">
                    <div class="section-head-three">
                        <p>Start Here</p>
                        <h2 class="mb-0">Latest Nes From Blog</h2>
                    </div>
                </div>
                <div class="col-md-4 align-self-end text-right">
                    <a href="#" class="view-more">View All</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-item">
                        <img src="https://via.placeholder.com/390x500/ededed/999/" alt="Behome" class="img-fluid">
                        <div class="content">
                            <div class="blog-top">
                                <ul class="list-inline">
                                    <li class="list-inline-item color-white"><i class="fas fa-folder-open"></i></li>
                                    <li class="list-inline-item"><a href="#">Career</a> &nbsp;.</li>
                                    <li class="list-inline-item"><a href="#">Entrepreneur</a> &nbsp;.</li>
                                    <li class="list-inline-item"><a href="#">Life</a></li>
                                </ul>
                                <h4><a href="#">3 Clear Warnings That Say Goals Are Too Small</a></h4>
                            </div>
                            <div class="blog-footer">
                                <div class="author d-flex">
                                    <div class="img">
                                        <img src="https://via.placeholder.com/37/ededed/999/" class="rounded-circle" alt="Behome">
                                    </div>
                                    <p class="mb-0 align-self-center">Lionel Richie</p>
                                </div>
                                <div class="comment"><p class="mb-0">(25) <i class="far fa-comment"></i></p></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-item">
                        <img src="https://via.placeholder.com/390x500/ededed/999/" alt="Behome" class="img-fluid">
                        <div class="content">
                            <div class="blog-top">
                                <ul class="list-inline">
                                    <li class="list-inline-item color-white"><i class="fas fa-folder-open"></i></li>
                                    <li class="list-inline-item"><a href="#">Career</a> &nbsp;.</li>
                                    <li class="list-inline-item"><a href="#">Entrepreneur</a> &nbsp;.</li>
                                    <li class="list-inline-item"><a href="#">Life</a></li>
                                </ul>
                                <h4><a href="#">3 Clear Warnings That Say Goals Are Too Small</a></h4>
                            </div>
                            <div class="blog-footer">
                                <div class="author d-flex">
                                    <div class="img">
                                        <img src="https://via.placeholder.com/37/ededed/999/" class="rounded-circle" alt="Behome">
                                    </div>
                                    <p class="mb-0 align-self-center">Lionel Richie</p>
                                </div>
                                <div class="comment"><p class="mb-0">(25) <i class="far fa-comment"></i></p></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-item">
                        <img src="https://via.placeholder.com/390x500/ededed/999/" alt="Behome" class="img-fluid">
                        <div class="content">
                            <div class="blog-top">
                                <ul class="list-inline">
                                    <li class="list-inline-item color-white"><i class="fas fa-folder-open"></i></li>
                                    <li class="list-inline-item"><a href="#">Career</a> &nbsp;.</li>
                                    <li class="list-inline-item"><a href="#">Entrepreneur</a> &nbsp;.</li>
                                    <li class="list-inline-item"><a href="#">Life</a></li>
                                </ul>
                                <h4><a href="#">3 Clear Warnings That Say Goals Are Too Small</a></h4>
                            </div>
                            <div class="blog-footer">
                                <div class="author d-flex">
                                    <div class="img">
                                        <img src="https://via.placeholder.com/37/ededed/999/" class="rounded-circle" alt="Behome">
                                    </div>
                                    <p class="mb-0 align-self-center">Lionel Richie</p>
                                </div>
                                <div class="comment"><p class="mb-0">(25) <i class="far fa-comment"></i></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ========================================
        Newsletter Section
    ========================================
    -->
    <section id="newsletter" class="newsletter-layout-two dark-bg pa-100">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="section-head-three mb-60 text-center">
                        <p class="color-white">Newsletter & Subscribe</p>
                        <h2 class="mb-0 color-white">Contact or Subscribe Now to Get the Fastest Talking and Updates with us?</h2>
                    </div>
                    <div class="subscribe-form">
                        <form>
                            <input type="email" name="email" placeholder="Enter Your Email Address">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="instagram-layout-two">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a data-fancybox="Instagram" href="https://via.placeholder.com/1300x800/fd426f/fff">
                            <img src="https://via.placeholder.com/350/ededed/999/" alt="Behome" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a data-fancybox="Instagram" href="https://via.placeholder.com/1300x800/fd426f/fff">
                            <img src="https://via.placeholder.com/350/ededed/999/" alt="Behome" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a data-fancybox="Instagram" href="https://via.placeholder.com/1300x800/fd426f/fff">
                            <img src="https://via.placeholder.com/350/ededed/999/" alt="Behome" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a data-fancybox="Instagram" href="https://via.placeholder.com/1300x800/fd426f/fff">
                            <img src="https://via.placeholder.com/350/ededed/999/" alt="Behome" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
