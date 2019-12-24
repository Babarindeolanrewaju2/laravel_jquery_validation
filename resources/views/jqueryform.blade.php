<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <style>
   .error{
       color:red;
       }
  </style>
</head>

<body>

<div class="container">
    <h2>Laravel 6 jquery validation</h2>
    <br>
    <br>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
    </div>
    <br>
    @endif

    <form id="customerform" method="post" action="{{url('save')}}">
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group">
        <label for="email">Email Id</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>
      <div class="form-group">
        <label for="mobile_number">Mobile Number</label>
        <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Please enter mobile number">
        <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
      </div>
      <div class="form-group">
       <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>

</div>
<script>
   if ($("#customerform").length > 0) {
    $("#customerform").validate({

    rules: {
      name: {
        required: true,
        maxlength: 50
      },

       mobile_number: {
            required: true,
            digits:true,
            minlength: 6,
            maxlength:12,
        },
        email: {
                required: true,
                maxlength: 50,
                email: true,
            },
    },
    messages: {

      name: {
        required: "Please enter name",
      },
      mobile_number: {
        required: "Please enter contact number",
        minlength: "The contact number should be 10 digits",
        digits: "Please enter only numbers",
        maxlength: "The contact number should be 10 digits",
      },
      email: {
          required: "Please enter an email",
          email: "Please enter valid email",
        },

    },
    })
  }
</script>
</body>
</html>
