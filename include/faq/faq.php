<div class="row">
	
    <div class="col-md-6">
        <?php 
            include 'include/config.php';
            $sql = "SELECT * FROM faqandabout WHERE id_faq='1' ";
            $query = mysqli_query($db, $sql);
            while ($ambil = mysqli_fetch_array($query)) {
                $id = $ambil['id_faq'];
                $faq = $ambil['faq'];
                $tentang = $ambil['tentang'];
        ?>
            <!-- FORM EDIT -->
            <form action="?page=faq/proses.php" method="post" class="form-horizontal">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">form Update faq dan tentang</h3>
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
                            <label class="col-md-3 col-xs-12 control-label">FAQ</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <textarea name="faq" class="form-control" rows="10"><?= $faq; ?></textarea>
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Tentang</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <textarea name="tentang" class="form-control" rows="10"><?= $tentang; ?></textarea>
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right" name="update">Update Data</button>
                    </div>
                </div>
            </form>
        <?php } ?> 
    </div>
</div>