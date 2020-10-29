<form method="POST">
    <?php if($edit): ?> 
        <input type='hidden' name='edit'/> 
        <input type='hidden' name='automovelId' value=<?php echo $automovel['AutoMovelId'];?>>
    <?php endif?>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Tipo de Automóvel</label>
        <input type="text" name="tipoAutomovel" class="form-control" required value=<?php if($edit){echo $automovel['TipoVeiculo'];}?>>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">Modelo do Automóvel</label>
        <input type="text" name="modeloAutomovel" class="form-control" required value=<?php if($edit){echo $automovel['Modelo'];}?>>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputAddress">Ano de Fabricação</label>
            <input type="number" name="anoFabricacao" required class="form-control" placeholder="2014" required value=<?php if($edit){echo $automovel['Ano'];}?>>
        </div>
        <div class="form-group col-md-3">
            <label for="inputCity">Placa</label>
            <input type="text" name="placa" class="form-control" required value=<?php if($edit){echo $automovel['Placa'];}?>>
        </div>
        <div class="form-group col-md-6">
            <label>Nome do Fabricante</label>
            <input type="text" name="fabricante" required class="form-control" required value=<?php if($edit){echo $automovel['Fabricante'];}?>>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Data de Aquisição</label>
            <input type="date" name="dtAquisicao" class="form-control" value=<?php if($edit){echo $automovel['DataAquisicao'];}?>>
        </div>
        <div class="form-group col-md-6">
            <label>Possui Seguro</label>
            <select value="true" class="form-control" name="seguro">
                <option <?php if($edit && $automovel['Seguro']){echo "selected";}?> value="true">Sim</option>
                <option <?php if($edit && !$automovel['Seguro']){echo "selected";}?> value="false">Não</option>
            </select>
        </div>
    </div>
    
    <div class="d-flex justify-content-center h-25">
        <?php if ($edit): ?> 
            <button type="submit" class="col-md-5 btn btn-primary mt-auto mr-5"> Editar</button>
            <button type='button' class='col-md-5 btn btn-primary mt-auto ml-5' onclick='window.location.href = "index.php"'>Voltar</button>
        <?php else: ?> 
            <button type='submit' class='col-md-6 btn btn-primary mt-auto'>Cadastrar</button> 
        <?php endif?>
    </div>
</form>
