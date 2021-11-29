<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <table border="1" cellspacing="1" cellpadding="3" width="100%">
        <tr>
            <td>
                <img src="<?= base_url() ?>barcode/barcode.php?text=<?= $id_buku ?>" width="250">
            </td>
        </tr>
    </table>
</body>
</html>