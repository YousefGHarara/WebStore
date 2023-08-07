<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <tbody>
        <?php
                    
                    $cnt=1;

                    if($category->getNumOfRows() > 0)
                    {
                      foreach($query_page as $row)
                      {
                        ?>
        <tr>
            <td class="text-center"><?php echo htmlentities($cnt);?></td>
            <td class="">
                <a href="#" class=" edit_data5"
                    id="<?php echo ($row['category_id']); ?>"><?php  echo htmlentities($row['category_name']);?></a>
            </td>
            <td class="text-center"><?php  echo htmlentities($row['category_code']);?></td>
            <td class=" text-center">
                <a href="edit_category.php?editid=<?=$row['category_id']?>" class=" edit_data4"
                    id="<?php echo ($row['category_id']); ?>" title="click to edit"><i
                        class="mdi mdi-pencil-box-outline" aria-hidden="true"></i></a>
                <a href="delete_category.php?del=<?= $row['category_id']; ?>" data-toggle="tooltip"
                    data-original-title="Delete" class="btn-del"> <i class="mdi mdi-delete"></i> </a>
            </td>
        </tr>
        <?php
                        $cnt=$cnt+1;
                      }
                    } ?>
    </tbody>

</body>

</html>