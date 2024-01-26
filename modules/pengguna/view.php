<div class="row my-3">
   <div class="col-md-12">
      <h5>
         <i class="fas fa-user-lock me-1"></i> Data Pengguna
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-sm btn-info text-white float-end" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="fas fa-plus"></i> Tambah
         </button>
      </h5>
   </div>
</div>
<hr>
<div class="row">
   <div class="col-md-12">
      <!-- Pesan Sukses -->
      <?php
      if (isset($_SESSION['alert'])) {
      ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i> <strong>Sukses!</strong> <?= $_SESSION['alert']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
      }
      unset($_SESSION['alert']);
      ?>
      <!-- Pesan Gagal -->
      <?php
      if (isset($_SESSION['alert_konfirmasi'])) {
      ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-times-circle me-2"></i> <strong>Gagal!</strong> <?= $_SESSION['alert_konfirmasi']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
      }
      unset($_SESSION['alert_konfirmasi']);
      ?>
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Pengguna</th>
                  <th>Username</th>
                  <th width="90" class="text-center">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $query = $conn->query("SELECT * FROM pengguna ORDER BY id_pengguna DESC");
               foreach ($query as $pgn) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $pgn['nama_pengguna']; ?></td>
                     <td><?= $pgn['username']; ?></td>
                     <td class="text-center">
                        <button type="button" data-bs-target="#editModal<?= $pgn['id_pengguna'] ?>" data-bs-toggle="modal" class="btn btn-sm text-white btn-info">
                           <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" data-bs-target="#hapusModal<?= $pgn['id_pengguna'] ?>" data-bs-toggle="modal" class="btn btn-sm text-white btn-danger">
                           <i class="fas fa-trash"></i>
                        </button>
                     </td>
                  </tr>

                  <!-- Modal Edit-->
                  <div class="modal fade" id="editModal<?= $pgn['id_pengguna'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-user-edit"></i> Edit Data pengguna</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pengguna/proses_edit.php" method="post">
                              <input type="hidden" name="id_pengguna" value="<?= $pgn['id_pengguna'] ?>">
                              <div class="modal-body px-4">
                                 <div class="mb-2">
                                    <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                                    <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" value="<?= $pgn['nama_pengguna'] ?>" autocomplete="off" required>
                                 </div>
                                 <div class="mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="<?= $pgn['username'] ?>" autocomplete="off" required readonly>
                                 </div>
                                 <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password baru" autocomplete="off">
                                 </div>
                                 <div class="mb-2">
                                    <label for="konfirmasi" class="form-label">Konfirmasi</label>
                                    <input type="password" name="konfirmasi" class="form-control" id="konfirmasi" placeholder="Ulangi password baru" autocomplete="off">
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                                 <button type="submit" name="submit" class="btn btn-sm btn-info text-white">Simpan</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  <!-- Modal Hapus-->
                  <div class="modal fade" id="hapusModal<?= $pgn['id_pengguna'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-trash"></i> Hapus Data pengguna</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pengguna/proses_hapus.php" method="post">
                              <div class="modal-body px-4">
                                 <input type="hidden" name="id_pengguna" value="<?= $pgn['id_pengguna'] ?>">
                                 <div class="fs-6">Apakah pengguna <strong><?= $pgn['nama_pengguna'] ?></strong> dengan username <strong><?= $pgn['username'] ?></strong> akan dihapus?</div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                                 <button type="submit" name="submit" class="btn btn-sm btn-danger text-white">Hapus</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               <?php endforeach ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Entry Data pengguna</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="modules/pengguna/proses_tambah.php" method="post">
            <div class="modal-body px-4">
               <div class="mb-2">
                  <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                  <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" placeholder="Masukkan nama pengguna" autocomplete="off" required>
               </div>
               <div class="mb-2">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" autocomplete="off" required>
               </div>
               <div class="mb-4">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" autocomplete="off" required>
               </div>
               <div class="mb-2">
                  <label for="konfirmasi" class="form-label">Konfirmasi Password</label>
                  <input type="password" name="konfirmasi" class="form-control" id="konfirmasi" placeholder="Ulangi Password" autocomplete="off" required>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
               <button type="submit" name="submit" class="btn btn-sm btn-info text-white">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>