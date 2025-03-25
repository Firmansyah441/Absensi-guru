<!-- Modal -->
<div class="modal fade" id="tambahadmmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="/tambah_admin" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Admin</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="contoh: Jamal">
                  </div>
                  <div class="mb-3">
                    <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="contoh: Jl. Raya Cibaduyut">
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="contoh: 08123456789">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
    </div>
  </div>
