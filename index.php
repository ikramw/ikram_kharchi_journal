<?php require_once "partials/head.php";  ?>
  <header class="header-navbar">
    <div class="nav-content">
      <div class="logo-wrapper">
          <img src="images/logo.png" class="logo" alt="Logo">
      </div>
      <nav class="nav-main" id="content-toggle">
        
        <div class="nav-menu-right">
          
          <!-- Om användaren är utloggad visas: -->
          <?php if (!isset($_SESSION["loggedIn"])): ?>
            <a href="javascript:void(0)" onclick="showSignin()">Sign in</a>
            <div class="login-form" id="login-form">
              <h3>Sign in</h3>
              <form class="form_signin" action='./partials/login.php' method='POST'>
                <label for="login-username">Username:</label>
                <input type="text" name="username" class="form-input" id="login-username" />
                <label for="login-password">Password:</label>
                <input type="password" name="password" class="form-input" id="login-password" />
                <input type="submit" id="login-submit" value="Submit" />
              </form>
            </div>
            <a href="javascript:void(0)" onclick="showRegister()">Register</a>
            <div class="register-form" id="register-form">
              <h3>Register</h3>
              <form id="register_form" class="form_register hidden" action='partials/post_entry.php' method='POST'>
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-input" id="username" />
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-input" id="password" />
                <input type="submit" id="submit" value="Submit" />
              </form>
            </div>
          <?php endif; ?>

          <!-- Annars visas: -->
          <?php if (isset($_SESSION["loggedIn"])): ?>
            <a href="#" id="logout" onclick="logOut()">Sign out</a>
          <?php endif; ?>

        </div>
      </nav>
      <div id="mobile-menu">
        <a href="javascript:void(0)" onclick="navToggle(); return false;">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </div>
  </header>

  <!-- 
  Visas bara om användaren inte är inloggad -->
    <section class="header-info" id="frontpage-header">
      <?php if (!isset($_SESSION["loggedIn"])): ?>
      <div class="info-content">
        <h1>Sign in to create your own free blog</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing
          elit. Sed eu nunc id enim sodales cursus elementum
          quis turpis. Ut ac elit id ante egestas lacinia.</p>
      </div>
      <?php endif; ?>
      <?php if (isset($_SESSION["loggedIn"])): ?>
          <div class="dashboard">
            <h1 class="welcome-text">Welcome, <?php echo $_SESSION["username"] ?>!</h1>
            <hr />
            <div class="dashboard-list">
              <ul>
                <li><a href="#" onclick="showCreatePost()"><i class="fa fa-edit"></i> Write a blog post</a></li>
             </ul>
            </div>
          </div>
      <?php endif; ?>
    </section>

  

  <div class="content-wrapper" id="content-wrapper">
    <!-- Inloggad användares sida -->
    <?php if (isset($_SESSION["loggedIn"])): ?>
      <section class="my-profile" id="my-profile">
        <div class="my-sidebar">
          <p>This is your profile</p>
          <a href="#" onclick="showCreatePost()"><i class="fa fa-edit"></i> Write a blog post</a>
        </div>
        <div class="my-entries" id="user-profile-entries">
          <!--Fylls på med inloggad användares entries -->
        </div>
      </section>

      <!-- Skriva ett inlägg -->
      <section class="create-entry-wrapper" id="create-entry-wrapper">
        <div class="create-entry">
          <h1>Create post</h1>
          <form>
            <input type="text" placeholder="Title" name="title" id="post-title" required>
            <textarea name="content" maxlength="1000" id="post-content" required></textarea>
            <br/>
            <input type="submit" value="Save" class="button" onclick="postEntry()" class="submit-btn"/>
          </form>
        </div>
      </section>
    <?php endif; ?>

    <!-- Section som visar entries -->
    <section class="entries-wrapper" id="entries">
     
      <div class="entries-content" id="entries-content">
        <!-- Fylls på med entries -->
      </div>
    </section>
  
  <script src="main.js"></script>
</body>

</html>
