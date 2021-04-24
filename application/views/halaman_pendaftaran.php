<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container">

        <form method="POST" id="simpan">
            <h1>Tambah Data</h1>

            <div class="form-group">
                <label for="nim">NPM</label>
                <input type="email" class="form-control" id="nim" name="nim">
                <small class="nim-error"></small>
            </div>
            <div class="form-group">
                <label for="name">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="name" name="name">
                <small class="name-error"></small>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
                <small class="username-error"></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <small class="email-error"></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="password-error"></small>
            </div>
            <div class="form-group">
                <label for="passconf">Ketik Ulang Password</label>
                <input type="password" class="form-control" id="passconf" name="passconf">
                <small class="passconf-error"></small>
            </div>
            <div class="form-group">
                <label for="phone">No Hp</label>
                <input type="number" class="form-control" id="phone" name="phone">
                <small class="phone-error"></small>
            </div>


            <input type="button" id="validasi" name="" class="btn btn-primary" value="Simpan Data">

        </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <script>
        var baseUrl = '<?= base_url() ?>';
        $('#validasi').on('click', function() {
            var data = $('#simpan').serialize();
            $.ajax({
                url: baseUrl + 'Pendaftaran/validasi/',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(data) {
                    if (data !== 'sukses') {
                        $(".username-error").html(data.username);
                        $(".email-error").html(data.email);
                        $(".password-error").html(data.password);
                        $(".passconf-error").html(data.passconf);
                        $(".nim-error").html(data.nim);
                        $(".phone-error").html(data.phone);
                        $(".name-error").html(data.name);
                    } else {
                        $("#nim").val("");
                        $("#name").val("");
                        $("#username").val("");
                        $("#password").val("");
                        $("#email").val("");
                        $("#phone").val("");
                    }
                }
            })
            $("#simpan").load('<?= base_url('Pendaftaran/getAll/'); ?>');
        })
    </script>
</body>

</html>