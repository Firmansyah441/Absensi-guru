<!-- Modal Update -->
<div class="modal fade" id="editguruModal{{ $guru->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('gurus.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $guru->name }}">
                  </div>
                  <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ $guru->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $guru->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="nip" class="form-label">Nip</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="{{ $guru->nip }}">
                  </div>
                  <div class="mb-3">
                    <label for="nuptk" class="form-label">Nuptk</label>
                    <input type="text" class="form-control" name="nuptk" id="nuptk" value="{{ $guru->nuptk }}">
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $guru->alamat }}">
                  </div>
                  <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="{{ $guru->no_telepon }}">
                  </div>
                  <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Qr-code</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                  </div>
                  <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata  Pelajaran</label>
                    <select name="mata_pelajaran" required>
                        <option value="MTK" {{ $guru->mata_pelajaran == 'MTK' ? 'selected' : '' }}>MTK</option>
                        <option value="B.INDONESIA"{{ $guru->mata_pelajaran == 'B.INDONESIA' ? 'selected' : '' }}>B.INDONESIA</option>
                        <option value="B.INGGRIS"{{ $guru->mata_pelajaran == 'B.INGGRIS' ? 'selected' : '' }}>B.INGGRIS</option>
                        <option value="PKN"{{ $guru->mata_pelajaran == 'PKN' ? 'selected' : '' }}>PKN</option>
                        <option value="PAI"{{ $guru->mata_pelajaran == 'PAI' ? 'selected' : '' }}>PAI</option>
                        <option value="KWU"{{ $guru->mata_pelajaran == 'KWU' ? 'selected' : '' }}>KWU</option>
                        <option value="BK"{{ $guru->mata_pelajaran == 'BK' ? 'selected' : '' }}>BK</option>
                        <option value="C#"{{ $guru->mata_pelajaran == 'C#' ? 'selected' : '' }}>C#/DESKTOP</option>
                        <option value="WEB"{{ $guru->mata_pelajaran == 'WEB' ? 'selected' : '' }}>WEB</option>
                        <option value="DATABASE"{{ $guru->mata_pelajaran == 'DATABASE' ? 'selected' : '' }}>DATABASE</option>
                        <option value="PPL"{{ $guru->mata_pelajaran == 'PPL' ? 'selected' : '' }}>PPL</option>
                        <option value="PKK"{{ $guru->mata_pelajaran == 'PKK' ? 'selected' : '' }}>PKK</option>
                        <option value="PPB"{{ $guru->mata_pelajaran == 'PPB' ? 'selected' : '' }}>PPB</option>
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
