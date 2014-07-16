<?php
include 'ArrayList.php';
?>
<html>
    <head></head>
    <body>
        <?php
            $a = new ArrayList();
            $a->add(40);
            $a->add(100);
            $a->add(120);
            $a->add(150);
            $a->add(200);
            $a->add(400);
            
            $i = 0;
            while($i < $a->size()){
                echo '<h4>'.$a->get($i).'</h4>';
                $i++;
            }
            echo '<hr/>';
            
            $a->remove(3);
            $a->remove(0);
            $i = 0;
            while($i < $a->size()){
                echo '<h4>'.$a->get($i).'</h4>';
                $i++;
            }
        ?>
    </body>
</html>