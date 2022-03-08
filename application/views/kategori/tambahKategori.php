<div class="container">
    <h3 class="my-4"><?= $title; ?></h3>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <?php echo form_open_multipart('kategori/tambahKategori') ?>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="kategori" value="<?= set_value('kategori') ?>">
                            <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>