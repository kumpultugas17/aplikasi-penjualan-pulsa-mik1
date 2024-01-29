<div class="row my-3">
   <div class="col-md-12">
      <h5>
         <i class="fas fa-shopping-cart"></i> Data Penjualan
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
                  <th>Tanggal</th>
                  <th>Nama Pelanggan</th>
                  <th>Provider</th>
                  <th>Harga</th>
                  <th width="90" class="text-center">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $query = $conn->query("SELECT * FROM penjualan pjl INNER JOIN pelanggan plg ON pjl.pelanggan_id = plg.id_pelanggan INNER JOIN pulsa pls ON pjl.pulsa_id = pls.id_pulsa ORDER BY tanggal DESC");
               foreach ($query as $pjl) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $pjl['tanggal']; ?></td>
                     <td><?= $pjl['nama_pelanggan'] . "<small class='text-muted'> - " . $pjl['no_hp'] . "</small>"; ?></td>
                     <td><?= $pjl['operator'] . "<small class='text-muted'> - " . number_format($pjl['nominal'], 0, ',', '.') . "</small>"; ?></td>
                     <td>Rp. <?= number_format($pjl['harga_jual'], 0, ',', '.'); ?></td>
                     <td class="text-center">
                        <button type="button" data-bs-target="#editModal<?= $pjl['id_penjualan'] ?>" data-bs-toggle="modal" class="btn btn-sm text-white btn-info">
                           <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" data-bs-target="#hapusModal<?= $pjl['id_penjualan'] ?>" data-bs-toggle="modal" class="btn btn-sm text-white btn-danger">
                           <i class="fas fa-trash"></i>
                        </button>
                     </td>
                  </tr>

                  <!-- Modal Edit-->
                  <div class="modal fade" id="editModal<?= $pjl['id_penjualan'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-user-edit"></i> Edit Data pengguna</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pengguna/proses_edit.php" method="post">
                              <input type="hidden" name="id_penjualan" value="<?= $pjl['id_penjualan'] ?>">
                              <div class="modal-body px-4">
                                 <div class="mb-2">
                                    <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                                    <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" value="<?= $pjl['nama_pengguna'] ?>" autocomplete="off" required>
                                 </div>
                                 <div class="mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="<?= $pjl['username'] ?>" autocomplete="off" required readonly>
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
                  <div class="modal fade" id="hapusModal<?= $pjl['id_penjualan'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-trash"></i> Hapus Data pengguna</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pengguna/proses_hapus.php" method="post">
                              <div class="modal-body px-4">
                                 <input type="hidden" name="id_penjualan" value="<?= $pjl['id_penjualan'] ?>">
                                 <div class="fs-6">Apakah pengguna <strong><?= $pjl['nama_pengguna'] ?></strong> dengan username <strong><?= $pjl['username'] ?></strong> akan dihapus?</div>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-cart-plus"></i> Entry Data Penjualan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="modules/penjualan/proses_tambah.php" method="post">
            <div class="modal-body px-4">
               <div class="mb-2">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= date('Y-m-d') ?>" autocomplete="off" required>
               </div>
               <div class="mb-2">
                  <label for="pelanggan" class="form-label">Nomor Handphone</label>
                  <select name="pelanggan" id="pelanggan" class="select" placeholder="Pilih nomor handphone" onchange="get_pelanggan()">
                     <option value=""></option>
                     <?php
                     $pelanggan = $conn->query("SELECT * FROM pelanggan");
                     foreach ($pelanggan as $plg) :
                     ?>
                        <option value="<?= $plg['id_pelanggan'] ?>"><?= $plg['no_hp'] ?></option>
                     <?php endforeach ?>
                  </select>
               </div>
               <div class="mb-2">
                  <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                  <input type="text" id="nama_pelanggan" class="form-control" readonly>
               </div>
               <div class="mb-2">
                  <label for="pulsa" class="form-label">Pulsa</label>
                  <select name="pulsa" id="pulsa" class="select" onchange="get_pulsa()">
                     <option value=""></option>
                     <?php
                     $pulsa = $conn->query("SELECT * FROM pulsa");
                     foreach ($pulsa as $pls) :
                     ?>
                        <option value="<?= $pls['id_pulsa'] ?>"><?= $pls['operator'] . " [" . $pls['nominal'] . "]"; ?></option>
                     <?php endforeach ?>
                  </select>
               </div>
               <div class="mb-2">
                  <label for="harga" class="form-label">Harga</label>
                  <div class="input-group">
                     <span class="input-group-text">Rp.</span>
                     <input type="number" id="harga" class="form-control">
                  </div>
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