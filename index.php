<?php
include_once("template/header.php");
?>
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-5" id="mainBody">
                <div class="alert alert-primary" role="alert">
                    Sign in form
                </div>
                <form id="logIn">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <p><a href="template/restartPasswordForm.php" id="forgot">Forgot your password?</a></p>
                    <button type="submit" class="btn btn-primary form-control" id="signIn">Sign in</button>
                    <button class="btn btn-success form-control mt-2" id="signUp">Sign up</button>
                </form>
                <div id="errorMsg">

                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        
        
        $('#logIn').submit(function(e) {
            e.preventDefault(); // if it's in the final not working right.
            $.get('app/logIn.php',$(this).serialize(),processLogInReturn);

            function processLogInReturn(data) {
                if (data != 'false') {
                    $('#mainBody').html('<div class="alert alert-success" role="alert">Welcome back ' + data + '. Do you need help?</div>');
                } else {
                    $('#errorMsg').html('<div class="alert alert-danger mt-2" role="alert">Invalid user.</div>');
                } 
            }
            
        });//end submit

        $('#forgot').click(function () {
            var url = $(this).attr('href');
            $('#mainBody').load(url);
            return  false;
        });//end click

        $('#signUp').click(function() {
            $('#mainBody').load('template/signUp.php');
            return false;
        });//end click

    });//end ready
    </script>

<?php
include_once("template/footer.php");
?>