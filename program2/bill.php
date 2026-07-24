<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Enters units consumed:
        <input type="number" name="units" required/>
        <input type="submit" value="calculate"/>
        <?php
       if(isset($_POST['units']))
        {
        $units=$_POST['units'];

        if($units<=100)
            {
            $bill_amt=$units *5;

        }
        else if($units<=200)
            {
            $bill_amt=((100*5)+($units -100)*7);

        }
        else if($units<=300)
            {
            $bill_amt=((100*5)+($units -100)*10);

        }
        else
             {
            $bill_amt =(100*5)+(100*7)+($units-200)*10;

        }
        echo "Total bill amount".$bill_amt;
       }
        ?>
    </form>
</body>
</html>