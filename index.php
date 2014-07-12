<html>
    <body>
        <?php
            include 'XMLParameter.php';

            $param = new XMLParameter();
            $param->add("aha", "vava1");
            $param->add("ahe", "vava2");
            $param->add("ahu", "vava3");
            $param->add("aho", "vava4");

            while($param->hasNext()){
                $text = $param->pop();
                echo '<p>key='.$text[0].' value='.$text[1].'</p>';
            }

            $param->clear();
            
            echo '<h1>'.$param->hasNext().'</h1>';
        ?>
    </body>
</html>