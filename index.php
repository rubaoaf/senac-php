<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calcule seu IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Calcule seu IMC</h1>
    </div>
    <div class="row">
        <form action="" method="post">
            <label for="altura" class="form-label">
                Digite sua altura:
            </label>
            <div class="input-group mb-3">
                <input class="form-control" type="number" name="altura" id="altura" placeholder="180" >
                <span class="input-group-text">cm</span>
            </div>
            <label for="peso" class="form-label">
                Digite seu peso:
            </label>
            <div class="input-group mb-3">
                <input class="form-control" type="number" name="peso" id="peso" step="0.01" placeholder="88,00">
                <span class="input-group-text">kg</span>
            </div>
            <button type="submit" name="calcular" class="btn btn-primary">Calcular</button>
        </form>
    </div>
    <?php
    if (isset($_POST['calcular'])) {
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];

        if(!empty($altura) && !empty($peso)) {
            $imc = calculaImc($peso, $altura);
            consultaImc($imc);
        }
    }

    function calculaImc($peso, $altura) {
        return round(($peso / (($altura/100) ** 2)), 2);
    }

    function consultaImc($imc) {
        $valoresImc = [
            '18.5' => 'Magreza',
            '24.9' => 'Saudável',
            '29.9' => 'Sobrepeso',
            '34.9' => 'Obesidade Grau I',
            '39.9' => 'Obesidade Grau II',
            '40' =>  'Obesidade Grau III'
        ];

        $classificacao = $valoresImc['40'];

        foreach ($valoresImc as $chave => $valor) {
            // verifica se o imc está dentro do range de valores do imc, caso seja acima de 40, ele não precisa validar e já mostra o último valor.
            if($chave < 40) {
                if($imc <= $chave) {
                    $classificacao = $valor;
                    break;
                }
            }
        }

        echo "<p class='mt-3'>Atenção, seu IMC é <strong>$imc</strong>, e você está classificado como <strong>$classificacao</strong></p>";
    }

    ?>
</body>
</html>