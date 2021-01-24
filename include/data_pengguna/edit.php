<div class="row">
    <div class="col-md-6">
        <?php
        include 'include/config.php';

        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM pengguna INNER JOIN user ON pengguna.id_pengguna = user.id_pengguna WHERE pengguna.id_pengguna=$id";
        $query = mysqli_query($db, $sql);
        while ($ambil = mysqli_fetch_array($query)) {
            $id_pengguna = $ambil['id_pengguna'];
            $nama = $ambil['nama'];
            $alamat = $ambil['alamat'];
            $no_hp = $ambil['no_hp'];
            $user = $ambil['username'];
            $pass = $ambil['password'];
        ?>
            <form action="?page=data_pengguna/proses.php" method="post" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input type="hidden" name="id" value="<?= $id_pengguna; ?>">
                        <h3 class="panel-title text-uppercase">form edit pengguna</h3>
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
                            <label class="col-md-3 col-xs-12 control-label">Nama</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="nama" class="form-control" value="<?= $nama; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat Pelapor</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="alamat" class="form-control" value="<?= $alamat; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No Handphone</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="nohp" class="form-control" value="<?= $no_hp; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

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
