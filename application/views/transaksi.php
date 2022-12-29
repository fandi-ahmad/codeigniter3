<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo site_url('produk')?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary text-white rounded-3" href="<?php echo site_url('pembelian')?>">Pembelian</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid pt-4 px-4">
    <?php
        echo form_open(site_url('pembelian/simpan'));
        if (isset($pembelian)) {
            echo form_input(['name'=>'idpembelian', 'value' => $pembelian['idpembelian'], 'hidden'=>'true']);
            echo "Nama produk";
            $prd = null;
            $prd['']="- pilih produk -";

            foreach($produks as $produk) {
                $prd[$produk['id']] = $produk['namaproduk'];
            }

            echo form_dropdown(['name'=>'idproduk', 'class'=>'form-select'],$prd);
            form_error('idproduk');
        ?>
            <br>
        <?php
            echo "Jumlah";
            echo form_input(['name'=>'jumlah', 'value' => '0', 'type'=>'number', 'class'=>'form-control']);
            form_error('jumlah');
            echo form_submit(['name'=>'update', 'value'=>'simpan', 'class'=>'btn btn-sm btn-info mt-2 mb-3']);
            
        } 

        $template['table_open']="<table clsas='table table-sm table-bordered'>";
        $this->table->set_template($template);
        $rows=null;
        foreach($detils as $det) {
            $row['idproduk'] = $det['idproduk'];
            $row['namaproduk'] = $det['namaproduk'];
            $row['jumlah'] = $det['jumlah'];
            $row['hapus'] = "<a href='".site_url('pembelian/hapus/'.$row['idproduk'])."' class='btn btn-sm btn-danger'>hapus</a>";
            $rows[]=$row;
        }

        $this->table->set_heading('ID', 'produk', 'jumlah', 'hapus');
        echo $this->table->generate($rows);
    ?>
</div>

<script>
	const table = document.querySelector('table')
	table.classList.add('table')
	table.classList.add('table-bordered')
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>