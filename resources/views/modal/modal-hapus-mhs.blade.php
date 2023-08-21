<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modalHapusMhs{{ $mhs->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah ingin menghapus <b>{{ $mhs->nama }}</b> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                    onclick="event.preventDefault(); document.getElementById('hapus').submit();"><i
                        class="fas fa-save"></i>
                    Simpan</button>
            </div>
            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" id="hapus">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div>
</div>
