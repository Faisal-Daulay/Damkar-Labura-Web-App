<div class="row">
    <div class="col-md-6">
        <?php
        include 'include/config.php';

        $sql = "SELECT * FROM user WHERE id_user=$id_user";
        $query = mysqli_query($db, $sql);
        while ($ambil = mysqli_fetch_array($query)) {
            $id_user = $ambil['id_user'];
            $user = $ambil['username'];
            $pass = $ambil['password'];
        ?>
            <form action="?page=settings/proses.php" method="post" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input type="hidden" name="id" value="<?= $id_user; ?>">
                        <h3 class="panel-title text-uppercase">form edit user</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Username</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="user" class="form-control" value="<?= $user; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="password" name="pass" class="form-control" value="<?= $pass; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="submit" name="edit" class="btn btn-primary pull-right">Update Data</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
