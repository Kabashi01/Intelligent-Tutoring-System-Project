<?php
    session_start();
    include('header.php');
?>
    <div class="container">
        <div class="row">
                <form action="includes/add-course-inc.php" method = "POST" class="col s12">
                    <div class="card">
                        <div class="card-action teal lighten-1 white-text col s12">
                            <h7>Add new Level</h7>
                        </div>
                        <div class="card-content row">
                            <div class="input-field col s8 ">
                                <i  class="material-icons prefix">account_circle</i>
                                <input name="level" type="text" id="icon" class="validate">
                                <label for="icon">Enter Level name</label>
                            </div>
                            <div class="col s4 mt">
                                <button name="submit" type="submit" class="capital waves-effect button teal lighten-1  waves-light btn right">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row col">
                <div class="col s12">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5 class="blue-text">Level Names</h5></li>
                        <a href="#" class="collection-item">First Year</a>
                        <a href="#" class="collection-item">Second Year</a>
                        <a href="#" class="collection-item">Third Year</a>
                        <a href="#" class="collection-item">Fourth Year</a>
                        <a href="#" class="collection-item">Fifth Year</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>



     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
     <!-- import materialize css JS  -->
     <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>