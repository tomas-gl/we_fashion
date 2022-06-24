@php
  $route = Request::url();
  if(str_contains($route, 'admin'))
  {
    $admin = true;
  }
  else{
    $admin = false;
  }
  $status = 1;
  $categ_homme = 1;
  $categ_femme = 2;
@endphp

@if($admin)
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('index')}}">WE FASHION</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/products')}}">PRODUITS</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/categories')}}">CATEGORIES</a>
            </li>
          </ul>
      </div>
    </div>
  </nav>
@else
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('index')}}">WE FASHION</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link" href="{{route('product.status', $status)}}">SOLDES</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.category', $categ_homme)}}">HOMME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.category', $categ_femme)}}">FEMME</a>
          </li>
        </ul>
    </div>
  </div>
</nav>
@endif