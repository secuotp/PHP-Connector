<html>
    <body>
        <?php
            $param = new XMLParameter();
            $param->add("aha", "vava1");
            $param->add("ahe", "vava2");
            $param->add("ahu", "vava3");
            
            for($i = 0; $i < 3; $i++){
                echo $param->pop();
            }
        ?>
    </body>
</html>