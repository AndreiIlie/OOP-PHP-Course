<div class='d-flex flex-column h-100'>
    <?php
    require APPROOT. '/views/inc/navbar.php';
    ?>
    <div class='container flex-grow-1 d-flex align-items-center justify-content-center'>
        <div class='rounded bg-light mx-auto p-4'>
            <p class='h5 mb-4 text-info text-center'>Please fill in the form to log in</p>
            <form class='user-data-form' method='post' action='<?php echo URLROOT; ?>/users/login'>
                <input type='text' class='form-control' id='opapp-username' placeholder='Username'>
                <input type='password' class='form-control' id='opapp-password' placeholder='Password'>
                <button type='submit' class='btn btn-primary btn-block mt-4'>Submit</button>
            </form>
        </div>
    </div>
</div>