<div class="container">
    <h3 class="my-4"><?= $title; ?></h3>
    
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="<?= base_url('kategori/tambahkategori') ?>" class="btn btn-primary btn-sm">Tambah kategori</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($kategori as $k) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $k['kategori']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('kategori/ubahKategori/') . $k['id_kategori']; ?>" class="badge badge-warning"><span class="fas fas-edit"></span> ubah</a>
                                <a href="#" data-toggle="modal" data-target="#hapuskategori<?= $k['id_kategori']; ?>"class="badge badge-danger"><span class="fas fas-trash"></span> hapus</a>
                            </td>
                        </tr>

                        <!-- Hapus Modal -->
                        <div class="modal fade" id="hapuskategori<?= $k['id_kategori']; ?>" tabindex="-1" aria-labelledby="hapuskategoriLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('kategori/hapusKategori/') . $k['id_kategori']; ?>" method="post">
                                            <p>Yakin ingin hapus kategori: <strong><?= ucwords($k['kategori']); ?> </strong></p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Ya, hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Hapus Modal -->

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>