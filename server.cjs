const express = require('express');
const bodyParser = require('body-parser');
const { Client, LocalAuth } = require('whatsapp-web.js');
const QRCode = require('qrcode');

const app = express();

// Inisialisasi klien WhatsApp dengan opsi yang sesuai
const client = new Client({
    authStrategy: new LocalAuth(),
    puppeteer: { headless: true } // Set headless ke false untuk men-debug masalah otentikasi
});


app.use(bodyParser.json());
app.use(express.static('public')); // Melayani file statis dari direktori public

let qrCodeUrl = ''; // Variabel untuk menyimpan URL QR code
let isClientReady = false; // Flag untuk melacak apakah klien WhatsApp siap

// Handler event untuk pembuatan QR code
client.on('qr', (qr) => {
    // Menghasilkan URL QR code
    QRCode.toDataURL(qr)
        .then(url => {
            qrCodeUrl = url; // Menyimpan URL QR code
            console.log('QR Code telah dibuat dan disimpan untuk ditampilkan.');
        })
        .catch(err => {
            console.error('Error saat membuat QR code:', err);
        });
});

// Handler event ketika klien siap
client.on('ready', () => {
    console.log('Klien WhatsApp siap!');
    isClientReady = true; // Set flag ke true ketika klien siap
});

// Handler event ketika klien terautentikasi
client.on('authenticated', () => {
    console.log('Klien WhatsApp terautentikasi!');
});

// Handler event ketika autentikasi gagal
client.on('auth_failure', (msg) => {
    console.error('Kegagalan autentikasi:', msg);
});

// Handler event ketika klien terputus
client.on('disconnected', (reason) => {
    console.log('Klien terputus:', reason);
    isClientReady = false;
    // Hancurkan dan inisialisasi ulang klien untuk menghasilkan QR code baru
    client.destroy();
    client.initialize();
});

// Handler event untuk error
client.on('error', (error) => {
    console.error('Error pada klien WhatsApp:', error);
});

// Inisialisasi klien WhatsApp
client.initialize();

// Endpoint untuk mengirim pesan via WhatsApp
// Endpoint untuk mengirim pesan via WhatsApp
app.post('/send-message', async (req, res) => {
    const { phone, message, url } = req.body;
    const logs = []; // Array untuk menyimpan log

    // Log input yang diterima
    logs.push('Permintaan diterima: ' + JSON.stringify({ phone, message, url }));

    // Validasi request body
    if (!phone || !message) {
        logs.push('Validasi gagal: Nomor telepon dan pesan diperlukan.');
        return res.status(400).json({ status: 'error', message: 'Nomor telepon dan pesan diperlukan.', logs });
    }

    // Cek apakah klien siap
    if (!isClientReady) {
        logs.push('Klien belum siap untuk mengirim pesan.');
        return res.status(503).json({ status: 'error', message: 'Klien WhatsApp belum siap. Silakan tunggu.', logs });
    }

    try {
        // Pastikan nomor telepon dalam format yang benar
        let formattedPhone = phone.replace(/[^0-9]/g, ''); // Hapus karakter non-numerik
        if (formattedPhone.startsWith('0')) {
            // Ganti leading 0 dengan kode negara jika perlu (misalnya Indonesia)
            formattedPhone = '62' + formattedPhone.substr(1);
        }

        const chatId = `${formattedPhone}@c.us`;
        logs.push('Chat ID: ' + chatId); // Log Chat ID

        // Combine message and URL clearly in the message body
        const fullMessage = `${message}\n\nLink verifikasi: ${url ? url : 'Tidak ada URL'}`;

        // Send simple text message
        await client.sendMessage(chatId, fullMessage);
        logs.push(`Message sent successfully to ${chatId}`);
        res.json({ status: 'success', message: 'Pesan berhasil dikirim!', logs });
    } catch (error) {
        console.error('Error saat mengirim pesan:', error);
        logs.push('Error saat mengirim pesan: ' + error.message);
        res.status(500).json({ status: 'error', message: 'Gagal mengirim pesan.', logs });
    }
});
// Endpoint untuk mendapatkan QR code
app.get('/qr-code', (req, res) => {
    if (isClientReady) {
        return res.send('<h1>WhatsApp sudah terhubung!</h1>'); // Tampilkan pesan jika klien siap
    }

    if (!qrCodeUrl) {
        return res.status(404).json({ message: 'QR code belum tersedia. Silakan tunggu klien menginisialisasi.' });
    }

    res.send(`
        <div style="text-align: center;">
            <h2>Scan QR Code untuk menghubungkan WhatsApp</h2>
            <img src="${qrCodeUrl}" alt="QR Code" style="width: 300px; height: 300px;" />
            <p>QR code ini diperbarui secara otomatis.</p>
        </div>
    `);
});

// Jalankan server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server berjalan pada port ${PORT}`);
});
