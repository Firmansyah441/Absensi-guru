 <!-- Modal Edit -->
 <div class="modal fade" id="editLibur{{ $libur->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $libur->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('liburs.update', $libur->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $libur->id }}">Edit Libur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tapel_id" class="form-label">Tahun Ajaran</label>
                        <select name="tapel_id" class="form-control" required>
                            @foreach ($tapels as $tapel)
                                <option value="{{ $tapel->id }}" {{ $libur->tapel_id == $tapel->id ? 'selected' : '' }}>
                                    {{ $tapel->tahun_ajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_libur" class="form-label">Nama Libur</label>
                        <input type="text" class="form-control" name="nama_libur" value="{{ $libur->nama_libur }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggal_mulai" value="{{ $libur->tanggal_mulai }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tanggal_selesai" value="{{ $libur->tanggal_selesai }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
