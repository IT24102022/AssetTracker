<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    /**
     * Public Asset Details Page
     */
    public function showAsset(Asset $asset)
    {
        $asset->load('category');

        return view('assets.public-show', compact('asset'));
    }

    /**
     * Display QR Code
     */
 public function qr(Asset $asset)
{
    $url = route('assets.public', $asset);

    return response(
        QrCode::format('svg')
            ->size(300)
            ->margin(2)
            ->generate($url)
    )->header('Content-Type', 'image/svg+xml');
}

    /**
     * Download QR Code
     */
   public function download(Asset $asset)
{
    $url = route('assets.public', $asset);

    $svg = QrCode::format('svg')
        ->size(500)
        ->margin(2)
        ->generate($url);

    return response($svg)
        ->header('Content-Type', 'image/svg+xml')
        ->header(
            'Content-Disposition',
            'attachment; filename="'.$asset->asset_code.'_QR.svg"'
        );
}
}