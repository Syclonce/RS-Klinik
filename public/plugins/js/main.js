// const socketIOUrl = process.env.SOCKET_IO_URL;
// const socket = io(socketIOUrl);
const socket = io('http://100.96.10.91:3000');

const qrContainer = document.getElementById('qr-code');
const statusContainer = document.getElementById('status');
const statusImage = document.getElementById('status-image');
let serverStatus;
let qrCode;

function startServer() {
    socket.emit('start');
}

function renderQr(qr) {
    qrContainer.innerHTML = '';
    new QRCode(qrContainer, {
        text: qr,
        correctLevel: QRCode.CorrectLevel.H
    })
}

function showStatusImage(src) {
    qrContainer.style.display = 'none';
    statusImage.style.display = 'block';
    statusImage.src = src;
}

function hideStatusImage() {
    statusImage.style.display = 'none';
    qrContainer.style.display = 'block';
}

function setStatus(status) {
    statusContainer.innerHTML = status;
    serverStatus = status;

    if (status === 'initializing') {
        showStatusImage('https://giffiles.alphacoders.com/211/211099.gif');
    } else if (status === 'ready') {
        showStatusImage('https://i.pinimg.com/originals/d2/2a/47/d22a47fad2d210bf3e5a8e069bb68fb7.gif')
    } else if (status === 'Disconnect from server') {
        showStatusImage('https://lordicon.com/icons/wired/lineal/2100-disconnect-network-offline.gif')
    } else if (status === 'pending') {
        showStatusImage('https://media1.giphy.com/media/EZnSvdWR2k5jYljjp4/giphy.gif')
    } else {
        hideStatusImage();
    }
}

socket.on('message', message => {
    console.log(message);
});

socket.on('qr', qr => {
    qrCode = qr;
    renderQr(qr);
});

socket.on('status', statusData => {
    setStatus(statusData);
})

socket.on('disconnect', () => {
    setStatus('Disconnect from server');
})

const startButton = document.getElementById('start-btn');
startButton.addEventListener('click', startServer);
