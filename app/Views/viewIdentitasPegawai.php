<?= $this->extend('template'); ?>

<?= $this->section('menu'); ?>
<!-- Page Heading -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-square mr-2"></i>Tambah Data</button>
        </div>
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary text-center">IDENTITAS PEGAWAI</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>NIP</th>
                                    <th>No. Telepon</th>
                                    <th>Tahun Pengangkatan</th>
                                    <th>Golongan</th>
                                    <th>Lihat</th>
                                    <th>Ubah</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach ($identitasPegawai as $ip) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $ip['nama']; ?></td>
                                        <td><?= $ip['tanggalLahir']; ?></td>
                                        <td><?= $ip['nip']; ?></td>
                                        <td><?= $ip['noTelepon']; ?></td>
                                        <td><?= $ip['tahunPengangkatan']; ?></td>
                                        <td><?= $ip['golongan']; ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#lihat<?= $ip['id']; ?>"><i class="fas fa-eye"></i></button>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah<?= $ip['id']; ?>"><i class=" fas fa-edit"></i></button>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $ip['id']; ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>

                                <?php $id = $ip['id'] ?>

                                <!-- Modal -->
                                <div class="modal fade" id="lihat<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">LIHAT DATA IDENTITAS PEGAWAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="lihatNama<?= $id; ?>" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="lihatNama<?= $id; ?>" name="lihatNama" readonly value="<?= $ip['nama']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lihatTanggalLahir<?= $id; ?>" class="form-label">Tanggal Lahir</label>
                                                        <input type="text" class="form-control" id="lihatTanggalLahir<?= $id; ?>" name="lihatTanggalLahir" readonly value="<?= $ip['tanggalLahir']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lihatNip<?= $id; ?>" class="form-label">NIP</label>
                                                        <input type="text" class="form-control" id="lihatNip<?= $id; ?>" name="lihatNip" readonly value="<?= $ip['nip']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lihatNoTelepon<?= $id; ?>" class="form-label">No. Telepon</label>
                                                        <input type="text" class="form-control" id="lihatNoTelepon<?= $id; ?>" name="lihatNoTelepon" readonly value="<?= $ip['noTelepon']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lihatTahunPengangkatan<?= $id; ?>" class="form-label">Tahun Pengangkatan</label>
                                                        <input type="text" class="form-control" id="lihatTahunPengangkatan<?= $id; ?>" name="lihatTahunPengangkatan" readonly value="<?= $ip['tahunPengangkatan']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lihatGolongan<?= $id; ?>" class="form-label">Golongan</label>
                                                        <input type="text" class="form-control" id="lihatGolongan<?= $id; ?>" name="lihatGolongan" readonly value="<?= $ip['golongan']; ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="hapus<?= $ip['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/identitaspegawai/<?= $ip['id']; ?>" method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">HAPUS DATA IDENTITAS PEGAWAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="hapusNama<?= $id; ?>" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="hapusNama<?= $id; ?>" name="hapusNama" readonly value="<?= $ip['nama']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hapusTanggalLahir<?= $id; ?>" class="form-label">Tanggal Lahir</label>
                                                        <input type="text" class="form-control" id="hapusTanggalLahir<?= $id; ?>" name="hapusTanggalLahir" readonly value="<?= $ip['tanggalLahir']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hapusNip<?= $id; ?>" class="form-label">NIP</label>
                                                        <input type="text" class="form-control" id="hapusNip<?= $id; ?>" name="hapusNip" readonly value="<?= $ip['nip']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hapusNoTelepon<?= $id; ?>" class="form-label">No. Telepon</label>
                                                        <input type="text" class="form-control" id="hapusNoTelepon<?= $id; ?>" name="hapusNoTelepon" readonly value="<?= $ip['noTelepon']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hapusTahunPengangkatan<?= $id; ?>" class="form-label">Tahun Pengangkatan</label>
                                                        <input type="text" class="form-control" id="hapusTahunPengangkatan<?= $id; ?>" name="hapusTahunPengangkatan" readonly value="<?= $ip['tahunPengangkatan']; ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?');">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="ubah<?= $ip['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form autocomplete="off" action="/identitaspegawai/ubah/<?= $ip['id']; ?>" method="POST" class="needs-validation" novalidate>
                                                <div class="modal-header">
                                                    <h5 class="modal-title " id="exampleModalLabel">UBAH DATA IDENTITAS PEGAWAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?= $ip['id']; ?>">
                                                    <div class="mb-3">
                                                        <label for="ubahNama<?= $id; ?>" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="ubahNama<?= $id; ?>" name="ubahNama" value="<?= (old('ubahNama')) ? old('ubahNama') : $ip['nama']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubahTanggalLahir<?= $id; ?>" class="form-label">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="ubahTanggalLahir<?= $id; ?>" name="ubahTanggalLahir" value="<?= (old('ubahTanggalLahir')) ? old('ubahTanggalLahir') : $ip['tanggalLahir']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubahNip<?= $id; ?>" class="form-label">NIP</label>
                                                        <input type="text" class="form-control" id="ubahNip<?= $id; ?>" name="ubahNip" value="<?= (old('ubahNip')) ? old('ubahNip') : $ip['nip']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubahNoTelepon<?= $id; ?>" class="form-label">No Telepon</label>
                                                        <input type="text" class="form-control" id="ubahNoTelepon<?= $id; ?>" name="ubahNoTelepon" value="<?= (old('ubahNoTelepon')) ? old('ubahNoTelepon') : $ip['noTelepon']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ubahTahunPengangkatan<?= $id; ?>" class="form-label">Tahun Pengangkatan</label>
                                                        <input type="text" class="form-control" id="ubahTahunPengangkatan<?= $id; ?>" name="ubahTahunPengangkatan" value="<?= (old('ubahTahunPengangkatan')) ? old('ubahTahunPengangkatan') : $ip['tahunPengangkatan']; ?>">
                                                    </div>s
                                                    <div class="mb-3">
                                                        <label for="ubahTahunPengangkatan" class="form-label">Golongan</label>
                                                        <select name="ubahGolongan" id="ubahGolongan<?= $id; ?>" required class="form-control">
                                                            <option value="" selected>--- Pilih --- </option>
                                                            <option value="II - A">II - A</option>
                                                            <option value="II - B">II - B</option>
                                                            <option value="II - C">II - C</option>
                                                            <option value="II - D">II - D</option>
                                                            <option value="III - A">III - A</option>
                                                            <option value="III - B">III - B</option>
                                                            <option value="III - C">III - C</option>
                                                            <option value="III - D">III - D</option>
                                                            <option value="IV - A">IV - A</option>
                                                            <option value="IV - B">IV - B</option>
                                                            <option value="IV - C">IV - C</option>
                                                            <option value="IV - D">IV - D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-warning" onclick="return confirm('Ubah Data?');">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- Modal -->
                            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form autocomplete="off" action="/IdentitasPegawai/tambah" method="POST" class="needs-validation" novalidate>
                                            <div class="modal-header">
                                                <h5 class="modal-title " id="exampleModalLabel">TAMBAH DATA IDENTITAS PEGAWAI</h5>
                                            </div>
                                            <div class="modal-body">
                                                <?= csrf_field(); ?>
                                                <div class="mb-3">
                                                    <label for="tambahNama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="tambahNama" name="tambahNama" value="<?= old('tambahNama'); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tambahTanggalLahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tambahTanggalLahir" name="tambahTanggalLahir" value="<?= old('tambahTanggalLahir'); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tambahNip" class="form-label">NIP</label>
                                                    <input type="text" class="form-control" id="tambahNip" name="tambahNip" value="<?= old('tambahNip'); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tambahNoTelepon" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" id="tambahNoTelepon" name="tambahNoTelepon" value="<?= old('tambahNoTelepon'); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tambahTahunPengangkatan" class="form-label">Tahun Pengangkatan</label>
                                                    <input type="text" class="form-control" id="tambahTahunPengangkatan" name="tambahTahunPengangkatan" value="<?= old('tambahTahunPengangkatan'); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tambahTahunPengangkatan" class="form-label">Golongan</label>
                                                    <select name="tambahGolongan" id="tamahGolongan" required class="form-control">
                                                        <option value="" selected>--- Pilih --- </option>
                                                        <option value="II - A">II - A</option>
                                                        <option value="II - B">II - B</option>
                                                        <option value="II - C">II - C</option>
                                                        <option value="II - D">II - D</option>
                                                        <option value="III - A">III - A</option>
                                                        <option value="III - B">III - B</option>
                                                        <option value="III - C">III - C</option>
                                                        <option value="III - D">III - D</option>
                                                        <option value="IV - A">IV - A</option>
                                                        <option value="IV - B">IV - B</option>
                                                        <option value="IV - C">IV - C</option>
                                                        <option value="IV - D">IV - D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success" onclick="return confirm('Tambah Data?');">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>