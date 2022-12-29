<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Produk</title>
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
					<a class="nav-link active bg-secondary text-white rounded-3" aria-current="page" href="<?php echo site_url('produk')?>">Produk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('pembelian')?>">Pembelian</a>
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
		echo form_open(site_url('produk/simpan'));
		if (isset($produk)) {
			echo form_input(['name'=>'id', 'hidden'=>'true' , 'value' => $produk['id']]);
			echo "</br>". form_input(['name'=>'namaproduk', 'value' => $produk['namaproduk'], 'placeholder'=>'nama barang', 'class'=>'form-control']);
			echo form_error('namaproduk');
			echo "</br>". form_input(['name'=>'barcode', 'value' => $produk['barcode'], 'placeholder'=>'barcode', 'class'=>'form-control']);
			echo form_error('barcode');
			echo "</br>". form_submit(['name'=>'update', 'value'=>'simpan', 'class'=>'btn btn-info btn-sm mb-3']);
		} else {
			echo form_input(['name'=>'namaproduk', 'placeholder'=>'nama barang', 'class'=>'form-control']);
			echo '<small class="text-danger">'.form_error('namaproduk').'</small>';
			echo '</br>'.form_input(['name'=>'barcode', 'placeholder'=>'barcode', 'class'=>'form-control']);
			echo '<small class="text-danger">'.form_error('barcode').'</small>';
			echo '</br>'.form_submit(['name'=>'simpan', 'value'=>'simpan', 'class'=>'btn btn-info btn-sm mb-3']);
			echo form_close();
		}

		$this->table->set_heading('ID', 'Produk', 'Barcode', 'Action');
		echo $this->table->generate($produks);
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


