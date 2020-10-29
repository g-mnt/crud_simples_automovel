<div class="w-100">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                <th scope="col" style="text-align:center;">Tipo</th>
                <th scope="col" style="text-align:center;">Modelo</th>
                <th scope="col" style="text-align:center;">Fabricante</th>
                <th scope="col" style="text-align:center;">Ano</th>
                <th scope="col" style="text-align:center;">Seguro</th>
                <th scope="col" style="text-align:center;">Placa</th>
                <th scope="col" style="text-align:center;">Data de Aquisição</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

                if(empty($automoveis)){
                    echo "<tr><td colspan='10' align='center'>Não existem Automóveis cadastrados!<td><tr>";
                }else{
                    foreach($automoveis as $automovel){
                        $seguro = $automovel['Seguro'] ? "Sim" : "Não";
                        echo "<tr>
                                <td style='text-align:center;'>".$automovel['AutoMovelId']."</td>
                                <td style='text-align:center;'>".$automovel['TipoVeiculo']."</td>
                                <td style='text-align:center;'>".$automovel['Modelo']."</td>
                                <td style='text-align:center;'>".$automovel['Fabricante']."</td>
                                <td style='text-align:center;'>".$automovel['Ano']."</td>
                                <td style='text-align:center;'>".$seguro."</td>
                                <td style='text-align:center;'>".$automovel['Placa']."</td>
                                <td style='text-align:center;'>".date_format(date_create($automovel['DataAquisicao']), 'd/m/Y')."</td>
                                <td><button type='button' class='btn btn-dark' onclick='abrirJanelaEditar(".$automovel['AutoMovelId'].")'>Editar</button></td>
                                <td><button type='button' class='btn btn-danger' onclick='confirmarExcluir(".$automovel['AutoMovelId'].")'>Excluir</button></td>
                            </tr>";
                        
                    }
                }   
            ?>
                
        </tbody>
    </table>
    <div class="d-flex justify-content-center w-100" style="text-align:center;">
        <div class="w-75">
            <button type='button' class='col-md-6 btn btn-primary mb-4' onclick='window.location.href = "index.php?emitirPDF=true"'>Exportar tabela em PDF</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    function abrirJanelaEditar(automovelId){
        window.location.href = "index.php?editar=true&AutomovelId="+automovelId;
    }

    function confirmarExcluir(automovelId){
        if(window.confirm("Alerta: Deseja mesmo remover este automóvel?")){
            window.location.href = "index.php?excluir=true&AutomovelId="+automovelId;
        }
    }

</script>
