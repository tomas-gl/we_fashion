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

<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" @if($admin) @else href="{{route('index')}}" @endif style="color:#66EB9A;">WE FASHION</a>
    <button class="navbar-toggler toggler-example" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1"
    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
        class="fas fa-bars fa-1x"></i></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if($admin) 
          <li class="nav-item">
              <a class="nav-link" href="{{url('admin/products')}}">PRODUITS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/categories')}}">CATEGORIES</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.status', $status)}}">SOLDES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.category', $categ_homme)}}">HOMME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.category', $categ_femme)}}">FEMME</a>
          </li>
        @endif
        </ul>
        @if($admin)
          <a class="navbar-brand" href="{{route('index')}}"><i class="fa fa-store pe-2"></i>Site client</a>
        @endif
    </div>
  </div>
</nav>