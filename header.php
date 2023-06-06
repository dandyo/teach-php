<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-xl">
                <a class="navbar-brand" href="/">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Stories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <form class="search-form">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
                        </div>
                    </form>
                    <ul class="navbar-nav ms-auto pe-1">
                        <li class="nav-item">
                            <a class="nav-link" href="cart.html"><i class="bi bi-bag"></i> 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>