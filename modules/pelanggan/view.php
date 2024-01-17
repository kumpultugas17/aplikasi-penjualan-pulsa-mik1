<div class="row my-3">
   <div class="col-md-12">
      <h5>
         <i class="fas fa-user-alt me-1"></i> Data Pelanggan
      </h5>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-sm btn-info text-white float-end" data-bs-toggle="modal" data-bs-target="#tambahModal">
         <i class="fas fa-plus"></i> Tambah
      </button>
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
      if (isset($_SESSION['alert'])) {
      ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i> <strong>Gagal!</strong> <?= $_SESSION['alert']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php 
      } 
      unset($_SESSION['alert']);
      ?>
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>No. Handphone</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $query = $conn->query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
               foreach ($query as $plg) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $plg['nama_pelanggan']; ?></td>
                     <td><?= $plg['no_hp']; ?></td>
                     <td></td>
                  </tr>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-edit"></i> Entry Data Pelanggan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="modules/pelanggan/proses_tambah.php" method="post">
            <div class="modal-body px-4">
               <div class="mb-3">
                  <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                  <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Masukkan nama" autocomplete="off" required>
               </div>
               <div class="mb-2">
                  <label for="no_hp" class="form-label">No. Handphone</label>
                  <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan nomor handphone" autocomplete="off" required>
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