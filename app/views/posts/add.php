<?php
require APPROOT. '/views/inc/navbar.php';
?>
<div class='container bg-light rounded mt-4 py-2 px-4'>
    <p class='h5 mt-4'>Ready to add your new post? Fill in the title and the body!</p>
    <form class='user-data-form rounded-ends py-4' action='<?php echo URLROOT; ?>/posts/add' method='POST'>
        <input placeholder='Title' class='form-control<?php if(!empty($data['title_err'])) echo ' is-invalid' ?>' type='text' name='title' value='<?php echo $data['title']; ?>'>
        <textarea placeholder='Text' class='form-control<?php if(!empty($data['body_err'])) echo ' is-invalid' ?>' name='body' rows='5'><?php echo $data['body']; ?></textarea>
        <button type='submit' class='btn btn-outline-primary btn-block'>Submit</button>
    </form>
    <?php
    $toEcho = '';
    if(!empty($data['title_err'])) {
        $toEcho = $toEcho . "<p class='m-1'>" . $data['title_err'] . "</p>";
    }
    if(!empty($data['body_err'])) {
        $toEcho = $toEcho . "<p class='m-1'>" . $data['body_err'] . "</p>";
    }
    if(!empty($toEcho)) {
        $toEcho = "<div class='alert alert-danger mt-4 py-3 px-4'>" . $toEcho . "</div>";
    }
    echo $toEcho;
    ?>

</div>