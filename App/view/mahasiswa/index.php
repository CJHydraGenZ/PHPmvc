<div class="container mt-3">


    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::flash();   ?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>

            <br><br>
            <h3>Daftar mahasiswa</h3>


            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item"><?= $mhs['nama'];   ?>


                        <a href="<?= BASEURL;   ?>/mahasiswa/hapus/<?= $mhs['id'];   ?>" class="badge badge-danger float-right ml-1 tbn-hapus">Hapus</a>
                        <a href="<?= BASEURL;   ?>/mahasiswa/detail/<?= $mhs['id'];   ?>" class="badge badge-primary float-right ml-1">Detail</a>
                    </li>
                <?php endforeach ?>
            </ul>


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;   ?>/mahasiswa/tambah" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="number" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="jurusan">jurusant</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Sistem Komputer">Sistem Komputer</option>

                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>