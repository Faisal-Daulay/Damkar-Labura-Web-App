
        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="index.html"><small>Pangeran Labura</small></a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <div class="profile">
                        <div class="profile-image">
                            <img src="img/logo damkar.png" style="width: 150px; border: none;" />
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name text-capitalize">Welcome <?= $username; ?></div>
                            <!-- <div class="profile-data-title">Web Developer/Designer</div> -->
                        </div>
                    </div>
                </li>
                <!-- <li class="xn-title">Navigation</li> -->
                <li class="active">
                    <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                </li>
                <!-- <li><a href="?page=new_lap/new_lap.php"><span class="fa fa-book"></span> Laporan Baru</a></li> -->
                <li><a href="?page=daftar_laporan/daftar_lap.php"><span class="fa fa-list"></span> Daftar Laporan</a></li>
                <li><a href="?page=data_pengguna/data_pengguna.php"><span class="fa fa-users"></span> Data Pengguna</a></li>
                <li><a href="?page=berita/berita.php"><i class="fas fa-newspaper"></i> Berita</a></li>
                <!-- <li><a href="?page=kategori/kategori.php"><i class="fas fa-tags"></i> Kategori</a></li> -->
                <li><a href="?page=faq/faq.php"><span class="fa fa-info"></span> FAQ</a></li>
                <li><a href="?page=settings/user.php"><span class="fa fa-lock"></span> Setting User</a></li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-book"></span> Report<span class="xn-text"></span> </a>
                    <ul>
                        <li><a href="?page=report/report_pelapor.php"><span class="fa fa-book"></span> Report Data Pelapor</a></li>
                        <li><a href="?page=report/report_pengguna.php"><span class="fa fa-book"></span> Report Data Pengguna</a></li>
                    </ul>
                </li>
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

