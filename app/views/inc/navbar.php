<div class='navbar bg-light border-bottom shadow-sm'>
  <div class='container d-flex flex-row py-2'>
    <h5 class='text-dark font-weight-normal'>OPApp</h5>
    <nav class='mx-auto'>
      <a class='p-4 text-dark text-875' href='<?php echo URLROOT; ?>/pages/index'>Home</a>
      <a class='p-4 text-dark text-875' href='<?php echo URLROOT; ?>/pages/about'>About</a>
      <?php if(isset($_SESSION['user_id'])) : ?>
        <a class='p-4 text-dark text-875' href='<?php echo URLROOT; ?>/posts/index'>All Posts</a>
      <?php endif; ?>
      <a class='p-4 text-dark text-875' href='<?php echo URLROOT; ?>/pages/hello'>Test Page</a>
    </nav>

    <?php if(isset($_SESSION['user_id'])) : ?>
      <nav>
        <span class='mr-2 text-muted'>Logged in as <strong class='text-dark'><?php echo $_SESSION['user_username']; ?></strong></span>
        <a class='btn btn-outline-primary btn-sm shadow-sm' href='<?php echo URLROOT; ?>/users/logout'>Sign out</a>
      </nav>
    <?php else : ?>
    <nav>
      <a class='btn text-dark btn-sm shadow-sm mr-2' href='<?php echo URLROOT; ?>/users/login'>Sign in</a>
      <a class='btn btn-outline-primary btn-sm shadow-sm' href='<?php echo URLROOT; ?>/users/register'>Sign up</a>
    </nav>
    <?php endif; ?>
  </div>
</div>