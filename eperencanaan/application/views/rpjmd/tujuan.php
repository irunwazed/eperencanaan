<html>
    <meta charset="utf-8" />
    <head></head>
    <body>
        <h1>Data Tujuan</h1>
        <table style="border-collapse: collapse; width:100%;">
            <tr>
                <td style="border: 1px solid; padding: 10px;">Nomor</td>
                <td style="border: 1px solid; padding: 10px;">Judul Misi</td>
                <td style="border: 1px solid; padding: 10px;">Tujuan</td>
            </tr>
            <?php
                $nomor = 1;
                foreach ($data as $datas){
            ?>
            <tr>
                <td style="border: 1px solid; padding: 10px; width: 20px;"><?=$nomor?></td>
                <td style="border: 1px solid; padding: 10px;"><?=$datas['misi_nama']?></td>
                <td style="border: 1px solid; padding: 10px;"><?=$datas['tujuan_nama']?></td>
            </tr>
            <?php
                $nomor++;
                }
            ?>          
        </table>
    </body>
</html>