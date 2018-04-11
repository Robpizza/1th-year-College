<?php
$end_result = null;

if(isset($_POST['send'])) {
    if (empty($_POST['prs1']) || empty($_POST['prs2']) || $_POST['prs1'] == "" || $_POST['prs2'] == "") {
        echo "Vul aub alles in.";
        $error = 1;
    }
    if(!isset($error)) {
        $prs1 = strtoupper($_POST['prs1']);
        $prs1_name_lenght = strlen($prs1);
        $prs1_a = substr_count($prs1, "A");
        $prs1_e = substr_count($prs1, "E");
        $prs1_i = substr_count($prs1, "I");
        $prs1_o = substr_count($prs1, "O");
        $prs1_u = substr_count($prs1, "U");

        $prs1_result = 100 / $prs1_name_lenght * ($prs1_a + $prs1_e + $prs1_i + $prs1_o + $prs1_u) + $prs1_name_lenght;

        $prs2 = strtoupper($_POST['prs2']);
        $prs2_name_lenght = strlen($prs2);
        $prs2_a = substr_count($prs2, "A");
        $prs2_e = substr_count($prs2, "E");
        $prs2_i = substr_count($prs2, "I");
        $prs2_o = substr_count($prs2, "O");
        $prs2_u = substr_count($prs2, "U");

        $prs2_result = 100 / $prs2_name_lenght * ($prs2_a + $prs2_e + $prs2_i + $prs2_o + $prs2_u) + $prs2_name_lenght;

        $end_result = ($prs1_result + $prs2_result) * 0.8;
        $end_result = round($end_result);


        if($end_result >= 100) {
            $end_result = "100";
        }

        $end_result = $end_result . "%";
    }


}
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Love | Tester</title>

        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: Calibri;
                overflow: hidden;
            }

            body {
                background: hotpink url("asterisk_war_minimalist_by_icyro_kun-d9h367q.png") no-repeat fixed center;
                background-size: cover;
            }

            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 100%;
                background-color: #b4aea7;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #5e5a5a;
            }

            form {
                border-radius: 5px;
                background-color: rgba(255, 255, 255, 0.7);
                padding: 20px;
                width: 30%;
                height: 250px;
                margin: calc(50vh - 200px) auto;
            }

            footer {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: center;
            }

            .container {
                display: flex;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <form method="post">
                <label>Persoon1: </label>
                <input type="text" name="prs1">

                <label>Persoon2: </label>
                <input type="text" name="prs2">

                <input type="submit" name="send" value="Bereken">
                <?php
                echo $end_result;
                ?>
            </form>
        </div>
        <footer>
            <p>COPYRIGHT &copy; ROBHUTTEN 2001 - 2018</p>
        </footer>
    </body>
</html>
