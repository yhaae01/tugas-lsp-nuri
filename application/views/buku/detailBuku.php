<div class="container">
    <h3 class="my-4"><?= $title; ?></h3>
    <div class="row">
        <div class="col-lg-2">
            <img class="mb-3 img-thumbnail" src="<?= base_url('assets/img/buku/') . $buku['image']; ?>" height="500">
        </div>
        <div class="col-lg-6">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Judul</th>
                        <td><?= $buku['judul']; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td><?= $buku['isbn']; ?></td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td><?= $buku['kategori']; ?></td>
                    </tr>
                    <tr>
                        <th>Pengarang</th>
                        <td><?= $buku['pengarang']; ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td><?= $buku['penerbit']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>