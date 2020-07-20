<div class='d-flex flex-column h-100'>
    <?php
    require APPROOT. '/views/inc/navbar.php';
    ?>
    <div class='container flex-grow-1 d-flex align-items-center justify-content-center'>
        <div class='rounded bg-light mx-auto p-4'>
            <p class='h5 mb-4 text-info text-center'>Please fill in the form to register your account</p>
            <form class='user-data-form rounded-ends' method='post' action='<?php echo URLROOT; ?>/users/register'>
                <input type='text' class='form-control <?php if(!empty($data['username_err'])) echo 'is-invalid'; ?>' name='username' id='opapp-username' placeholder='Username' value='<?php if(isset($data['username'])) echo $data['username']; ?>'>
                <input type='password' class='form-control <?php if(!empty($data['password_err'])) echo 'is-invalid'; ?>' name='password' id='opapp-password' placeholder='Password'>
                <input type='password' class='form-control <?php if(!empty($data['confirm_password_err'])) echo 'is-invalid'; ?>' name='confirm_password' id='opapp-password' placeholder='Confirm Password'>
                <button type='submit' class='btn btn-primary btn-block'>Sign Up</button>
            </form>
            <?php
            $toEcho = '';
            if(!empty($data['username_err'])) {
                $toEcho = $toEcho . "<p class='m-1'>" . $data['username_err'] . "</p>";
            }
            if(!empty($data['password_err'])) {
                $toEcho = $toEcho . "<p class='m-1'>" . $data['password_err'] . "</p>";
            }
            if(!empty($data['confirm_password_err'])) {
                $toEcho = $toEcho . "<p class='m-1'>" . $data['confirm_password_err'] . "</p>";
            }
            if(!empty($toEcho)) {
                $toEcho = "<div class='alert alert-danger mt-4 py-3 px-4'>" . $toEcho . "</div>";
            }

            echo $toEcho;
            ?>
        </div>
    </div>
</div>