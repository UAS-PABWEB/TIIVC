<div class="container-fluid">

        <div class="card">
            <h5 class="card-header">Detail Produk</h5>
            <div class="card-body">

                <?php foreach($produk as $produk): ?>
                <div class="row">
                        <div class="col-md-4">
                                        <img src="<?php echo base_url(). '/uploads/'.$produk->gambar ?>" class="card-img-top" alt">
                        </div>
                        <div class="col-md-8">  </div>
                                <table class="table">
                                    <tr>
                                        <td>Nama Produk</td>
                                        <td><strong><?php echo $produk->nama_produk?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Keterangan</td>
                                        <td><strong><?php echo $produk->keterangan?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Kategori</td>
                                        <td><strong><?php echo $produk->kategori?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Stok</td>
                                        <td><strong><?php echo $produk->stok?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Harga</td>
                                        <td><strong><div class="btn btn-sm btn-success"> Rp. <?php echo number_format($produk->harga, 0,',','.' ) ?></div></td>
                                    </tr>
                                </table>

                                <?php echo anchor('dashboard/tambah_ke_keranjang/' .$produk->id_produk, '<div class="btn btn-sm btn-primary">Tambah ke Pesanan</div>') ?>
                                <?php echo anchor('dashboard/index/' , '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
                </div>
                <?php  endforeach; ?>
            </div>
        </div>
</div>