<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
    <title>DB Compare</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-6">
            <h1 class="text-center">Database: <?php echo $schema1['database']; ?></h1>
            <table class="table table-sm table-bordered">
                <tbody>
                    <?php foreach ($schema1['tables'] as $i => $table) : ?>
                        <tr>
                            <th colspan='5'>&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan='5'><?php echo ($table['Tables_in_' . $schema1['database']]); ?></th>
                        </tr>
                        <tr>
                            <th>FIELD</th>
                            <th>TYPE</th>
                            <th>NULL</th>
                            <th>DEFAULT</th>
                            <th>MISC</th>
                        </tr>
                        <?php foreach ($schema1['tables'][$i]['columns'] as $col) : ?>
                            <tr>
                                <td class='field'><?php echo $col['Field']; ?></td>
                                <td><?php echo $col['Type']; ?></td>
                                <td><?php echo $col['Null']; ?></td>
                                <td><?php echo $col['Default']; ?></td>
                                <td>
                                <?php echo ($col['Key']=='PRI')?'PK ':'';?>
                                <?php echo ($col['Extra']=='auto_increment')?'AI ':'';?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <h1 class="text-center">Database: <?php echo $schema2['database']; ?></h1>
            <table class="table table-sm table-bordered">
                <tbody>
                    <?php foreach ($schema2['tables'] as $i => $table) : ?>
                        <tr>
                            <th colspan='5'>&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan='5'><?php echo ($table['Tables_in_' . $schema2['database']]); ?></th>
                        </tr>
                        <tr>
                            <th>FIELD</th>
                            <th>TYPE</th>
                            <th>NULL</th>
                            <th>DEFAULT</th>
                            <th>MISC</th>
                        </tr>
                        <?php foreach ($schema2['tables'][$i]['columns'] as $col) : ?>
                            <tr>
                                <td class='field'><?php echo $col['Field']; ?></td>
                                <td><?php echo $col['Type']; ?></td>
                                <td><?php echo $col['Null']; ?></td>
                                <td><?php echo $col['Default']; ?></td>
                                <td>
                                <?php echo ($col['Key']=='PRI')?'PK ':'';?>
                                <?php echo ($col['Extra']=='auto_increment')?'AI ':'';?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src='./assets/js/script.js'></script>
</body>

</html>