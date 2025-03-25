<!-- Modal Update -->
<div class="modal fade" id="editkepsek{{ $kepsek->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('kepseks.update', $kepsek->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Kepsek</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $kepsek->name }}">
                  </div>
                  <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ $kepsek->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $kepsek->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="nip" class="form-label">Nip</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="{{ $kepsek->nip }}">
                  </div>
                  <div class="mb-3">
                    <label for="nuptk" class="form-label">NUPTK</label> 
                    <input type="text" class="form-control" name="nuptk" id="nuptk" value="{{ $kepsek->nuptk }}">
                </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $kepsek->alamat }}">
                  </div>
                  <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="{{ $kepsek->no_telepon }}">
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
