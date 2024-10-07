<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Modul Farmasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Farmasi</h3>
        <div class="card">
            <div class="card-body">
                <h5>Pengaturan Modul Farmasi</h5>
                <form>
                    <div class="mb-3">
                        <label for="depoRawatJalan" class="form-label">Depo Rawat Jalan</label>
                        <select class="form-select" id="depoRawatJalan">
                            <option value="">-</option>
                            <option value="anggrek">Anggrek</option>
                            <option value="apotek">Apotek</option>
                            <option value="gudang_farmasi">Gudang Farmasi</option>
                            <!-- Tambahkan opsi lain jika perlu -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="depoIGD" class="form-label">Depo IGD</label>`
                        <select class="form-select" id="depoIGD">
                            <option value="">-</option>
                            <option value="anggrek">Anggrek</option>
                            <option value="apotek">Apotek</option>
                            <option value="gudang_farmasi">Gudang Farmasi</option>
                            <!-- Tambahkan opsi lain jika perlu -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="depoRawatInap" class="form-label">Depo Rawat Inap</label>
                        <select class="form-select" id="depoRawatInap">
                            <option value="">-</option>
                            <option value="anggrek">Anggrek</option>
                            <option value="apotek">Apotek</option>
                            <option value="gudang_farmasi">Gudang Farmasi</option>
                            <!-- Tambahkan opsi lain jika perlu -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gudangFarmasi" class="form-label">Gudang Farmasi</label>
                        <select class="form-select" id="gudangFarmasi">
                            <option value="">-</option>
                            <option value="anggrek">Anggrek</option>
                            <option value="apotek">Apotek</option>
                            <option value="gudang_farmasi">Gudang Farmasi</option>
                            <!-- Tambahkan opsi lain jika perlu -->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
