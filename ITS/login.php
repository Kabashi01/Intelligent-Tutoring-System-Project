<?php
    include('header.php');
?>
      <!--The Form--> 
      <div class="row container login">
          <form action="">
              <div class="card">
                  <div style="padding:11px;" class="card-action teal lighten-1 white-text col s12">
                      <h5 class="center">Login</h5>
                  </div>
                  <div class="card-content row">
                    <div class="input-field col s11">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" id="icon_prefix" class="validate">
                        <label for="icon_prefix">University ID</label>
                    </div>
                    <div class="input-field col s11">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" class="validate" >
                        <label class="" for="password">Password</label>  
                    </div>
                    <div class="clearfix"></div>
                        <button  class="waves-effect button teal lighten-1  waves-light btn">Login</button>
                  </div>
              </div>
          </form>
      </div>
      <!-- The End of Form -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <!-- import materialize css JS  -->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!-- JS code -->
    <script>
      $('.sidenav').sidenav();      
    </script>
</body>
</html>