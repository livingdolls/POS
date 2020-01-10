<?php   
include 'konek.php';
 if(isset($_POST["query"]))  
 {  
      $output  = '';
      $harga   = '';
      $query   = "SELECT * FROM barang WHERE nama_barang LIKE '%".$_POST["query"]."%'";  
      $result  = mysqli_query($konek, $query);  
      $output  = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="barang">'.$row["nama_barang"].'</li>';
           }  
      }  
      else  
      {  
           $output .= '<li class="notfound">Barang Tidak Ditemukan</li>';  
      }  
      $output .= '</ul>';
      echo $output;  
 }  
 ?>  