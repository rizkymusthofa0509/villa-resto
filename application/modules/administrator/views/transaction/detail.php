<table class="table table-bordered">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total = 0;
            foreach ($detail->result() as $data) {
                echo 
                '
                    <tr>
                        <td>'.$data->prod_name.'</td>
                        <td>'.$data->prod_price.'</td>
                        <td>'.$data->qty.'</td>
                        <td>'.rp($data->total_price).'</td>
                        <td>'.$data->notes.'</td>
                    </tr>
                ';
                $total = $total+$data->total_price;
            }
        ?> 
    </tbody>
    <tfoot>
            <tr>
                <td colspan="3"><b>Total</b></td>
                <td><b><?= rp($total) ?></b></td>
                <td colspan="1"></td>
            </tr>
    </tfoot>
</table>