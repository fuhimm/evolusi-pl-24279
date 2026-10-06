@csrf

<label for="judul">Judul</label>
<input type="text" id="judul" name="judul" value="{{ old('judul', $tugas->judul ?? '') }}">
@error('judul')
    <div class="error">{{ $message }}</div>
@enderror

<label for="deskripsi">Deskripsi</label>
<textarea id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $tugas->deskripsi ?? '') }}</textarea>
@error('deskripsi')
    <div class="error">{{ $message }}</div>
@enderror

<label>
    <input type="checkbox" name="selesai" value="1" @checked(old('selesai', $tugas->selesai ?? false))>
    Selesai
</label>

<p>
    <button class="btn" type="submit">Simpan</button>
    <a href="{{ route('tugas.index') }}">Batal</a>
</p>
