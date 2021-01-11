<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        .margin-top {
            margin-top: 50px;
        }

        .align-right {
            position: absolute;
            right: 10px;
            top: 5px;
        }
    </style>
</head>
<body>
<div class="container margin-top">
    <div class="row">
        <div class="column-50">
            <h1 class="center">
                Student List
            </h1>
        </div>
        <div class="column-50 align-right">
            <button class="button" onclick="renderStudentInfo()">Load</button>
        </div>
    </div>
    <div class="row">

        <div id="student_records">

        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>

    function renderStudentInfo()
    {
        $.get('{{ route('get-student-information') }}', {}, function (response){

            $("#student_records").html(response)

        }).fail(function () {
            alert('There is some error.Try after some time.');
        })
    }

</script>
</body>
</html>
