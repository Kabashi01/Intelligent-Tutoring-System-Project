
<div class="form-group">
    <label>Enter Deptartment Name</label>
    <input autofocus type="text" name="deptname" id="deptname" class="form-control" value="<?php
                                                                                            if(isset($_GET['dept_name']) && !empty($_GET['dept_name']))
                                                                                                echo $_GET['dept_name']; ?>" required>
</div>
