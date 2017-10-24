<?php 
$this->load->view('essentials/hasSessionChecker.php');
$this->load->view('essentials/headerSrc.php');?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html">The <b>CROMA</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  


<?php
  var_dump(base_url());
?>
    <div id="login_failed" class="alert alert-danger alert-dismissible hidden">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Login failed!</h4>
        You have entered a wrong Username and/or Password. Please try again.
    </div>
    <div id="login_success" class="alert alert-success alert-dismissible hidden">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        Success alert preview. This alert is dismissable.
    </div>
<?php //echo form_open('login/login_verification');?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="Username" id="sUsername" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="Password" id="sPassword" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button class="btn btn-primary btn-block btn-flat" onclick="signIn();">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
<?php $this->load->view('essentials/footerSrc.php');?>
<script type="text/javascript">
    function signIn() {
        $.ajax({
            url: '<?=base_url()?>contLogin/login',
            type: 'POST',
            data: {
                sUsername: $('#sUsername').val().trim(),
                sPassword: $('#sPassword').val().trim()
            },
            dataType: 'json'
        })
        .done(function(oResult) {
            console.log("success");
            if (oResult.bSuccess === true) {
                $('#login_failed').addClass('hidden');
                $('#login_success').removeClass('hidden');
                window.location.replace('<?=base_url()?>dashboard');
                return;
            }
            $('#login_failed').removeClass('hidden');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
</script>