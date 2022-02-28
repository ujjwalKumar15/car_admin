<div class="main-container col2-left-layout ">
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li class="home"> <a href="{{ url('dashboard') }}" title="Go to Home Page">Home</a></li>
                <li class="category4"> <strong>Products</strong></li>
            </ul>
        </div>
    </div>
    <!--- .breadcrumbs-->
    <div class="container">
        <div class="main">
            <div class="row">
                <div class="col-left sidebar col-lg-3 col-md-3 col-sm-3 left-color color">

                    <div class="block block-layered-nav block-layered-nav--no-filters">
                        <div class="block-title"> <strong><span>Shop By</span></strong></div>
                        <div class="block-content toggle-content">
                            <p class="block-subtitle block-subtitle--filter">Filter</p>
                            <dl id="narrow-by-list">
                                <dt class="even">By Price</dt>
                                <dd class="even">
                                    <div class="slider-ui-wrap">
                                        <div id="price-range" class="slider-ui" slider-min="0" slider-max="1000"
                                            slider-min-start="25" slider-max-start="689"></div>
                                    </div>
                                    <form action="#" class="price-range-form">
                                        <input type="text" class="range_value range_value_min" target="#price-range" />
                                        - <input type="text" class="range_value range_value_max"
                                            target="#price-range" />
                                        <input type="submit" class="btn-submit" value="OK" />
                                    </form>
                                </dd>
                                <dt class="odd">By Brands</dt>
                                <dd class="odd">
                                    <ul style="" class="nav-accordion">
                                        <li class="level0 level-top"><a href="#"
                                                class="level-top"><span>Hermes</span></a></li>
                                        <li class="level0 level-top"><a href="#" class="level-top"><span>Dolce &
                                                    Gabbana</span></a></li>
                                        <li class="level0 level-top"><a href="#" class="level-top"><span>Louis
                                                    Vuitton</span></a></li>
                                        <li class="level0 level-top"><a href="#"
                                                class="level-top"><span>Versace</span></a></li>
                                        <li class="level0 level-top"><a href="#" class="level-top"><span>Hug
                                                    Boss</span></a></li>
                                    </ul>
                                </dd>
                                <dt class="even">By Colors</dt>
                                <dd class="even">
                                    <ol class="configurable-swatch-list">
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/black.png" alt="Black" title="Black"
                                                        height="15" width="15"> </span> <span
                                                    class="count">Black(2)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/blue.png" alt="Blue" title="Blue"
                                                        height="15" width="15"> </span> <span
                                                    class="count">Blue(4)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/blue.png" alt="Blue" title="Blue"
                                                        height="15" width="15"> </span> <span
                                                    class="count">Blue(2)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/indigo.png" alt="Indigo" title="Indigo"
                                                        height="15" width="15"> </span> <span
                                                    class="count">Indigo(1)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/orange.png" alt="orange" title="orange"
                                                        height="15" width="15"> </span> <span
                                                    class="count">orange(1)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/pink.png" alt="pink" title="pink"
                                                        height="15" width="15"> </span> <span
                                                    class="count">pink(2)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/red.png" alt="Red" title="Red" height="15"
                                                        width="15"> </span> <span class="count">Red(4)</span>
                                            </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/taupe.png" alt="Taupe" title="Taupe"
                                                        height="15" width="15"> </span> <span
                                                    class="count">Taupe(1)</span> </a></li>
                                        <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label">
                                                    <img src="assets/images/yellow.png" alt="yellow" title="yellow"
                                                        height="15" width="15"> </span> <span
                                                    class="count">yellow(2)</span> </a></li>
                                    </ol>

                            </dl>
                        </div>
                    </div>
                    <!--- .block-layered-nav-->

                    <div class="magicproduct_active magicproduct mage-custom">

                        <div class="content-products" data-margin="30" data-slider="null"
                            data-options='{"480":"1","640":"1","768":"1","992":"1","993":"1"}'>
                            <div class="mage-magictabs mc-saleproduct">

                            </div>
                        </div>
                    </div>
                </div>
                <!--- .sidebar-->
                <div class="col-main col-lg-9 col-md-9 col-sm-9 col-xs-12 content-color color">
                    <div class="page-title category-title">
                        <h1>Men</h1>
                    </div>
                    <p class="category-image"><img src="assets/images/categories_grid_1.jpg" alt="Men" title="Men"></p>
                    <div class="category-products">
                        <div class="toolbar">
                            <div class="sorter">
                                <p class="view-mode"> <label>View as:</label> <a href="{{ url('gridview') }}"
                                        title="Grid" class="grid active"> <i class="icon-grid icons"></i> </a> <a
                                        href="{{ url('list') }}" title="List" class="redirectjs list"> <i
                                            class="icon-list icons"></i> </a></p>
                                <div class="sort-by">
                                    <label>Sort By</label>
                                    <select>
                                        <option value="position" selected="selected"> Position</option>
                                        <option value="name"> Name</option>
                                        <option value="price"> Price</option>
                                    </select>
                                    <a href="#" title="Set Descending Direction"><img
                                            src="assets/images/i_asc_arrow.gif" alt="Set Descending Direction"
                                            class="v-middle"></a>
                                </div>
                                <div class="limiter">
                                    <label>Show</label>
                                    <select>
                                        <option value="9" selected="selected"> 9</option>
                                        <option value="12"> 12</option>
                                        <option value="15"> 15</option>
                                    </select>
                                </div>
                                <div class="pager">
                                    <div class="pages">
                                        <strong>Page:</strong>
                                        <ol>
                                            <li class="current">1</li>
                                            <li><a href="#">2</a></li>
                                            <li class="bor-none"> <a class="next i-next" href="#" title="Next">
                                                    <i class="fa fa-angle-right">&nbsp;</i> </a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- .toolbar-->
