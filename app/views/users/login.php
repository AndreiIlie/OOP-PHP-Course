<div class='d-flex flex-column h-100'>
    <?php
    require APPROOT. '/views/inc/navbar.php';
    ?>
    <div class='container flex-grow-1 d-flex align-items-center justify-content-center'>
        <div class='rounded bg-light mx-auto p-4'>
            <p class='h5 mb-4 text-info text-center'>Please fill in the form to log in</p>
            <form class='user-data-form rounded-ends' method='post' action='<?php echo URLROOT; ?>/users/login'>
                <input type='text' class='form-control <?php if(!empty($data['username_err'])) echo 'is-invalid'; ?>' name='username' id='opapp-username' placeholder='Username'>
                <input type='password' class='form-control <?php if(!empty($data['password_err'])) echo 'is-invalid'; ?>' name='password' id='opapp-password' placeholder='Password'>
                <button type='submit' class='btn btn-primary btn-block mt-4'>Sign In</button>
            </form>
            <?php
            $toEcho = '';
            if(!empty($data['username_err'])) {
                $toEcho = $toEcho . "<p class='m-1'>" . $data['username_err'] . "</p>";
            }
            if(!empty($data['password_err'])) {
                $toEcho = $toEcho . "<p class='m-1'>" . $data['password_err'] . "</p>";
            }
            if(!empty($toEcho)) {
                $toEcho = "<div class='alert alert-danger mt-4 py-3 px-4'>" . $toEcho . "</div>";
            }
            echo $toEcho;
            ?>
        </div>
    </div>
</div>