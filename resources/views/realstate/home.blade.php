@extends('realstate.layout')

@section('mainsection')

    <section class="subheader subheader-slider">
  <div class="slider-wrap">

    <div class="slider-nav slider-nav-simple-slider">
      <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
      <span class="slider-next"><i class="fa fa-angle-right"></i></span>
    </div>

    <div class="slider slider-simple slider-advanced">

    @foreach($slider as $slide)     
      <div class="slide" style="background-image: url('{{ URL::asset('images/data').'/'.$slide->images->first()->image }}')">
        <div class="img-overlay black"></div>
        <div class="container">
          <div class="slide-price">$250,000</div>
          <div class="slide-content">
            <h1>{{ $slide->contentload->name }}</h1>
            <p class="slide-text">{{ str_limit($slide->contentload->description, 200, ' ...') }}</p>
            <table>
              <tr>
                <td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $slide->category->contentDefault->name }}</td>
                <td><i class="fa fa-bed"></i>{{ $slide->rooms }}</td>
                <td><i class="fa fa-expand"></i>{{ $slide->property_info['size'] }}</td>
                <td><i class="fa fa-user" aria-hidden="true"></i>{{ $slide->guest_number }}</td>
              </tr>
            </table>
            <span class="lable-rent right mobile-lable-flout">{{ $slide->sales == 1 ? 'Sale' : ''}} {{ $slide->rentals == 1 ? 'Rent' : '' }}</span>
            <a href="#" class="button button-icon"><i class="fa fa-angle-right"></i>View Details</a>
          </div>
        </div>
      </div>
    @endforeach
    
    </div><!-- end slider -->
  </div><!-- end slider wrap -->
</section>

<section class="module no-padding-top filter">

  <div class="tabs">

    <div class="filter-header">
      <div class="container">
          <ul>
            <li><a href="#tabs-2">For Sale</a></li>
            <li><a href="#tabs-3">For Rent</a></li>
          </ul>
      </div><!-- end container -->
    </div><!-- end filter header -->

    <div class="container">
      <div id="tabs-2" class="ui-tabs-hide">
          <form class="select-search-form" method="get">
              <div class="filter-item filter-item-7">
                  <label>Property Type</label>
                  <select name="property-type">
                      <option value="">All</option>
                      <option value="1">Apartment</option>
                      <option value="2">Berth / Mooring</option>
                      <option value="3">Building Plot</option>
                      <option value="4">Hotel</option>
                      <option value="5">Penthouse</option>
                      <option value="6">Restaurant</option>
                      <option value="7">Rural Land</option>
                      <option value="8">Townhouse</option>
                      <option value="9">Villa</option>
                      <option value="10">Village House</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label>Location</label>
                  <select name="property-type">
                    <option value="">Any</option>
                    <option value="family-house">Family House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Beds</label>
                    <select name="beds" id="property-beds">
                      <option value="">Any</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Price</label>
                    <div class="slider-price">
                        <div class="price-slider" id="price-slider"></div>
                        <div class="price-slider-values">
                          <span class="price-range-num" id="price-low-value-1"></span>
                          <span class="price-range-num right" id="price-high-value-1"></span>
                      </div>
                    </div>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label class="label-submit">Submit</label><br/>
                  <input type="submit" class="button alt" value="Find Properties" />
                </div>
          </form>
          <form class="prop-search-form" action="">
              <div class="filter-item filter-item-7">
                  <label>Search By Reference:</label>
                  <input class="reference" type="text" name="reference-search" placeholder="Search By Reference:">
                </div>
    
              <div class="filter-item filter-item-7">
                <label class="label-submit">Submit</label><br/>
                <input type="submit" class="button alt" value="Find Properties" />
              </div>
          </form>
      </div><!-- end tab 2 -->

      <div id="tabs-3" class="ui-tabs-hide">
          <form class="select-search-form" method="get">
              <div class="filter-item filter-item-7">
                  <label>Property Type</label>
                  <select name="property-type">
                      <option value="">All</option>
                      <option value="1">Apartment</option>
                      <option value="2">Berth / Mooring</option>
                      <option value="3">Building Plot</option>
                      <option value="4">Hotel</option>
                      <option value="5">Penthouse</option>
                      <option value="6">Restaurant</option>
                      <option value="7">Rural Land</option>
                      <option value="8">Townhouse</option>
                      <option value="9">Villa</option>
                      <option value="10">Village House</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label>Location</label>
                  <select name="property-type">
                    <option value="">Any</option>
                    <option value="family-house">Family House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                  </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Beds</label>
                    <select name="beds" id="property-beds">
                      <option value="">Any</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                </div>
      
                <div class="filter-item filter-item-7">
                    <label>Price</label>
                    <div class="slider-price">
                        <div class="price-slider" id="price-slider"></div>
                        <div class="price-slider-values">
                          <span class="price-range-num" id="price-low-value-1"></span>
                          <span class="price-range-num right" id="price-high-value-1"></span>
                      </div>
                    </div>
                </div>
      
                <div class="filter-item filter-item-7">
                  <label class="label-submit">Submit</label><br/>
                  <input type="submit" class="button alt" value="Find Properties" />
                </div>
          </form>
          <form class="prop-search-form" action="">
              <div class="filter-item filter-item-7">
                  <label>Search By Reference:</label>
                  <input class="reference" type="text" name="reference-search" placeholder="Search By Reference:">
                </div>
    
              <div class="filter-item filter-item-7">
                <label class="label-submit">Submit</label><br/>
                <input type="submit" class="button alt" value="Find Properties" />
              </div>
          </form>
      </div><!-- end tab 3 -->

    </div><!-- end container -->
  </div><!-- end tabs -->
</section>


<section class="module properties">
  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 sale-home-list">
            <div class="module-header">
                <h2>Sales</h2>
                <img src="/realstate/images/divider.png" alt="" />
            </div>
            <div class="row">
                @foreach($sales_properties as $sales_property)
                    <div class="col-lg-12 col-md-12">
                        <div class="property shadow-hover">
                        <a href="#" class="property-img">
                            <div class="img-fade"></div>
                            <div class="property-tag lable-sale featured">Sale</div>
                            <div class="property-price">$150,000</div>
                            <div class="property-color-bar"></div>
                            <div class="prop-img-home">
                                <img src="{{ URL::asset('images/data').'/'.$sales_property->images->first()->image }}" alt="" />
                            </div>
                        </a>
                        <div class="property-content">
                            <div class="property-title">
                            <h4><a href="#">{{ $sales_property->contentload->name }}</a></h4>
                            </div>
                            <table class="property-details">
                            <tr>
                                <td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $sales_property->category->contentDefault->name }}</td>
                                <td><i class="fa fa-bed"></i>{{ $sales_property->rooms }}</td>
                                <td><i class="fa fa-expand"></i>{{ $sales_property->property_info['size'] }}</td>
                                <td><i class="fa fa-user" aria-hidden="true"></i>{{ $sales_property->guest_number }}</td>
                            </tr>
                            </table>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="center"><a href="#" class="button button-icon more-properties-btn btn-showMore-home"><i class="fa fa-angle-right"></i> View More Sales</a></div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 rentals-home-list">
            <div class="module-header">
                <h2>Rentals</h2>
                <img src="/realstate/images/divider.png" alt="" />
            </div>
            <div class="row">
            @foreach($rentals_properties as $rentals_property)
                <div class="col-lg-12 col-md-12">
                    <div class="property shadow-hover">
                        <a href="#" class="property-img">
                        <div class="img-fade"></div>
                        <div class="property-tag lable-rent featured">Rent</div>
                        <div class="property-price">
                          <div>
                          ${{ $rentals_property->prices['d_5'] }} <span>weekly</span>
                          </div>
                          <div>
                            ${{ $rentals_property->prices['d_30'] }} <span>monthly</span>
                          </div>
                        </div>
                        <div class="property-color-bar"></div>
                        <div class="prop-img-home">
                            <img src="{{ URL::asset('images/data').'/'.$rentals_property->images->first()->image }}" alt="" />
                        </div>
                        </a>
                        <div class="property-content">
                        <div class="property-title">
                        <h4><a href="#">{{ $rentals_property->contentload->name }}</a></h4>
                        </div>
                        <table class="property-details">
                            <tr>
                                <td><i class="fa fa-home" aria-hidden="true"></i></i>{{ $rentals_property->category->contentDefault->name }}</td>
                                <td><i class="fa fa-bed"></i>{{ $rentals_property->rooms }}</td>
                                <td><i class="fa fa-expand"></i>{{ $rentals_property->property_info['size'] }}</td>
                                <td><i class="fa fa-user" aria-hidden="true"></i>{{ $rentals_property->guest_number }}</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                 </div>
                 @endforeach
            
            <div class="center"><a href="#" class="button button-icon more-properties-btn btn-showMore-home"><i class="fa fa-angle-right"></i> View More Rentals</a></div>
            </div><!-- end row -->
        </div>
      </div> 
  </div><!-- end container -->
</section>

@endsection