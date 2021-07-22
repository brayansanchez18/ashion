<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
  <div class="offcanvas__close">+</div>

  <ul class="offcanvas__widget">
    <li><span class="icon_search search-switch"></span></li>

    <!-- <li>
      <a href="#">
        <span class="icon_heart_alt"></span>
        <div class="tip">2</div>
      </a>
    </li>

    <li>
      <a href="#">
        <span class="icon_bag_alt"></span>
        <div class="tip">2</div>
      </a>
    </li> -->
  </ul>

  <div class="offcanvas__logo">
    <a href="./index.html"><img src="<?=$frontend?>vistas/img/logo.png" class="logo" alt=""></a>
  </div>

  <div id="mobile-menu-wrap"></div>

  <div class="offcanvas__auth">
    <a href="#">INGRESAR</a>
    <a href="#">REGISTRARSE</a>
  </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-3 col-lg-2">
        <div class="header__logo">
          <a href="<?=$frontend?>"><img src="<?=$frontend?>vistas/img/logo.png" class="logo" alt=""></a>
        </div>
      </div>

      <div class="col-xl-6 col-lg-7">
        <nav class="header__menu">
          <ul class="text-center">
            <li class="active"><a href="./index.html">Inicio</a></li>
            <li><a href="./shop.html">Tienda</a></li>
            <li><a href="./shop.html">Contacto</a></li>
            <!-- <li><a href="#">Men’s</a></li>
            <li><a href="./shop.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="./product-details.html">Product Details</a></li>
                    <li><a href="./shop-cart.html">Shop Cart</a></li>
                    <li><a href="./checkout.html">Checkout</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li> -->
          </ul>
        </nav>
      </div>

      <div class="col-lg-3">
        <div class="header__right">
          <div class="header__right__auth">
            <a href="#">INGRESAR</a>
            <a href="#">REGISTRARSE</a>
          </div>

          <ul class="header__right__widget">
            <li><span class="icon_search search-switch"></span></li>
            <!-- <li>
              <a href="#">
                <span class="icon_heart_alt"></span>
                <div class="tip">2</div>
              </a>
            </li>

            <li>
              <a href="#">
                <span class="icon_bag_alt"></span>
                <div class="tip">2</div>
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
    <div class="canvas__open">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</header>
<!-- Header Section End -->

<!-- Search Begin -->
<div class="search-model">
  <div class="h-100 d-flex align-items-center justify-content-center">
    <div class="search-close-switch">+</div>
    <form class="search-model-form">
      <input type="text" id="search-input" placeholder="Que es lo que buscas?...">
    </form>
  </div>
</div>
<!-- Search End -->