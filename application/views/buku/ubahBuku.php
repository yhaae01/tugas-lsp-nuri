<div class="container">
    <h3 class="my-4"><?= $title; ?></h3>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <?php echo form_open_multipart(); ?>
                        <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                        <div class="form-group">
                            <label for="name">Judul</label>
                            <input type="text" class="form-control" name="judul" value="<?= $buku['judul']; ?>">
                            <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">ISBN</label>
                                    <input type="text" class="form-control" name="isbn" value="<?= $buku['isbn']; ?>">
                                    <?= form_error('isbn', '<small class="text-danger">', '</small>') ?>    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select class="custom-select" name="kategori">
                                        <option value="<?= $buku['kategori']; ?>"><?= $buku['kategori']; ?></option>
                                        <?php foreach($kategori as $k ) : ?>
                                            <option value="<?= $k['kategori'] ?>"><?= $k['kategori'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" value="<?= $buku['pengarang']; ?>">
                            <?= form_error('pengarang', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" value="<?= $buku['penerbit']; ?>">
                            <?= form_error('penerbit', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Sampul</label><br>
                            <img class="mb-3" src="<?= base_url('assets/img/buku/') . $buku['image']; ?>" height="120">
                            <div class="custom-file mb-2">
                                <input type="file" name="image" class="custom-file-input">
                                <label class="custom-file-label">Pilih gambar...</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>