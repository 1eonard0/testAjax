<div class="alert alert-success" role="alert">
    Sign up Form
</div>
<form id="signupForm">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    </div>
    <div class="form-group">
        <label for="passwordCopy">Repeat password</label>
        <input type="password" class="form-control" id="passwordCopy" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary form-control">Sign up</button>
</form>
<a href="../testCrudAjax">Volver</a>
<div id="errorMsg">

</div>

<script>
    $('#signupForm').submit(function(e) {
        e.preventDefault();
        $originPass = $('#password').val();
        $copyPass = $('#passwordCopy').val();
        
        if ($originPass == $copyPass) {
            //get method
            $.post('app/signUpUser.php',$(this).serialize(),processData);

            //callback method
            function processData(data) {
                $('#errorMsg').html('<div class="alert alert-danger mt-2" role="alert">' + data + '.</div>');
            }
        }else{
            $('#errorMsg').html('<div class="alert alert-danger mt-2" role="alert">Remember that both password must be equal.</div>');
        }
        
    });
</script>