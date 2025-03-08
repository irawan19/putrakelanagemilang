<header>
    <div class="header-top wow fadeIn">
        <div class="container">
            <a class="navbar-brand" href="{{URL('/')}}"><img src="{{URL::asset('template/front/images/logo.png')}}" alt="image"></a>
            <div class="right-header">
                <div class="header-info">
                <div class="info-inner">
                    <span class="icontop"><img src="{{URL::asset('template/front/images/phone-icon.png')}}" alt="#"></span>
                    <span class="iconcont"><a href="tel:800 123 456">{{ $kontak->telepon_kontaks }}</a></span>	
                </div>
                <div class="info-inner">
                    <span class="icontop"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <span class="iconcont"><a data-scroll href="mailto:info@yoursite.com">{{ $kontak->email_kontaks }}</a></span>	
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom wow fadeIn">
        <div class="container">
            <nav class="main-menu">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
                </div>
                
                <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a class="active" href="#beranda">Beranda</a></li>
                    <li><a data-scroll href="#tentang-kami">Tentang Kami</a></li>
                    <li><a data-scroll href="#layanan">Layanan</a></li>
                    <li><a data-scroll href="#katalog">Katalog</a></li>
                    <li><a data-scroll href="#kontak">Kontak</a></li>
                </ul>
                </div>
            </nav>
            <div class="serch-bar">
                <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="Search" />
                    <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="button">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    </span>
                </div>
                </div>
            </div>
        </div>
    </div>
</header>