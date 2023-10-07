<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title></title>
</head>

<style>
  .navbar{
    background: rgb(9,42,79);
    background: linear-gradient(90deg, rgba(9,42,79,1) 0%, rgba(5,68,79,1) 32%, rgba(8,70,62,1) 100%);
    -webkit-box-shadow: 2px 4px 21px -10px rgba(66, 68, 90, 1);
    -moz-box-shadow: 2px 4px 21px -10px rgba(66, 68, 90, 1);
    box-shadow: 2px 4px 21px -10px rgba(66, 68, 90, 1);
  }
  .nav-text{
    font-size: 0.7rem;
    font-weight: bold;
    color: white;
  }
  .search-btn{
    background-color: #338a7e;
    color: white;
    font-weight: bold;
  }
  a:hover{
    color: yellow;
  }
</style>

<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary mb-3">
  <div class="container-fluid">
    <a class="navbar-brand nav-text" href={{route('signin.form')}}>Portal</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      	
        @if(session() -> has('user_id'))

        <li class="nav-item">
          <a class="nav-link nav-text" aria-current="page" href={{route('student.list')}}>List</a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-text" href={{route('student.register.form')}}>Add-Student</a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-text" href={{route('subject.form')}}>Subjects</a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-text" href={{route('user.logout')}}>Logout</a>
        </li>
        @endif

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn search-btn" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
