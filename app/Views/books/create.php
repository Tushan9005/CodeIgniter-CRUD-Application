<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CodeIgniter 4 CRUD Application</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
</head>
<body>
    <div class="container-fluid bg-purple shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="text-white h4">
            Simple CodeIgniter 4 CRUD Application
            </div>
        
        </div>
    </div>
    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <div class="nav-link">
                        Books / View
                    </div>
                </nav>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('/') ?>" class="btn btn-primary">BACK</a>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-purple">
                    <div class="card-header-title">
                        Create Book
                    </div>
                </div>
                <div class="card-body">

                    <form name="createForm" id="createForm" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" placeholder="Name" id="title" name="title" class="form-control <?php echo (isset($validation) && $validation->hasError('title')) ? 'is-invalid':''; ?>" value="<?php echo set_value('title'); ?>">
                        <?php
                            if(isset($validation) && $validation->hasError('title')){
                                echo '<p class="invalid-feedback">'.$validation->getError('title').'</p>';
                            }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" placeholder="Author" id="author" name="author" class="form-control <?php echo (isset($validation) && $validation->hasError('author')) ? 'is-invalid':''; ?>" value="<?php echo set_value('author'); ?>">
                        <?php
                            if(isset($validation) && $validation->hasError('author')){
                                echo '<p class="invalid-feedback">'.$validation->getError('author').'</p>';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" placeholder="ISBN no." id="isbn_no" name="isbn_no" class="form-control <?php echo (isset($validation) && $validation->hasError('isbn_no'))?'is-invalid':''; ?>" value="<?php echo set_value('isbn_no'); ?>">
                        <?php
                            if(isset($validation) && $validation->hasError('isbn_no')){
                                echo '<p class="invalid-feedback">'.$validation->getError('isbn_no').'</p>';
                            }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>