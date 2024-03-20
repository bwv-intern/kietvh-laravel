{{-- https://redmine.bridevelopment.com/issues/126182 --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Validation</h3>
                    </div>
                    {{-- @if (session('errors'))
                            <div class="alert alert-danger my-1">
                                {{ session('errors') }}
                            </div>
                        @endif --}}
                    <form id="formValidateExample" name="formValidateExample" method="POST" action="/validation">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputRequired">Required input</label>
                                <input type="text" class="form-control" id="exampleInputRequired"
                                    name="requiredInput" placeholder="Enter input">
                                <span id="exampleInputRequiredError" class="text-danger">
                                    {{ \App\Helpers\ErrorHelper::displayError($errors, 'requiredInput') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMaxMinLength">Max length - Min length</label>
                                <input type="text" class="form-control" id="exampleInputMaxMinLength"
                                    name="maxMinLengthInput" placeholder="Enter input">
                                <span id="exampleInputMaxMinLengthError" class="text-danger">
                                    {{ \App\Helpers\ErrorHelper::displayError($errors, 'maxMinLengthInput') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail" name="emailInput"
                                    placeholder="Enter Email">
                                <span id="exampleInputEmailError" class="text-danger">
                                    {{ \App\Helpers\ErrorHelper::displayError($errors, 'emailInput') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDigits">Digits</label>
                                <input type="text" class="form-control" id="exampleInputDigits" name="digitsInput"
                                    placeholder="Enter Digits">
                                <span id="exampleInputDigitsError" class="text-danger">
                                    {{ \App\Helpers\ErrorHelper::displayError($errors, 'digitsInput') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber">Number</label>
                                <input type="number" class="form-control" id="exampleInputNumber" name="numberInput"
                                    placeholder="Enter Number">
                                <span id="exampleInputNumberError" class="text-danger">
                                    {{ \App\Helpers\ErrorHelper::displayError($errors, 'numberInput') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDate">Date</label>
                                <input type="text" class="form-control" id="exampleInputDate" name="dateInput"
                                    placeholder="Enter Date">
                                <span id="exampleInputDateError" class="text-danger">
                                    {{ \App\Helpers\ErrorHelper::displayError($errors, 'dateInput') }}
                                </span>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputChar">Char 1 byte, 2 -byte</label>
                                <input type="text" class="form-control" id="exampleInputChar" name="charInput"
                                    placeholder="Enter Char">
                                <span id="exampleInputCharError" class="text-danger"></span>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputChar">Kanji</label>
                                <input type="text" class="form-control" id="exampleInputChar" name="charInput"
                                    placeholder="Enter Char">
                                <span id="exampleInputCharError" class="text-danger"></span>
                            </div> --}}
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        $().ready(function() {
            // Validate date format dd/MM/yyyy
            $.validator.addMethod(
                "dateITA",
                function(value, element) {
                    // dd/MM/yyyy format
                    return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
                },
                "Please enter a date in the format dd/MM/yyyy"
            );

            //validate char 1byte -2 byte
            $.validator.addMethod("byteLength", function(value, element, params) {
                var length = value.replace(/[^\x00-\xff]/g, "aa")
                .length; // Each two-byte character is replaced by 'aa'
                return this.optional(element) || (length >= params[0] && length <= params[1]);
            }, "Please enter a value with byte length between 0 and 1.");

            // validate form
            $("#formValidateExample").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "requiredInput": {
                        required: true,
                    },
                    "maxMinLengthInput": {
                        required: true,
                        minlength: 8,
                        maxlength: 20
                    },
                    "emailInput": {
                        required: true,
                        email: true
                    },
                    "digitsInput": {
                        required: true,
                        digits: true
                    },
                    "numberInput": {
                        required: true,
                        number: true
                    },
                    "dateInput": {
                        required: true,
                        dateITA: true
                    },
                    "charInput":{
                        required: true,
                        byteLength: true
                    }
                },
                messages: {
                    "requiredInput": {
                        required: "This field is required"
                    },
                    "maxMinLengthInput": {
                        minlength: "Minimum length is 8 characters",
                        maxlength: "Maximum length is 20 characters"
                    },
                    "emailInput": {
                        required: "Please enter an email address",
                        email: "Please enter a valid email address"
                    },
                    "digitsInput": {
                        required: "Please enter digits only",
                        digits: "Please enter a valid number"
                    },
                    "numberInput": {
                        required: "Please enter a number",
                        number: "Please enter a valid number"
                    },
                    "dateInput": {
                        required: "Please enter a date",
                        dateITA: "Please enter a date in the format dd/MM/yyyy"
                    }
                }
            });
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" inte
        grity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
