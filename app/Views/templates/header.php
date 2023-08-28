<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?php if (url_is('home')) echo 'active'; ?>" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (url_is('news')) echo 'active'; ?>" href="/news">All news</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (url_is('news/create')) echo 'active'; ?>" href="/news/create">Create news</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  