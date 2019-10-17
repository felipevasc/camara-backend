<?php 
session_start(); 
?>
<html>
    <head>
        <style>
            * {
                font-family: sans-serif;
                margin: 0;
                padding: 0;
                border: 0;
            }
            table.form {
                border-collapse: collapse;
            }
            table.form tbody tr td:first-child {
                margin: 0;
                padding-left: 4px;
                min-width: 100px;
                font-weight: bold;
                background-color: #FFFFFF;
                height: 40px;
                border-bottom: #AAAAAA solid 2px;
            }
            table.form tbody tr:first-child td:first-child {
                border-top-left-radius: 8px;
            }
            table.form tbody tr:last-child td:first-child {
                border-bottom-left-radius: 8px;
                border: none;
            }
            table.form tbody tr td:first-child+td {
                margin: 0;
                padding-right: 4px;
                min-width: 300px;
                background-color: #FFFFFF;
                border-bottom: #AAAAAA solid 2px;
            }
            table.form tbody tr:first-child td:first-child+td {
                border-top-right-radius: 8px;
            }
            table.form tbody tr:last-child td:first-child+td {
                border-bottom-right-radius: 8px;
                border: none;
            }
            table.form input[type="text"], table.form input[type="password"] {
                border: none;
                background-color: #FFFFFF;
                height: 100%;
                width: 100%;
            }
            table.form select {
                border-radius: 6px;
                padding: 3px;
                width: 100%;
                height: 100%;
                border: none;
            }
            table.form button, table.form input[type='submit'], table.form input[type='button'], table.form input[type='reset'] {
                border-radius: 50px;
                height: 30px;
                min-width: 120px;
                padding-left: 5px;
                padding-right: 5px;
                background: linear-gradient(to top, #BE272C, #d3080f);
                color: #FFFFFF;
                font-weight: bold;
                cursor: pointer;
                margin-top: 10px;
                border: none;
                border-top: #FFFFFF solid 1px;
                border-left: #FFFFFF solid 1px;
                border-right: #88BBDD solid 1px;
                border-bottom: #88BBDD solid 1px;
            }
            table.form button:hover, table.form input[type='submit']:hover, table.form input[type='button']:hover, table.form input[type='reset']:hover {
                background-color: #d3080f;
            }
            h2, h4 {
                color: #FFFFFF;
            }
        </style>
        <script src="../auxiliares/jquery.js"></script>
        <script src="../auxiliares/jquery-ui.js"></script>
        <script src="../auxiliares/chart/Chart.js"></script>
        <script src="../auxiliares/js.js"></script>
        <link rel="stylesheet" type="text/css" href="../auxiliares/jquery-ui.css">
        <meta charset="UTF-8">
        <img src="../auxiliares/img/aguarde.gif" style="display: none;"/>
    </head>
    <body style="background: linear-gradient(to top, #BE272C, #c14348)">
        <?php
        require '../auxiliares/autoload.php';
        if (!empty($_POST['senha'])) {
            if ($_POST['senha'] == '123') {
                $_SESSION['usuario'] = $_POST['usuario'];
                funcoes::redirecionar("inicio.php");
            }
            else {
                funcoes::alerta("Senha inválida", "login.php");
            }
        }
        
        ?>
        <table style="width: 100%; height: 100%;">
            <tbody>
                <tr>
                    <td style="height: 100%; text-align: center;">
                        <img src="../auxiliares/img/logotiangua.png"/>
                        <br/>
                        <br/>
                        <br/>
                        <h4>Efetuar Login</h4>
                        <br/>
                        <form method="POST">
                            <table style="margin: 0 auto;" class="form">
                                <tbody>
                                    <tr>
                                        <td>Usuário*:</td>
                                        <td>
                                            <input type="text" name="usuario" required="required"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Senha*:</td>
                                        <td><input type="password" name="senha" required="required"/></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="100%" style="text-align: right;">
                                            <input type="submit" value="Fazer Login"/>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
