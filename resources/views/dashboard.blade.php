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

    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/all.min.css') }}">

    <title>Authentication</title>
</head>

<body>

    <div class="container">
        <br>
        <table width="100%">
            <tbody>
                <tr>
                    <td>
                        <h2>Tableau de bord</h2>
                    </td>

                    <td>
                        <h4>Bienvenue {{ Auth::user()->name }}</h4>
                    </td>

                    <td class="text-end">
                        <a href="{{ route('logout') }}">Se déconnecter</a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>


    <br><br>

    @if (Auth::user()->is_admin)



        <div class="container shadow-lg p-3 mb-5 bg-body rounded">


            @if ($message = Session::get('sucess'))
                <div class="alert alert-success">{{ $message }}</div><br>
            @endif


            <div class="text-end">
                <a href="{{ route('user.show') }}" class="btn btn-primary">Créer</a>
            </div>

            <h3>Liste des utilisateurs</h3>
            <br>

            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>E-mail</th>
                            <th>Nom complet</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
    
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('user.update', $user->id) }}" class="btn btn-primary me-2">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
    
                                    <form action="{{ route('user.delete', $user->id) }}" method="post">
                                        @csrf
                                        
                                        <button onclick="return confirm('Voulez vous vraiment supprimer cet utilisateur ?')"
                                            class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    @else
        <div class="container">
            <h3>Bienvenue Utilisateur Lambda.</h3>
        </div>

    @endif

</body>


</html>
