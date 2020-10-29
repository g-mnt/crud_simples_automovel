<?php

    require_once 'Models/Automovel.class.php';
    require_once 'Services/ExportPdf.php';

    class AutomovelController{

        public function index($edit = false, $automovelId = 0){
            $automovelObj = new Automovel;
            if($edit){
                $automovel = $automovelObj->pegar($automovelId);
            }else{
                $automoveis = $automovelObj->pegarTodos();
            }
            
            return include_once "Views/AutomovelIndex.php";
        }

        public function cadastrarAutomovel($request){

            $dados['TipoAutomovel'] = $request['tipoAutomovel'] ?? null;
            $dados['ModeloAutomovel'] = $request['modeloAutomovel'] ?? null;
            $dados['AnoFabricacao'] = $request['anoFabricacao'] ?? null;
            $dados['Placa'] = $request['placa'] ?? null;
            $dados['Fabricante'] = $request['fabricante'] ?? null;

            if(isset($request['dtAquisicao']) && $request['dtAquisicao'] != ""){
                $dados['DtAquisicao'] = date($request['dtAquisicao']);
            }else{
                $dados['DtAquisicao'] = null;
            }

            if(isset($request['seguro'])){
                $dados['Seguro']  = $request['seguro'] == "true" ? true: false;
            }

            $automovel = new Automovel;
            if($automovel->cadastrar($dados)){
                echo "<script>
                            alert('Automóvel cadastrado com sucesso');
                            window.location.href='index.php';
                        </script>";
            }else{
                echo "<script>
                            alert('Já existe um automóvel com essa placa registrado no sistema.');
                            window.location.href='index.php';
                        </script>";
            }
        }

        public function editarAutomovel($request){
            $dados['TipoAutomovel'] = $request['tipoAutomovel'] ?? null;
            $dados['ModeloAutomovel'] = $request['modeloAutomovel'] ?? null;
            $dados['AnoFabricacao'] = $request['anoFabricacao'] ?? null;
            $dados['Placa'] = $request['placa'] ?? null;
            $dados['Fabricante'] = $request['fabricante'] ?? null;
            $dados['AutoMovelId'] = $request['automovelId'];

            if(isset($request['dtAquisicao']) && $request['dtAquisicao'] != ""){
                $dados['DtAquisicao'] = date($request['dtAquisicao']);
            }else{
                $dados['DtAquisicao'] = null;
            }

            if(isset($request['seguro'])){
                $dados['Seguro']  = $request['seguro'] == "true" ? true: false;
            }

            $automovel = new Automovel;
            if($automovel->atualizar($dados)){
                echo "<script>
                        alert('Automóvel alterado com sucesso');
                        window.location.href='index.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Ocorreu um problema.');
                        window.location.href='index.php';
                    </script>";
            }
        }

        public function excluirAutomovel($automovelId){
            $automovel = new Automovel;
            if($automovel->excluir($automovelId)){
                echo "<script>
                        alert('Automóvel excluído com sucesso');
                        window.location.href='index.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Automóvel excluído com sucesso');
                        window.location.href='index.php';
                    </script>";
            }
        }

        public function emitirPDFTabela(){
            $automovel = new Automovel;
            $pdf = new PDF('L','mm','A4');
            $header = array('#', 'Tipo','Modelo', 'Fabricante', 'Ano', 'Seguro', 'Placa',utf8_decode('Data Aquisição'));
            $automoveis = $automovel->pegarTodos();

            foreach($automoveis as $key => $automovel){
                foreach($automovel as $field => $veicle){
                    if($field == 'Seguro'){
                        $automoveis[$key][$field] = $automoveis[$key][$field] ? "Sim" : utf8_decode('Não');
                    }

                    if($field == 'DataAquisicao'){
                        $automoveis[$key][$field] = date_format(date_create($automoveis[$key][$field]), 'd/m/Y');
                    }

                    if($field == 'CreateDate' || $field == 'UpdateDate'){
                        unset($automoveis[$key][$field]);
                    }
                }
            }

            $pdf->SetFont('Arial', '', 8);
            $pdf->AddPage();
            $pdf->BasicTable($header, $automoveis);
            $pdf->Output();

        }

    }

?>
