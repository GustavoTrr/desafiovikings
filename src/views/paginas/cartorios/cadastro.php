<!DOCTYPE html>
<html>
<?php include appbasepath() . '/src/views/paginas/pieces/head.php'; ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include appbasepath() . '/src/views/paginas/pieces/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php includeViewPiece('pieces/sidebar', ['teste' => 'minha var']); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Formulário de Cadastro</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo appbaseurl(); ?>">Início</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo appbaseurl() . '/cartorios'; ?>">Cartórios</a></li>
                                <li class="breadcrumb-item active">Novo</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Dados do Cartório</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="post">
                                    <?php if (!empty($cartorio->id)) {
                                        echo "<input type=\"hidden\" name=\"id\" value=\"$cartorio->id\">";
                                    }?>
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nome_cartorio">Nome do Cartório</label>
                                                    <input type="text" class="form-control" id="nome_cartorio" name="nome_cartorio" value="<?php echo $cartorio->nome_cartorio ?? ''; ?>" placeholder="Nome do Cartório">
                                                </div>
                                                <div class="form-group">
                                                    <label for="razao_social">Razão Social</label>
                                                    <input type="text" class="form-control" id="razao_social" name="razao_social" value="<?php echo $cartorio->razao_social ?? ''; ?>" placeholder="Razão Social">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="documento">Documento</label>
                                                            <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $cartorio->documento ?? ''; ?>" placeholder="Documento">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="tipo_documento">Tipo de Documento</label>
                                                            <input type="text" class="form-control" id="tipo_documento" name="tipo_documento" value="<?php echo $cartorio->tipo_documento ?? '2'; ?>" placeholder="Tipo de Documento" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nome_tabeliao">Nome do Tabelião</label>
                                                    <input type="text" class="form-control" id="nome_tabeliao" name="nome_tabeliao" value="<?php echo $cartorio->nome_tabeliao ?? ''; ?>" placeholder="Nome do Tabelião">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefone">Telefone</label>
                                                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $cartorio->telefone ?? ''; ?>" placeholder="Telefone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $cartorio->email ?? ''; ?>" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="cep">Cep</label>
                                                    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cartorio->cep ?? ''; ?>" placeholder="Cep">
                                                </div>
                                                <div class="form-group">
                                                    <label for="endereco">Endereço</label>
                                                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $cartorio->endereco ?? ''; ?>" placeholder="Endereço">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bairro">Bairro</label>
                                                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $cartorio->bairro ?? ''; ?>" placeholder="Bairro">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cidade">Cidade</label>
                                                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cartorio->cidade ?? ''; ?>" placeholder="Cidade">
                                                </div>
                                                <div class="form-group">
                                                    <label for="uf">UF</label>
                                                    <select class="form-control" id="uf" name="uf" >
                                                        <option value="">Escolha uma UF</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'AC')) ? 'selected' : ''; ?> value="AC">Acre</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'AL')) ? 'selected' : ''; ?> value="AL">Alagoas</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'AP')) ? 'selected' : ''; ?> value="AP">Amapá</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'AM')) ? 'selected' : ''; ?> value="AM">Amazonas</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'BA')) ? 'selected' : ''; ?> value="BA">Bahia</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'CE')) ? 'selected' : ''; ?> value="CE">Ceará</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'DF')) ? 'selected' : ''; ?> value="DF">Distrito Federal</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'ES')) ? 'selected' : ''; ?> value="ES">Espirito Santo</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'GO')) ? 'selected' : ''; ?> value="GO">Goiás</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'MA')) ? 'selected' : ''; ?> value="MA">Maranhão</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'MS')) ? 'selected' : ''; ?> value="MS">Mato Grosso do Sul</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'MT')) ? 'selected' : ''; ?> value="MT">Mato Grosso</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'MG')) ? 'selected' : ''; ?> value="MG">Minas Gerais</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'PA')) ? 'selected' : ''; ?> value="PA">Pará</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'PB')) ? 'selected' : ''; ?> value="PB">Paraíba</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'PR')) ? 'selected' : ''; ?> value="PR">Paraná</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'PE')) ? 'selected' : ''; ?> value="PE">Pernambuco</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'PI')) ? 'selected' : ''; ?> value="PI">Piauí</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'RJ')) ? 'selected' : ''; ?> value="RJ">Rio de Janeiro</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'RN')) ? 'selected' : ''; ?> value="RN">Rio Grande do Norte</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'RS')) ? 'selected' : ''; ?> value="RS">Rio Grande do Sul</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'RO')) ? 'selected' : ''; ?> value="RO">Rondônia</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'RR')) ? 'selected' : ''; ?> value="RR">Roraima</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'SC')) ? 'selected' : ''; ?> value="SC">Santa Catarina</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'SP')) ? 'selected' : ''; ?> value="SP">São Paulo</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'SE')) ? 'selected' : ''; ?> value="SE">Sergipe</option>
                                                        <option <?php echo ((!empty($cartorio->uf)) && ($cartorio->uf == 'TO')) ? 'selected' : ''; ?> value="TO">Tocantins</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ativo">Ativo ?</label>
                                                    <select class="form-control" id="ativo" name="ativo">
                                                        <option <?php echo ((!empty($cartorio->ativo)) && ($cartorio->ativo)) ? 'selected' : ''; ?> value="1">Sim</option>
                                                        <option <?php echo ((!empty($cartorio->ativo)) && (!$cartorio->ativo)) ? 'selected' : ''; ?> value="0">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary float-right">Enviar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include appbasepath() . '/src/views/paginas/pieces/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include appbasepath() . '/src/views/paginas/pieces/scripts.php'; ?>
</body>

</html>