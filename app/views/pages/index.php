<ul>
    <?php 
    foreach($data['posts'] as $post) {
        echo '<li>' . $post->title . '</li>';
    }
    ?>
</ul>