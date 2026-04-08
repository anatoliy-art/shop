<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}" wire:navigate wire:current.strict="active" aria-current="page">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.orders.index') }}">Orders</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.comments.index') }}">Comments</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Option
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('admin.options.index') }}">List</a>
          <a class="dropdown-item" href="{{ route('admin.options.create') }}">Create</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('admin.categories.index') }}">List</a>
          <a class="dropdown-item" href="{{ route('admin.categories.create') }}">Create</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Product
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('admin.products.index') }}">List</a>
          <a class="dropdown-item" href="{{ route('admin.products.create') }}">Create</a>
        </div>
      </li>

    </ul>

    <a class="nav-link" href="{{ route('logout') }}" style="color: #666;">Logout</a>

  </div>
</nav>