<div class="container">
    <h1 class="text-center my-4">SORTING</h1>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card text-center">
                <div class="card-body">
                    <form action="" method="post">     
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" name="a">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" name="b">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" name="c">
                                </div>
                            </div>
                            <div class="col-lg">
                                <input type="submit" name="hitung" class="btn btn-primary btn-sm" value="Hitung">
                            </div>
                        </div>      
                    </form>
                    <div class="card mt-3">
                        <div class="card-body">
                        <h5>HASIL :</h5>
                            <?php  
                                if(isset($_POST['hitung'])){
                                    $a  = $_POST['a'];
                                    $b  = $_POST['b'];
                                    $c  = $_POST['c'];

                                    $angka = [$a, $b, $c]; 	

                                    sort($angka);  
                                    echo "</br>";
                                    echo "<div class='alert alert-primary' role='alert'> <strong> ";
                                    
                                    $jumlah = count($angka);  
                                    for($x = 0; $x < $jumlah; $x++)  
                                    {  
                                        echo $angka[$x];  
                                        echo ", ";  
                                    }  	
                                    echo "</strong> </div>";
                                }
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>