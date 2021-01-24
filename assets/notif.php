<?php

    include '../include/config.php';

    $sql = "SELECT * FROM daftar_lapor INNER JOIN pengguna ON daftar_lapor.id_pengguna = pengguna.id_pengguna WHERE daftar_lapor.status_lapor = 1 ORDER BY id_lapor DESC LIMIT 6";
    $query = mysqli_query($db, $sql);
    $output = '';

    while ($ambil = mysqli_fetch_array($query)) {

        $output .= '<a href="?page=new_lap/new_lap.php&id='.$ambil['id_lapor'].'" class="list-group-item notif">
                        <div class="label label-success pull-right">'.$ambil['tgl_lapor'].' / '.$ambil['jam_lapor'].'</div>
                        <span class="contacts-title">Pelapor : '.$ambil['nama'].'</span>
                        <p><span class="contacts-title">Lokasi Kebakaran :</span> '.$ambil['lokasi'].'</p>
                    </a>';
    }

    $sql1 = "SELECT * FROM daftar_lapor INNER JOIN pengguna ON daftar_lapor.id_pengguna = pengguna.id_pengguna WHERE daftar_lapor.status_lapor = 1 ";
    $query1 = mysqli_query($db, $sql1);
    $count = mysqli_num_rows($query1);
    $data = array (
        'notification' => $output,
        'unseen_notification' => $count
        // 'audio_notif' => $audio
    );

    echo json_encode($data);
?>
