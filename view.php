<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>DB Compare</title>
</head>
<body>
    <?php //debug($output);?>
    <div class="row">
        <div class="col-6">
            <h1 class="text-center">Database: <?php echo $output['database'];?></h1>
            <?php foreach($output['tables'] as $i => $table):?>
            <table class="table table-compact table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan='6' class='text-center text-uppercase'>Table: <?php echo ($table['Tables_in_'.$output['database']]);?></th>
                    </tr>
                    <tr>
                        <th>FIELD</th>
                        <th>TYPE</th>
                        <th>NULL</th>
                        <th>KEY</th>
                        <th>DEFAULT</th>
                        <th>EXTRA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($output['tables'][$i]['columns'] as $col):?>
                    <tr>
                        <td><?php echo $col['Field'];?></td>
                        <td><?php echo $col['Type'];?></td>
                        <td><?php echo $col['Null'];?></td>
                        <td><?php echo $col['Key'];?></td>
                        <td><?php echo $col['Default'];?></td>
                        <td><?php echo $col['Extra'];?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php endforeach;?>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>