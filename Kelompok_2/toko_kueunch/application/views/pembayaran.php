<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                <div class="btn btn-sm btn-success">
                    <?php
                    $grand_total = 0;
                    if ($keranjang = $this->cart->contents())
                    {
                        foreach ($keranjang as $item)
                        {
                            $grand_total = $grand_total + $item['subtotal'];
                        }

                    echo "<h5>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
                    ?>
                </div><br><br>

                <h4>Input Alamat Pengiriman dan Pembayaran</h4>

                <form method="post" action="<?php echo base_url() ?>dashboard/proses_pesanan">

                        <div class="form-group">

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telp" placeholder="Nomor Telepon Lengkap Anda" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Jasa Pengiriman</label>
                            <select class="form-control">
                               <option>GOJEK</option>
                               <option>GRAB</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih BANK</label>
                            <select class="form-control">
                               <option>BCA - xxxxx </option>
                               <option>BNI - xxxxx </option>
                               <option>BRI - xxxxx </option>
                           </select>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Pesan</

                </form>
                <?php
            } else
            {
                echo "<h4>Keranjang belanja anda masih kosong :(";
            }
                    ?>
        </div>

        
        <div class="col-md-2"></div>
    </div>
</div>