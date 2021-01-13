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

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #46484a;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
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
            <button class="button" onclick="renderStudentInfo()">Show</button>
        </div>
    </div>

    <div class="row">
        <div class="column column-offset-33">
            <div class="loader" hidden></div>
        </div>
    </div>

    <div class="row">
        <div id="student_records"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

    function renderStudentInfo() {

        $(".loader").removeAttr("hidden")

        $.get('{{ route('get-student-information') }}', {}, function (response) {

            if (response){

                $(".loader").remove()
            }

            $("#student_records").append(response)

        }).fail(function () {
            alert('There is some error.Try after some time.');
        })
    }


</script>

</body>
</html>
