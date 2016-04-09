<!-- Header -->
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">ProgQuest <strong>ADMIN</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main_menu">
      
      <ul class="nav navbar-nav">
        <li><a href="{{ url('/') }}">App Home</a></li>
        <li><a href="{{ url('admin/users') }}">Users</a></li>
        <li><a href="{{ url('admin/languages') }}">Languages</a></li>
      </ul>

      @include('shared.user_actions')

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- End of Header -->