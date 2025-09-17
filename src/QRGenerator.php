<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QRGenerator {
    public static function generate($ticket_code) {
        $qrCode = QrCode::create($ticket_code);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $folder = __DIR__ . '/../qrcodes/';
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $filePath = $folder . $ticket_code . '.png';
        $result->saveToFile($filePath);

        return 'qrcodes/' . $ticket_code . '.png';
    }
}
