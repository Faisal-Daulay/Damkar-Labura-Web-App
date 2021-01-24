
<div class="row">
    <div class="col-md-6">
        <form action="include/report/export_pelapor.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">Report Data Pelapor</h3>
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
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Awal</label>
                        <div class="col-md-9 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fas fa-align-left"></i>
                                </span>
                                <input type="date" name="start_date" required autocomplete="off" class="form-control"/>
                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Akhir</label>
                        <div class="col-md-9 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fas fa-align-left"></i>
                                </span>
                                <input type="date" name="end_date" required autocomplete="off" class="form-control"/>
                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary pull-right" name="export">Export to Excel</button>
                </div>
            </div>
        </form>
    </div>
</div>