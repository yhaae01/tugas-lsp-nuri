<div class="container">
    <h3 class="my-4"><?= $title; ?></h3>
    
    <div class="row mb-3">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="col-lg-6">
            <a href="<?= base_url('buku/tambahBuku') ?>" class="btn btn-primary btn-sm">Tambah Buku</a>
        </div>
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control btn-sm" name="cari" placeholder="Cari sesuatu . . .">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="submit"><span class="fas fas-search"></span> Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php if (empty($buku)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data tidak ditemukan!
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col" class="text-center">Sampul</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($buku as $b) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $b['judul']; ?></td>
                            <td><?= $b['pengarang']; ?></td>
                            <td><?= $b['penerbit']; ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/buku/') . $b['image']; ?>" height="70"></td>
                            <td class="text-center">
                                <a href="<?= base_url('buku/detailBuku/') . $b['id_buku']; ?>" class="badge badge-info"><span class="fas fas-eye"></span> detail</a>
                                <a href="<?= base_url('buku/ubahBuku/') . $b['id_buku']; ?>" class="badge badge-warning"><span class="fas fas-edit"></span> ubah</a>
                                <a href="#" data-toggle="modal" data-target="#hapusBuku<?= $b['id_buku']; ?>"class="badge badge-danger"><span class="fas fas-trash"></span> hapus</a>
                            </td>
                        </tr>

                        <!-- Hapus Modal -->
                        <div class="modal fade" id="hapusBuku<?= $b['id_buku']; ?>" tabindex="-1" aria-labelledby="hapusBukuLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('buku/hapus/') . $b['id_buku']; ?>" method="post">
                                            <p>Yakin ingin hapus Buku: <strong><?= ucwords($b['judul']); ?> </strong></p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
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