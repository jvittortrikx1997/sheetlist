<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📝 SheetList</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<header class="d-flex justify-content-between align-items-center">
        <div>
           <h1 class="align-self-start">📝 SheetList</h1>
       </div>
       <div class="ml-auto">
       <nav>
            <ul class="d-flex list-unstyled">
                <li class="mx-2"><a href="{{ route('login') }}">Sign In</a></li>
                <li class="mx-2"><a href="{{ route('register') }}">Sign Up</a></li>
            </ul>
        </nav>
       </div>
</header>
<body>
 <main class="container grid-lg">
    <form method="POST" class="login" name="login" id="login" action="">
        @csrf
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="col-5">
                <div>
                    <div>
                        Username:
                    </div>
                    <div>
                        <input name="username" id="username" type="text">
                    </div>
                    <div>
                        Password:
                    </div>
                    <div>
                        <input name="password" id="password" type="password">
                    </div>
                    <div>
                    </div>
                    <div>
                        <button type="submit">Sign in</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
 </main>
</body>
</html>