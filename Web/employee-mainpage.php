<html>
  <head>
    <title>employee-mainpage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel=StyleSheet href="stylesheet.css" type="text/css">
  </head>
  <body>
      <!-- Navbar content -->
    <nav id="navbar" class="navbar sticky-top navbar-dark bg-dark">
      <img id="logo" src="img/logo.png"></img>
      <div id="search-bar" class="input-group">
        <input id="search-bar-input" type="text" class="form-control" placeholder="Search GoWork">
        <span class="input-group-btn">
          <button id="search-button" class="btn btn-default" type="button"  title="Search" disabled>Go!</button>
        </span>
      </div>
      <div id="profile">Default User</div>
      <img id="user-image" src="img/default-user.png"/>
    </nav>
    <!--CENTRAL AREA-->
    <div id="subline" class="row thatarea"></div>
    <div class="row principal-page thatarea">
      <div class="col-sm-3 thatarea">
        <div class="card fixed-user" style="width: 20rem;">
          <img class="card-img-top user-image" src="img/default-user.png" alt="Card image cap">
          <div class="card-block">
            <h4 class="card-title user-name">Default Username</h4>
            <p class="card-text user-description">ITBA Computer Engeneering graduate. English and spanish speaker.</p>
            <a href="#" class="btn btn-primary pending-applications-btn">See pending aplications</a>
          </div>
        </div>
      </div>
      <!--CARUSEL-->
      <div class="col-sm-6 notthatarea">
        <div class="row subsection-notthatarea">
          <h3 id="look-out">On the look out</h3>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="item-equality carousel-item active">
                <img class="carousel-image" src="img/job1.jpg" alt="First slide">
                <div class="carousel-caption d-sm-block d-none">
                  <h3>Work at Google</h3>
                   <p>New data analyst position</p>
                </div>
              </div>
              <div class="item-equality carousel-item">
                <img class="carousel-image" src="img/job2.jpg" alt="Second slide">
                <div class="carousel-caption d-sm-block d-none">
                  <h3>Construction SM.</h3>
                   <p>Start monday!</p>
                </div>
              </div>
              <div class="item-equality carousel-item">
                <img  class="carousel-image" src="img/job3.jpg" alt="Third slide">
                <div class="carousel-caption d-sm-block d-none">
                  <h3>New Jazz BJ Bar</h3>
                   <p>Looking for experienced bartender.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="row">
          <!--JOB OFFERINGS-->
          <h3 id="job-offerings">Job Offerings</h3><br>
          <div id="jobs">
            <div class="job">
              <div class="card text-center">
                <div class="card-header">
                  <img class="job-header-img" src="img/wolox.png"></img>
                </div>
                <div class="card-block">
                  <h4 class="card-title">Programmer at Wolox</h4>
                  <p class="card-text">Full time job 24 hs /week. International grupo managment.</p>
                  <a href="#" class="btn btn-primary apply-button">Apply</a>
                </div>
                <div class="card-footer text-muted">
                  2 days ago
                </div>
              </div>
      			</div>
            <div class="job">
              <div class="card text-center">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-block">
                  <h4 class="card-title">Programmer at Wolox</h4>
                  <p class="card-text">Full time job 24 hs /week. International grupo managment.</p>
                  <a href="#" class="btn btn-primary apply-button">Apply</a>
                </div>
                <div class="card-footer text-muted">
                  2 days ago
                </div>
              </div>
      			</div>
            <button type="button" class="btn see-all">See more...</button>
          </div>
        </div>
      </div>
      <div class="col-sm-3 thatarea"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
