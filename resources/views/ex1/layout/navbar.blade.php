<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-danger" href="{{route('color.red')}}">Red</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-success" href="{{route('color.green')}}">Green</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-primary" href="{{route('color.blue')}}">Blue</a>
        </li>
      </ul>
    </div>
</nav>