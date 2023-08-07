<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



                <div class="col">
                    <div class="card h-100 shadow custom-card">
                        <img src="productimages/<?=$result['store_photo']?>" alt=""
                            class="card-img-top w-100 custom-bg">
                        <div class="card-body">
                            <h4 class="card-title"><?=$result['store_name']?></h4>
                            <p class="">categroy : <?=$result['category_name']?></p>
                            <p class="">Address : <?=$result['store_address']?></p>
                            <p class="">Phone : <?=$result['store_phone']?></p>
                            <p class="">store rate : <?=$result['store_rate']?></p>
                        </div>
                        <div class="card-footer custom-footer">
                            <div class="float-start">
                                <!-- rating star -->
                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <?php
                                            $start = 1;
                                            while($start <= 5){
                                                if($result['store_rate'] < $start){
                                                    ?>
                                        <li class="list-inline-item"><i class="fa fa-star-o"
                                                style="color: #ffc000;"></i></li>
                                        <?php
                                                }else{
                                                    ?>
                                        <li class="list-inline-item"><i class="fa fa-star" style="color: #ffc000;"></i>
                                        </li>
                                        <?php
                                                }
                                                $start++;
                                            }
                                            ?>
                                    </ul>
                                </div>
                                <?php
                                ?>
                            </div>
                            <div class="float-end">

                                <form action="" method="post">
                                    <input type="hidden" name="swap" value="<?=$result['store_id']?>">
                                    <button class="btn btn-primary rounded-3 custom-btn" name="btn_store_rate">
                                        <i class="fas fa shopping-cart"></i> Rating
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

    
</body>
</html>