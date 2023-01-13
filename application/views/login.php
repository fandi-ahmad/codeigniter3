<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="row mt-5">
    <div class="col md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">LOGIN</div>
                <?php
    	            echo form_open(site_url('produk/login'));
                    echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'username']);
                    echo form_input(['name'=>'password', 'class'=>'form-control', 'placeholder'=>'password', 'type'=>'password']);
                    echo form_submit(['name'=>'login', 'class'=>'btn btn-primary', 'value'=>'login']);
                    echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>