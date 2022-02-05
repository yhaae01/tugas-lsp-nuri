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
                                        <input type="text" class="form-control" name="satu">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <input type="text" class="form-control" name="dua">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <input type="text" class="form-control" name="tiga">
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
                                        $satu   = $_POST['satu'];
                                        $dua    = $_POST['dua'];
                                        $tiga   = $_POST['tiga'];

                                        $angka = [$satu, $dua, $tiga]; 	

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