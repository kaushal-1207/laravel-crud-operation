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
            <h2>Create Record</h2>
        </center>
        <div class="row mt-3">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        @if (session('existsmsg'))
                        <div class="alert alert-warning" role="alert">
                            {{session('existsmsg')}}
                        </div>
                        @elseif (session('errormsg'))
                        <div class="alert alert-danger" role="alert">
                            {{session('errormsg')}}
                        </div>
                        @endif
                        <form action="/create_record" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name :</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="">Contact :</label>
                                <input type="number" name="contact" id="contact" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="">Profile :</label>
                                <input type="file" name="profile" id="profile" class="" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <button type="submit" name="create" class="btn btn-primary">Create</button>
                            <button type="reset" name="cancel" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
                <center><a type="button" href="/" class="btn btn-warning mt-5"><i
                    class="fa fa-arrow-left"></i> Go Back</a></center>
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
                $(".alert").fadeTo(1000, 0).slideUp(700, function() {
                    $(this).remove();
                });
            }, 2000);

        });
    </script>
</body>

</html>
