<?php
$path='assets/articles';
$file = glob($path.'/'.$_GET['id'].'a*');
$i=0;
while($i<count($file)){
    $filee=pathinfo($file[$i]);
    

    $extension=strtolower($filee['extension']);
    if($extension=="jpg"){
echo '<img src="'.$file[$i].'"width="400px">';
    }
    else{
        echo '
        <video width="400" controls>
        <source src="'.$file[$i].'" type="video/mp4">
      </video>';
    }
    $i++;
}
?>
<script>
    if (window.chrome)
    $("[type=video\\\/mp4]").each(function()
    {
        $(this).attr('src', $(this).attr('src').replace(".mp4", "_c.mp4"));
    });
</script>