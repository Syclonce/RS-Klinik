<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomepagesController;
use App\Http\Controllers\Modules\FinecController;
use App\Http\Controllers\Modules\DoctorController;
use App\Http\Controllers\Modules\FarmasiController;
use App\Http\Controllers\Modules\PatientController;
use App\Http\Controllers\Modules\ScheduleController;
use App\Http\Controllers\Modules\JanjiController;
use App\Http\Controllers\Modules\DatamasterController;
use App\Http\Controllers\Modules\SumberdayamController;
use App\Http\Controllers\Modules\ObatController;
use App\Http\Controllers\Modules\LaporanController;
use App\Http\Controllers\Modules\KamarController;
use App\Http\Controllers\Modules\RegisController;
use App\Http\Controllers\Modules\AntrianController;
use App\Http\Controllers\Modules\RadiologiController;
use App\Http\Controllers\Modules\LaboratoriumController;
use App\Http\Controllers\Modules\UtdController;
use App\Http\Controllers\Modules\PenjualanController;
use App\Http\Controllers\Modules\PCareController;
use App\Http\Controllers\Modules\WagatweyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\websetController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatusehatController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomepagesController::class, 'index'])->name('default_dashboard');

Route::get('/redirect-dashboard', [HomepagesController::class, 'redirectToDashboard'])->name('redirect.dashboard');

Route::post('/update-app', [UpdateController::class, 'update'])->name('update.app');
Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian');

Route::get('/getAccessToken', [SatusehatController::class, 'getAccessToken'])->name('getAccessToken');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/getsatusehat/{nik}', [SatusehatController::class, 'getPatientByNik'])->name('getPatientByNik');
    Route::get('/decompress', [SatusehatController::class, 'decompress'])->name('decompress');


    Route::get('/jenisKartu/{jenisKartu}', [SatusehatController::class, 'jenisKartu'])->name('jenisKartu');
    Route::get('/practitionejenisKartu/{jenisKartu}', [SatusehatController::class, 'getPractitionerByNik'])->name('practitionejenisKartu');
    Route::get('/getPractitionerByNikall', [SatusehatController::class, 'getPractitionerByNikall'])->name('getPractitionerByNikall');
    Route::get('/search-matching-names/{Nama}', [SatusehatController::class, 'searchMatchingNames'])->name('getPractitioner');
    Route::get('/bpjs/{poli}', [SatusehatController::class, 'bpjs'])->name('bpjs');
    Route::get('/poli', [SatusehatController::class, 'poli'])->name('poli');
    Route::get('/comparePolisAndPoli', [SatusehatController::class, 'comparePolisAndPoli'])->name('comparePolisAndPoli');
    Route::get('/cekstatusconkesi', [SatusehatController::class, 'cekstatus'])->name('cekstatusconkesi');

});




Route::middleware(['auth', 'verified', 'role:Super-Admin'])->group(function () {
    Route::get('/superadmin', [SuperAdminController::class, 'index'])->name('superadmin');

    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::post('/doctor/add', [DoctorController::class, 'doctoradd'])->name('doctor.add');
    Route::post('/check-sex-doctor', [DoctorController::class, 'checkSexdoctor'])->name('doctor.seks.cek');

    Route::get('/doctor/spesiali', [DoctorController::class, 'spesiali'])->name('doctor.spesiali');
    Route::post('/doctor/spesiali/add', [DoctorController::class, 'spesialiadd'])->name('doctor.spesiali.add');

    Route::get('/doctor/visit', [DoctorController::class, 'visitdocter'])->name('doctor.visit');
    Route::post('/doctor/visit', [DoctorController::class, 'visitdocteradd'])->name('doctor.visit.add');

    Route::get('/doctor/poli', [DoctorController::class, 'poli'])->name('doctor.poli');
    Route::post('/doctor/poli/add', [DoctorController::class, 'poliadd'])->name('doctor.poli.add');

    Route::get('/doctor/jabatan', [DoctorController::class, 'jabatan'])->name('doctor.jabatan');
    Route::post('/doctor/jabatan/add', [DoctorController::class, 'jabatanadd'])->name('doctor.jabatan.add');

    Route::get('/doctor/status', [DoctorController::class, 'status'])->name('doctor.status');
    Route::post('/doctor/status/add', [DoctorController::class, 'statusadd'])->name('doctor.status.add');

    Route::get('/patient', [PatientController::class, 'index'])->name('regis.patient');
    Route::get('/patient/generate-nomor-rm', [PatientController::class, 'generate'])->name('patient.generate');
    Route::get('/get-kabupaten', [PatientController::class, 'getKabupaten'])->name('wilayah.getKabupaten');
    Route::get('/get-kecamatan', [PatientController::class, 'getKecamatan'])->name('wilayah.getKecamatan');
    Route::get('/get-desa', [PatientController::class, 'getDesa'])->name('wilayah.getDesa');
    Route::post('/patient/add', [PatientController::class, 'patientadd'])->name('patient.add');

    Route::get('/patient/seks', [PatientController::class, 'seks'])->name('patient.seks');
    Route::post('/patient/seks/add', [PatientController::class, 'seksadd'])->name('patient.seks.add');
    Route::post('/check-sex', [PatientController::class, 'checkSex'])->name('patient.seks.cek');


    Route::get('/patient/goldar', [PatientController::class, 'goldar'])->name('patient.goldar');
    Route::post('/patient/goldar/add', [PatientController::class, 'goldaradd'])->name('patient.goldar.add');

    Route::get('/patient/suku', [PatientController::class, 'suku'])->name('patient.suku');
    Route::post('/patient/suku/add', [PatientController::class, 'sukuadd'])->name('patient.suku.add');

    Route::get('/patient/bangsa', [PatientController::class, 'bangsa'])->name('patient.bangsa');
    Route::post('/patient/bangsa/add', [PatientController::class, 'bangsaadd'])->name('patient.bangsa.add');

    Route::get('/patient/bahasa', [PatientController::class, 'bahasa'])->name('patient.bahasa');
    Route::post('/patient/bahasa/add', [PatientController::class, 'bahasaadd'])->name('patient.bahasa.add');

    Route::get('/patient/penjamin', [PatientController::class, 'penjamin'])->name('patient.penjamin');
    Route::post('/patient/penjamin/add', [PatientController::class, 'penjaminadd'])->name('patient.penjamin.add');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::post('/schedule/add', [ScheduleController::class, 'scheduleadd'])->name('schedule.add');

    Route::get('/schedule/docter/{id}', [ScheduleController::class, 'scheduledoctor'])->name('doctor.doctor');
    Route::post('/schedule/docter/add', [ScheduleController::class, 'scheduledoctoradd'])->name('doctor.doctor.add');

    Route::get('/schedule/liburan', [ScheduleController::class, 'liburan'])->name('schedule.liburan');
    Route::post('/schedule/liburan/add', [ScheduleController::class, 'liburanadd'])->name('schedule.liburan.add');

    Route::get('/schedule/liburan/docter/{id}', [ScheduleController::class, 'liburandoctor'])->name('doctor.doctor.liburan');
    Route::post('/schedule/liburan/docter/add', [ScheduleController::class, 'liburandoctoradd'])->name('doctor.doctor.liburan.add');

    Route::get('/sdm', [SumberdayamController::class, 'index'])->name('sdm');
    Route::post('/sdm/add', [SumberdayamController::class, 'suberdayaadd'])->name('sdm.add');

    Route::get('/sdm/doktor', [SumberdayamController::class, 'doktor'])->name('sdm.doktor');

    Route::get('/sdm/apoteker', [SumberdayamController::class, 'apoteker'])->name('sdm.apoteker');
    Route::post('/sdm/apoteker/add', [SumberdayamController::class, 'apotekeradd'])->name('sdm.apoteker.add');

    Route::get('/sdm/laboratorium', [SumberdayamController::class, 'laboratorium'])->name('sdm.laboratorium');
    Route::post('/sdm/laboratorium/add', [SumberdayamController::class, 'laboratoriumadd'])->name('sdm.laboratorium.add');

    Route::get('/sdm/akuntan', [SumberdayamController::class, 'akuntan'])->name('sdm.akuntan');
    Route::post('/sdm/akuntan/add', [SumberdayamController::class, 'akuntanadd'])->name('sdm.akuntan.add');

    Route::get('/sdm/resepsionis', [SumberdayamController::class, 'resepsionis'])->name('sdm.resepsionis');
    Route::post('/sdm/resepsionis/add', [SumberdayamController::class, 'resepsionisadd'])->name('sdm.resepsionis.add');


    Route::get('/finance', [FinecController::class, 'index'])->name('finance');
    Route::get('/get-all-data', [FinecController::class, 'getAllData'])->name('get.all.data');

    Route::get('/finance/daig', [FinecController::class, 'pemeriksaan'])->name('finance.daig');
    Route::post('/finance/daig/add', [FinecController::class, 'pemeriksaanadd'])->name('finance.daig.add');

    Route::get('/finance/prosedur', [FinecController::class, 'prosedur'])->name('finance.prosedur');
    Route::post('/finance/prosedur/add', [FinecController::class, 'proseduradd'])->name('finance.prosedur.add');

    Route::get('/finance/kategori', [FinecController::class, 'kategori'])->name('finance.kategori');
    Route::post('/finance/kategori/add', [FinecController::class, 'kategoriadd'])->name('finance.kategori.add');

    Route::get('/finance/biaya', [FinecController::class, 'biaya'])->name('finance.biaya');
    Route::post('/finance/biaya/add', [FinecController::class, 'biayaadd'])->name('finance.biaya.add');

    Route::get('/janji', [JanjiController::class, 'index'])->name('janji');
    Route::get('/janji/available-slots', [JanjiController::class, 'getAvailableSlots'])->name('janji.anvalibel');
    Route::get('/janji/get-visit-descriptions/{id}', [JanjiController::class, 'getVisitDescriptions'])->name('janji.visit');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::post('/laporan/add', [LaporanController::class, 'laporanadd'])->name('laporan.add');

    Route::get('/laporan/template', [LaporanController::class, 'laporantemplate'])->name('laporan.template');
    Route::post('/laporan/template/add', [LaporanController::class, 'laporantemplateadd'])->name('laporan.template.add');

    Route::get('/get-template-by-id/{id}', [LaporanController::class, 'getTemplateById'])->name('get.template.by.id');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::post('/obat/add', [ObatController::class, 'obatadd'])->name('obat.add');

    Route::get('/obat/kategori', [ObatController::class, 'obatkategori'])->name('obat.kategori');
    Route::post('/obat/kategori/add', [ObatController::class, 'obatkategoriadd'])->name('obat.kategori.add');

    Route::get('/farmasi', [FarmasiController::class, 'index'])->name('farmasi');
    Route::get('/farmasi/get-all-data', [FarmasiController::class, 'getAllData'])->name('farmasi.get.all.data');

    Route::get('/farmasi/biaya', [FarmasiController::class, 'farmasi'])->name('farmasi.biaya');
    Route::post('/farmasi/biaya/add', [FarmasiController::class, 'farmasiadd'])->name('farmasi.biaya.add');

    Route::get('/farmasi/kategori', [FarmasiController::class, 'katgobi'])->name('farmasi.kategori');
    Route::post('/farmasi/kategori/add', [FarmasiController::class, 'katgobiadd'])->name('farmasi.kategori.add');

    Route::get('/farmasi/opname', [FarmasiController::class, 'opname'])->name('farmasi.opname');
    Route::post('/farmasi/opname/add', [FarmasiController::class, 'opnameadd'])->name('farmasi.opname.add');

    Route::get('/farmasi/obat', [FarmasiController::class, 'obat'])->name('farmasi.obat');
    Route::post('/farmasi/obat/add', [FarmasiController::class, 'obatadd'])->name('farmasi.obat.add');

    Route::get('/farmasi/pengaturan', [FarmasiController::class, 'pengaturan'])->name('farmasi.pengaturan');

    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar');
    Route::post('/kamar/add', [KamarController::class, 'kamaradd'])->name('kamar.add');
    Route::get('/kamar/kelas', [KamarController::class, 'KelasKamar'])->name('kamar.kelas');
    Route::post('/kamar/kelas/add', [KamarController::class, 'KelasKamardd'])->name('kamar.kelas.add');

    Route::get('/radiologi', [RadiologiController::class, 'index'])->name('radiologi');
    Route::post('/radiologi/add', [RadiologiController::class, 'radiologiadd'])->name('radiologi.add');
    Route::get('/generate-no-reg', [RadiologiController::class, 'generateNoReg'])->name('generateNoReg');
    Route::get('/generate-no-rawat', [RadiologiController::class, 'generateNoRawat'])->name('generateNoRawat');
    Route::get('/search-pasien', [RadiologiController::class, 'searchPasien'])->name('searchPasien');

    Route::get('/laboratorium', [LaboratoriumController::class, 'index'])->name('laboratorium');
    Route::post('/laboratorium/add', [LaboratoriumController::class, 'laboratoriumadd'])->name('laboratorium.add');
    Route::get('/generate-no-reg-lab', [LaboratoriumController::class, 'generateNoRegLab'])->name('generateNoRegLab');
    Route::get('/generate-no-rawat-lab', [LaboratoriumController::class, 'generateNoRawatLab'])->name('generateNoRawatLab');
    Route::get('/search-pasien-lab', [LaboratoriumController::class, 'searchPasienLab'])->name('searchPasienLab');

    Route::get('/utd/datapendonor', [UtdController::class, 'index'])->name('utd');
    Route::post('/utd/add', [UtdController::class, 'utdadd'])->name('utd.add');
    Route::post('/utd/generate-no-pendonor', [UtdController::class, 'generateNoPendonor'])->name('utd.generateNoPendonor');
    Route::get('/get-kabupaten-utd', [UtdController::class, 'getKabupaten'])->name('utd.wilayah.getKabupaten');
    Route::get('/get-kecamatan-utd', [UtdController::class, 'getKecamatan'])->name('utd.wilayah.getKecamatan');
    Route::get('/get-desa-utd', [UtdController::class, 'getDesa'])->name('utd.wilayah.getDesa');

    Route::get('/utd/datadonor', [UtdController::class, 'datadonor'])->name('utd.datadonor');
    Route::post('/utd/datadonor/add', [UtdController::class, 'datadonoradd'])->name('utd.datadonor.add');

    Route::get('/utd/stokdarah', [UtdController::class, 'stokdarah'])->name('utd.stokdarah');
    Route::post('/utd/stokdarah/add', [UtdController::class, 'stokdarahadd'])->name('utd.stokdarah.add');

    Route::get('/utd/komponendarah', [UtdController::class, 'komponendarah'])->name('utd.komponendarah');
    Route::post('/utd/komponendarah/add', [UtdController::class, 'komponendarahadd'])->name('utd.komponendarah.add');

    Route::get('/penjualan/data', [PenjualanController::class, 'index'])->name('penjualan');
    Route::post('/penjualan/data/add', [PenjualanController::class, 'penjualanadd'])->name('penjualan.add');

    Route::get('/penjualan/order', [PenjualanController::class, 'order'])->name('penjualan.order');
    Route::post('/penjualan/order/add', [PenjualanController::class, 'orderadd'])->name('penjualan.order.add');

    Route::get('/penjualan/pjl', [PenjualanController::class, 'pjl'])->name('penjualan.pjl');
    Route::post('/penjualan/pjl/add', [PenjualanController::class, 'pjladd'])->name('penjualan.pjl.add');

    Route::get('/datamaster', [DatamasterController::class, 'index'])->name('datmas');

    Route::get('/datamaster/bangsal', [DatamasterController::class, 'bangsal'])->name('datmas.bangsal');
    Route::post('/datamaster/bangsal/add', [DatamasterController::class, 'bangsaladd'])->name('datmas.bangsal.add');

    Route::get('/datamaster/dabar', [DatamasterController::class, 'dabar'])->name('datmas.dabar');
    Route::post('/datamaster/dabar/add', [DatamasterController::class, 'dabaradd'])->name('datmas.dabar.add');
    Route::get('/generate-kode-barang', [DatamasterController::class, 'generateKodeBarang'])->name('generate.kode.barang');

    Route::get('/datamaster/perjal', [DatamasterController::class, 'perjal'])->name('datmas.perjal');
    Route::post('/datamaster/perjal/add', [DatamasterController::class, 'perjaladd'])->name('datmas.perjal.add');
    Route::get('/generate-kode-perjal', [DatamasterController::class, 'generateKodePerjal'])->name('generate.kode.perjal');

    Route::get('/datamaster/pernap', [DatamasterController::class, 'pernap'])->name('datmas.pernap');
    Route::post('/datamaster/pernap/add', [DatamasterController::class, 'pernapadd'])->name('datmas.pernap.add');
    Route::get('/generate-kode-pernap', [DatamasterController::class, 'generateKodePernap'])->name('generate.kode.pernap');

    Route::get('/datamaster/perlogi', [DatamasterController::class, 'perlogi'])->name('datmas.perlogi');
    Route::post('/datamaster/perlogi/add', [DatamasterController::class, 'perlogiadd'])->name('datmas.perlogi.add');
    Route::get('/generate-kode-perlogi', [DatamasterController::class, 'generateKodePerlogi'])->name('generate.kode.perlogi');

    Route::get('/datamaster/perusahaan', [DatamasterController::class, 'perusahaan'])->name('datmas.perusahaan');
    Route::post('/datamaster/perusahaan/add', [DatamasterController::class, 'perusahaanadd'])->name('datmas.perusahaan.add');

    Route::get('/datamaster/katbar', [DatamasterController::class, 'katbar'])->name('datmas.katbar');
    Route::post('/datamaster/katbar/add', [DatamasterController::class, 'katbaradd'])->name('datmas.katbar.add');

    Route::get('/datamaster/katpen', [DatamasterController::class, 'katpen'])->name('datmas.katpen');
    Route::post('/datamaster/katpen/add', [DatamasterController::class, 'katpenadd'])->name('datmas.katpen.add');

    Route::get('/datamaster/katper', [DatamasterController::class, 'katper'])->name('datmas.katper');
    Route::post('/datamaster/katper/add', [DatamasterController::class, 'katperadd'])->name('datmas.katper.add');

    Route::get('/datamaster/satuan', [DatamasterController::class, 'satuan'])->name('datmas.satuan');
    Route::post('/datamaster/satuan/add', [DatamasterController::class, 'satuanadd'])->name('datmas.satuan.add');

    Route::get('/datamaster/jenbar', [DatamasterController::class, 'jenbar'])->name('datmas.jenbar');
    Route::post('/datamaster/jenbar/add', [DatamasterController::class, 'jenbaradd'])->name('datmas.jenbar.add');

    Route::get('/datamaster/industri', [DatamasterController::class, 'industri'])->name('datmas.industri');
    Route::post('/datamaster/industri/add', [DatamasterController::class, 'industriadd'])->name('datmas.industri.add');

    Route::get('/datamaster/golbar', [DatamasterController::class, 'golbar'])->name('datmas.golbar');
    Route::post('/datamaster/golbar/add', [DatamasterController::class, 'golbaradd'])->name('datmas.golbar.add');

    Route::get('/datamaster/penjab', [DatamasterController::class, 'penjab'])->name('datmas.penjab');
    Route::post('/datamaster/penjab/add', [DatamasterController::class, 'penjabadd'])->name('datmas.penjab.add');

    Route::get('/datamaster/cacat', [DatamasterController::class, 'cacat'])->name('datmas.cacat');
    Route::post('/datamaster/cacat/add', [DatamasterController::class, 'cacatadd'])->name('datmas.cacat.add');

    Route::get('/datamaster/aturanpake', [DatamasterController::class, 'aturanpake'])->name('datmas.aturanpake');
    Route::post('/datamaster/aturanpake/add', [DatamasterController::class, 'aturanpakeadd'])->name('datmas.aturanpake.add');

    Route::get('/datamaster/berkas', [DatamasterController::class, 'berkas'])->name('datmas.berkas');
    Route::post('/datamaster/berkas/add', [DatamasterController::class, 'berkasadd'])->name('datmas.berkas.add');
    Route::get('/generate-kode-berkas', [DatamasterController::class, 'generateKodeBerkas'])->name('generate.kode.berkas');

    Route::get('/datamaster/bank', [DatamasterController::class, 'bank'])->name('datmas.bank');
    Route::post('/datamaster/bank/add', [DatamasterController::class, 'bankadd'])->name('datmas.bank.add');

    Route::get('/datamaster/bidang', [DatamasterController::class, 'bidang'])->name('datmas.bidang');
    Route::post('/datamaster/bidang/add', [DatamasterController::class, 'bidangadd'])->name('datmas.bidang.add');

    Route::get('/datamaster/depart', [DatamasterController::class, 'depart'])->name('datmas.depart');
    Route::post('/datamaster/depart/add', [DatamasterController::class, 'departadd'])->name('datmas.depart.add');

    Route::get('/datamaster/emergency', [DatamasterController::class, 'emergency'])->name('datmas.emergency');
    Route::post('/datamaster/emergency/add', [DatamasterController::class, 'emergencyadd'])->name('datmas.emergency.add');

    Route::get('/datamaster/jenjab', [DatamasterController::class, 'jenjab'])->name('datmas.jenjab');
    Route::post('/datamaster/jenjab/add', [DatamasterController::class, 'jenjabadd'])->name('datmas.jenjab.add');

    Route::get('/datamaster/keljab', [DatamasterController::class, 'keljab'])->name('datmas.keljab');
    Route::post('/datamaster/keljab/add', [DatamasterController::class, 'keljabadd'])->name('datmas.keljab.add');

    Route::get('/datamaster/pendidikan', [DatamasterController::class, 'pendidikan'])->name('datmas.pendidikan');
    Route::post('/datamaster/pendidikan/add', [DatamasterController::class, 'pendidikanadd'])->name('datmas.pendidikan.add');

    Route::get('/datamaster/resiko', [DatamasterController::class, 'resiko'])->name('datmas.resiko');
    Route::post('/datamaster/resiko/add', [DatamasterController::class, 'resikoadd'])->name('datmas.resiko.add');

    Route::get('/datamaster/statker', [DatamasterController::class, 'statker'])->name('datmas.statker');
    Route::post('/datamaster/statker/add', [DatamasterController::class, 'statkeradd'])->name('datmas.statker.add');

    Route::get('/datamaster/statwp', [DatamasterController::class, 'statwp'])->name('datmas.statwp');
    Route::post('/datamaster/statwp/add', [DatamasterController::class, 'statwpadd'])->name('datmas.statwp.add');

    Route::get('/datamaster/metcik', [DatamasterController::class, 'metcik'])->name('datmas.metcik');
    Route::post('/datamaster/metcik/add', [DatamasterController::class, 'metcikadd'])->name('datmas.metcik.add');

    Route::get('/datamaster/ok', [DatamasterController::class, 'ok'])->name('datmas.ok');
    Route::post('/datamaster/ok/add', [DatamasterController::class, 'okadd'])->name('datmas.ok.add');
    Route::get('/datamaster/perawatan/{id}/manage', [DatamasterController::class, 'manage'])->name('datmas.perawatan.manage');
    Route::post('/datamaster/perawatan/{id}/add-detail', [DatamasterController::class, 'addDetail'])->name('datmas.perawatan.addDetail');
    Route::delete('/datamaster/perawatan/detail/{id}/delete', [DatamasterController::class, 'deleteDetail'])->name('datmas.perawatan.deleteDetail');

    Route::get('/datamaster/rujukan', [DatamasterController::class, 'rujukan'])->name('datmas.rujukan');
    Route::post('/datamaster/rujukan/add', [DatamasterController::class, 'rujukanadd'])->name('datmas.rujukan.add');

    Route::get('/datamaster/icd', [DatamasterController::class, 'icd'])->name('datmas.icd');
    Route::post('/datamaster/icd9', [DatamasterController::class, 'icd9add'])->name('datmas.icd.9add');
    Route::post('/datamaster/icd10', [DatamasterController::class, 'icd10add'])->name('datmas.icd.10add');

    Route::get('/regis', [RegisController::class, 'index'])->name('regis');
    Route::post('/regis/add', [RegisController::class, 'ugdadd'])->name('regis.add');
    Route::get('generate-no-reg-ugd', [RegisController::class, 'generateNoRegUgd'])->name('generateNoRegUgd');
    Route::get('/cari-no-rm-ugd', [RegisController::class, 'cariNoRMUgd'])->name('cariNoRMUgd');
    Route::get('/get-kode-dokter-ugd/{id}', [RegisController::class, 'getKodeDokterUgd'])->name('getKodeDokterUgd');

    Route::get('/regis/get-dokter-by-poli/{poliId}', [RegisController::class, 'getDokterByPoli'])->name('getregisdokter');
    Route::get('/regis/get-kode-dokter/{dokterId}', [RegisController::class, 'getKodeDokter'])->name('getregispoli');

    Route::get('/regis/rajal', [RegisController::class, 'rajal'])->name('regis.rajal');
    Route::post('/regis/update-status', [RegisController::class, 'statusrajal'])->name('regis.update-status');
    Route::post('/regis/status-lanjut', [RegisController::class, 'statuslanjut'])->name('regis.status-lanjut');
    Route::post('/regis/rajal/add', [RegisController::class, 'rajaladd'])->name('regis.rajal.add');
    Route::get('/search-pasien-rajal', [RegisController::class, 'searchPasienRajal'])->name('searchPasienRajal');
    Route::get('/generate-no-reg-rajal', [RegisController::class, 'generateNoRegRajal'])->name('generateNoRegRajal');
    Route::get('/generate-no-rawat-rajal', [RegisController::class, 'generateNoRawatRajal'])->name('generateNoRawatRajal');
    Route::delete('/rajal/{id}', [RegisController::class, 'rajaldestroy'])->name('rajal.delete');

    Route::get('/regis/ranap', [RegisController::class, 'ranap'])->name('regis.ranap');
    Route::post('/regis/ranap/add', [RegisController::class, 'ranapadd'])->name('regis.ranap.add');
    Route::get('generate-no-reg-ranap', [RegisController::class, 'generateNoRegRanap'])->name('generateNoRegRanap');
    Route::get('/cari-no-rm', [RegisController::class, 'cariNoRM'])->name('cariNoRM');

    Route::get('/regis/soap/{norm}', [RegisController::class, 'soap'])->name('soap');
    Route::post('/regis/soap/add', [RegisController::class, 'soapadd'])->name('soap.add');
    Route::post('/prosedur/store', [RegisController::class, 'storeProsedur'])->name('prosedur.store');
    Route::delete('/prosedur/destroy', [RegisController::class, 'destroyProsedur'])->name('prosedur.destroy');
    Route::post('/diagnosa/store', [RegisController::class, 'storeDiagnosa'])->name('diagnosa.store');
    Route::delete('/diagnosa/destroy', [RegisController::class, 'destroyDiagnosa'])->name('diagnosa.destroy');
    Route::delete('pemeriksaan/{id}', [RegisController::class, 'destroy'])->name('delete.route');

    Route::get('/regis/layanan/{norm}', [RegisController::class, 'layanan'])->name('layanan');
    Route::post('/regis/layanan/add', [RegisController::class, 'layananadd'])->name('layanan.add');
    Route::get('/search-tindakan', [RegisController::class, 'searchTindakan'])->name('searchTindakan');
    Route::delete('/layanan/{id}', [RegisController::class, 'layanandestroy'])->name('layanan.delete');

    Route::get('/regis/berkas/{norm}', [RegisController::class, 'berkas'])->name('regis.berkas');
    Route::post('/regis/berkas/add', [RegisController::class, 'berkasadd'])->name('regis.berkas.add');

    Route::get('/regis/kontrol/{norm}', [RegisController::class, 'kontrol'])->name('regis.kontrol');
    Route::post('/regis/kontrol/add', [RegisController::class, 'kontroladd'])->name('regis.kontrol.add');

    // Route Pcare
    Route::get('/pcare', [PCareController::class, 'index'])->name('pcare');
    Route::get('/pcare/dokter', [PCareController::class, 'dokter'])->name('pcare.dokter');
    Route::get('/pcare/polifktp', [PCareController::class, 'polifktp'])->name('pcare.polifktp');
    Route::get('/pcare/polifktp/get', [SatusehatController::class, 'polifktp'])->name('pcare.polifktp.get');
    Route::get('/pcare/polifktl', [PCareController::class, 'polifktl'])->name('pcare.polifktl');
    Route::get('/pcare/polifktl/get', [SatusehatController::class, 'polifktl'])->name('pcare.polifktl.get');
    Route::get('/pcare/icd10', [PCareController::class, 'icd10'])->name('pcare.icd10');
    Route::get('/pcare/icd10/get/{nama}', [SatusehatController::class, 'icd10'])->name('pcare.icd10.get');
    Route::get('/pcare/icd9', [PCareController::class, 'icd9'])->name('pcare.icd9');
    Route::get('/pcare/icd9/get/{nama}', [SatusehatController::class, 'icd9'])->name('pcare.icd9.get');
    Route::get('/pcare/kesadaran', [PCareController::class, 'kesadaran'])->name('pcare.kesadaran');
    Route::get('/pcare/Kesadaran/get', [SatusehatController::class, 'Kesadaran'])->name('pcare.Kesadaran.get');
    Route::get('/pcare/obats', [PCareController::class, 'obats'])->name('pcare.obats');
    Route::get('/pcare/obats/get/{nama}', [SatusehatController::class, 'obats'])->name('pcare.obats.get');
    Route::get('/pcare/provider', [PCareController::class, 'provider'])->name('pcare.provider');
    Route::get('/pcare/provider/get', [SatusehatController::class, 'provider'])->name('pcare.provider.get');
    Route::get('/pcare/spesialis', [PCareController::class, 'spesialis'])->name('pcare.spesialis');
    Route::get('/pcare/spesialis/get', [SatusehatController::class, 'spesialis'])->name('pcare.spesialis.get');
    Route::get('/pcare/subspesialis/{kode}', [PCareController::class, 'subspesialis'])->name('pcare.subspesialis');
    Route::get('/pcare/subspesialis/get/{nama}', [SatusehatController::class, 'subspesialis'])->name('pcare.subspesialis.get');
    Route::get('/pcare/sarana', [PCareController::class, 'sarana'])->name('pcare.sarana');
    Route::get('/pcare/sarana/get', [SatusehatController::class, 'sarana'])->name('pcare.sarana.get');
    Route::get('/pcare/khusus', [PCareController::class, 'khusus'])->name('pcare.khusus');
    Route::get('/pcare/khusus/get', [SatusehatController::class, 'khusus'])->name('pcare.khusus.get');





    Route::get('/antrian/loket-1', [AntrianController::class, 'loket1'])->name('loket1');

    Route::get('setweb', [websetController::class, 'index'])->name('setweb');
    Route::post('setweb/update', [websetController::class, 'updates'])->name('setweb.update');
    Route::post('setweb/setsatusehat', [websetController::class, 'setsatusehat'])->name('setweb.setsatusehat');
    Route::post('setweb/setbpjs', [websetController::class, 'setbpjs'])->name('setweb.setbpjs');


    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::post('permissions/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::post('permissions/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('role/update', [RoleController::class, 'update'])->name('role.update');
    Route::post('role/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::get('role/{roleId}/give', [RoleController::class, 'addPermissionToRole'])->name('role.give');
    Route::put('role/{roleId}/give', [RoleController::class, 'givePermissionToRole'])->name('role.give.put');

    Route::get('user/role-premesion', [SuperAdminController::class, 'userrolepremesion'])->name('user.role-premesion');
    Route::get('user/role-premesion/{user}/edit', [SuperAdminController::class, 'edit'])->name('user.role-premesions');
    Route::put('user/role-premesion/{user}/edit', [SuperAdminController::class, 'update'])->name('user.role-premesion.edit');
    Route::get('user/role-premesion/{user}', [SuperAdminController::class, 'destroy'])->name('user.role-premesion.del');


    Route::get('wagateway', [WagatweyController::class, 'index'])->name('wagateway');
    Route::post('/save-license-key', [WagatweyController::class, 'saveLicenseKey']);



});



Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});


require __DIR__ . '/auth.php';
