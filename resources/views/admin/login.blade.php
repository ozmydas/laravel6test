
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login Example - Semantic</title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

  <style type="text/css">
    body {
      background: url('{{ asset('assets/img/bg1.jpg') }}');
  }
  body > .grid {
      height: 100%;
  }
  .image {
      margin-top: -100px;
  }
  .column {
      max-width: 450px;
  }
</style>
<script>
  $(document)
  .ready(function() {
      $('.ui.form')
      .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
              {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
              },
              {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
              }
              ]
          },
          password: {
              identifier  : 'password',
              rules: [
              {
                  type   : 'empty',
                  prompt : 'Please enter your password'
              },
              {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
              }
              ]
          }
      }
  })
      ;
  })
  ;
</script>
</head>
<body>
    <div style="background: rgba(0,0,0,.5); height: 100%; width: 100%; display: flex; align-items: center; justify-content: center;">

        <div class="ui middle aligned center aligned grid" style="min-width: 400px; margin-top: -100px">
          <div class="column">
            <h2 class="ui teal image header">
              <div class="content">
                Log-in to your account
            </div>
        </h2>
        <form class="ui large form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="ui stacked segment">
                <div class="field">
                  <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="email" name="email" placeholder="E-mail address">
                </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="ui fluid large teal submit button">Login</div>
    </div>

</form>


@if ($message = Session::get('error'))
  <div class="ui error message">
    {{ $message }}
  </div>
@endif

<div class="ui message">
  New to us? <a href="#">Sign Up</a>
</div>
</div>
</div>

</div>
</body>

</html>
