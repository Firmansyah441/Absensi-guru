<!-- Modal -->
<div class="modal fade" id="tambahguru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="/tambah_guru" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="contoh: m.Idad.spg">
                  </div>
                  <div class="mb-3">
                    <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="nip" class="form-label">Nip</label>
                    <input type="text" class="form-control" name="nip" id="nip" placeholder="contoh: 1234567890">
                  </div>
                  <div class="mb-3">
                    <label for="nuptk" class="form-label">Nuptk</label>
                    <input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="contoh: 12773561">
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="contoh: jl.kemang 123">
                  </div>
                  <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="contoh: 08123456789">
                  </div>
                  <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Qr-code</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" placeholder="qr-code">
                  </div>
                  <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata  Pelajaran</label>
                    <select name="mata_pelajaran" required>
                        <option value="MTK">MTK</option>
                        <option value="B.INDONESIA">B.INDONESIA</option>
                        <option value="B.INGGRIS">B.INGGRIS</option>
                        <option value="PKN">PKN</option>
                        <option value="PAI">PAI</option>
                        <option value="KWU">KWU</option>
                        <option value="BK">BK</option>
                        <option value="C#">C#/DESKTOP</option>
                        <option value="WEB">WEB</option>
                        <option value="DATABASE">DATABASE</option>
                        <option value="PPL">PPL</option>
                        <option value="PKK">PKK</option>
                        <option value="PPB">PPB</option>
                    </select>
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
