<!doctype html>
<html lang="en">

<head>
    <title>Laravel CRUD Operation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <style>
        body {
            font-family: Verdana;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <center>
            <h2>Laravel CRUD Operation</h2>
        </center>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a type="button" href="create" class="btn btn-success" style="background-color: #17a2b8;"><i
                                class="fas fa-plus"></i> Add Records</a><br>

                        @if (session('deletemsg'))
                            <div class="alert alert-danger" style="margin-top: 3%;" role="alert">
                                {{session('deletemsg')}}
                            </div>
                        @endif
                        <table class="table table-bordered mt-3">
                            <thead align="center">
                                <tr>
                                    <th scope="col">Sr No.</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @php
                                    $count = 0;
                                @endphp
                                @if ($number_of_rows != 0)
                                    @foreach ($customerdetails as $customerdetail)
                                        <tr>
                                            <th scope="row">{{ $count = $count + 1 }}</th>
                                            <td>
                                                @if ($customerdetail->profile != '')
                                                    <a href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/customerimage/{{ $customerdetail->profile }}"
                                                            class="" alt="Avatar" width=80px height="80px"></a>
                                                @else
                                                    <a href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/customerimage/noimg.png"
                                                            class="" alt="Avatar" width=80px height="80px"></a>
                                                @endif
                                            </td>
                                            <td>{{ $customerdetail['name'] }}</td>
                                            <td>{{ $customerdetail['email'] }}</td>
                                            <td>{{ $customerdetail['contact'] }}</td>
                                            <td>
                                                <a href="edit/{{ $customerdetail['id'] }}" type="button"
                                                    class="btn"><i class="fas fa-edit"></i></a>
                                                <a href="delete/{{ $customerdetail['id'] }}" type="button"
                                                    class="btn"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No Records Available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div>
                            {{ $customerdetails->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            window.setTimeout(function() {
                $(".alert").fadeTo(700, 0).slideUp(700, function() {
                    $(this).remove();
                });
            }, 700);

        });
    </script>
</body>

</html>
