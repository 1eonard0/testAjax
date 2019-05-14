<div class="alert alert-success" role="alert">
    Restore Password
</div>
<form id="restarForm">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        <small class="form-text text-muted">Insert your email please. Next, we are sending you an email.</small>
    </div>
    <button type="submit" class="btn btn-primary form-control" id="sendEmail">send</button>
    <a href="../testCrudAjax">Volver</a>
</form>
<div id="errorMsg">

</div>

<script>
    $('#restarForm').submit(function(e) {
        e.preventDefault();

        $.get('app/restartPassword.php', $(this).serialize(),processData);

        function processData(data) {
            if (data != "false") {
                $('#errorMsg').html('<div class="alert alert-success mt-2" role="alert">Sending email to ' + data + '.</div>');
            } else {
                $('#errorMsg').html('<div class="alert alert-danger mt-2" role="alert">Invalid email.</div>');
            }
        }
    });
</script>
