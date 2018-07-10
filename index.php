<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Memory-first Calculator</title>
  
  
  
      <link rel="stylesheet" href="style.css">

  
</head>
<body>
	<br><center><br>
<?php
$buttons=['C','←','-/+','%',7,8,9,'/',4,5,6,'*',1,2,3,'-',0,'.','=','+'];
$pressed='';
if(isset($_POST['pressed']) && in_array($_POST['pressed'],$buttons)){
    $pressed=$_POST['pressed'];
}
$stored='';
if(isset($_POST['stored']) && preg_match('~^(?:[\d.]+[*/+-]?)+$~',$_POST['stored'],$out)){
    $stored=$out[0];    
}
$display=$stored.$pressed;
//echo "$pressed & $stored & $display<br>";
if($pressed=='C'){
    $display='';
}elseif($pressed=='=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$stored)){
    $display.=eval("return $stored;");
}

echo '<form action="" method="POST">';
echo '<div id="container">';
echo '<div id="the-calculator">';
    echo '<div id="the-display">';  
        echo '<span id="total">'.$display.'</span>';
        echo '</div>';
          foreach(array_chunk($buttons,4) as $chunk){
                foreach($chunk as $but){
        echo ' <div id="the-buttons">';
        echo '<div class="button-row clearfix">'; 
        echo (sizeof($chunk)!=4?" colspan=\"4\"":"");
      echo '<button name="pressed" value="'.$but.'" >'.$but.'</button>';
      }
      echo '  </div>';
     } 
      echo '<input type="hidden" name="stored" value="'.$display.'">';
    echo "</form>"; ?>
    </div>
  </div>
  
</div>
</body>
</html>
