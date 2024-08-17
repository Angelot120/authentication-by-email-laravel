<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ URL::asset('assets/Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/Bootstrap/js/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/all.min.css') }}">

    <title>Créer un utilisateur</title>
</head>

<body>
    <br><br><br>
    <div class="container-fluid row mt-5">
        <div class="col">
            <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i>
            </a>
        </div>
        <div class="col card p-4">
            <form action="{{ route('user.create') }}" method="POST">
                @csrf
                <h1 class="text-primary">Création d'utilisareur</h1>

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                @endif

                @if ($message = Session::get('error'))
                    <div>{{ $message }}</div><br>
                @endif

                <br>

                <p>Une fois l'utilisateur créé vérifier dans la boite de l'email renseigné ci dessous pour récupérer le
                    mot de passe.</p>

                <div class="form-floating">
                    <input type="text" name="name" id="name" placeholder="Saisir le nom ici..."
                        class="form-control" required><br><br>
                    <label for="name">Nom complet de l'utilisateur</label><br>
                </div>
                <div class="form-floating">
                    <input type="text" name="email" id="email" placeholder="Saisir l'email ici..."
                        class="form-control" required><br><br>
                    <label for="email">Email de l'utilisateur</label><br>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</body>

</html>
