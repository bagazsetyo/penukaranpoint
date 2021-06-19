<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('/') }}">Toko Saya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            @auth
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.dashboard.index') }}">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('cart') }}">Cart</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
              </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
            @guest
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endguest
          </ul>
        </div>
      </nav>

      <div class="mt-5 mb-5">
        <div class="container">
            <div class="card card-body">
                <div class="mb-4">
                    Keranjang Anda
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-success">
                            <tr>
                                <td>name</td>
                                <td>price</td>
                                <td>image</td>
                                <td width="10%;">delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->price }}</td>
                                <td><img src="{{ url('image',$item->product->image) }}" width="200px;" alt=""></td>
                                <td>
                                    <a href="{{ route('delete-cart',$item->id) }}" class="btn btn-danger btn-xs">x</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">Tidak Ada Data</td>
                            </tr>
                            @endforelse

                            <tr>
                                <td colspan="4" class="text-right">
                                    Price : Rp. {{ number_format($items->sum('product_sum_price')) ?? 0 }} <br>
                                    <a href="{{ route('trnsaction') }}" class="btn btn-success">Beli</a>
                                </td>   
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>
