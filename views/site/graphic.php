<?php

$this->title = 'График';
?>

<div class="site-index">

    <div class="body-content">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Номер платежа</th>
                <th scope="col">Дата платежа</th>
                <th scope="col">Платёж в месяц</th>
                <th scope="col">Сумма погашаемых процентов</th>
                <th scope="col">Сумма погашаемого основного долга</th>
                <th scope="col">Остаток основного долга</th>
            </tr>
            </thead>
			<?php for ($i = 1;
			$i <= $mounth;
			$i++)
			{ ?>
            <tbody>

            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $i; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $amountInMonth; ?></td>
                <td><?php echo $amountOfInterestPaid * $i; ?></td>
                <td><?php echo $amountInMonth * $i; ?></td>
                <td><?php echo $allSum - ($amountInMonth * $i); ?></td>
            </tr>

			<?php } ?>
            </tbody>
        </table>
    </div>
</div>