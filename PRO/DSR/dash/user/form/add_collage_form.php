

<div class="form-group">
    <label>Enter Collage Name</label>
    <input autofocus type="text" name="cname" id="cname" class="form-control" value="<?php
                                                                                        if(isset($_GET['cid']) && !empty($_GET['cid']))
                                                                                            echo $_GET['cid']; ?>" required>
</div>

