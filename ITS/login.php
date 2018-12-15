<?php
    session_start();
    $_SESSION['login_page']=true;
    include('header.php');
    if(isset($_SESSION['uid'])){
        
    }else{
        echo'<!--The Form--> 
             <div class="row container login">
                <form action="includes/login-inc.php" method = "post">
                    <div class="card">
                        <div style="padding:11px;" class="card-action teal lighten-1 white-text col s12">
                            <h5 class="center">Login</h5>
                        </div>
                        <div class="card-content row">
                        <div class="input-field col s11">
                            <i class="material-icons prefix">account_circle</i>
                            <input name = "uid" type="number" id="icon_prefix" class="validate">
                            <label for="icon_prefix">University ID</label>
                        </div>
                        <div class="input-field col s11">
                            <i class="material-icons prefix">vpn_key</i>
                            <input name = "pwd" id="password" type="password" class="validate" >
                            <label class="" for="password">Password</label>  
                        </div>
                        <div class="clearfix"></div>
                            <button name="submit" type="submit" class="waves-effect button teal lighten-1  waves-light btn">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- The End of Form -->';
    }
    $_SESSION['login_page']=false;
?>
      
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