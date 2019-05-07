
<div class="form-group">
 <label>Enter user Name</label>
 <input autofocus type="text" name="name" id="name" class="form-control"value="<?php
                                                                        if(isset($_GET['user_name']) && !empty($_GET['user_name']))
                                                                        echo $_GET['user_name']; ?>" required>
</div>

<div class="form-group">
 <label>Enter password</label>
 <input type="text" name="designation" id="designation" class="form-control" value="<?php
                                                                                    if(isset($_GET['pass']) && !empty($_GET['pass']))
                                                                                        echo $_GET['pass']; ?>" required>
</div>

<div class="form-group">
 <label>Enter user role</label>
 <select name="gender" id="gender" class="form-control"  required>
  <option value="admin">admin</option>
  <option value="user">user</option>
 </select>
</div>



