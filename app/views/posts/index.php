<?php require(APPROOT . '/views/inc/navbar.php'); ?>

<div class='container rounded bg-light my-4 py-2 px-4'>
    <div class='row'>
        <div class='col-md-6'>
            <h1>Posts</h1>
        </div>
        <div class='col-md-6'>
            <a href='<?php echo URLROOT; ?>/posts/add' class='btn btn-outline-primary pull-right mt-2'>
                <i class='fa fa-pencil'></i> Add Post
            </a>
        </div>
    </div>
    <div class='row'>
        <?php
        foreach($data['posts'] as $post) {
            echo "
            <div class='card w-100 mt-2'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $post->title . "</h5>
                    <p class='card-text'>" . $post->body . "</p>
                    <a class='text-875' href='" . URLROOT . "/posts/show/" . $post->postId . "'>Read More</a>
                </div>
                <div class='card-footer text-875 text-dark text-right'>
                    " . $post->postCreatedAt . " by " . $post->username . "
                </div>
            </div>";
        }
        ?>
        
        
    </div>
</div>