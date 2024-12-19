<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>

<main>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <div class="row">
                <div class="offset-11 col-md-1 ">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </header>

        <div class="bg-light rounded-3">
            <div class="container-fluid">

                @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
                @endsession

                <h1>Hi, {{ auth()->user()->name }}</h1>
            </div>
        </div>

        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body row">
                            <table id="todolist" class="display responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>{{ 'Id' }}</th>
                                    <th>{{ 'Task name' }}</th>
                                    <th>{{ 'Description' }}</th>
                                    <th>{{ 'Priority' }}</th>
                                    <th>{{ 'Status' }}</th>
                                    <th>{{ 'Due' }}</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>

<script>
    $('#todolist').DataTable( {
        responsive: true
    } );
</script>

</body>
</html>
