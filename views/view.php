<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
        #overlay {
            position:fixed;
            overflow: scroll;
            background-color: #4c4c4c;
            color:#fff;
            opacity: 0.8;
            top:0;
            right:0;
            width: 100vw;
            height: 100vh;
            padding: 50px;
        }
        #closeOverlay {
            position: absolute;
            right:20px;
            top:20px;
            font-size:36px;
            font-weight: bold;
            color:#fff;
            cursor: pointer;
        }
    </style>
    <title>DB Compare</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-6">
            <h1 class="text-center">Database: <?php echo $schema1['database']; ?></h1>
            <table id='table-left' class="table table-sm table-bordered">
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
                            <tr data-table="<?php echo ($table['Tables_in_' . $schema1['database']]); ?>">
                                <td class='field'><?php echo $col['Field']; ?></td>
                                <td class='type'><?php echo $col['Type']; ?></td>
                                <td class='null'><?php echo $col['Null']; ?></td>
                                <td class='default'><?php echo $col['Default']; ?></td>
                                <td class='misc'>
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
            <table id="table-right" class="table table-sm table-bordered">
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
                            <tr data-table="<?php echo ($table['Tables_in_' . $schema2['database']]); ?>">
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src='./assets/js/script.js'></script>
</body>

</html>