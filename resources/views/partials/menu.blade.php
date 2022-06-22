@php
   $categ_homme = 1;
   $categ_femme = 2;
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url("products")}}">WE FASHION</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{url("products/solde")}}">SOLDE</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url("products/".$categ_homme)}}">HOMME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url("products/".$categ_femme)}}">FEMME</a>
            </li>
          </ul>
      </div>
    </div>
  </nav>