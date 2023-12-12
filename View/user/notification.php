<div class="card m-2">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Nội dung thông báo</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=0;$i<$count_feedback;$i++)
                {
                    $feedback = $list_feedback[$i];
                ?>
                <tr>
                    <th scope="row">
                        <?=$i+1?>
                    </th>
                    <td>
                        Đánh giá sản phẩm của hóa đơn chi tiết <strong>#<?=$feedback['id_ct']?></strong>
                    </td>
                    <td>
                        <?php 
                        if($feedback['status']==1)
                        {
                        ?>
                        <a href="index.php?act=review&id_review=<?=$feedback['id_review']?>"><span class="badge badge-sa-warning me-2">Click để đánh giá</span></a>
                        <?php
                        }else
                        {
                        ?>
                            <span class="badge badge-sa-success">Đã đánh giá lúc <?=$feedback['date_submit']?></span>
                            <?php
                            }
                        ?>
                    </td>
                    <td>
                        <?=$feedback['date_create']?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>