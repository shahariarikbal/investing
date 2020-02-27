<?php

namespace App\Uploader;

use Illuminate\Support\Facades\Storage;

trait DeleteTrait
{
    public function deleteOpenGraph()
    {
        Storage::disk($this->disk)->delete('1200x630-'.$this->filename);
    }

    public function deleteDetails()
    {
        Storage::disk($this->disk)->delete('940x493-'.$this->filename);
    }

    public function deleteThumbnail()
    {
        Storage::disk($this->disk)->delete('220x220-'.$this->filename);
    }

    public function deleteSmallThumbnail()
    {
        Storage::disk($this->disk)->delete('40x40-'.$this->filename);
    }

    public function deleteCarousel()
    {
        Storage::disk($this->disk)->delete('278x180-'.$this->filename);
    }

    public function deleteCurrency()
    {
        Storage::disk($this->disk)->delete('40x15-'.$this->filename);
    }

    public function deleteBrokerScreenshot()
    {
        Storage::disk($this->disk)->delete('445x261-'.$this->filename);
    }

    public function deleteBrokerLogoMd()
    {
        Storage::disk($this->disk)->delete('190x65-'.$this->filename);
    }

    public function deleteBrokerLogoSm()
    {
        Storage::disk($this->disk)->delete('125x56-'.$this->filename);
    }

    public function deleteBrokerLogoXs()
    {
        Storage::disk($this->disk)->delete('89x36-'.$this->filename);
    }

    public function deleteAvaterSm()
    {
        Storage::disk($this->disk)->delete('100x100-'.$this->filename);
    }

    public function deleteAvaterXs()
    {
        Storage::disk($this->disk)->delete('50x50-'.$this->filename);
    }
}
