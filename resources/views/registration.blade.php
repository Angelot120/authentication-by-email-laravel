<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Authetication</title>

</head>

<body>
    <div class="container-fluid row mt-5">
        <div class="col"></div>
        <div class="col card p-4">
            <form action="{{ route('registration.process') }}" method="POST">
                @csrf
                <h1 class="text-primary">Inscription</h1>

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                @endif

                @if ($message = Session::get('error'))
                    <div>{{ $message }}</div><br>
                @endif

                <div class="form-floating">
                    <input type="text" name="name" id="name" placeholder="Saisir le nom ici..."
                        class="form-control"><br><br>
                    <label for="name">Nom d'utilisateur</label><br>
                </div>

                <div class="form-floating">
                    <input type="text" name="email" id="email" placeholder="Saisir l'email ici..."
                        class="form-control"><br><br>
                    <label for="email">Email</label><br>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici..."
                        class="form-control"><br><br>
                    <label for="password">Mot de passe</label><br>

                </div>

                <div class="d-flex">
                    <a href="{{ route('login') }}" class="me-5">Se connecter</a><br><br>

                    <button type="submit" class="btn btn-primary">Soumettre</button>
    
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</body>

</html>
