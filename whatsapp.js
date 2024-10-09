const { Client, LocalAuth } = require('whatsapp-web.js');

class Whatsapp {

    client;
    qr;
    status;
    io;

    /**
     * Constructor
     * 
     * @returns {void}
     * @memberof Whatsapp
     * 
    */
    constructor(io) {
        this.client = new Client({
            authStrategy: new LocalAuth(),
        });
        this.qr = '';
        this.status = 'pending';
        this.io = io;

        this.client.on('qr', (qr) => {
            console.log('qr received');
            this.qr = qr;
            this.status = 'waiting for scan';

            this.io.emit('qr', qr);
            this.io.emit('status', 'waiting for scan');
        });

        this.client.on('ready', () => {
            console.log('Client is ready!');
            this.status = 'ready';

            this.io.emit('status', 'ready');
        });
    }

    /**
     * Start
     * 
     * @returns {void}
     * @memberof Whatsapp
     * 
    */
    start() {
        this.client.initialize();
        this.status = 'initializing';
        this.io.emit('status', this.status);
    }

    /**
     * Get QR
     * 
     * @returns {string}
     * @memberof Whatsapp
     * 
    */
    getQR() {
        return this.qr;
    }

    /**
     * Get Status
     * 
     * @returns {string}
     * @memberof Whatsapp
     * 
    */
    getStatus() {
        return this.status;
    }

    /**
     * Send Message
     * 
     * @param {string} number
     * @param {string} message
     * @returns {void}
     * @memberof Whatsapp
     * 
    */
    sendMessage(number, message) {
        this.client.sendMessage(`${number}@c.us`, message);
    }

}

module.exports = Whatsapp;
