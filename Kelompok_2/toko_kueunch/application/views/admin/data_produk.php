<div class="container-fluid">
        <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i> Tambah Produk</button>

        <table class="table-bordered">
            <tr>
                <th>NO</th>
                <th>NAMA PRODUK</th>
                <th>KETERANGAN</th>
                <th>KATEGORI</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th colspan="3">AKSI</th>
            </tr>

            <?php
            $no=1;
            foreach($produk as $produk) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $produk->nama_produk ?></td>
                <td><?php echo $produk->keterangan ?></td>
                <td><?php echo $produk->kategori ?></td>
                <td><?php echo $produk->harga ?></td>
                <td><?php echo $produk->stok ?></td>
                <td><div class="btn btn-success btn-sm mr-2 ml-2"><i class="fas fa-search-plus"></i></div></td>
                <td><?php echo anchor('admin/data_produk/edit/' .$produk->id_produk, '<div class="btn btn-primary btn-sm mr-2 ml-2"><i class="fa fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_produk/hapus/' .$produk->id_produk, '<div class="btn btn-danger btn-sm mb-2 ml-2"><i class="fa fa-trash"></i></div>') ?></td>

            </tr>

            <?php endforeach; ?>

</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url (). 'admin/data_produk/tambah_aksi' ?>" method ="post" enctype="multipart/form-data" >

                <div class="form-group">
                    <label>Id Produk</label>
                    <input type="text" name="id_produk" class="form-control">
                </div>
        
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name"kategori">
                    <option>Cokelat</option>
                    <option>Karakter</option>
                    <option>Pelangi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control">
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control">
                </div>
    
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

            </form>

    </div>
  </div>
</div>