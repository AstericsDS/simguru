<div class="py-5 px-40">
    <div class="mb-10 text-4xl text-[#006569] font-bold ">
        <a href="/kampus"><img class="size-5 mb-4" src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
        <h3>Tambah Gedung</h3>
    </div>
    <div class="flex flex-col gap-4">
        <input placeholder="Masukkan nama gedung" type="text" class="input bg-[#006569]">
        <textarea placeholder="Masukkan deskripsi gedung" type="text" class="textarea bg-[#006569] w-full "></textarea>
        <div class="grid grid-cols-2 gap-2">
            <fieldset class="fieldset">
                <legend class="fieldset-legend text-[#006569]">Pick a file</legend>
                <input type="file" class="file-input bg-[#006569]" />
                <label class="fieldset-label text-[#006569]">Max size 2MB</label>
              </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend text-[#006569]">Pick a file</legend>
                <input type="file" class="file-input bg-[#006569]" />
                <label class="fieldset-label text-[#006569]">Max size 2MB</label>
              </fieldset>
        </div>
        <div class="flex gap-2">
            <input placeholder="Masukkan Jumlah Lantai" type="number" class="input bg-[#006569]">
            <input placeholder="Masukkan Luas Gedung" type="number" class="input bg-[#006569]">
        </div>
        <button class="btn btn-success">Save</button>
    </div>
</div>
