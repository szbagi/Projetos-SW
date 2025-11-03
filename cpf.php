<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tratamento de CPF</title>
 
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e6f3ff; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
 
        .container {
            background: white;
            padding: 25px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
 
        h2 {
            color: #4a90e2; 
        }
 
        input {
            width: 90%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #b5d6f2;
            border-radius: 5px;
            font-size: 15px;
            outline: none;
        }
 
        button {
            margin-top: 12px;
            padding: 10px 15px;
            border: none;
            background: #a3d1ff;
            color: #003366;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }
 
        button:hover {
            background: #8cc6ff;
        }
 
        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #c9e2ff;
        }
 
        p {
            font-size: 16px;
            background: #dff0ff;
            padding: 10px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
 
<div class="container">
    <h2>Tratar CPF</h2>
 
    <form method="post">
        <label>Digite o CPF:</label><br>
        <input type="text" name="cpf" placeholder="Ex: 123.456.789-00" required><br><br>
 
        <button type="submit" name="acao" value="tirar">Tirar pontos e traço</button>
        <button type="submit" name="acao" value="colocar">Colocar pontos e traço</button>
    </form>
 
    <hr>
 
    <?php
    function tirarFormatacao($cpf) {
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        return $cpf;
    }
 
    function colocarFormatacao($cpf) {
        return substr($cpf, 0, 3) . "." . 
               substr($cpf, 3, 3) . "." . 
               substr($cpf, 6, 3) . "-" . 
               substr($cpf, 9, 2);
    }
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cpf = $_POST["cpf"];
        $acao = $_POST["acao"];
 
        if ($acao == "tirar") {
            $resultado = tirarFormatacao($cpf);
            echo "<p><strong>Sem formatação:</strong> $resultado</p>";
        } else {
            $cpfLimpo = tirarFormatacao($cpf);
            $resultado = colocarFormatacao($cpfLimpo);
            echo "<p><strong>Formatado:</strong> $resultado</p>";
        }
    }
    ?>
</div>
 
</body>
</html>
 